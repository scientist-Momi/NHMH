<?php

session_start();
include_once "db_connector.php";

$searchTerm = stripslashes($_POST['searchTerm']);
$userpat_id = stripslashes($_SESSION['patient_uid']);

$sql1 = mysqli_query($conn, "select * from nhmh_patient_db where unique_id = '$userpat_id'");

$patient_info = mysqli_fetch_assoc($sql1);

$pat_id = $patient_info['patient_id'];

//search data base for ID
$sql1 = mysqli_query($conn, "select * from nhmh_patient_medical_record_db where patient_id = '$pat_id' and date = '$searchTerm' ");

$output = "";

if (mysqli_num_rows($sql1) > 0) {



    while ($sql1_array = mysqli_fetch_assoc($sql1)) {


        // insert output
        $output .= ' <div class="row30">
                        <div class="row30a">
                            <label for="lastname">Record Number <input type="text" name="" id="" value=" ' . $sql1_array['id'] . ' "></label>
                            <label for="lastname">Patient ID <input type="text" name="" id="" value=" ' . $sql1_array['patient_id'] . ' "></label>
                            <label for="lastname">Doctor <input type="text" name="" id="" value=" ' . $sql1_array['attending_doctor'] . ' "></label>
                            <label for="lastname">Date Recorded <input type="text" name="" id="" value=" ' . $sql1_array['created_at'] . ' "></label>
                        </div>

                        <div class="row30b">
                            <label for="lastname">Diagnosis <textarea name="" id="" cols="30" rows="5">' . $sql1_array['diagnosis'] . '</textarea></label>
                            <label for="lastname">Prescription <textarea name="" id="" cols="30" rows="5">' . $sql1_array['instruction'] . '</textarea></label>
                        </div>
                        <div class="row30c">
                            <div><img src="4.png" alt=""></div>
                            <div><img src="4.png" alt=""></div>
                            <div><img src="4.png" alt=""></div>
                        </div>
                    </div>';
    }
} else {
    $output .= '<span class="material-icons-sharp red"> error </span><p class="red">No Medical record for you on ' . $searchTerm . '</p>';
}

echo $output;
