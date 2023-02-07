<?php

// session_start();
include_once "db_connector.php";

include_once "includes/stats.php";


$output = "";

if (mysqli_num_rows($sql2) > 0) {



    while ($result2 = mysqli_fetch_assoc($sql2)) {

        $output .= '<div class="activity nur_act">
                        <div class="patpic">
                            <img src="images/staff' . $result2['photo'] . '" alt="">
                        </div>
                        <div class="activity-user">
                            <h4>' . $result2['firstname'] . ' ' . $result2['lastname'] . ' [' . $result2['Staff_id'] . ']</h4>
                            <small class="reason">DOCTOR</small>
                        </div>
                        <div class=" online">
                            
                        </div>
                    </div>';
    }
} else {
    $output .= '<div id="optional_msg">
                <span class="material-icons-sharp">
                        error
                    </span>
                    <p class="red">No Doctor is currently available.</p>
                </div>';
}

echo $output;
