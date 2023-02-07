<?php


session_start();
include_once "db_connector.php";

// // use PHPMailer\PHPMailer\PHPMailer;
// // use PHPMailer\PHPMailer\SMTP;
// // use PHPMailer\PHPMailer\Exception;

// // require '../phpmailer/src/Exception.php';
// // require '../phpmailer/src/PHPMailer.php';
// // require '../phpmailer/src/SMTP.php';

// Getting all inputs from form
$position = stripslashes($_POST['position']);
$fname = stripslashes($_POST['fname']);
$lname = stripslashes($_POST['lname']);
$email = stripslashes($_POST['email']);
$phone = stripslashes($_POST['phone']);
$address = stripslashes($_POST['address']);
$gender = isset($_POST['gender']);
$avatar =  $_FILES['avatar'];

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
} elseif (empty($gender)) {
    echo "Choose Your Gender.";
} else {
    //Generate random password for staff
    $data = 'NHMHSTAFF1234567890nhmhstaff!@#$%&';

    $password = substr(str_shuffle($data), 0, 10);

    // echo $password;
    // Generate first username for staff
    $rand_user = rand(time(), 100000);
    if ($position == "Doctor") {
        $fix = "DOC";
        $username = $fix . $rand_user;
    } elseif ($position == "Nurse") {
        $fix = "NUR";
        $username = $fix . $rand_user;
    } elseif ($position == "Admin") {
        $fix = "ADMIN";
        $username = $fix . $rand_user;
    } elseif ($position == "Accountant") {
        $fix = "ACCT";
        $username = $fix . $rand_user;
    } elseif ($position == "Blogger") {
        $fix = "BLOG";
        $username = $fix . $rand_user;
    }

    // echo "$username";

    // To work on uploading photo
    $affix = "nhmh";
    $avatar_name = $affix . $avatar['name'];
    $avatar_tmp_name = $avatar['tmp_name'];
    $avatar_destination_path = '../images/staff' . $avatar_name;

    // make sure file is an image
    $allowed_files = ['png', 'jpg', 'jpeg'];
    $extension = explode('.', $avatar_name);
    $extension = end($extension);

    // echo "$avatar_name";

    if (in_array($extension, $allowed_files)) {
        //make sure image is not too large
        if ($avatar['size'] < 2000000) {
            // to check if file already exists
            if (file_exists($avatar_destination_path)) {
                echo "Sorry, file already exist";
            } else {
                // upload avatar
                move_uploaded_file($avatar_tmp_name, $avatar_destination_path);

                $rand_id = rand(time(), 100000000);
                $status = "Offline now";

                // check if username exists
                $checkusername = mysqli_query($conn, "select * from nhmh_staff_db where username = '$username' ");

                if (mysqli_num_rows($checkusername) > 0) {
                    echo "Username you picked already exists";
                } else {
                    // insert inputs into database
                    $inserttodb = mysqli_query($conn, "insert into nhmh_staff_db (unique_id,firstname,lastname,email,phone,address,gender,position,photo,username,password,status) values('$rand_id', '$fname', '$lname', '$email', '$phone', '$address', '$gender', '$position', '$avatar_name', '$username', '$password', '$status') ");
                    if ($inserttodb) {
                        //run program to send mail with details to patient.
                        // $mail = new PHPMailer(true);

                        //$mail->SMTPDebug = 2;
                        // $mail->isSMTP();
                        // $mail->Host = "momiwebs.com.ng";
                        // $mail->SMTPAuth = false;
                        // $mail->Username = 'admin@momiwebs.com.ng';
                        // $mail->Password = 'Acrimony@22';
                        // $mail->SMTPSecure = 'ssl';
                        // $mail->Port = 465;

                        // $mail->setFrom('admin@momiwebs.com.ng');

                        // $mail->addAddress($email);

                        // $mail->isHTML(true);

                        // $mail->Subject = "New Horizon Maternity Hospital- New Staff.";

                        // $mail->Headers = array(
                        //     "MIME-Version" => "1.0",
                        //     "Content-Type" => "text/html;charset=UTF-8"
                        // );

                        // $mail->Body = file_get_contents("../staff-welcome-msg.php");

                        // $swap_var = array(
                        //     "{staff_username}" => "$username",
                        //     "{staff_password}" => "$password"
                        // );

                        // foreach (array_keys($swap_var) as $key) {
                        //     if (strlen($key) > 2 && trim($key) != "") {
                        //         $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                        //     }
                        // }

                        // $mail->send();

                        echo "Successful";
                    } else {
                        echo "An error occurred.";
                    }
                }
            }
        } else {
            echo "File size is too big. Should be less than 2mb.";
        }
    } else {
        echo "File should be png, jpg or jpeg.";
    }
}
