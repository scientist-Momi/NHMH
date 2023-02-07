<?php

include_once "php/db_connector.php";

$user_id = stripslashes($_SESSION['staff_uid']);
$sql = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$user_id'");
if (mysqli_num_rows($sql) > 0) {
    $staff_info = mysqli_fetch_assoc($sql);

    $today = date("Y-m-d");
    $sql1 = mysqli_query($conn, "select * from nhmh_patient_appointment_db where app_date = '$today' order by id desc");

    $sql1_count = mysqli_num_rows($sql1);

    $sql2 = mysqli_query($conn, "select * from nhmh_staff_db where status = 'Active now' and position = 'Doctor' ");

    $sql2_count = mysqli_num_rows($sql2);

    $sql3 = mysqli_query($conn, "select * from nhmh_patient_db ");

    $sql3_count = mysqli_num_rows($sql3);

    $sql4 = mysqli_query($conn, "select * from nhmh_patient_db ");

    $sql6 = mysqli_query($conn, "select * from nhmh_patient_db ");

    //FOR PATIENTS

} else {
    header("location: index.php");
}
