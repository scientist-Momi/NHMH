<?php
session_start();
include_once "db_connector.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';


$digit1 = stripslashes($_POST['digit-1']);
$digit2 = stripslashes($_POST['digit-2']);
$digit3 = stripslashes($_POST['digit-3']);
$digit4 = stripslashes($_POST['digit-4']);
$digit5 = stripslashes($_POST['digit-5']);
$digit6 = stripslashes($_POST['digit-6']);

$digit = $digit1 . $digit2 . $digit3 . $digit4 . $digit5 . $digit6;

// echo $digit;

$uniqueOtp = $_SESSION['uniqueOtp'];

$rand_id = $_SESSION['student_data']['unique_id'];
$fname = $_SESSION['student_data']['firstname'];
$lname = $_SESSION['student_data']['lastname'];
$email = $_SESSION['student_data']['email'];
$phone = $_SESSION['student_data']['phone'];
$address = $_SESSION['student_data']['address'];
$age = $_SESSION['student_data']['age'];
$genotype = $_SESSION['student_data']['genotype'];
$bgroup = $_SESSION['student_data']['bgroup'];
$height = $_SESSION['student_data']['height'];
$children = $_SESSION['student_data']['children'];
$nokname = $_SESSION['student_data']['nokname'];
$nokrel = $_SESSION['student_data']['nokrel'];
$nokphone = $_SESSION['student_data']['nokphone'];
$nokaddress = $_SESSION['student_data']['nokaddress'];
$username = $_SESSION['student_data']['username'];
$password = $_SESSION['student_data']['password'];
$status = $_SESSION['student_data']['status'];

// echo $rand_id, $fname, $lname, $email, $nokaddress, $password;

if ($digit == $uniqueOtp) {

    //insert inputs into database
    $inserttodb = mysqli_query($conn, "insert into nhmh_patient_db (unique_id,firstname,lastname,email,phone,address,age,genotype,bgroup,height,children,nokname,nokrel,nokphone,nokaddress,username,password,status) values('$rand_id', '$fname', '$lname', '$email', '$phone', '$address', '$age', '$genotype', '$bgroup', '$height', '$children', '$nokname', '$nokrel', '$nokphone', '$nokaddress', '$username', '$password', '$status') ");
    if ($inserttodb) {

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

            $mail->Body = file_get_contents("../email_temp/add_patient_temp.php");
            
            $mail->AddEmbeddedImage('../img_resource/logo3.jpg', 'logo');

            $swap_var = array(
                "{username}" => "$username",
                "{password}" => "$password",
                "{firstname}" => "$fname"
            );

            foreach (array_keys($swap_var) as $key) {
                if (strlen($key) > 2 && trim($key) != "") {
                    $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                }
            }

            $mail->send();

            echo "correct";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "An error occurred.";
    }
} else {
    echo "wrong";
}
