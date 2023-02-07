<?php

session_start();
include_once "db_connector.php";

$searchTerm = stripslashes($_POST['searchTerm']);

$sql1 = mysqli_query($conn, "select * from nhmh_services_db where id = '$searchTerm'");

$output = "";

if (mysqli_num_rows($sql1) > 0) {

    $resultArray = mysqli_fetch_assoc($sql1);
    $output .= '
                    <label for="">
                        <p>Service Name:</p>
                        <input type="text" name="upservename" value="' . $resultArray['service_name'] . '" >
                    </label>
                    <label for="">
                        <p>Service Price (&#8358;):</p>
                        <input type="number" name="upserveprice" value="' . $resultArray['service_price'] . '">
                    </label>
                    <label for="">
                        <p>Service Description:</p>
                        <textarea name="upservedesc" cols="10" rows="5">' . $resultArray['service_description'] . '</textarea>
                    </label>
                    <input type="submit" value="Update Service" id="upserviceformBtn">
';
}
echo $output;
