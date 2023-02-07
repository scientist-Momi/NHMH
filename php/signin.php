<?php

session_start();
include_once "db_connector.php";

$username = stripslashes($_POST['username']);
$password = stripslashes($_POST['password']);
$position = stripslashes($_POST['position']);

if (empty($username)) {
    echo "Username field cannot be empty.";
} elseif (empty($password)) {
    echo "Password field cannot be empty.";
} else {
    if ($position == 'staff') {
        // go into database and fetch data
        $sql1 = mysqli_query($conn, "select * from nhmh_staff_db where username = '$username' ");

        // check if record with such username exists 
        if (mysqli_num_rows($sql1) > 0) {
            $sql1_array = mysqli_fetch_assoc($sql1);

            // check if passwords match
            // if (password_verify($password, $sql1_array['password']))
            if ($password == $sql1_array['password']) {
                $_SESSION["staff_uid"] = $sql1_array['unique_id'];

                $uid = $sql1_array['unique_id'];

                $status = "Active now";
                $sql2 = mysqli_query($conn, "update nhmh_staff_db set status = '$status' WHERE unique_id= '$uid' ");

                if ($sql2) {

                    $current_date = date("y-m-d");
                    $current_time = date("h:i");
                    $action = "IN";

                    $sql5 = mysqli_query($conn, "insert into nhmh_users_log (user_id, action, time, date) values('$uid', '$action', '$current_time', '$current_date' ) ");

                    if ($sql5) {
                        if ($sql1_array['position'] === "Admin") {
                            echo "admin";
                        } elseif ($sql1_array['position'] === "Nurse") {
                            echo "nurse";
                        } elseif ($sql1_array['position'] === "Doctor") {
                            echo "doctor";
                        } elseif ($sql1_array['position'] === "Accountant") {
                            echo "accountant";
                        } elseif ($sql1_array['position'] === "Blogger") {
                            echo "blogger";
                        }
                    } else {
                        echo "Could not get your log details.";
                    }
                } else {
                    echo "Can't update status.";
                }
            } else {
                echo "Password is incorrect.";
            }
        } else {
            echo "No user with such Username.";
        }
    } elseif ($position == 'patient') {
        // go into database and fetch data
        $sql3 = mysqli_query($conn, "select * from nhmh_patient_db where username = '$username' ");

        // check if record with such username exists 
        if (mysqli_num_rows($sql3) > 0) {
            $sql3_array = mysqli_fetch_assoc($sql3);

            // check if passwords match
            if ($password == $sql3_array['password'])
            // if (password_verify($password, $sql3_array['password'])) 
            {
                $_SESSION["patient_uid"] = $sql3_array['unique_id'];

                $patuid = $sql3_array['patient_id'];

                // $patuid1 = $_SESSION["patient_uid"];

                $status = "Active now";
                $sql4 = mysqli_query($conn, "update nhmh_patient_db set status = '$status' WHERE patient_id= '$patuid' ");

                if ($sql4) {
                    echo "patient";
                    // echo $patuid1;
                } else {
                    echo "Error signing in.";
                }
            } else {
                echo "Password is incorrect.";
            }
        } else {
            echo "No Patient with such Username.";
        }
    } else {
        echo "No Username with this position.";
    }
}
