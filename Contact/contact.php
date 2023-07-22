<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="../Css/contact.css?v=<?= $version ?>">


    <title>Contact with Us</title>
</head>

<body>
    <section>
        <div class="navigationBar fixed-top">
            <div class="Holding">
                <div class="im">
                    <img src="../img/logo.png" alt="LOGO" srcset="">
                </div>
                <div class="ba">
                    <a href="#">Book Appointment</a>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#Home" aria-current="page">Contact us</a>
                    <a class="btn  justify-content-end" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        <h4><i class="bi bi-list"></i></h4>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Shopping/Shop.php">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Prescription</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-------------------------------------------- Menu bar content  --------------------------------------------------------->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Go To</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div>
                        <ul class="navbar-nav">
                            <li class="nav-it">
                                <a class="nav-li" aria-current="page" href="#Home">Contact us</a>
                            </li>
                            <li class="nav-it">
                                <a class="nav-li" href="../index.html">Home</a>
                            </li>
                            <li class="nav-it">
                                <a class="nav-li" href="../Shopping/Shop.php">Shopping</a>
                            </li>
                            <li class="nav-it">
                                <a class="nav-li ">Prescription</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </header>
        </div>
    </section>
    <!---------------------------------------------------- home section --------------------------------------->
    <section-Home>
        <div class="pa" style=" background-image: url(../img/Home-back.jpg) ;" id="Home">
            <h1>Contact Us</h1>
        </div>

        <div class="locate">
            <div class="adr">
                <h1>Mamta Medical</h1>
                <ul>
                    <li>
                        <h5><i class="bi bi-phone-fill"></i> 2523225422</h5>
                    </li>
                    <li>
                        <h5><i class="bi bi-telephone-fill"></i> 8766865573</h5>
                    </li>
                    <li>
                        <h5><i class="bi bi-geo-alt-fill"></i> Mamta Medical, 1 Sswangi, Meghe, Wardha, Maharashtra 442001</h5>
                    </li>
                </ul>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d749.4841128730205!2d78.5814667694891!3d20.725278053122718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd47f79189f826f%3A0x4077ce684035dd0b!2sMamta%20Medical!5e1!3m2!1sen!2sin!4v1689166740157!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>
    </section-Home>
    <!------------------------------------------ Contact us form --------------------------------------->

    <!------------------------------------------ php code ---------------------------------------------->


    <div class="cont">
        <div class="container">
            <form action="contact.php" method="post">
                <h2>Contact Us</h2>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" name="submit">Submit</button>

            </form>


            <?php
            require("PHPMailer/PHPMailer.php");
            require("PHPMailer/SMTP.php");
            require("PHPMailer/Exception.php");

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;

            if (isset($_POST['submit'])) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $subject = $_POST["email"];
                $message = $_POST["message"];


                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
                    $mail->SMTPAuth   = true;
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = 465;

                    $mail->Username   = 'mamtamedical0001@gmail.com';
                    $mail->Password   = 'ashhomgknzvoxvln';

                    $mail->setFrom($email, $name);
                    $mail->addAddress('mamtamedical0001@gmail.com');
                    $mail->Subject = $subject;
                    $mail->Body = $message;
                    if ($mail->send()) {
                        echo '<script>alert("Mail has been successfully send")</script>';
                    } else {
                        echo '<script>alert("Failded to send Mail")</script>';
                    }
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
            ?>
        </div>
    </div>
    <footer>
        <div class="Footer-top">
            <div class="Contact">
                <h3>Contact</h3>
                <div class="c-body">
                    <h6><i class="bi bi-telephone-fill"></i> 8766865573</h6>
                    <h6><i class="bi bi-envelope-at-fill"></i> anshumokhale@gmail.com</h6>
                    <h6><i class="bi bi-geo-alt-fill"></i>Mamta Medical, 1 Sswangi, Meghe, Wardha, Maharashtra 442001
                    </h6>
                </div>
            </div>
            <div class="Time">
                <h3>Medical Hours</h3>
                <ul class="c-body">
                    <li>Monday : Open</li>
                    <li>Tuesday : Open</li>
                    <li>Wednesday : Open</li>
                    <li>Thursday : Open</li>
                    <li>Friday : Open</li>
                    <li>Saturday : Open</li>
                    <li>sunday: Closed</li>
                </ul>
            </div>
            <div class="Serv">
                <h3>Services</h3>
                <ul class="c-body">
                    <li><a href="../index.html">Clinic</a></li>
                    <li><a href="#">Shopping</a></li>
                    <li><a href="#">Appointment</a></li>
                    <li><a href="#">Home Delivery</a></li>
                </ul>
            </div>
        </div>
        <div class="Footer-bottom">
            <p>&copy; 2023 Mamta Medical. All rights reserved.</p>
        </div>
    </footer>




    <!-- boot strap script  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</body>

</html>