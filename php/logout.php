<?php
session_start();

include_once "db_connector.php";

$status = "Offline now";

if (isset($_SESSION['staff_uid'])) {


    $logout_id = $_SESSION['staff_uid'];


    if (isset($logout_id)) {

        $sql = mysqli_query($conn, "update nhmh_staff_db set status = '$status' WHERE unique_id= '$logout_id' ");
        if ($sql) {
            $current_date = date("y-m-d");
            $current_time = date("h:i:sa");
            $action = "OUT";

            $sql5 = mysqli_query($conn, "insert into nhmh_users_log (user_id, action, time, date) values('$logout_id', '$action', '$current_time', '$current_date' ) ");

            if ($sql5) {
                session_unset();
                session_destroy();
                header("location: ../index.php");
            }
        }
    }
} elseif (isset($_SESSION['patient_uid'])) {

    $logout_id2 = $_SESSION["patient_uid"];

    if (isset($logout_id2)) {
        $sql1 = mysqli_query($conn, "update nhmh_patient_db set status = '$status' WHERE unique_id= '$logout_id2' ");
        if ($sql1) {
            session_unset();
            session_destroy();
            header("location: ../index.php");
        }
    }
} else {
    header("location: ../index.php");
}
