<?php

require '../Connection/connection.php';

$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody, true);

if (!$connection) {
    die("connection to database failuer");
}

if ($data == null) {
    $response = array(
        'message' => 'error',
        'status' => 'failed',
        'msg' => 'please enter the data'
    );

    header('Content-Type:application/json');
    echo json_encode($response);
} else {

    $email = $data['email'];
    $password = $data['password'];

    $sql = "SELECT email FROM users WHERE email = '{$email}'";

    $result = $connection->query($sql);

    if (mysqli_num_rows($result) > 0) {
        $newPass = password_hash($data['password'], PASSWORD_BCRYPT);
        $sql2 = "UPDATE users SET password='{$newPass}' WHERE email='{$email}'";

        if ($connection->query($sql2) === TRUE) {
            $response = array(
                'message' => 'successfull',
                'status' => 'success',
                'msg' => 'password updated',
                'redirect' => 'login.php'
            );
            header('Content-Type:application/json');
            echo json_encode($response);
        } else {
            $response = array(
                'message' => 'passfaild',
                'status' => 'failed',
                'msg' => 'query failed'
            );

            header('Content-Type:application/json');
            echo json_encode($response);
        }

    } else {
        $response = array(
            'message' => 'email',
            'status' => 'failed',
            'msg' => 'please enter the correct email'
        );

        header('Content-Type:application/json');
        echo json_encode($response);
    }
}

?>