<?php
session_start();
include_once "db_connector.php";

// Getting all inputs from form
$upfname = stripslashes($_POST['upfname']);
$uplname = stripslashes($_POST['uplname']);
$upemail = stripslashes($_POST['upemail']);
$upphone = stripslashes($_POST['upphone']);
$upaddress = stripslashes($_POST['upaddress']);
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
} elseif (empty($upusername)) {
    echo "Username field cannot be empty.";
} else {

    // get info of staff we are updating
    $user_id = stripslashes($_SESSION['staff_uid']);
    $sql = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$user_id'");
    $staff_info = mysqli_fetch_assoc($sql);

    // check if user is really ready to update profile.
    if (empty($file['name']) && ($upfname == $staff_info['firstname']) && ($uplname == $staff_info['lastname']) && ($upphone == $staff_info['phone']) && ($upemail == $staff_info['email']) && ($upaddress == $staff_info['address']) && ($upusername == $staff_info['username']) && empty($oldpass) && empty($uppassword) && empty($upconpassword)) {
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
            $avatar_destination_path = '../images/staff' . $avatar_name;

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

                        $sql2 = mysqli_query($conn, "update nhmh_staff_db set photo = '$avatar_name' WHERE unique_id= '$user_id' ");

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
            $og_pass = $staff_info['password'];
            // echo "$og_pass";
            // check if old password is correct.
            // echo "uuuuuuuuuuu";
            if (password_verify($oldpass, $og_pass))
            // if ($oldpass == $og_pass) 
            {

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

                    $sql3 = mysqli_query($conn, "update nhmh_staff_db set password = '$hashed_password' WHERE unique_id= '$user_id' ");

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

            $sql1 = mysqli_query($conn, "update nhmh_staff_db set firstname = '$upfname', lastname = '$uplname', phone = '$upphone', email = '$upemail', address = '$upaddress' WHERE unique_id= '$user_id' ");

            if ($sql1) {
                echo "Successful";
            } else {
                echo "Update not Successful.";
            }
        }
    }
}
