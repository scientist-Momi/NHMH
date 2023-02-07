<?php
session_start();
include_once "db_connector.php";

// Getting all inputs from form
$upfname = stripslashes($_POST['upfname']);
$uplname = stripslashes($_POST['uplname']);
$upemail = stripslashes($_POST['upemail']);
$upphone = stripslashes($_POST['upphone']);
$upaddress = stripslashes($_POST['upaddress']);
$upnokname = stripslashes($_POST['upnokname']);
$upnokrel = stripslashes($_POST['upnokrel']);
$upnokphone = stripslashes($_POST['upnokphone']);
$upnokaddress = stripslashes($_POST['upnokaddress']);
$upusername = stripslashes($_POST['upusername']);
$oldpass = stripslashes($_POST['oldpass']);
$uppassword = stripslashes($_POST['uppassword']);
$upconpassword = stripslashes($_POST['upconpassword']);
$file =  $_FILES['file'];

// $avatar_name =  $file['name'];
// echo "$avatar_name";

// Check if fields are empty
if (empty($upfname)) {
    echo "First Name field cannot be empty.";
} elseif (empty($uplname)) {
    echo "Last Name field cannot be empty.";
} elseif (empty($upphone)) {
    echo "Phone field cannot be empty.";
} elseif (empty($upemail)) {
    echo "Email field cannot be empty.";
} elseif (!filter_var($upemail, FILTER_VALIDATE_EMAIL)) {
    echo "Email you entered is invalid.";
} elseif (empty($upaddress)) {
    echo "Address field cannot be empty.";
} elseif (empty($upnokname)) {
    echo "Next of kin name field cannot be empty.";
} elseif (empty($upnokrel)) {
    echo "Next of kin relationship field cannot be empty.";
} elseif (empty($upnokphone)) {
    echo "Next of kin phone number field cannot be empty.";
} elseif (empty($upnokaddress)) {
    echo "Next of kin address field cannot be empty.";
} elseif (empty($upusername)) {
    echo "Username field cannot be empty.";
} else {

    // get info of patient we are updating
    $patient_id = stripslashes($_SESSION['patient_uid']);
    $sql = mysqli_query($conn, "select * from nhmh_patient_db where unique_id = '$patient_id'");
    $patient_info = mysqli_fetch_assoc($sql);

    // check if user is really ready to update profile.
    if (empty($file['name']) && ($upfname == $patient_info['firstname']) && ($uplname == $patient_info['lastname']) && ($upphone == $patient_info['phone']) && ($upemail == $patient_info['email']) && ($upaddress == $patient_info['address']) && ($upnokname == $patient_info['nokname']) && ($upnokrel == $patient_info['nokrel']) && ($upnokphone == $patient_info['nokphone']) && ($upnokaddress == $patient_info['nokaddress']) && ($upusername == $patient_info['username']) && empty($oldpass) && empty($uppassword) && empty($upconpassword)) {
        echo "Nothing to be updated. Make changes first.";
    } else {
        // echo "HE/SHE IS READY";


        // still checking inputs from update form
        if ($file['name']) {
            // echo "Photo wants to be changed.";
            // working on reuploading photo
            $affix = "nhmh";
            $avatar_name = $affix . $file['name'];
            $avatar_tmp_name = $file['tmp_name'];
            $avatar_destination_path = '../images/patient' . $avatar_name;

            // make sure file is an image
            $allowed_files = ['png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG'];
            $extension = explode('.', $avatar_name);
            $extension = end($extension);

            if (in_array($extension, $allowed_files)) {
                //make sure image is not too large

                if ($file['size'] < 2000000) {
                    // to check if file already exists

                    if (file_exists($avatar_destination_path)) {
                        echo "Sorry, file already exist";
                    } else {
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);

                        $sql2 = mysqli_query($conn, "update nhmh_patient_db set photo = '$avatar_name' WHERE unique_id= '$patient_id' ");

                        if ($sql2) {
                            echo "Successful";
                        } else {
                            echo "Update not Successful.";
                        }
                    }
                } else {
                    echo "File size is too big. Should be less than 2mb.";
                }
            } else {
                echo "File should be png, jpg or jpeg.";
            }
        } elseif ($oldpass) {
            $og_pass = $patient_info['password'];
            // echo "$og_pass";
            // check if old password is correct.
            // echo "uuuuuuuuuuu";
            // if (password_verify($oldpass, $og_pass))
            if ($oldpass == $og_pass) {

                // echo "Your old Password is correct.";
                // now you can check the new passwords
                if (empty($uppassword)) {
                    echo "To change password. New Password field cannot be empty.";
                } elseif (strlen($uppassword) < 8) {
                    echo "New Password must be more than 8 letters.";
                } elseif (empty($upconpassword)) {
                    echo "Confirm New Password .";
                } elseif ($uppassword !== $upconpassword) {
                    echo "Passwords do not match. Please confirm password again.";
                } else {
                    // To encrypt the password
                    $hashed_password = password_hash($uppassword, PASSWORD_DEFAULT);
                    // echo "$hashed_password";

                    $sql3 = mysqli_query($conn, "update nhmh_patient_db set password = '$hashed_password' WHERE unique_id= '$patient_id' ");

                    if ($sql3) {
                        echo "Successful";
                    } else {
                        echo "Update not Successful.";
                    }
                }
            } else {
                echo "Your old Password is incorrect.";
            }
        } else {
            //move picture to image file
            // upload avatar

            $sql1 = mysqli_query($conn, "update nhmh_patient_db set firstname = '$upfname', lastname = '$uplname', phone = '$upphone', email = '$upemail', address = '$upaddress', nokname = '$upnokname', nokrel = '$upnokrel', nokphone = '$upnokphone', nokaddress = '$upnokaddress' WHERE unique_id= '$patient_id' ");

            if ($sql1) {
                echo "Successful";
            } else {
                echo "Update not Successful.";
            }
        }
    }
}
