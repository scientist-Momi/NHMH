<?php
session_start();

include_once "php/db_connector.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="styling/dash.css">
    <link rel="stylesheet" href="styling/index.css">
    <link rel="icon" href="img_resource/nhmhlogo.png" type="image/png">
    <title>NHMH || Secure the pregnancy.</title>
</head>

<body>
    <div class="cover">
        <div class="cover_box">
            <div class="cover_head">
                <span class="material-icons-sharp">
                    warning_amber
                </span>
                <p>Warning</p>
            </div>
            <div class="cover_body">
                <h3>Application is not yet available for mobile and tablet devices.</h3>
            </div>

        </div>
    </div>
    <!-- NAVIGATION BAR -->
    <nav>
        <div class="width-control nav">
            <div class="nav-logo">
                <!-- <span class="material-icons-sharp">
                    pregnant_woman
                </span> -->
                <a href="index.php">
                    <div class="logo-img">
                        <img src="img_resource/nhmhlogo.png" alt="">
                    </div>
                </a>

                <h2>New Horizon Maternity Hospital.</h2>
            </div>
            <div class="nav-menu">
                <ul>

                    <a href="our-services.php">
                        <li>Our Services</li>
                    </a>
                    <a href="blogs-page.php">
                        <li>Hospital Blog</li>
                    </a>
                    <a href="contact-us.php">
                        <li>Contact Us</li>
                    </a>
                    <a href="contact-us.php">
                        <li>Sign In</li>
                    </a>
                </ul>
                <!-- <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </div> -->
                <div class="loading-message">
                    <div class="error">
                        <div class="circle">

                        </div>
                    </div>
                    <div class="message">
                        <h4>Success</h4>
                        <small class="loadmsg">Your Email Address is .</small>
                    </div>
                    <!-- <a class="close-message">
                        <span class="material-icons-sharp">
                            close
                        </span>
                    </a> -->
                </div>
                <div class="error-message">
                    <div class="error">
                        <span class="material-icons-sharp">
                            warning_amber
                        </span>
                    </div>
                    <div class="message">
                        <h4>Error</h4>
                        <small class="err">Your Email Address is invalid Lorem ipsum dolor sit amet.</small>
                    </div>
                    <a class="close-message">
                        <span class="material-icons-sharp">
                            close
                        </span>
                    </a>
                </div>

                <div class="success-message">
                    <div class="success">
                        <span class="material-icons-sharp">
                            check_circle_outline
                        </span>
                    </div>
                    <div class="message">
                        <h4>Success</h4>
                        <small class="succ">Your Email Address is invalid Lorem ipsum dolor sit amet.</small>
                    </div>
                    <a class="close-message2">
                        <span class="material-icons-sharp">
                            close
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>