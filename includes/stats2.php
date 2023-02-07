<?php

include_once "php/db_connector.php";

$userpat_id = stripslashes($_SESSION['patient_uid']);
$sql1 = mysqli_query($conn, "select * from nhmh_patient_db where unique_id = '$userpat_id'");
if (mysqli_num_rows($sql1) > 0) {
    $patient_info = mysqli_fetch_assoc($sql1);

    $pat_id = $patient_info['patient_id'];

    $_SESSION['patient_id'] =
        $patient_info['patient_id'];

    $sql2 = mysqli_query($conn, "select * from nhmh_patient_vital_db where patient_id = '$pat_id' order by id desc limit 0, 1");
    if (mysqli_num_rows($sql2) > 0) {
        $vital_info = mysqli_fetch_assoc($sql2);
    } else {
        $vital_info = array('weight' => '___', 'date' => '______ ');
    }

    $sql3 = mysqli_query($conn, "select * from nhmh_staff_db where position = 'Doctor'");

    $sql4 =
        mysqli_query($conn, "select * from nhmh_patient_medical_record_db where patient_id = '$pat_id' order by id desc");

    $output1 = "";
    if (mysqli_num_rows($sql4) == 0) {
        $output1 .= '
                    <div id="optional_msg">
                    <span class="material-icons-sharp">
                            error
                        </span>
                        <p>You have no record currently.</p>
                    </div>';
    }

    $today = date("Y-m-d");

    $sql5 = mysqli_query($conn, "select * from nhmh_patient_appointment_db where patient_id = '$pat_id' and app_date > '$today' order by id desc");

    $sql6 = mysqli_query($conn, "select sum(deposited_amount) as deposits from nhmh_patient_accounts_db where patient_id = '$pat_id' ");
    $sql6array = mysqli_fetch_array($sql6);
    $deposits = $sql6array['deposits'];


    $sql7 = mysqli_query($conn, "select sum(remaining_amount) as debts from nhmh_patient_accounts_db where patient_id = '$pat_id' ");
    $sql7array = mysqli_fetch_array($sql7);
    $debts = $sql7array['debts'];

    $sql8 = mysqli_query($conn, "select * from nhmh_patient_accounts_db where patient_id = '$pat_id' order by date_of_transaction desc ");
} else {
    header("location: index.php");
}
