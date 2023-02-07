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


    // store data inside array
    $sql2 = mysqli_query($conn, "select * from nhmh_patient_accounts_db where patient_id = '$pid' order by date_of_transaction desc ");

    // $sql2_array = mysqli_fetch_assoc($sql2);

    if (mysqli_num_rows($sql2) > 0) {

        while ($result2 = mysqli_fetch_assoc($sql2)) {
            // insert output
            $output .= '
                    <div class="record">
                        <div class="transrecords">
                             <div class="transrecord">
                                <p>' . $result2['id'] . '</p>
                            </div>
                            <div class="transrecord">
                                <p>' . $result2['payment_for'] . '</p>
                            </div>
                            <div class="transrecord">&#8358;' . number_format($result2['deposited_amount'], 2) . '</div>
                            <div class="transrecord">&#8358;' . number_format($result2['remaining_amount'], 2) . '</div>
                            <div class="transrecord">' . $result2['date_of_transaction'] . '</div> 
                        </div>
                    </div>
        ';
        }
    } else {
        // insert output
        $output .= ' 
                    <span class="material-icons-sharp red" align="center"> error </span><p class="red">No transaction history.</p>
                    ';
    }
} else {
    $output .= '<span class="material-icons-sharp red"> error </span><p class="red">Patient not found. Wrong ID.</p>';
}

echo $output;
