<?php
/**
 * Contact Form Handler with SMTP Support (Using PHPMailer)
 *
 * TO USE THIS:
 * 1. Download PHPMailer from https://github.com/PHPMailer/PHPMailer
 * 2. Extract to a folder like: vendor/PHPMailer/
 * 3. Uncomment the require_once lines below
 * 4. Update SMTP settings
 * 5. Rename this file to contact_handler.php or update form action
 */

// Uncomment these lines after installing PHPMailer:
// require_once 'vendor/PHPMailer/src/Exception.php';
// require_once 'vendor/PHPMailer/src/PHPMailer.php';
// require_once 'vendor/PHPMailer/src/SMTP.php';
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

header('Content-Type: application/json');

// Configuration
$to_email = 'mostafaessam.egtak@gmail.com';
$subject_prefix = 'Contact Form - EGTAK';

// SMTP Configuration (Update with your email service credentials)
$smtp_host = 'smtp.gmail.com';        // Gmail SMTP, or your email provider
$smtp_port = 587;                      // 587 for TLS, 465 for SSL
$smtp_username = 'your-email@gmail.com'; // Your email address
$smtp_password = 'gvkw riqu ozuf jgzy';    // App-specific password (not regular password)
$smtp_encryption = 'tls';              // 'tls' or 'ssl'

$response = ['success' => false, 'message' => ''];

// Get and sanitize form data
$name = isset($_POST['name']) ? trim(htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8')) : '';
$email = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : '';
$message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8')) : '';

// Validation
$errors = [];
if (empty($name)) $errors[] = 'Name is required.';
if (empty($email)) {
    $errors[] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}
if (empty($message)) {
    $errors[] = 'Message is required.';
} elseif (strlen($message) < 10) {
    $errors[] = 'Message must be at least 10 characters long.';
}

if (!empty($errors)) {
    $response['message'] = implode(' ', $errors);
    echo json_encode($response);
    exit;
}

// Check if PHPMailer is available
if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
    // Fallback to basic mail() function
    $email_subject = $subject_prefix . ' - From: ' . $name;
    $email_body = "You have received a new contact form submission.\n\n";
    $email_body .= "Name: " . $name . "\n";
    $email_body .= "Email: " . $email . "\n";
    $email_body .= "Message:\n" . $message . "\n\n";
    $email_body .= "---\n";
    $email_body .= "Submitted on: " . date('Y-m-d H:i:s') . "\n";
    $email_body .= "IP Address: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n";

    $headers = [];
    $headers[] = "From: " . $name . " <" . $email . ">";
    $headers[] = "Reply-To: " . $email;
    $headers[] = "X-Mailer: PHP/" . phpversion();
    $headers[] = "Content-Type: text/plain; charset=UTF-8";

    $mail_sent = @mail($to_email, $email_subject, $email_body, implode("\r\n", $headers));

    if ($mail_sent) {
        $response['success'] = true;
        $response['message'] = 'Thank you! Your message has been sent successfully.';
    } else {
        $response['message'] = 'Email service not configured. Please contact us directly.';
    }
    echo json_encode($response);
    exit;
}

// Use PHPMailer for SMTP
try {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    // Server settings
    $mail->isSMTP();
    $mail->Host = $smtp_host;
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;
    $mail->SMTPSecure = $smtp_encryption;
    $mail->Port = $smtp_port;
    $mail->CharSet = 'UTF-8';

    // Recipients
    $mail->setFrom($smtp_username, 'Contact Form');
    $mail->addAddress($to_email);
    $mail->addReplyTo($email, $name);

    // Content
    $mail->isHTML(false);
    $mail->Subject = $subject_prefix . ' - From: ' . $name;
    $mail->Body = "You have received a new contact form submission.\n\n";
    $mail->Body .= "Name: " . $name . "\n";
    $mail->Body .= "Email: " . $email . "\n";
    $mail->Body .= "Message:\n" . $message . "\n\n";
    $mail->Body .= "---\n";
    $mail->Body .= "Submitted on: " . date('Y-m-d H:i:s') . "\n";
    $mail->Body .= "IP Address: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "\n";

    $mail->send();
    $response['success'] = true;
    $response['message'] = 'Thank you! Your message has been sent successfully. We will get back to you soon.';

} catch (Exception $e) {
    $response['message'] = 'Sorry, there was an error sending your message: ' . $mail->ErrorInfo;
    error_log("Contact form PHPMailer error: " . $mail->ErrorInfo);
}

echo json_encode($response);
exit;
?>
