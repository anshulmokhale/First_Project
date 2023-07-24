<?php

// $host = "localhost";
// $username = "root";
// $password = 7448;
// $database = "mamta_medical";

// // Create a connection to the database
// $conn = new mysqli($host, $username, $password, $database);

// // Check for connection errors
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "connection is successfull";
// }

// Include the configuration file
// require './configu.php';

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

    // If you reached here, the connection to the database is successful
    // You can now use $conn to execute queries and interact with the database
} catch (mysqli_sql_exception $e) {
    // Catch any MySQL exceptions that may occur during the connection process
    die("Connection failed: " . $e->getMessage());
}

// Don't forget to close the connection when you're done:
// $conn->close();
