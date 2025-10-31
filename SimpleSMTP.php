<?php
/**
 * Simple SMTP Class for sending emails
 * Works without PHPMailer dependency
 */
class SimpleSMTP {
    private $host;
    private $port;
    private $username;
    private $password;
    private $encryption;
    private $socket;
    private $error;

    public function __construct($host, $port, $username, $password, $encryption = 'tls') {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->encryption = $encryption;
    }

    public function send($from_email, $from_name, $to_email, $subject, $body) {
        try {
            // Connect to SMTP server
            $this->socket = @fsockopen($this->host, $this->port, $errno, $errstr, 30);

            if (!$this->socket) {
                throw new Exception("Cannot connect to {$this->host}:{$this->port} - $errstr ($errno)");
            }

            // Read server greeting
            $this->readResponse();

            // Send EHLO
            $this->sendCommand("EHLO " . $this->host);

            // Start TLS if needed
            if ($this->encryption === 'tls') {
                $this->sendCommand("STARTTLS");
                stream_socket_enable_crypto($this->socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
                $this->sendCommand("EHLO " . $this->host);
            }

            // Authenticate
            $this->sendCommand("AUTH LOGIN");
            $this->sendCommand(base64_encode($this->username));
            $this->sendCommand(base64_encode($this->password));

            // Set FROM
            $this->sendCommand("MAIL FROM: <{$from_email}>");

            // Set TO
            $this->sendCommand("RCPT TO: <{$to_email}>");

            // Send DATA
            $this->sendCommand("DATA");

            // Email headers and body
            $email_content = "From: {$from_name} <{$from_email}>\r\n";
            $email_content .= "To: <{$to_email}>\r\n";
            $email_content .= "Subject: {$subject}\r\n";
            $email_content .= "Content-Type: text/plain; charset=UTF-8\r\n";
            $email_content .= "\r\n";
            $email_content .= $body;
            $email_content .= "\r\n.\r\n";

            fwrite($this->socket, $email_content);
            $this->readResponse();

            // Quit
            $this->sendCommand("QUIT");
            fclose($this->socket);

            return true;
        } catch (Exception $e) {
            $this->error = $e->getMessage();
            if ($this->socket) {
                @fclose($this->socket);
            }
            return false;
        }
    }

    private function sendCommand($command) {
        fwrite($this->socket, $command . "\r\n");
        return $this->readResponse();
    }

    private function readResponse() {
        $response = '';
        while ($line = fgets($this->socket, 515)) {
            $response .= $line;
            if (substr($line, 3, 1) == ' ') {
                break;
            }
        }

        $code = (int)substr($response, 0, 3);
        if ($code >= 400) {
            throw new Exception("SMTP Error: " . trim($response));
        }

        return $response;
    }

    public function getError() {
        return $this->error;
    }
}
?>
