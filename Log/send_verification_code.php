<?php
include './PHPMailer/Exception.php';
include './PHPMailer/PHPMailer.php';
include './PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email from the POST data
    $email = $_POST["email"];

    // Generate the verification code
    $verificationCode = generateVerificationCode();
    try {
        $mail = new PHPMailer(true);

        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server host
        $mail->SMTPAuth = true;
        $mail->Username = ''; // Your SMTP username
        $mail->Password = ''; // Your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // Your SMTP server port

        // Recipients
        $mail->setFrom('', ''); // Your sender email and name
        $mail->addAddress($email); // Recipient's email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Email Verification Code';
        $mail->Body = 'Your verification code: ' . $verificationCode;

        $mail->send();

        // Show the "Resend Code" button and hide the "Send Verification Code" button after sending the code
        // echo "<script> alert('send mail')</script>";
        echo 'success';
    } catch (Exception $e) {
        // Handle any exceptions or errors that occur during sending
        // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        if ($mail->ErrorInfo) {
            echo "enter email";
        } else {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

    // Send the verification code via email
    // $to = $email;
    // $subject = "Email Verification Code";
    // $message = "Your verification code is: " . $verificationCode;
    // $headers = "From: mamtamedical0001@gmail.com"; // Replace with your email address or a no-reply address

    // Store the verification code in the session for verification later
    session_start();
    $_SESSION["verification_code"] = $verificationCode;

    // Attempt to send the email
}

// Function to generate a random verification code
function generateVerificationCode()
{
    $length = 6; // Adjust the length of the verification code as needed
    $characters = '0123456789';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $code;
}
