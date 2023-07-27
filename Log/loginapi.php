<?php
include 'gapi.php';

require 'vendor/autoload.php'; // Path to autoload.php of the Google API client library

// Get the ID token sent from the client-side
$idToken = $_POST['id_token'];

// Initialize the Google Client
$client = new Google_Client(['client_id' => 'YOUR_GOOGLE_CLIENT_ID']);

try {
    // Verify the ID token with Google servers
    $payload = $client->verifyIdToken($idToken);

    if ($payload) {
        // ID token verification successful
        $user_id = $payload['sub']; // Google user ID
        $user_email = $payload['email']; // User's email address
        // You can perform any additional actions here, such as creating a user session.

        // Return a response to the client (optional)
        echo json_encode(['status' => 'success', 'message' => 'User authenticated successfully']);
    } else {
        // ID token verification failed
        echo json_encode(['status' => 'error', 'message' => 'ID token verification failed']);
    }
} catch (Exception $e) {
    // Exception occurred during ID token verification
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}