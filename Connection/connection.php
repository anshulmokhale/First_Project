<?php


try {
    // Create a connection to the database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'mamta_medical';
    $connection = mysqli_connect($host, $username, $password, $database);

    // Check for connection errors
    if ($connection->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // echo " connection is on";
    }
} catch (mysqli_sql_exception $e) {
    // Catch any MySQL exceptions that may occur during the connection process
    die("Connection failed: " . $e->getMessage());
}