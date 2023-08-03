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

    <!-- ==============================jquery link=========================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- custom css  -->
    <link rel="stylesheet" href="../Css/signup.css?v=<?= $version ?>">
    <title>Sign up</title>
</head>

<body>
    <div id="content" class="centered-container">
        <div class="left">
            <nav class="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../Shopping/Shop.php"><img src="../img/logo.png" alt="mamta medical"
                            height="30px" width="180px"></a>
                </div>
            </nav>
            <div class="hd">
                <!-- <h1>Welcome</h1> -->
                <img src="../img/6310506.svg" alt="">


            </div>
            <div class="subhd">
                <h5>Sign Up to get access</h5>
            </div>
        </div>
        <div class="rigt">
            <h2>Sign Up</h2>
            <div class="frm">
                <form action="#" method="post" id="myForm">
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
                    <div class="name pading">
                        <input type="text" name="name" id="name" placeholder="Name" required>
                        <input type="text" name="surname" id="surname" placeholder="Surname" required>
                    </div>
                    <div class="db pading">
                        <label for="date">Enter DOB :</label>
                        <input type="date" name="date" id="date" placeholder="Date" required>
                    </div>
                    <div class="db pading">
                        <label for="gender" required>Select Gender:</label>
                        <input type="radio" name="gender" id="gender" value="Male"><span> Male </span>
                        <input type="radio" name="gender" id="gender" value="Female"><span> Female </span>
                        <input type="radio" name="gender" id="gender" value="Other"><span> Other </span>

                        <br><span id="error"></span>

                    </div>
                    <div class="addr pading">
                        <input type="text" name="address" id="address" placeholder="Enter Your Address">
                    </div>
                    <div class="pass pading">
                        <input type="text" name="password_2" id="password_1" placeholder="Enter password" required>
                        <br>
                        <input type="password" name="password_2" id="password_2" placeholder="Re enter password"
                            required>
                    </div>
                    <br><span id="passConfirm"></span>
                    <div class="butn pading">
                        <button type="submit" name="signup" id="signup"> Sign up</button>
                        <a href="login.php"> Already an user, login here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        window.onload = function () {
            document.getElementById("myForm").reset();
        };
        window.addEventListener('load', function () {
            const content = document.getElementById('content');
            content.style.opacity = 1; // Set opacity to 1 to trigger the fade-in effect
        });
        var w1 = document.getElementById("sendCodeBtn");
        var w2 = document.getElementById("wait");

        function hdi() {
            w1.style.display = "none";
            w2.style.display = "inline";
        }
        $(document).ready(function () {
            var emailVerified = false;

            $("#sendCodeBtn").click(function () {
                var email = $("#email").val().trim();

                // Check if the email is empty
                if (!email) {
                    $("#response").html("! Please enter your email address.");
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
                        $("#response").html("code sended");
                        if (response == "success") {
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
                    url: "verify_code.php",
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
                } else {
                    $("#response").html("Please enter both passwords correctly.");
                }
            });

            $("#myForm").submit(function (event) {
                event.preventDefault();


                // Check if the passwords match before submitting the form
                var pass1 = $("#password_1").val();
                var pass2 = $("#password_2").val();

                if (pass1 !== pass2) {
                    $("#response").html("Please enter both passwords correctly.");
                    return;
                }
                var gender = $("input[name='gender']:checked").val();

                // Proceed with form submission using AJAX
                var signupData = {
                    name: $("#name").val(),
                    surname: $("#surname").val(),
                    email: $("#email").val(),
                    date: $("#date").val(),
                    gender: gender,
                    address: $("#address").val(),
                    password: pass1
                };
                if (gender) {
                    $.ajax({
                        url: "signup_form.php",
                        type: "POST",
                        dataType: "json",
                        data: JSON.stringify(signupData),
                        contentType: "application/json",
                        success: function (response) {
                            if (response.message === "Signup successful") {
                                window.location.href = response.redirect;
                            } else {
                                $("#response").html(response.message);
                            }
                        },
                        error: function (xhr, status, error) {
                            $("#response").html("Error: " + error);
                        }
                    });
                }
                else {
                    $("#error").html("please select the gender");
                }
            });
        });
    </script>

</body>

</html>