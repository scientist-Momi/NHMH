<?php
session_start();

include_once "db_connector.php";

if (isset($_SESSION['staff_uid'])) {

    $outgoing_id = stripslashes($_SESSION['staff_uid']);
    $incoming_id = stripslashes($_POST['incoming_id']);

    $sql190 = mysqli_query($conn, "SELECT * FROM nhmh_internal_messages_db LEFT JOIN nhmh_staff_db ON nhmh_staff_db.unique_id = nhmh_internal_messages_db.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id");

    $output = "";

    if (mysqli_num_rows($sql190) > 0) {
        while ($row190 = mysqli_fetch_assoc($sql190)) {
            if ($row190['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row190['message'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="images/staff' . $row190['photo'] . '" alt="">
                                <div class="details">
                                    <p>' . $row190['message'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
    }

    echo $output;
} else {
    header("location: ../login.php");
}
