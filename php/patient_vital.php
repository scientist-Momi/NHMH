<?php

session_start();
include_once "db_connector.php";

// Getting all inputs from form
$pid = stripslashes($_POST['pid']);
$temp = stripslashes($_POST['temp']);
$pulse = stripslashes($_POST['pulse']);
$bpressure = stripslashes($_POST['bpressure']);
$weight = stripslashes($_POST['weight']);

// Check if fields are empty
if (empty($pid)) {
    echo "Input patient ID.";
} elseif (empty($temp)) {
    echo "Input patient Body Temperature.";
} elseif (empty($bpressure)) {
    echo "Input patient Blood Pressure.";
} elseif (empty($pulse)) {
    echo "Input patient Pulse rate.";
} elseif (empty($weight)) {
    echo "Input patient weight.";
} else {
    // check if patient ID is a valid one
    $sql4 = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$pid' ");

    if (mysqli_num_rows($sql4) > 0) {
        $details = mysqli_fetch_assoc($sql4);

        $fname = $details['firstname'];
        $lname = $details['lastname'];

        $date = date("Y-m-d");

        $sql4 = mysqli_query($conn, "insert into nhmh_patient_vital_db(patient_id,firstname,lastname,temperature,weight,pulse,blood_pressure,date) values ('$pid', '$fname', '$lname', '$temp', '$weight', '$pulse',  '$bpressure', '$date') ");

        if ($sql4) {
            echo "Successfull";
        } else {
            die('Could not update data: ' . mysqli_error($conn));
        }
    } else {
        echo "Invalid Patient ID.";
    }
}
