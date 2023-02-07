<?php

// session_start();
include_once "db_connector.php";



$output = "";

if (mysqli_num_rows($sql1) > 0) {



    while ($result1 = mysqli_fetch_assoc($sql1)) {

        $unique = $result1['patient_id'];

        $sql3 = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$unique' ");

        $sql3_array = mysqli_fetch_assoc($sql3);



        $output .= '<div class="activity doc_act">
                    <div class="patpic">
                        <img src="images/patient' . $sql3_array['photo'] . '" alt="">
                    </div>
                    <div class="activity-user">
                        <h4>' . $sql3_array['firstname'] . ' ' . $sql3_array['lastname'] . ' [' . $result1['patient_id'] . ']</h4>
                        <small class="reason">' . $result1['purpose'] . '</small>
                    </div>
                    <div class="activity-time">
                        <p>' . $result1['app_time'] . '</p>
                    </div>
                </div>';
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
