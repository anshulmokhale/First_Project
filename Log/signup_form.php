<?php

session_start();
require '../Connection/connection.php';

// Check if the JSON data is received properly
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);



if (!$connection) {
    die("Database connection error: " . mysqli_connect_error());
}

// Check if the JSON decoding was successful
if ($data === null) {
    // JSON decoding failed
    $response = array(
        'status' => 'error',
        'message' => 'Invalid data received'
    );
    http_response_code(400); // Bad Request
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$email = $data['email'];
$name = $data['name'];
$surname = $data['surname'];
$date = $data['date'];
$address = $data['address'];
$password = password_hash($data['password'], PASSWORD_BCRYPT);

// Check if the connection is established successfully
if (!$connection) {
    // Database connection error
    $response = array(
        'status' => 'error',
        'message' => 'Database connection failed'
    );
    http_response_code(500); // Internal Server Error
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$query = "INSERT INTO `users` (`id`, `name`, `surname`, `date_of_birth`, `address`, `email`, `password`, `type`) VALUES (NULL, '$name','$surname','$date','$address','$email','$password','0')";

if (mysqli_query($connection, $query)) {
    $_SESSION['user_id'] = $email;
    $_SESSION['loggedin'] = true;

    $response = array(
        'status' => 'success',
        'message' => 'Signup successful',
        'redirect' => '../Dashboard/dashboard.php'
    );
    http_response_code(201); // Created
} else {
    // Database query execution error
    $response = array(
        'status' => 'error',
        'message' => 'Signup failed'
    );
    http_response_code(500); // Internal Server Error

    // Log the database error for debugging purposes
    error_log('MySQL Error: ' . mysqli_error($connection));
}

// Send response back to the client
header('Content-Type: application/json');
echo json_encode($response);
?>