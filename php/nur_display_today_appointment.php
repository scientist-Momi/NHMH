<?php

// session_start();
include_once "db_connector.php";



$output = "";

if (mysqli_num_rows($sql1) > 0) {



    while ($result1 = mysqli_fetch_assoc($sql1)) {

        $unique = $result1['patient_id'];

        $sql5 = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$unique' ");

        $sql3_array = mysqli_fetch_assoc($sql5);



        $output .= '
                    
                    <div class="appdetails">
                        <div class="app appimg">
                            <img src="images/patient' . $sql3_array['photo'] . '" alt="">
                        </div>
                        <div class="app patientdetails">
                            <h4>' . $result1['patient_id'] . '</h4>
                            <h4>' . $sql3_array['firstname'] . ' ' . $sql3_array['lastname'] . '</h4>
                        </div>
                        <div class="app">
                            <p>' . $result1['app_time'] . '</p>
                        </div>
                        <div class="app">
                            <p>' . $result1['app_date'] . '</p>
                        </div>
                        <div class="app doctor">
                            <h3>Doctor ' . $result1['doctor_to_see'] .
            '</h3>
                        </div>
                    </div>

                ';
    }
} else {
    $output .= '<div id="optional_msg">
                <span class="material-icons-sharp">
                        error
                    </span>
                    <p class="red">No Appointment set for today.</p>
                </div>';
}

echo $output;
