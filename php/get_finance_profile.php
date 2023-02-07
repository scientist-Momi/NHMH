<?php

session_start();
include_once "db_connector.php";

$searchTerm = stripslashes($_POST['searchTerm']);

//search data base for ID
$sql1 = mysqli_query($conn, "select * from nhmh_patient_db where (patient_id like '$searchTerm' or firstname like '$searchTerm%' or lastname like '$searchTerm%') ");

$sql1_array = mysqli_fetch_assoc($sql1);

$output = "";
if (mysqli_num_rows($sql1) > 0) {

    $pid = $sql1_array['patient_id'];



    $sql3 = mysqli_query($conn, "select sum(deposited_amount) as deposits from nhmh_patient_accounts_db where patient_id = '$pid' ");

    $sql3array = mysqli_fetch_array($sql3);

    $deposits = $sql3array['deposits'];

    $sql4 = mysqli_query($conn, "select sum(remaining_amount) as debts from nhmh_patient_accounts_db where patient_id = '$pid' ");

    $sql4array = mysqli_fetch_array($sql4);

    $debts = $sql4array['debts'];

    $output .= '
            <div class="patient_acc">
                <div class="pics"><img src="images/patient' . $sql1_array['photo'] . ' " alt=""></div>
                <div class="pic1">
                    <h3>' . $sql1_array['firstname'] . ' ' . $sql1_array['lastname'] . '</h3>
                    <p>' . $sql1_array['patient_id'] . '</p>
                </div>
                <a href="php/getPdfTransact.php?patid=' . $sql1_array['patient_id'] . ' " target="_blank"><button class="finsearch">Download Report</button></a>
                <div class="pics pic3">
                    <span class="material-icons-sharp">
                        payments
                    </span>
                    <span>Total Deposit</span>
                    <h2>&#8358;' . number_format($deposits, 2) . '</h2>
                </div>
                <div class="pics pic2">
                    <span class="material-icons-sharp">
                        payments
                    </span>
                    <span>Total Debt</span>
                    <h2>&#8358;' . number_format($debts, 2) . '</h2>
                </div>

            </div>
    ';

    $_SESSION['patientsearched'] = $sql1_array['patient_id'];
    echo $output;
} else {

    echo "error";
    // $output .= '<span class="material-icons-sharp red"> error </span><p class="red">Patient not found. Wrong ID.</p>';
}
