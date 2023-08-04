<?php
session_start();
include '../Connection/connection.php';


if (isset($_SESSION['user_id'])) {
    // User is signed in, display dashboard content

    $name = $_SESSION['user_id'];
    $email = $_SESSION['email'];


    $q = "SELECT `date_of_birth`, `address` FROM `users` WHERE `email` = '{$email}'";

    $result = $connection->query($q);

    if (mysqli_num_rows($result) > 0) {
        while ($rows = $result->fetch_assoc()) {
            $date = $rows['date_of_birth'];
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
                    <h3><i class="bi bi-person-circle"></i></h3>Account
                </a></li>
            <li><a href="#">
                    <h3><i class="fa-regular fa-calendar-check"></i></h3>Appointment history
                </a></li>
            <li><a href="#">
                    <h3><i class="bi bi-receipt-cutoff"></i></h3>Prescription history
                </a></li>
            <li><a href="#">
                    <h3><i class="bi bi-clock-history"></i></h3>My orders
                </a></li>
            <li><a href="../Contact/contact.php">
                    <h3><i class="bi bi-info-circle"></i></h3>Help
                </a></li>
            <li><a href="../Log/logout.php">
                    <h3><i class="bi bi-power"></i></h3>Logout
                </a></li>
        </ul>
    </div>
    <div class="main">
        <h1>Welcome,</h1>
        <div class="user">
            <div class="imge">
                <img src="../img/male.png" alt="Imgae">
            </div>

            <div class="user-details">
                <div class="nm">
                    <p><strong class="hed">User Name:</strong></p>
                    <p><strong class="hed">Email:</strong></p>
                    <p><strong class="hed">Age:</strong></p>
                    <p><strong class="hed">Date of Birth:</strong></p>
                    <p><strong class="hed">Address:</strong></p>
                </div>
                <div class="val">
                    <p class="hed">
                        <?php echo "$name"; ?>
                    </p>
                    <p class="hed">
                        <?php echo "$email"; ?>
                    </p>
                    <p class="hed">
                        <?php echo "$age"; ?>
                    </p>
                    <p class="hed">
                        <?php echo "$date"; ?>
                    </p>
                    <p class="hed">
                        <?php echo "$address"; ?>
                    </p>
                </div>

            </div>
            <div class="user-info">
                <p><strong class="hed">User Name:</strong></p>
                <p class="hed">
                    <?php echo "$name"; ?>
                </p>
                <p><strong class="hed">Email:</strong></p>
                <p class="hed">
                    <?php echo "$email"; ?>
                </p>
                <p><strong class="hed">Age:</strong></p>
                <p class="hed">
                    <?php echo "$age"; ?>
                </p>
                <p><strong class="hed">Date of Birth:</strong></p>
                <p class="hed">
                    <?php echo "$date"; ?>
                </p>
                <p><strong class="hed">Address:</strong></p>
                <p class="hed">
                    <?php echo "$address"; ?>
                </p>
            </div>
        </div>
    </div>
    </div>
    </div>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/bf3a18cfbc.js" crossorigin="anonymous"></script>
</body>

</html>