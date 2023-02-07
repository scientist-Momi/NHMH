<?php

// session_start();
include_once "db_connector.php";

$sql6 = mysqli_query($conn, "select * from nhmh_users_log order by id desc");




$output = "";

while ($result6 = mysqli_fetch_assoc($sql6)) {

    $unique = $result6['user_id'];

    $sql8 = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$unique' ");

    $sql8_array = mysqli_fetch_assoc($sql8);

    if ($result6['action'] == "IN") {
        // insert output
        $output .= ' <div class="activity">
                    <span class="material-icons-sharp">
                        login
                    </span>
                    <div class="activity-user">
                        <h5>' . $sql8_array['firstname'] . ' ' . $sql8_array['lastname'] . ' [' . $sql8_array['Staff_id'] . ']</h5>
                        <small>' . $sql8_array['position'] . '</small>
                    </div>
                    <div class="activity-time">
                        <h4>' . $result6['time'] . '</h4>
                        <small>' . $result6['date'] . '</small>
                    </div>
                </div>';
    } elseif ($result6['action'] == "OUT") {
        // insert output
        $output .= '<div class="activity logout">
                        <span class="material-icons-sharp">
                            logout
                        </span>
                        <div class="activity-user">
                            <h5>' . $sql8_array['firstname'] . ' ' . $sql8_array['lastname'] . ' [' . $sql8_array['Staff_id'] . ']</h5>
                            <small>' . $sql8_array['position'] . '</small>
                        </div>
                        <div class="activity-time">
                            <h4>' . $result6['time'] . '</h4>
                            <small>' . $result6['date'] . '</small>
                        </div>
                    </div>';
    }
}

echo $output;
