<?php
session_start();
include_once "db_connector.php";

$delete_id = stripslashes($_POST['delete_id']);

// echo "$delete_id";
$sql = mysqli_query(
    $conn,
    "delete from nhmh_patient_appointment_db where id = '$delete_id' "
);

if ($sql) {
    echo "You have successfully cancelled appointment of PATIENT $delete_id";
}
