<?php

session_start();

include '../Connection/connection.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$request = file_get_contents('php://input');
$data = json_decode($request, true);

if ($data == null) {
    $response = array(
        'status' => 'Failed login',
        'message' => 'Enter the Email and Password'
    );
    http_response_code(400);
    echo json_encode($response);
    exit;
}

$email = $data['email'];
$password = $data['password'];

if (!$connection) {
    die("Database connection error: " . mysqli_connect_error());
}
$q = "SELECT `email` , `password` FROM `users` WHERE `email` = '{$email}'";

$result = mysqli_query($connection, $q);

if (mysqli_num_rows($result) > 0) {
    $deta = mysqli_fetch_assoc($result);
}

if (password_verify($password, $deta['password'])) {
    $_SESSION['user_id'] = $email;

    $_SESSION['loggedin'] = true;
    $response = array(
        'status' => 'Success',
        'message' => 'login',
        'redirect' => '../Shopping/Shop.php'
    );
    http_response_code(201);
} else {
    $_SESSION['loggedin'] = false;
    $response = array(
        'status' => 'Failed',
        'message' => 'password incorrect'
    );
    http_response_code(401);
}
header('Content-Type: application/json');

echo json_encode($response);
?>