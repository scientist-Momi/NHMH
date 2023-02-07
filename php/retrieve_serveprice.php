<?php

session_start();
include_once "db_connector.php";

$searchTerm = stripslashes($_POST['searchTerm']);

$sql1 = mysqli_query($conn, "select * from nhmh_services_db where service_name = '$searchTerm'");

$sql1_array = mysqli_fetch_assoc($sql1);

$price = $sql1_array['service_price'];

$downPay = $price / 4;

$_SESSION['servePrice'] = $price;

$_SESSION['downPay'] = $downPay;

// $price = $_SESSION['servePrice'];

// echo $price;

$array = array('price' => number_format($price, 2), 'downpay' => number_format($downPay, 2));

echo json_encode($array);
