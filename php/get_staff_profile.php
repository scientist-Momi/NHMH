<?php

session_start();
include_once "db_connector.php";

$searchTerm = stripslashes($_POST['searchTerm']);

//search data base for ID
$sql1 = mysqli_query($conn, "select * from nhmh_staff_db where Staff_id = '$searchTerm' ");
$output = "";
if (mysqli_num_rows($sql1) > 0) {

    // store data inside array
    $sql1_array = mysqli_fetch_assoc($sql1);



    // insert output
    $output .= ' <div class="row20">
                            <div class="row20a">
                                <label for="search">Staff ID<input type="text" name="" id="id_bank" value="' . $sql1_array['Staff_id'] . '" readonly></label>
                                <label for="search">Staff Full Name<input type="text" name="" id="" value="' . $sql1_array['firstname'] . '  ' . $sql1_array['lastname'] . '" readonly></label>
                            </div>
                            <div class="row20a">
                                <label for="search">Staff Email<input type="text" name="" id="" value="' . $sql1_array['email'] . '" readonly></label>
                                <label for="search">Staff Phone number<input type="text" name="" id="" value="' . $sql1_array['phone'] . '" readonly></label>
                            </div>
                            <div class="row20a">
                                <label for="search">Staff Position<input type="text" name="" id="" value="' . $sql1_array['position'] . '" readonly></label>
                                <label for="search">Start Date<input type="text" name="" id="" value="' . $sql1_array['created_at'] . '" readonly></label>
                            </div>
                            <div class="row20a">
                                <label for="search">Staff House Address <textarea name="" id="" cols="20" rows="4" readonly>' . $sql1_array['address'] . '</textarea></label>
                            </div>
                            <div class="row20a">
                                <img src="images/staff' . $sql1_array['photo'] . '" alt="">
                            </div>

                        </div>';
}
echo $output;
