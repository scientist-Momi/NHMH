<?php

// session_start();
include_once "db_connector.php";



$output = "";

if (mysqli_num_rows($sql5) > 0) {





    while ($result5 = mysqli_fetch_assoc($sql5)) {

        $doctor = $result5['doctor_to_see'];

        $sql6 = mysqli_query($conn, "select * from nhmh_staff_db where firstname = '$doctor' ");

        $sql6_array = mysqli_fetch_assoc($sql6);



        $output .= '<div class="activity doc_act pat_act">
                    <div class="patpic">
                        <img src="images/staff' . $sql6_array['photo'] . '" alt="">
                    </div>
                    <div class="activity-user">
                        <h4>Doctor ' . $sql6_array['firstname'] . ' </h4>
                        <small class="reason">' . $result5['purpose'] . '</small>
                    </div>
                    <div class="activity-time">
                        <p>' . $result5['app_time'] . '</p>
                        <p>' . $result5['app_date'] . '</p>
                    </div>
                </div>';
    }
} else {
    $output .= '<div id="optional_msg">
                <span class="material-icons-sharp">
                        error
                    </span>
                    <p class="red">No Appointment for you.</p>
                </div>';
}

echo $output;
