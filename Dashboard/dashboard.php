<?php
// dashboard/dashboard.php

// Start or resume the session
session_start();

// Check if the user is signed in
if (isset($_SESSION['user_id'])) {
    // User is signed in, display dashboard content
    echo "Welcome, " . $_SESSION['user_id'];
} else {
    // User is not signed in, redirect to login page or display an error message
    header('Location: ../Log/signup.php'); // Redirect to the login page
    exit;
}
?>