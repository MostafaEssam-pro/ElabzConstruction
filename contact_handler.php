<?php
/**
 * Contact Form Handler
 * Processes contact form submissions and sends email
 */

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Set content type for JSON responses
error_reporting(0);
ini_set('display_errors', 0);
header('Content-Type: application/json; charset=UTF-8');
header('Cache-Control: no-store');

// Configuration
$to_email = 'mostafaessam.egtak@gmail.com';
$subject_prefix = 'Contact Form - EGTAK';

// SMTP Configuration for Gmail
$smtp_host = 'smtp.gmail.com';
$smtp_port = 587;
$smtp_username = 'mostafaessam.egtak@gmail.com'; // Your Gmail address
$smtp_password = 'gvkw riqu ozuf jgzy'; // Your Gmail app password (no spaces)
$smtp_from_name = 'OMRAN Contact Form';

// Initialize response
$response = [
    'success' => false,
    'message' => ''
];

// Get and sanitize form data
$name = isset($_POST['name']) ? trim(htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8')) : '';
$email = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
$phone = isset($_POST['phone']) ? trim(htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8')) : '';
$message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8')) : '';

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = 'Name is required.';
}

if (empty($email)) {
    $errors[] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}

// Phone validation (optional field)
if (!empty($phone)) {
    // Allow numbers, spaces, +, -, (), but must have at least 10 digits
    $phone_digits = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($phone_digits) < 10) {
        $errors[] = 'Please enter a valid phone number with at least 10 digits.';
    }
}

if (empty($message)) {
    $errors[] = 'Message is required.';
} elseif (strlen($message) < 10) {
    $errors[] = 'Message must be at least 10 characters long.';
}

// Check for errors
if (!empty($errors)) {
    $response['message'] = implode(' ', $errors);
    echo json_encode($response);
    exit;
}

// Prepare email content
$email_subject = $subject_prefix . ' - From: ' . $name;
$email_body = "You have received a new contact form submission.\n\n";
$email_body .= "Name: " . $name . "\n";
$email_body .= "Email: " . $email . "\n";
if (!empty($phone)) {
    $email_body .= "Phone: " . $phone . "\n";
}
$email_body .= "Message:\n" . $message . "\n\n";
$email_body .= "---\n";
$email_body .= "Submitted on: " . date('Y-m-d H:i:s') . "\n";
$email_body .= "IP Address: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n";

// Try sending via SMTP using fsockopen
$mail_sent = false;
$smtp_error = '';

