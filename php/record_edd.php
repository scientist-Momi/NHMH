<?php


session_start();
include_once "db_connector.php";

// Getting all inputs from form
$patient = stripslashes($_POST['patient']);
$edd = stripslashes($_POST['edd']);

// Check if fields are empty
if (empty($patient)) {
    echo "Specify patient you are recording EDD for.";
} elseif (empty($edd)) {
    echo "No record to add.";
} else {
    $sql1 = mysqli_query($conn, "update nhmh_patient_db set edd_date = '$edd' WHERE patient_id= '$patient' ");

    if ($sql1) {
        echo "Successful";
    } else {
        echo "An error occured";
    }
}
