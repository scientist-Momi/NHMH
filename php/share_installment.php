<?php

session_start();
include_once "db_connector.php";

$price = stripslashes($_SESSION['servePrice']);
$downPay = stripslashes($_SESSION['downPay']);
$patient = stripslashes($_POST['patientID']);
$deposit = stripslashes($_POST['deposit']);
$modeofPay = stripslashes($_POST['modeofPay1']);
$planChoice = stripslashes($_POST['planChoice']);
$service = stripslashes($_POST['service']);

$_SESSION['servicePrice'] = $price;
// $_SESSION['deposit'] = $downPay;
$_SESSION['patient'] = $patient;
$_SESSION['deposit'] = $deposit;
$_SESSION['modeofPay'] = $modeofPay;
$_SESSION['planChoice'] = $planChoice;
$_SESSION['service'] = $service;

if (empty($deposit)) {
    echo "Please specify how much patient is paying.";
} elseif (empty($planChoice)) {
    echo "Choose installment plan for patient.";
} elseif (empty($patient)) {
    echo "Patient ID not specified.";
} elseif (empty($modeofPay)) {
    echo "Choose mode of payment.";
} else {
    if ($deposit < $downPay) {
        echo "Deposit cannot be lesser than down payment.";
    } else {
        $remains = $price - $deposit;

        $_SESSION['remains'] = $remains;

        $moneytoPay = $remains / $planChoice;

        $_SESSION['moneytopay'] = $moneytoPay;
        // echo $moneytoPay;

        $sql = mysqli_query($conn, "select edd_date from nhmh_patient_db where patient_id = '$patient' ");

        $sqlarray = mysqli_fetch_assoc($sql);
        $edd = $sqlarray['edd_date'];

        $today = date("Y-m-d");
        // $edd1 = date("d-m-Y", strtotime($edd));

        $edd1 = date('Y-m-d', strtotime($edd));

        $edd2 = date_diff(date_create($today), date_create($edd1));
        $edd3 = $edd2->format('%a');

        $interval = floor($edd3 / $planChoice);
        $_SESSION['interval'] = $interval;

        // $firstday = date('Y-m-d', strtotime($today . '+ 79 days'));

        $hope = $edd3 / $interval;


        $firstday = $today;
        $output = "";
        if ($edd == "") {
            echo "Patient EDD not specified.";
        } else {
            for ($i = 1; $i <= $planChoice; $i++) {

                // $firstday = date('Y-m-d', strtotime($today . '+' . $interval . 'days', strtotime($firstday)));
                $firstday = date('Y-m-d', strtotime('+' . $interval . 'days', strtotime($firstday)));

                $_SESSION['firstday'] = $firstday;
                // echo "$firstday";

                $output .= '
                        <div class="plan">
                            <label for="">
                                <p>Amount to pay</p>
                                <h2 name="amouttopay">&#8358;' . number_format($moneytoPay, 2) . '</h2>
                            </label>
                            <label for="">
                                <p>Date to pay</p>
                                <h2 name="datetopay">' . $firstday . '</h2>
                            </label>
                        </div>
                ';
            }

            $array2 = array('output' => $output, 'remain' => $remains);

            $_SESSION['array2'] = $array2;
            // echo "$output";
        }
    }
}
