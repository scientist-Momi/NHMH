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
$patient = stripslashes($_SESSION['patient_id']);
$doctor = stripslashes($_POST['doctor']);
$date = stripslashes($_POST['appdate']);
$comment = stripslashes($_POST['comment']);
$apptime = stripslashes(@$_POST['apptime']);
$purpose = stripslashes($_POST['purpose']);

// Check if fields are empty
if (empty($doctor)) {
    echo "Choose Doctor you want to book appointment with.";
} elseif (empty($date)) {
    echo "Set appointment date.";
} elseif (empty($apptime)) {
    echo "Choose appointment time ";
} else {

    // check if patient id is valid or exists
    $sql = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$patient' ");
    if (mysqli_num_rows($sql) > 0) {
        $sqlarray = mysqli_fetch_assoc($sql);
        $email = $sqlarray["email"];
        $firstname = $sqlarray["firstname"];

        //check if the date is valid
        $today = date("Y-m-d");

        if ($date > $today) {
            //get the day of the week picked
            $today = strtotime($date);
            $day = date('l', $today);
            $month = date('F', $today);
            // echo "$day";
            //check if the days are not weekends
            $not_allowed_days = ['Sunday', 'Saturday'];

            if (in_array($day, $not_allowed_days)) {
                echo "NHMH does not take appointments for weekends.";
            } else {

                // check if Appointment is available
                $sql2 = mysqli_query($conn, "select * from nhmh_patient_appointment_db where app_date = '$date' and app_time = '$apptime' and doctor_to_see = '$doctor' and patient_id = '$patient' ");

                if (mysqli_num_rows($sql2) > 0) {
                    echo "Appointment date and time you have choosen is unavailable, or you already booked an appointment for $day $date .";
                } else {

                    $whobooked = "Patient";
                    // insert data into appointment database
                    $sql3 = mysqli_query($conn, "insert into nhmh_patient_appointment_db(patient_id,app_date,app_time,doctor_to_see,purpose,comment,month,who_booked) values('$patient', '$date', '$apptime', '$doctor', '$purpose', '$comment', '$month', '$whobooked')");
                    if ($sql3) {

                        try {
                            // run program to send mail with details to patient.
                            $mail = new PHPMailer(true);

                            // $mail->SMTPDebug = 2;
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

                            $mail->Subject = "New Horizon Maternity Hospital- Appointment confirmation.";

                            $mail->Headers = array(
                                "MIME-Version" => "1.0",
                                "Content-Type" => "text/html;charset=UTF-8"
                            );

                            $mail->Body = file_get_contents("../email_temp/appointment_confirm.php");
                            
                            $mail->AddEmbeddedImage('../img_resource/logo3.jpg', 'logo');

                            $swap_var = array(
                                "{doctor}" => "$doctor",
                                "{app_date}" => "$date",
                                "{app_time}" => "$apptime",
                                "{firstname}" => "$firstname"
                            );

                            foreach (array_keys($swap_var) as $key) {
                                if (strlen($key) > 2 && trim($key) != "") {
                                    $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                                }
                            }

                            $mail->send();

                            echo "Successfull";
                        } catch (Exception $e) {
                            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                        }
                    } else {
                        echo "Error booking appointment.";
                    }
                }
            }
        } else {
            echo "Invalid Date";
        }
    } else {
        echo "Invalid patient ID";
    }
}
