<?php

include_once "php/db_connector.php";


$user_id = stripslashes($_SESSION['staff_uid']);
$sql = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$user_id'");
if (mysqli_num_rows($sql) > 0) {
    $staff_info = mysqli_fetch_assoc($sql);


    // counting the number of staff and getting their information
    $sql2 = mysqli_query($conn, "select * from nhmh_staff_db where not position = 'Admin' order by Staff_id");
    $staffcount = mysqli_num_rows($sql2);

    // counting the number of staff and getting their information
    $sql4 = mysqli_query($conn, "select * from nhmh_staff_db");
    // $staffcount = mysqli_num_rows($sql2);


    $sql3 = mysqli_query($conn, "select sum(deposited_amount) as deposits from nhmh_patient_accounts_db");
    $sql3array = mysqli_fetch_array($sql3);
    $deposits = $sql3array['deposits'];

    $sql5 = mysqli_query($conn, "select sum(remaining_amount) as debts from nhmh_patient_accounts_db");
    $sql5array = mysqli_fetch_array($sql5);
    $debts = $sql5array['debts'];


    $today = date("Y-m-d");

    $month1 = date('F', strtotime($today));
    $sql15 = mysqli_query($conn, "select sum(deposited_amount) as mdeposits from nhmh_patient_accounts_db where month_of_transaction = '$month1' ");
    $sql15array = mysqli_fetch_array($sql15);
    $mdeposits = $sql15array['mdeposits'];

    $sql115 = mysqli_query($conn, "select * from nhmh_patients_payment_plans_db order by date_to_pay ");



    // getting user log
    $sql6 = mysqli_query($conn, "select * from nhmh_users_log order by id desc");

    //getting all services
    $sql7 =
        mysqli_query($conn, "select * from nhmh_services_db order by id asc");

    //getting all services
    $sql18 =
        mysqli_query($conn, "select * from nhmh_services_db ");

    //getting all services
    $sql9 =
        mysqli_query($conn, "select * from nhmh_services_db ");

    $sql10 =
        mysqli_query($conn, "select * from nhmh_patient_db ");
} else {
    header("location: index.php");
}
