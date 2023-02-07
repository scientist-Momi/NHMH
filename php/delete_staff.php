<?php
session_start();
include_once "db_connector.php";

$delete_id = stripslashes($_POST['delete_id']);

// echo "$delete_id";
$sql = mysqli_query(
    $conn,
    "delete from nhmh_staff_db where Staff_id = '$delete_id' "
);

if ($sql) {
    echo "You successfully deleted STAFF$delete_id";
}