try {
    // Remove spaces from password (Gmail app passwords should not have spaces)
    $smtp_password = str_replace(' ', '', $smtp_password);

    // Connect to SMTP server with SSL context for better TLS support
    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
    ]);

    $socket = @stream_socket_client(
        "tcp://{$smtp_host}:{$smtp_port}",
        $errno,
        $errstr,
        10,
        STREAM_CLIENT_CONNECT,
        $context
    );

    if (!$socket) {
        throw new Exception("Cannot connect to SMTP server: $errstr ($errno)");
    }

    // Enable crypto for TLS
    stream_set_blocking($socket, true);

    // Read greeting
    $response = '';
    while ($line = fgets($socket, 515)) {
        $response .= $line;
        if (substr($line, 3, 1) == ' ') {
            break;
        }
    }
    if (substr($response, 0, 3) != '220') {
        throw new Exception("SMTP Error: " . trim($response));
    }

    // Send EHLO
    fwrite($socket, "EHLO " . $smtp_host . "\r\n");
    $response = '';
    while ($line = fgets($socket, 515)) {
        $response .= $line;
        if (substr($line, 3, 1) == ' ') break;
    }

    // Start TLS
    fwrite($socket, "STARTTLS\r\n");
    $response = '';
    while ($line = fgets($socket, 515)) {
        $response .= $line;
        if (substr($line, 3, 1) == ' ') break;
    }
    if (substr($response, 0, 3) != '220') {
        throw new Exception("STARTTLS failed: " . trim($response));
    }

    // Enable crypto - try different TLS methods for compatibility
    $crypto_method = STREAM_CRYPTO_METHOD_TLS_CLIENT;
    if (defined('STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT')) {
        $crypto_method = STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT;
    }

    if (!stream_socket_enable_crypto($socket, true, $crypto_method)) {
        // Try alternative method
        if (!stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
            throw new Exception("TLS encryption failed. Error: " . error_get_last()['message']);
        }
    }

    // Send EHLO again after TLS
    fwrite($socket, "EHLO " . $smtp_host . "\r\n");
    $response = '';
    while ($line = fgets($socket, 515)) {
        $response .= $line;
        if (substr($line, 3, 1) == ' ') break;
    }

    // Authenticate
    fwrite($socket, "AUTH LOGIN\r\n");
    $response = '';
    while ($line = fgets($socket, 515)) {
        $response .= $line;
        if (substr($line, 3, 1) == ' ') break;
    }
    if (substr($response, 0, 3) != '334') {
        throw new Exception("AUTH LOGIN failed: " . trim($response));
    }

    fwrite($socket, base64_encode($smtp_username) . "\r\n");
    $response = '';
    while ($line = fgets($socket, 515)) {
        $response .= $line;
        if (substr($line, 3, 1) == ' ') break;
    }
    if (substr($response, 0, 3) != '334') {
        throw new Exception("Username authentication failed: " . trim($response));
    }

    fwrite($socket, base64_encode($smtp_password) . "\r\n");
    $response = '';
    while ($line = fgets($socket, 515)) {
        $response .= $line;
        if (substr($line, 3, 1) == ' ') break;
    }
    if (substr($response, 0, 3) != '235') {
        throw new Exception("Password authentication failed: " . trim($response));
    }

    // Set FROM
    fwrite($socket, "MAIL FROM: <{$smtp_username}>\r\n");
    $response = '';
    while ($line = fgets($socket, 515)) {
        $response .= $line;
        if (substr($line, 3, 1) == ' ') break;
    }
    if (substr($response, 0, 3) != '250') {
        throw new Exception("MAIL FROM failed: " . trim($response));
    }

    // Set TO
    fwrite($socket, "RCPT TO: <{$to_email}>\r\n");
    $response = '';
    while ($line = fgets($socket, 515)) {
        $response .= $line;
        if (substr($line, 3, 1) == ' ') break;
    }
    if (substr($response, 0, 3) != '250') {
        throw new Exception("RCPT TO failed: " . trim($response));
    }

    // Send DATA
    fwrite($socket, "DATA\r\n");
    $response = '';
    while ($line = fgets($socket, 515)) {
        $response .= $line;
        if (substr($line, 3, 1) == ' ') break;
    }
    if (substr($response, 0, 3) != '354') {
        throw new Exception("DATA command failed: " . trim($response));
    }

    // Send email content
    $email_content = "From: {$smtp_from_name} <{$smtp_username}>\r\n";
    $email_content .= "To: <{$to_email}>\r\n";
    $email_content .= "Reply-To: {$name} <{$email}>\r\n";
    $email_content .= "Subject: {$email_subject}\r\n";
    $email_content .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $email_content .= "\r\n";
    $email_content .= $email_body;
    $email_content .= "\r\n.\r\n";

    fwrite($socket, $email_content);
    $response = '';
    while ($line = fgets($socket, 515)) {
        $response .= $line;
        if (substr($line, 3, 1) == ' ') break;
    }
    if (substr($response, 0, 3) != '250') {
        throw new Exception("Email send failed: " . trim($response));
    }

    // Quit
    fwrite($socket, "QUIT\r\n");
    fclose($socket);

    $mail_sent = true;

} catch (Exception $e) {
    $smtp_error = $e->getMessage();
    if (isset($socket) && is_resource($socket)) {
        @fclose($socket);
    }
} catch (Error $e) {
    $smtp_error = $e->getMessage();
    if (isset($socket) && is_resource($socket)) {
        @fclose($socket);
    }
}

// Handle result
if ($mail_sent) {
    $response['success'] = true;
    $response['message'] = 'Thank you! Your message has been sent successfully. We will get back to you soon.';
} else {
    // Log error
    $error_log_msg = "Contact form SMTP error: " . ($smtp_error ?: 'Unknown error');
    error_log($error_log_msg);

    // Save to file as backup (even on localhost for debugging)
    $log_file = __DIR__ . '/contact_submissions.txt';
    $log_entry = "\n" . str_repeat("=", 60) . "\n";
    $log_entry .= "Date: " . date('Y-m-d H:i:s') . "\n";
    $log_entry .= "Name: " . $name . "\n";
    $log_entry .= "Email: " . $email . "\n";
     if (!empty($phone)) {
        $log_entry .= "Phone: " . $phone . "\n";
    }
    $log_entry .= "Message: " . $message . "\n";
    $log_entry .= "SMTP Error: " . ($smtp_error ?: 'Unknown error') . "\n";
    $log_entry .= "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n";
    $log_entry .= str_repeat("=", 60) . "\n";
    @file_put_contents($log_file, $log_entry, FILE_APPEND);

    // Provide user-friendly error message
    $user_message = 'Sorry, there was an error sending your message. ';

    // Check for specific error types
    if (strpos(strtolower($smtp_error), 'cannot connect') !== false) {
        $user_message .= 'Could not connect to email server. Please check your internet connection.';
    } elseif (strpos(strtolower($smtp_error), 'authentication') !== false || strpos(strtolower($smtp_error), 'password') !== false || strpos(strtolower($smtp_error), '235') !== false) {
        $user_message .= 'Email authentication failed. Please contact the website administrator.';
    } elseif (strpos(strtolower($smtp_error), 'tls') !== false) {
        $user_message .= 'Secure connection failed. Please try again later.';
    } else {
        $user_message .= 'The error has been logged. Please try again or contact us directly at ' . $to_email;
    }

    $response['message'] = $user_message;
}

// Output JSON response
if (function_exists('ob_get_level')) {
    while (ob_get_level() > 0) { ob_end_clean(); }
}
http_response_code(200);
echo json_encode($response);
exit;
