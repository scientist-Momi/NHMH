<?php

session_start();
include_once "db_connector.php";

$searchTerm = stripslashes($_POST['searchTerm']);

//search data base for ID
$sql1 = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$searchTerm' ");
$output = "";
if (mysqli_num_rows($sql1) > 0) {

    // store data inside array
    $sql1_array = mysqli_fetch_assoc($sql1);



    // insert output
    $output .= ' <div class="row20">
                            <div class="row20a">
                                <label for="search">Patient ID<input type="text" name="" id="" value="' . $sql1_array['patient_id'] . '" readonly></label>
                                <label for="search">Patient Full Name<input type="text" name="" id="" value="' . $sql1_array['firstname'] . '  ' . $sql1_array['lastname'] . '" readonly></label>
                            </div>
                            <div class="row20a">
                                <label for="search">Patient Email<input type="text" name="" id="" value="' . $sql1_array['email'] . '" readonly></label>
                                <label for="search">Patient Phone number<input type="text" name="" id="" value="' . $sql1_array['phone'] . '" readonly></label>
                            </div>
                            <div class="row20a">
                                <label for="search">Patient Age<input type="text" name="" id="" value="' . $sql1_array['age'] . '" readonly></label>
                                <label for="search"> Date Registered<input type="text" name="" id="" value="' . $sql1_array['created_at'] . '" readonly></label>
                            </div>
                            <div class="row20a">
                                <label for="search">Patient House Address <textarea name="" id="" cols="20" rows="4" readonly>' . $sql1_array['address'] . '</textarea></label>
                            </div>
                            <div class="row20a">
                                <img src="images/patient' . $sql1_array['photo'] . '" alt="">
                            </div>
                        </div>';
}
echo $output;
