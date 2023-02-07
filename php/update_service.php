<?php
session_start();
include_once "db_connector.php";

// Getting all inputs from form
$serveId = stripslashes($_POST['serveId']);
$upservename = stripslashes($_POST['upservename']);
$upserveprice = stripslashes($_POST['upserveprice']);
$upservedesc = stripslashes($_POST['upservedesc']);

// Check if fields are empty
if (empty($upservename)) {
    echo "Service Name field cannot be empty.";
} elseif (empty($upserveprice)) {
    echo "Service Price field cannot be empty.";
} elseif (empty($upservedesc)) {
    echo "Service Description field cannot be empty.";
} else {

    // get info of service we are updating
    $sql1 = mysqli_query($conn, "select * from nhmh_services_db where id = '$serveId'");
    $serve_info = mysqli_fetch_assoc($sql1);

    if (($upservename == $serve_info['service_name']) && ($upserveprice == $serve_info['service_price']) && ($upservedesc == $serve_info['service_description'])) {
        echo "$serveId";
        // echo "Nothing to be updated. Make changes first.";
    } else {
        $sql2 = mysqli_query($conn, "insert into nhmh_services_db where id = '$serveId' ");

        if ($sql2) {
            echo "Successfull";
        } else {
            echo "Update not Successful.";
        }
    }
}
