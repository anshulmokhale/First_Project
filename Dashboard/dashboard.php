<?php
session_start();
include '../Connection/connection.php';


if (isset($_SESSION['user_id'])) {
    // User is signed in, display dashboard content

    $name = $_SESSION['user_id'];
    $email = $_SESSION['email'];


    $q = "SELECT `date_of_birth`,`gender`, `address` FROM `users` WHERE `email` = '{$email}'";

    $result = $connection->query($q);

    if (mysqli_num_rows($result) > 0) {
        while ($rows = $result->fetch_assoc()) {
            $date = $rows['date_of_birth'];
            $gender = $rows['gender'];
            $address = $rows['address'];
        }
    }
} else {
    // User is not signed in, redirect to login page or display an error message
    header('Location: ../Log/login.php'); // Redirect to the login page
    exit;
}

function calculateAge($birthdate)
{
    $today = new DateTime();
    $birthDate = new DateTime($birthdate);

    $age = $today->diff($birthDate)->y;

    return $age;
}

// Example birthdate in YYYY-MM-DD format
$age = calculateAge($date);
$version = time();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../Css/dashboard.css?v=<?= $version ?>">
</head>

<body>
    <div class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="../Shopping/Shop.php"><img src="../img/logo.png" alt=""></a>
                <a class="d-flex" href="#">
                    <h4><i class="bi bi-bell"></i></h4>0
                </a>

            </div>
        </nav>
    </div>
    <div id="sidebarMenu">
        <ul class="menu">
            <li><a href="#">
                    <h3><i class="bi bi-person-circle"></i></h3> <span class="Txt">Account</span>
                </a></li>
            <li><a href="#">
                    <h3><i class="fa-regular fa-calendar-check"></i></h3> <span class="Txt">Appointment history</span>
                </a></li>
            <li><a href="#">
                    <h3><i class="bi bi-receipt-cutoff"></i></h3> <span class="Txt">Prescription history</span>
                </a></li>
            <li><a href="#">
                    <h3><i class="bi bi-clock-history"></i></h3> <span class="Txt">My orders</span>
                </a></li>
            <li><a href="../Contact/contact.php">
                    <h3><i class="bi bi-info-circle"></i></h3> <span class="Txt">Help</span>
                </a></li>
            <li><a href="../Log/logout.php">
                    <h3><i class="bi bi-power"></i></h3> <span class="Txt">Logout</span>
                </a></li>
        </ul>
    </div>
    <div class="men">
        <div class="info">
            <h1>Account Information</h1>
            <div class="data">
                <table class="NO">
                    <tr class="image">
                        <td><img src="../img/male.png" alt="Male"></td>
                        <td>Anshul Mokhale</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td><?php echo "$email"; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Age</strong></td>
                        <td><?php echo "$age"; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Date of Birth</strong></td>
                        <td><?php echo "$date"; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Gender</strong></td>
                        <td><?php echo "$gender"; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td>
                        <td><?php echo "$address"; ?></td>
                    </tr>
                </table>
                <table class="YES">
                    <tr class="image">
                        <td><img src="../img/male.png" alt="Male"></td>
                        <!-- <td>Anshul Mokhale</td> -->
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                    </tr>
                    <tr>
                        <td><?php echo "$email"; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Age</strong></td>
                    </tr>
                    <tr>
                        <td><?php echo "$age"; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Date of Birth</strong></td>
                    </tr>
                    <tr>
                        <td><?php echo "$date"; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Gender</strong></td>
                    </tr>
                    <tr>
                        <td><?php echo "$gender"; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Address</strong></td>
                    </tr>
                    <tr>
                        <td><?php echo "$address"; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="buton">
            <a href="#">Delete Account</a>
            <a href="#">Add detail</a>
        </div>
    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/bf3a18cfbc.js" crossorigin="anonymous"></script>
</body>

</html>