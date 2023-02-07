<?php

session_start();
include_once "db_connector.php";

$searchTerm = stripslashes($_POST['searchTerm']);

//search data base for ID
$sql1 = mysqli_query($conn, "select * from nhmh_patient_db where (patient_id like '$searchTerm' or firstname like '$searchTerm%' or lastname like '$searchTerm%') ");

$sql1_array = mysqli_fetch_assoc($sql1);

$output = "";
if (mysqli_num_rows($sql1) > 0) {

    $pid = $sql1_array['patient_id'];
    $sql2 = mysqli_query($conn, "select * from nhmh_patient_vital_db where patient_id = '$pid' order by id desc limit 0, 1 ");


    // store data inside array

    $sql2_array = mysqli_fetch_assoc($sql2);

    if (mysqli_num_rows($sql2) > 0) {




        // insert output
        $output .= ' <div class="row10">
                        <img src="images/patient' . $sql1_array['photo'] . ' " alt="4.png" onerror="this.onerror=null;this.src="4.png"; ">
                    </div>
                    <div class="row11">
                        <h4>Personal Information</h4>
                        <div class="personal">
                            <label for="lastname">EDD <input type="text" readonly value=" ' . $sql1_array['edd_date'] . ' "></label>

                            <label for="lastname">Firstname <input type="text" readonly value=" ' . $sql1_array['firstname'] . ' "></label>
                            <label for="lastname">Lastname <input type="text" readonly value=" ' . $sql1_array['lastname'] . ' "></label>
                            <label for="lastname">Email <input type="text" readonly value=" ' . $sql1_array['email'] . ' "></></label>
                            <label for="lastname">Phone Number <input type="text" readonly value=" ' . $sql1_array['phone'] . ' "></></label>
                            <label for="lastname">House Address <input type="text" readonly value=" ' . $sql1_array['address'] . ' "></></label>
                        </div>
                    </div>
                    <div class="row12">
                        <h4>Vitals taken</h4>
                        <input type="date" name="" id="">
                        <div class="personal">
                            <label for="lastname">Temperature <input type="text" readonly value=" ' . $sql2_array['temperature'] . ' "></label>

                            <label for="lastname">Blood Pressure <input type="text" readonly value=" ' . $sql2_array['blood_pressure'] . ' "></label>
                            <label for="lastname">Pulse Rate <input type="text" readonly value=" ' . $sql2_array['pulse'] . ' "></label>
                            <label for="lastname">Weight <input type="text" readonly value=" ' . $sql2_array['weight'] . ' "></label>
                        </div>
                    </div>
                    <div class="row13">
                        <h4>Medical Information</h4>
                        <div class="personal">
                            <label for="lastname">Age <input type="text" readonly value=" ' . $sql1_array['age'] . ' "></></label>

                            <label for="lastname">Genotype <input type="text" readonly value=" ' . $sql1_array['genotype'] . ' "></></label>
                            <label for="lastname">Blood Group <input type="text" readonly value=" ' . $sql1_array['bgroup'] . ' "></></label>
                            <label for="lastname">Height <input type="text" readonly value=" ' . $sql1_array['height'] . ' "></></label>
                            <label for="lastname">Number of Children <input type="text" readonly value=" ' . $sql1_array['children'] . ' "></></label>
                        </div>
                    </div>
                    <div class="row14">
                        <h4>Next of Kin Information</h4>
                        <div class="personal">
                            <label for="lastname">Fullname <input type="text" readonly value=" ' . $sql1_array['nokname'] . ' "></></label>

                            <label for="lastname">Relationship <input type="text" readonly value=" ' . $sql1_array['nokrel'] . ' "></></label>
                            <label for="lastname">Phone Number <input type="text" readonly value=" ' . $sql1_array['phone'] . ' "></></label>
                            <label for="lastname">House Address <input type="text" readonly value=" ' . $sql1_array['address'] . ' "></></label>
                        </div>
                    </div>';
    } else {
        // insert output
        $output .= ' <div class="row10">
                        <img src="images/patient' . $sql1_array['photo'] . ' " alt="4.png" onerror="this.onerror=null;this.src="4.png"; ">
                    </div>
                    <div class="row11">
                        <h4>Personal Information</h4>
                        <div class="personal">
                            <label for="lastname">EDD <input type="text" readonly value=" ' . $sql1_array['edd_date'] . ' "></label>

                            <label for="lastname">Firstname <input type="text" readonly value=" ' . $sql1_array['firstname'] . ' "></label>
                            <label for="lastname">Lastname <input type="text" readonly value=" ' . $sql1_array['lastname'] . ' "></label>
                            <label for="lastname">Email <input type="text" readonly value=" ' . $sql1_array['email'] . ' "></></label>
                            <label for="lastname">Phone Number <input type="text" readonly value=" ' . $sql1_array['phone'] . ' "></></label>
                            <label for="lastname">House Address <input type="text" readonly value=" ' . $sql1_array['address'] . ' "></></label>
                        </div>
                    </div>
                    <div class="row12">
                        <h4>Vitals taken</h4>
                        <input type="date" name="" id="">
                        <div class="personal">
                            <label for="lastname">Temperature <input type="text" readonly value=" No data to show "></label>

                            <label for="lastname">Blood Pressure <input type="text" readonly value=" No data to show "></label>
                            <label for="lastname">Pulse Rate <input type="text" readonly value=" No data to show "></label>
                            <label for="lastname">Weight <input type="text" readonly value=" No data to show "></label>
                        </div>
                    </div>
                    <div class="row13">
                        <h4>Medical Information</h4>
                        <div class="personal">
                            <label for="lastname">Age <input type="text" readonly value=" ' . $sql1_array['age'] . ' "></></label>

                            <label for="lastname">Genotype <input type="text" readonly value=" ' . $sql1_array['genotype'] . ' "></></label>
                            <label for="lastname">Blood Group <input type="text" readonly value=" ' . $sql1_array['bgroup'] . ' "></></label>
                            <label for="lastname">Height <input type="text" readonly value=" ' . $sql1_array['height'] . ' "></></label>
                            <label for="lastname">Number of Children <input type="text" readonly value=" ' . $sql1_array['children'] . ' "></></label>
                        </div>
                    </div>
                    <div class="row14">
                        <h4>Next of Kin Information</h4>
                        <div class="personal">
                            <label for="lastname">Fullname <input type="text" readonly value=" ' . $sql1_array['nokname'] . ' "></></label>

                            <label for="lastname">Relationship <input type="text" readonly value=" ' . $sql1_array['nokrel'] . ' "></></label>
                            <label for="lastname">Phone Number <input type="text" readonly value=" ' . $sql1_array['phone'] . ' "></></label>
                            <label for="lastname">House Address <input type="text" readonly value=" ' . $sql1_array['address'] . ' "></></label>
                        </div>
                    </div>';
    }
} else {
    $output .= '<span class="material-icons-sharp red"> error </span><p class="red">Patient not found. Wrong ID.</p>';
}

echo $output;
