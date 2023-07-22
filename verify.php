// PHP code using Bcrypt for password hashing
<?php

// User's password entered during registration or password update
$password = "user_password";

// Generate the bcrypt hash for the password
$hash = password_hash($password, PASSWORD_BCRYPT);

// Display the generated hash (In a real application, store this hash in your database)
echo "Bcrypt Hash: " . $hash . "<br>";

// Verify the entered password against the stored hash during login
$enteredPassword = "user_password"; // The password entered by the user during login

if (password_verify($enteredPassword, $hash)) {
    // Password is correct. Proceed with the login process.
    echo "Login successful!";
} else {
    // Password is incorrect. Notify the user of the login failure.
    echo "Invalid password!";
}
