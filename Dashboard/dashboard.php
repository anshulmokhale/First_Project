<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // User is signed in, display dashboard content

} else {
    // User is not signed in, redirect to login page or display an error message
    header('Location: ../Log/login.php'); // Redirect to the login page
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../Css/dashboard.css">
</head>

<body>
    <div class="header">
        <nav class="navbar bg-white">
            <div class="container-fluid">
                <a class="navbar-brand"><img src="../img/logo.png" alt=""></a>
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
                    <h3><i class="bi bi-clock-history"></i></h3>Order history
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
        <?php
        echo "<h1>Welcome, " . $_SESSION['user_id'] . "</h1>";
        ?>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, eum quia? Quaerat qui ab vitae culpa quis
            quasi. Veniam impedit sunt labore ab voluptate accusamus tempora iusto vel molestiae quod magni totam
            assumenda, natus doloremque odit laborum nostrum? Illum est facere cumque assumenda non pariatur delectus
            fugiat eveniet tempore quae qui, voluptates quod cupiditate laborum harum nesciunt minus commodi at modi in
            autem. Iste adipisci dolores, voluptate eius itaque animi provident veritatis laudantium numquam eum,
            explicabo libero rem ut blanditiis necessitatibus odio, quo labore qui beatae. Veritatis debitis facilis
            perferendis sunt quaerat quo cumque sequi odit quidem beatae veniam, nulla, quae velit voluptatum neque
            ratione asperiores ipsa excepturi deserunt! Fuga distinctio voluptas voluptatem totam veniam rem esse minima
            voluptatibus sapiente, culpa nemo hic, rerum fugit, voluptate dolorum inventore animi laudantium laboriosam
            doloremque? Sapiente eos nostrum accusamus quam suscipit dicta illum? Excepturi ipsum, placeat velit tenetur
            numquam nam, expedita eligendi, eum dignissimos debitis est libero dolorem. Quos repellat aperiam, sint
            nesciunt consequatur non itaque hic ut, vitae ea natus perferendis. Magnam, sequi optio quod nemo nobis
            aspernatur debitis reprehenderit corporis, odit exercitationem totam quo cupiditate possimus necessitatibus
            quidem nulla ab assumenda eaque. Dolores cupiditate necessitatibus quod minus ipsam reiciendis, asperiores
            velit.</p>
    </div>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/bf3a18cfbc.js" crossorigin="anonymous"></script>
</body>

</html>