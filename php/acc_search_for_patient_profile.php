<?php

session_start();
include_once "db_connector.php";

$searchTerm = stripslashes($_POST['searchTerm']);

//search data base for ID
$sql1 = mysqli_query($conn, "select * from nhmh_patient_db where (patient_id like '$searchTerm' or firstname like '$searchTerm%' or lastname like '$searchTerm%') ");

$sql1_array = mysqli_fetch_assoc($sql1);

$output = "";
if (mysqli_num_rows($sql1) > 0) {

    // insert output
    $output .= '<form action="" method="post" id="nur_update">
        <div class="row10">
                        <img src="images/patient' . $sql1_array['photo'] . ' " alt="4.png" onerror="this.onerror=null;this.src="4.png"; ">
                    </div>
                    <div class="row11">
                        <h4>Personal Information</h4>
                        <div class="personal">
                            <label for="lastname">EDD <input type="text" readonly value=" ' . $sql1_array['edd_date'] . ' "></label>

                            <label for="lastname">Firstname <input type="text" name="upfname" value=" ' . $sql1_array['firstname'] . ' "></label>
                            <label for="lastname">Lastname <input type="text" name="uplname" value=" ' . $sql1_array['lastname'] . ' "></label>
                            <label for="lastname">Email <input type="text" name="upemail" value=" ' . $sql1_array['email'] . ' "></></label>
                            <label for="lastname">Phone Number <input type="text" name="upphone" value=" ' . $sql1_array['phone'] . ' "></></label>
                            <label for="lastname">House Address <input type="text" name="upaddress" value=" ' . $sql1_array['address'] . ' "></></label>
                        </div>
                    </div>
                    </form> 
                    ';
} else {
    $output .= '<span class="material-icons-sharp red"> error </span><p class="red">Patient not found. Wrong ID.</p>';
}

echo $output;
