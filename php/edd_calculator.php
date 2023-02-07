<?php

session_start();
include_once "db_connector.php";

$folm = stripslashes($_POST['searchTerm']);

$conception = date('Y-m-d', strtotime($folm . '+ 15 days'));

$edd1 = date('Y-m-d', strtotime($folm . '+ 7 days'));

$edd2 = date('Y-m-d', strtotime($edd1 . '+ 9 months'));

$finaledd = date('F j, Y', strtotime($edd2));


$today = date("Y-m-d");
$gest4 = date_diff(date_create($folm), date_create($today));

$gest1 = $gest4->format('%a');

$gest2 = floor($gest1 / 7); //gives the number of weeks
$gest3 = ($gest1 % 7); //gets the number of days remaining

if ($gest2 > 1 && $gest3 > 1) {
    $gest = "$gest2 weeks $gest3 days.";
} elseif ($gest2 <= 1 && $gest3 > 1) {
    $gest = "$gest2 week $gest3 days.";
} elseif ($gest2 <= 1 && $gest3 <= 1) {
    $gest = "$gest2 week $gest3 day.";
}


$array = array('edd' => $finaledd, 'gesticu' => $gest, 'conceptiony' => $conception);

echo json_encode($array);
