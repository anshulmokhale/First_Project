<?php
require '../Connection/connection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------------------------------------------- bootstrap css -------------------------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!------------------------------------------------ custom css ---------------------------------------->
    <link rel="stylesheet" href="../Css/shop.css">
    <title> Shopping</title>
</head>

<body>
    <!-------------------------------------------------- navbar section --------------------------------------->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.html"><img src="../img/png/logo-no-background.png" alt=""></a>

                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav ">
                        <a class="nav-link" href="#">Prescription</a>
                        <a class="nav-link" href="../Log/check.html">Sign up/Log in</a>
                        <!-- <a class="nav-link" href="../Log/singin.php">Log in</a> -->
                    </div>

                </div>
                <a class="btn  justify-content-end libtn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <h4><i class="bi bi-list"></i></h4>
                </a>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Go To</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-it">
                            <a class="nav-li" aria-current="page" href="#Home">Home</a>
                        </li>
                        <li class="nav-it">
                            <a class="nav-li" href="#">Prescription </a>
                        </li>
                        <li class="nav-it">
                            <a class="nav-li" href="../Log/check.html">Sign up/Log in</a>
                        </li>
                        <li class="nav-it">
                            <!-- <a class="nav-li" href="../Log/singin.php">Log in</a> -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="category">
            <nav class="navbar bg-body-tertiary" id="cate">
                <div class="container-fluid">
                    <a class="navbar-brand" onclick="show_btn()"><i class="fa-solid fa-bars"></i></a>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success bt1" type="submit">Search</button>
                        <button class="btn  bt2" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <a class="navbar-brand" onclick="show_btn()" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </nav>
        </div>
    </section>
    <div class="secton" id="secton">
        <div class="Lft" id="lft">

            <h4>Category</h4>

            <ul class="cat-lst">
                <?php
                $q = "select * from category";
                $result = $conn->query($q);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $pg = $row["cat-name"];
                        echo '<li><a href="./Shop.php?page=' . $pg . '">' . $row["no."] . ' ' . $row["cat-name"] . '</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
        <div class="Rgt" id="rgt">
            <div class="ele">
                <div class="crd">
                    <div class="row brd">
                        <div class="img-col">
                            <img src="../img/I_bottle.jpg" style="height: 150px; width: 150px;" alt="injection bottle">
                        </div>
                        <div class="col">
                            <h5>Injection bottle</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ele">
                <div class="crd">
                    <div class="row brd">
                        <div class="img-col">
                            <img src="../img/Injection.jpg" style="height: 150px; width: 150px;" alt="injection bottle">
                        </div>
                        <div class="col">
                            <h5>Injection bottle</h5>
                            <br>
                            <h5>500/-</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ele">
                <div class="crd">
                    <div class="row brd">
                        <div class="img-col">
                            <a href="#"><img src="../img/capsule.jpg" style="height: 150px; width: 150px;" alt="injection bottle"></a>
                        </div>
                        <div class="col">
                            <h5>Injection bottle</h5>
                            <br>
                            <h5>500/-</h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="ele">
                <div class="crd">
                    <div class="row brd">
                        <div class="img-col">
                            <a href="#"><img src="../img/meftal_spas_tablet_10s_581482_1_2.jpg" style="height: 150px; width: 150px;" alt="injection bottle"></a>
                        </div>
                        <div class="col">
                            <h5>Meftal Spas</h5>
                            <br>
                            <h5>500/-</h5>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--------------------------------------------------- custom js -------------------------------------->
    <!-- <script src="../Js/App.js"></script> -->
    <script type="text/javascript">
        window.addEventListener("scroll", function() {
            var sec = document.getElementById("cate");
            var dcc = document.getElementById("secton");
            sec.classList.toggle('sticky', window.scrollY > 40)
            if (sec.classList.contains('sticky')) {
                dcc.classList.add('padd');
            } else {
                dcc.classList.remove('padd');
            }


        });

        var left = document.getElementById("lft");
        var rgt = document.getElementById("rgt");

        function show_btn() {
            // left.style.display = "block"
            left.classList.toggle("sho");
            rgt.classList.toggle("sh");
        }
    </script>
    <!----------------------------------------------- bootstrap js ----------------------------------------->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-------------------------------------------fontawesom kit ------------------------------------->
    <script src="https://kit.fontawesome.com/bf3a18cfbc.js" crossorigin="anonymous"></script>
</body>

</html>