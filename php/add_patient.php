<?php

session_start();
include_once "db_connector.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

// Getting all inputs from form
$fname = stripslashes($_POST['fname']);
$lname = stripslashes($_POST['lname']);
$email = stripslashes($_POST['email']);
$phone = stripslashes($_POST['phone']);
$address = stripslashes($_POST['address']);
$dob = stripslashes($_POST['dob']);
$genotype = stripslashes($_POST['genotype']);
$bgroup = stripslashes($_POST['bgroup']);
$height = stripslashes($_POST['height']);
$children = stripslashes($_POST['children']);
$nokname = stripslashes($_POST['nokname']);
$nokrel = stripslashes($_POST['nokrel']);
$nokphone = stripslashes($_POST['nokphone']);
$nokaddress = stripslashes($_POST['nokaddress']);
// $username = stripslashes( $_POST['username']);


// Check if fields are empty
if (empty($fname)) {
    echo "First Name field cannot be empty.";
} elseif (empty($lname)) {
    echo "Last Name field cannot be empty.";
} elseif (empty($phone)) {
    echo "Phone field cannot be empty.";
} elseif (empty($email)) {
    echo "Email field cannot be empty.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email is invalid.";
} elseif (empty($address)) {
    echo "Address field cannot be empty.";
} elseif (empty($dob)) {
    echo "Please input patient birth date.";
} elseif (empty($genotype)) {
    echo "Please choose patient genotype.";
} elseif (empty($bgroup)) {
    echo "Please choose patient blood group.";
} elseif (empty($height)) {
    echo "Please input patient height.";
} elseif (empty($children)) {
    echo "Please input patient number of children.";
} elseif (empty($nokname)) {
    echo "Please input patient next of kin full name.";
} elseif (empty($nokrel)) {
    echo "Please input patient relationship with next of kin .";
} elseif (empty($nokphone)) {
    echo "Please input patient next of kin phone number.";
} elseif (empty($nokaddress)) {
    echo "Please input patient next of kin address.";
} else {
    //Generate random password for staff
    $data = 'NHMHPATIENT1234567890nhmhpatient!@#$%&';

    $password = substr(str_shuffle($data), 0, 10);

    // Generate first username for staff
    $rand_user = rand(time(), 100000);
    $fix = "PAT";
    $username = $fix . $rand_user;

    $rand_id = rand(time(), 100000000);
    $status = "Offline now";

    // calculate age from dob
    $today = date("y-m-d");
    $age = date_diff(date_create($dob), date_create($today))->y;

    // check if username exists
    $checkusername = mysqli_query($conn, "select * from nhmh_patient_db where username = '$username' ");

    if (mysqli_num_rows($checkusername) > 0) {
        echo "Username you picked already exists.";
    } else {

        $_SESSION['patient_email'] = $email;

        $uniqueOtp = random_int(100000, 999999);

        $_SESSION['uniqueOtp'] = $uniqueOtp;

        $patientdetailsArray = ["unique_id" => $rand_id, "firstname" => $fname, "lastname" => $lname, "email" => $email, "phone" => $phone, "address" => $address, "age" => $age, "genotype" => $genotype, "bgroup" => $bgroup, "height" => $height, "children" => $children, "nokname" => $nokname, "nokrel" => $nokrel, "nokphone" => $nokphone, "nokaddress" => $nokaddress, "username" => $username, "password" => $password, "status" => $status];


        $_SESSION['student_data'] = $patientdetailsArray;

        try {
            // run program to send mail with details to patient.
            $mail = new PHPMailer(true);

            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = "momiwebs.com.ng";
            $mail->SMTPAuth = false;
            $mail->Username = 'admin@momiwebs.com.ng';
            $mail->Password = 'z5sU.KuJrXT9';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('admin@momiwebs.com.ng', 'New Horizon Maternity Hospital');

            $mail->addAddress($email);

            $mail->isHTML(true);

            $mail->Subject = "New Horizon Maternity Hospital- New Patient.";

            $mail->Headers = array(
                "MIME-Version" => "1.0",
                "Content-Type" => "text/html;charset=UTF-8"
            );

            $mail->Body = file_get_contents("../email_temp/otp_send_temp.php");
            
            $mail->AddEmbeddedImage('../img_resource/logo3.jpg', 'logo');

            $swap_var = array(
                "{otp_pin}" => "$uniqueOtp"
            );

            foreach (array_keys($swap_var) as $key) {
                if (strlen($key) > 2 && trim($key) != "") {
                    $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                }
            }

            $mail->send();

            echo "hello";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
