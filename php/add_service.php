<?php

session_start();
include_once "db_connector.php";

// Getting all inputs from form
$servename = stripslashes($_POST['servename']);
$serveprice = stripslashes($_POST['serveprice']);
$servedesc = stripslashes($_POST['servedesc']);

// Check if fields are empty
if (empty($servename)) {
    echo "Service Name field cannot be empty.";
} elseif (empty($serveprice)) {
    echo "Service Price field cannot be empty.";
} elseif (empty($servedesc)) {
    echo "Service Description field cannot be empty.";
} else {

    //check if name clashes
    $sql1 = mysqli_query($conn, "select * from nhmh_services_db where service_name = '$servename' ");

    if (mysqli_num_rows($sql1) > 0) {
        echo "There is already a service with same name";
    } else {
        $sql2 = mysqli_query($conn, "insert into nhmh_services_db (service_name,service_price,service_description) values ('$servename', '$serveprice', '$servedesc') ");

        if ($sql2) {
            echo "Successful";
        } else {
            echo "An error occurred";
        }
    }
}
