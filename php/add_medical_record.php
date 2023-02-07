<?php

session_start();
include_once "db_connector.php";

// Getting all inputs from form
$patient_id = stripslashes($_POST['patient_id']);
$diagnosis = stripslashes($_POST['diagnosis']);
$prescription = stripslashes($_POST['prescription']);

// Check if fields are empty
if (empty($patient_id)) {
    echo "Please input Patient ID.";
} elseif (!$diagnosis) {
    echo "Add patient diagnosis.";
} elseif (!$prescription) {
    echo "Add prescription for patient.";
} else {
    // check if patient id is valid or exists
    $sql = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$patient_id' ");
    if (mysqli_num_rows($sql) > 0) {
        // get doctor info
        $user_id = stripslashes($_SESSION['staff_uid']);

        $sql1 = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$user_id'");
        if ($sql1) {
            $sql1_array = mysqli_fetch_assoc($sql1);
            $doctor = $sql1_array["firstname"];

            $unique_id = rand(time(), 100000);
            $today = date("Y-m-d");

            // insert into database
            $sql2 = mysqli_query($conn, "insert into nhmh_patient_medical_record_db(unique_id,patient_id,diagnosis,instruction,attending_doctor,date) values('$unique_id', '$patient_id', '$diagnosis', '$prescription', '$doctor', '$today')");

            // File upload configuration 
            $targetDir = "../images/medrec_images/";
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

            // $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
            $fileNames = array_filter($_FILES['files']['name']);

            if (!empty($fileNames)) {
                $insertValuesSQL = "";
                foreach ($_FILES['files']['name'] as $key => $val) {
                    // File upload path 
                    $fileName = basename($_FILES['files']['name'][$key]);
                    $targetFilePath = $targetDir . $fileName;

                    // Check whether file type is valid 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) {
                        // Upload file to server 
                        if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                            // Image db insert sql 
                            $insertValuesSQL .= "('" . $unique_id . "', '" . $fileName . "', NOW()),";
                        } else {
                            echo "Error uploading file";
                        }
                    } else {
                        echo "File type not supported";
                    }
                }

                if (!empty($insertValuesSQL)) {
                    $insertValuesSQL = trim($insertValuesSQL, ',');
                    // Insert image file name into database 
                    $insert = $conn->query("INSERT INTO nhmh_record_images_db (unique_id, file_name, uploaded_on) VALUES $insertValuesSQL");
                    if (!$insert) {
                        echo "Error uploading files";
                    }
                } else {
                    echo "Something went wrong";
                }
            }

            if ($sql2) {
                echo "Successfull";
            } else {
                echo "An error occurred";
            }
        } else {
            echo "Could not get Doctor's info.";
        }
    } else {
        echo "Invalid Patient ID";
    }
}
