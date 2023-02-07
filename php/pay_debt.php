<?php
session_start();
include_once "db_connector.php";

$delete_id = stripslashes($_POST['delete_id']);
$amount = str_replace(',', '', stripslashes($_POST['user_Amount']));
$trans_id = stripslashes($_POST['trans_id']);

// echo "$delete_id $amount";
$sql = mysqli_query($conn, "select * from nhmh_patient_accounts_db where transaction_id = '$trans_id' ");

$sql_array = mysqli_fetch_assoc($sql);

$deposit = $sql_array['deposited_amount'];
$remaining_money = $sql_array['remaining_amount'];

$new_deposit = $deposit + $amount;

$new_remain = $remaining_money - $amount;

$sql1 = mysqli_query($conn, "update nhmh_patient_accounts_db set deposited_amount = ' $new_deposit', remaining_amount = '$new_remain' where transaction_id = '$trans_id' ");

if ($sql1) {
    $sql2 = mysqli_query(
        $conn,
        "delete from nhmh_patients_payment_plans_db where transaction_id = '$trans_id' and plan_id = '$delete_id' "
    );
    if ($sql2) {
        echo "Update successful";
    } else {
        echo "can't delete";
    }
}


// echo " $new_deposit $new_remain";
