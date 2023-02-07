<?php
// session_start();
include_once "db_connector.php";

if (isset($_POST['unique_id'])) {
    $unique_id = stripslashes($_POST['unique_id']);

    $sql1 = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$unique_id' ");

    $sql1_array = mysqli_fetch_assoc($sql1);

    $image = $sql1_array['photo'];
    $position = $sql1_array['position'];
    $firstname = $sql1_array['firstname'];
    $status = $sql1_array['status'];
    $user_unique = $sql1_array['unique_id'];

    $array = array('image' => $image, 'position' => $position, 'fname' => $firstname, 'status' => $status, 'unique' => $user_unique);

    echo json_encode($array);
}
