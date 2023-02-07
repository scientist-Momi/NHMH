<?php
session_start();
include_once "db_connector.php";

if (isset($_SESSION['staff_uid'])) {

    $outgoing_id = stripslashes($_SESSION['staff_uid']);
    // $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = stripslashes($_POST['incoming_id']);
    $message = stripslashes($_POST['message']);
    if (!empty($message)) {
        $sql = mysqli_query($conn, "INSERT INTO nhmh_internal_messages_db (incoming_msg_id, outgoing_msg_id, message)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
    }
} else {
    header("location: ../login.php");
}
