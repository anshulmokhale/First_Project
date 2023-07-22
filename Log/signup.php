<?php


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- custom css  -->
    <link rel="stylesheet" href="../Css/signup.css">
    <title>Sign up</title>
</head>

<body>
    <div id="content" class="centered-container">
        <div class="left">
            <nav class="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../index.html"><img src="../img/logo.png" alt="mamta medical" height="30px" width="180px"></a>
                </div>
            </nav>
            <div class="hd">
                <!-- <h1>Welcome</h1> -->
                <img src="../img/6310506.svg" alt="" height="450px" width="450px">


            </div>
            <div class="subhd">
                <h5>Sign Up to get access</h5>
            </div>
        </div>
        <div class="rigt">
            <h2>Sign Up</h2>
            <div class="frm">
                <form action="#" method="post" id="myForm">
                    <div class="name pading">
                        <input type="text" name="name" id="name" placeholder="Name" required>
                        <input type="text" name="Sname" id="Sname" placeholder="Surname" required>
                    </div>
                    <div class="email pading">
                        <input type="email" name="email" id="email" placeholder="Enter Email" required><a href="#">verify</a>
                        <br>
                        <input type="text" name="verify" id="verify" placeholder="Enter  code" required>
                    </div>
                    <div class="pass pading">
                        <input type="password" name="password-1" id="password" placeholder="Enter password" required>
                        <br>
                        <input type="password" name="password-2" placeholder="Re enter password" required>
                    </div>
                    <div class="butn pading">
                        <button type="submit" name="signup"> Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        window.onload = function() {
            document.getElementById("myForm").reset();
        };
        window.addEventListener('load', function() {
            const content = document.getElementById('content');
            content.style.opacity = 1; // Set opacity to 1 to trigger the fade-in effect
        });
    </script>
</body>

</html>