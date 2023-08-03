<?php

$version = time();
?>

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
    <link rel="stylesheet" href="../Css/forget.css?v=<?= $version ?>">
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
                <img src="../img/Forget.svg" alt="">
            </div>
            <div class="subhd">
                <h5>Log in to get access</h5>
            </div>
        </div>
        <div class="rigt">
            <h2>Forget Password</h2>
            <div class="frm">
                <form action="#" method="post" id="forget">
                    <div class="email pading">
                        <div id="emailForm">
                            <!-- <label for="email">Email:</label> -->
                            <input type="email" id="email" name="email" placeholder="Enter email">
                            <button type="button" id="sendCodeBtn">Send Verification Code</button>
                            <br><span id="response"></span>
                            <div id="verificationDiv" style="display: none;">
                                <input type="text" id="verification_code" name="verification_code"
                                    placeholder="enter verification code">
                                <button type="button" id="verifyCodeBtn">Verify Code</button>
                            </div>
                            <!-- <div id="response"></div> -->
                        </div>
                    </div>
                    <div class="pass pading">
                        <input type="password" id="password_1" name="password" placeholder="enter new password">
                        <input type="password" id="password_2" name="password" placeholder="re-enter the password">
                    </div>
                    <div class="butn pading">
                        <button type="submit" name="forget"> Log in </button>
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
            document.getElementById("forget").reset();
        };
        window.addEventListener('load', function () {
            const content = document.getElementById('content');
            content.style.opacity = 1; // Set opacity to 1 to trigger the fade-in effect
        });

        $(document).ready(function () {
            var emailVerified;
            var pass;

            $("#sendCodeBtn").click(function () {
                var email = $("#email").val().trim();

                // Check if the email is empty
                if (!email) {
                    $("#response").html("Please enter your email address.");
                    return;
                }

                $.ajax({
                    url: "send_verification_code.php",
                    type: "POST",
                    data: { email: email },
                    beforeSend: function () {
                        // Show loading message or spinner while waiting for response
                        $("#response").html("Sending verification code...");
                        $("#sendCodeBtn").hide();
                        $("#verificationDiv").hide();
                        $("#wait").show();
                    },
                    success: function (response) {
                        $("#response").html("Verification code sent");
                        if (response === "success") {
                            emailVerified = false; // Reset emailVerified on successful code sending
                            $("#verificationDiv").show();
                        } else {
                            emailVerified = false; // Set to true for demonstration purposes, update with actual verification logic
                            $("#verificationDiv").hide();
                        }
                    },
                    error: function () {
                        $("#response").html("Error: Failed to send verification code.");
                    },
                    complete: function () {
                        // Hide loading message or spinner after the response
                        $("#sendCodeBtn").hide();
                        $("#wait").hide();
                    }
                });
            });

            $("#verifyCodeBtn").click(function () {
                var email = $("#email").val();
                var verificationCode = $("#verification_code").val();
                $.ajax({
                    url: "forget_verify.php",
                    type: "POST",
                    data: { email: email, verification_code: verificationCode },
                    success: function (response) {
                        if (response === "verified") {
                            $("#response").html("Email verified successfully!");
                            $("#sendCodeBtn").hide();
                            $("#verificationDiv").hide();
                            $("#verifyCodeBtn").hide();
                            $("#email").prop("disabled", true);
                            emailVerified = true;
                        } else {
                            $("#response").html("Verification code is invalid.");
                            emailVerified = false;
                        }
                    },
                    error: function () {
                        $("#response").html("Error: Failed to verify code.");
                    }
                });
            });

            $("#password_1, #password_2").on("input", function () {
                var pass1 = $("#password_1").val();
                var pass2 = $("#password_2").val();

                if (pass1 === pass2) {
                    $("#response").html(""); // Clear any previous error message
                    pass = pass1;
                } else {
                    $("#response").html("Please enter both passwords correctly.");
                }
            });

            $("#forget").submit(function (event) {
                event.preventDefault(); // Prevent the default form submission

                // Check if the email is verified before submitting the form
                if (!emailVerified) {
                    $("#response").html("Please verify your email first.");
                    return;
                }

                var data = {
                    email: $("#email").val(),
                    password: pass
                };
                $.ajax({
                    url: 'forget_back.php',
                    type: 'POST',
                    dataType: 'json',
                    data: JSON.stringify(data),
                    contentType: 'application/json', // Corrected the typo here
                    success: function (response) {
                        if (response.message == "successfull") {
                            window.location.href = response.redirect;
                        } else if (response.message == "email") {
                            $("#response").html(response.msg);
                        } else {
                            $("#response").html(response.msg);
                        }
                    },
                    error: function (xhr, status, error) {
                        $("#response").html("Error: " + error);
                    }
                });
            });
        });
    </script>
</body>

</html>