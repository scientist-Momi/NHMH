<?php
session_start();



$patEmail = stripslashes($_POST['email']);
if (empty($patEmail)) {
    echo "Email field cannot be empty.";
} else {
    $_SESSION['patient_email'] = $patEmail;

    $uniqueOtp = random_int(100000, 999999);

    $_SESSION['uniqueOtp'] = $uniqueOtp;

    echo "hello";
}
