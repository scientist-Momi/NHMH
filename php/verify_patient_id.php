<?php

session_start();
include_once "db_connector.php";

$searchTerm = stripslashes($_POST['searchTerm']);

$sql = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$searchTerm' ");

if (mysqli_num_rows($sql) > 0) {
    echo "success";
} else {
    echo "error";
}
