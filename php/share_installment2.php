<?php
session_start();

if ($_SESSION['array2']) {
    $array2 = $_SESSION['array2'];

    echo json_encode($array2);
}
//  else {
//     echo 'no array';
// }
