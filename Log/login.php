<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <!-- custom css  -->
    <link rel="stylesheet" href="../Css/signin.css">
    <title>Sign in</title>
</head>

<body>
    <div id="content" class="centered-container">
        <div class="left">
            <nav class="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../Shopping/Shop.php"><img src="../img/logo.png"
                            alt="mamta medical"></a>
                </div>
            </nav>
            <div class="hd">
                <h1>Welcome Back</h1>
            </div>
            <div class="subhd">
                <h5>Log in to get access</h5>
            </div>
        </div>
        <div class="rigt">
            <h2>Log in</h2>
            <div class="frm">
                <form action="#" method="post" id="loginForm">
                    <div id="response"></div>
                    <div class="email pading">
                        <input type="email" name="email" id="email" placeholder="Enter Email" required>
                    </div>
                    <div class="pass pading">
                        <input type="password" name="password" id="password" placeholder="Enter password" required>
                    </div>
                    <div class="frget">
                        <a href="forget.php" id="forget">Forget Password</a>
                    </div>
                    <div class="butn pading">
                        <button type="submit" name="login"> Log in </button>
                        <a href="signup.php"> New User Signup</a>

                    </div>

                    <!-- <div class="g-signin2" onclick="onSignIn()">
                        <h5><i class="bi bi-google"></i></h5>
                    </div> -->
                </form>
            </div>
        </div>
    </div>




    <script>
        window.onload = function () {
            document.getElementById("loginForm").reset();
        };
        window.addEventListener('load', function () {
            const content = document.getElementById('content');
            content.style.opacity = 1; // Set opacity to 1 to trigger the fade-in effect
        });



        $("#loginForm").submit(function (event) {
            event.preventDefault();
            var loginData = {
                email: $("#email").val(),
                password: $("#password").val()
            };

            $.ajax({
                url: 'login_form.php',
                type: 'POST',
                dataType: "json",
                data: JSON.stringify(loginData),
                contentType: 'application/json',
                success: function (response) {
                    if (response.message == "login") {
                        window.location.href = response.redirect;
                    } else {
                        $("#response").html(response.message);
                    }
                },
                error: function (xhr, status, error) {
                    $("#response").html("Error: " + error);
                }
            });
        });

    </script>
</body>

</html>