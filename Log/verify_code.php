<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email and verification code from the POST data
    $email = $_POST["email"];
    $verificationCode = $_POST["verification_code"];

    // Start the session to get the stored verification code
    session_start();

    // Check if the entered verification code matches the stored one
    if (isset($_SESSION["verification_code"]) && $_SESSION["verification_code"] == $verificationCode) {
        // Verification successful
        echo "verified";
    } else {
        // Verification failed
        echo "Invalid verified";
    }

    // Clear the verification code from the session to prevent reuse
    unset($_SESSION["verification_code"]);
}