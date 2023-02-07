<?php

session_start();
include_once "db_connector.php";

// Getting all inputs from form
$enquirer = stripslashes($_POST['enquirer']);
$mail_enquirer = stripslashes($_POST['mail_enquirer']);
$enquire_msg = stripslashes($_POST['enquire_msg']);

// Check if fields are empty
if (empty($enquirer)) {
    echo "Name field can't be empty.";
} elseif (empty($mail_enquirer)) {
    echo "Please input your email.";
} elseif (!filter_var($mail_enquirer, FILTER_VALIDATE_EMAIL)) {
    echo "Email is invalid.";
} elseif (empty($enquire_msg)) {
    echo "Message field can't be empty. ";
} else {

    $today = date("l M, Y");
    // $newtoday = date("l F, Y", strtotime($today));
    // echo $newtoday;
    $sql = mysqli_query($conn, "insert into nhmh_contact_form_db (name,email,enquiry,date) values('$enquirer', '$mail_enquirer', '$enquire_msg', '$today') ");

    if ($sql) {
        echo "Successfull";
    } else {
        echo "Unable to post message.";
    }
}
