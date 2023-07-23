<!DOCTYPE html>
<html>

<head>
    <title>Email Verification</title>
</head>

<body>
    <form action="test.php" method="post" class="Sign_up" id="signup">
        <div class="email pading">
            <input type="email" name="email" id="email" placeholder="Enter Email" required>
            <input type="submit" value="Send Verification Code" id="sendButton">
            <button type="button" style="display: none;" id="resendButton" onclick="resendCode()">Resend Code</button>
            <br>
            <input type="text" name="verification_code" id="verification_code" placeholder="Enter code">
        </div>
    </form>

    <script>
        function resendCode() {
            // You can implement the logic to resend the verification code here
            // For this example, let's just display an alert
            alert("Verification code resent!");
            hideResendButton();
        }

        function hideResendButton() {
            var resendButton = document.getElementById("resendButton");
            var sendButton = document.getElementById("sendButton");

            resendButton.style.display = "none";
            sendButton.style.display = "none";

            setTimeout(function() {
                sendButton.style.display = "inline";
                resendButton.style.display = "inline";
            }, 120000); // 2 minutes (2 * 60 * 1000 milliseconds)
        }
    </script>
</body>

</html>
<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer Autoload file
require 'path/to/PHPMailerAutoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];

    // Generate a random verification code (You can use more secure methods to generate the code)
    $verificationCode = mt_rand(100000, 999999);

    // Send the verification email
    try {
        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com'; // Your SMTP server host
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your_smtp_username'; // Your SMTP username
        $mail->Password   = 'your_smtp_password'; // Your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port       = 587; // Your SMTP server port

        // Recipients
        $mail->setFrom('sender@example.com', 'Sender Name'); // Your sender email and name
        $mail->addAddress($email); // Recipient's email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification Code';
        $mail->Body    = 'Your verification code: ' . $verificationCode;

        $mail->send();

        // Show the "Resend Code" button and hide the "Send Verification Code" button after sending the code
        echo '<script>document.getElementById("resendButton").style.display = "inline"; document.getElementById("sendButton").style.display = "none"; setTimeout(hideResendButton, 120000);</script>';
    } catch (Exception $e) {
        // Handle any exceptions or errors that occur during sending
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>