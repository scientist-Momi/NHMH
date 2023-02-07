<?php
include "includes/dash-head.php";

if (!isset($_SESSION['staff_uid'])) {
    header("location: index.php");
}

$user_id = stripslashes($_SESSION['staff_uid']);
$sql = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$user_id'");
if (mysqli_num_rows($sql) > 0) {
    $staff_info = mysqli_fetch_assoc($sql);

    // getting the ids of patients
    $sql4 = mysqli_query($conn, "select * from nhmh_patient_db");

    $sql4_count = mysqli_num_rows($sql4);

    $sql5 = mysqli_query($conn, "select * from nhmh_patient_db");

    $sql6 = mysqli_query($conn, "select * from nhmh_patient_db");

    $today = date("Y-m-d");

    $doc = $staff_info['firstname'];

    $sql1 = mysqli_query($conn, "select * from nhmh_patient_appointment_db where doctor_to_see = '$doc' and app_date = '$today'  order by id desc");

    $sql1_count = mysqli_num_rows($sql1);


    $today1 = strtotime($today);
    $day = date('F', $today1);

    $sql7 = mysqli_query($conn, "select * from nhmh_patient_appointment_db where doctor_to_see = '$doc' and month = '$day' and app_date >= '$today' ");
    $sql7_count = mysqli_num_rows($sql7);

    $output1 = "";
    if (mysqli_num_rows($sql7) == 0) {
        $output1 .= '
                    <div id="optional_msg">
                    <span class="material-icons-sharp">
                            error
                        </span>
                        <p class="red">No Appointment set for this month yet, or they are in the past.</p>
                    </div>';
    }
    // echo $output;

} else {
    header("location: index.php");
}

?>

<body>
    <section class="top">
        <div class="top_nav container">

            <div class="logo-name">
                <div id="menu-btn">
                    <i class="material-icons-sharp">
                        menu
                    </i>
                </div>
                <div class="logo-img">
                    <img src="img_resource/logo3.jpg" alt="">
                </div>
                <h2>New Horizon Maternity Hospital.</h2>
                <!-- <h2>NHMH.</h2> -->
            </div>
            <div class="profile">
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>
                <a href="messaging.php?staff_uid=<?= $user_id ?>" target="_blank">
                    <div class="mail">
                        <span class="material-icons-sharp">
                            mail_outline
                        </span>
                        <span class="notify">
                        </span>
                    </div>
                </a>
                <div class="profile_img">
                    <img src="images/staff<?= $staff_info["photo"] ?>" alt="">
                </div>
                <div class="profile_info">
                    <p><?= $staff_info["firstname"] ?> <?= $staff_info["lastname"] ?></p>
                    <small>Doctor</small>
                </div>
                <div class="error-message">
                    <div class="error">
                        <span class="material-icons-sharp">
                            cancel
                        </span>
                    </div>
                    <div class="message">
                        <h4>Error</h4>
                        <small class="err">Your Email Address is invalid Lorem ipsum dolor sit amet.</small>
                    </div>
                    <a class="close-message">
                        <span class="material-icons-sharp">
                            close
                        </span>
                    </a>
                </div>

                <div class="success-message">
                    <div class="success">
                        <span class="material-icons-sharp">
                            check_circle_outline
                        </span>
                    </div>
                    <div class="message">
                        <h4>Success</h4>
                        <small class="succ">Your Email Address is invalid Lorem ipsum dolor sit amet.</small>
                    </div>
                    <a class="close-message close-message2">
                        <span class="material-icons-sharp">
                            close
                        </span>
                    </a>
                </div>

                <div class="notifier">
                    <div class="notifier_icon">
                        <span class="material-icons-sharp">
                            report_problem
                        </span>
                    </div>
                    <div class="notifier_msg">
                        <h3 class="notif">Delete Record</h3>
                    </div>
                    <div class="notifier_btn">
                        <button id="stop">NO</button>
                        <button id="delete">YES</button>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <main>
        <aside>
            <div class="sidebar">
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
                <div class="profile_info2">
                    <p><?= $staff_info["firstname"] ?> <?= $staff_info["lastname"] ?></p>
                    <small>Admin</small>
                </div>
                <a id="dash">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a id="profile">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>My Profile</h3>
                </a>
                <a id="searchforpatient">
                    <span class="material-icons-sharp">
                        person_search
                    </span>
                    <h3>Search for Patient Profile</h3>
                </a>
                <a id="createmedical">
                    <span class="material-icons-sharp">
                        edit_note
                    </span>
                    <h3>Create Medical Record</h3>
                </a>
                <a id="searchmedical">
                    <span class="material-icons-sharp">
                        travel_explore
                    </span>
                    <h3>Search for Medical Record</h3>
                </a>
                <a id="makeappoint">
                    <span class="material-icons-sharp">
                        date_range
                    </span>
                    <h3>Create New Appointment</h3>
                </a>
                <a id="manage">
                    <span class="material-icons-sharp">
                        today
                    </span>
                    <h3>Manage Appointments</h3>
                </a>
                <a href="php/logout.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Log out</h3>
                </a>
            </div>
        </aside>

        <div class="dash_content">
            <div id="dashboard">
                <h1>Doctor Dashboard</h1>
                <div class="displays">
                    <div class="left_display">
                        <div class="welcome-msg">
                            <h2>Good Day, Doctor <span><?= $staff_info["firstname"] ?> <?= $staff_info["lastname"] ?></span>.</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore sit consequuntur, neque non voluptatem ducimus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, quam?</p>
                        </div>
                        <div class="stats_display" id="statpro">
                            <h2>Doctor Statistics.</h2>
                            <div class="stats">
                                <div class="stat">
                                    <span class="material-icons-sharp">
                                        today
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3> Today's Appointments</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1><?= $sql1_count ?></h1>
                                        </div>
                                    </div>
                                    <small>
                                        <span class="material-icons-sharp" id="update1">update</span>
                                        Updated Today
                                    </small>
                                </div>
                                <div class="stat">
                                    <span class="material-icons-sharp span-pat">
                                        today
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3> Appointments for the month</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1><?= $sql7_count ?></h1>
                                        </div>
                                    </div>
                                    <small>
                                        <span class="material-icons-sharp" id="update1">update</span>
                                        Updated Today
                                    </small>
                                </div>
                                <div class="stat">
                                    <span class="material-icons-sharp span-money">
                                        groups
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>Registered Patients</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1><?= $sql4_count ?></h1>
                                        </div>
                                    </div>
                                    <small>
                                        <span class="material-icons-sharp" id="update1">update</span>
                                        Updated Today
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="right_display">
                        <h2>Today's Appointments</h2>
                        <div class="activity_display">
                            <?php include "php/display_today_appointment.php"; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MY PROFILE PAGE -->
            <div id="myprofile">
                <h1>My Profile</h1>
                <p>You can edit on the go.</p>

                <div class="profile_page">
                    <form action="" method="post" id="updatestaff">

                        <div class="profile-image">
                            <img src="images/staff<?= $staff_info["photo"] ?>" alt="">
                            <input type="file" name="file" id="file" class="inputfile">
                            <label for="file" id="label">Change picture</label>
                        </div>
                        <div class="row1">
                            <div class="profile-personal">
                                <label for="firstname">Firstname <input type="text" name="upfname" value="<?= $staff_info["firstname"] ?>"></label>

                                <label for="lastname">Lastname <input type="text" name="uplname" value="<?= $staff_info["lastname"] ?>"></label>

                                <label for="phone">Phone Number <input type="text" name="upphone" value="<?= $staff_info["phone"] ?>"></label>

                                <label for="email">Email <input type="text" name="upemail" value="<?= $staff_info["email"] ?>"></label>

                                <label for="address">House Address <input type="text" name="upaddress" value="<?= $staff_info["address"] ?>"></label>

                            </div>
                        </div>
                        <div class="row2">
                            <p>To edit Username and change password.</p>

                            <div class="account">
                                <label for="username">Username <input type="text" name="upusername" value="<?= $staff_info["username"] ?>" readonly></label>

                                <label for="oldpass">Old Password <input type="password" name="oldpass" readonly></label>

                                <label for="newpass">New Password <input type="password" name="uppassword" readonly></label>

                                <label for="connewpass">Confirm New Password <input type="password" name="upconpassword" readonly></label>
                            </div>

                        </div>
                        <input type="submit" value="Update Profile" class="submit" id="update">
                    </form>
                </div>
            </div>
            <!-- MY PROFILE PAGE -->


            <!-- SEARCH AND DISPLAY PATIENT PROFILE -->
            <div id="searchpatient">
                <h1>Search for Profile of Patients</h1>
                <p>Get the profile information of all your patients for proper diagnosis.</p>

                <label for="search" class="searchlabel">Input ID or Name of Patient to Search<input type="text" name="" id="patient_val" class="search"></label>

                <div class="patient_profile_view" id="profile_display">
                    <span class="material-icons-sharp">
                        error
                    </span>
                    <p>No Search Result.</p>
                    <!-- <div class="row10">
                        <img src="4.png" alt="">
                    </div>
                    <div class="row11">
                        <h4>Personal Information</h4>
                        <div class="personal">
                            <label for="lastname">EDD <input type="text" name="" id=""></label>

                            <label for="lastname">Firstname <input type="text" name="" id=""></label>
                            <label for="lastname">Lastname <input type="text" name="" id=""></label>
                            <label for="lastname">Email <input type="text" name="" id=""></label>
                            <label for="lastname">Phone Number <input type="text" name="" id=""></label>
                            <label for="lastname">House Address <input type="text" name="" id=""></label>
                        </div>
                    </div>
                    <div class="row12">
                        <h4>Vitals taken</h4>
                        <input type="date" name="" id="">
                        <div class="personal">
                            <label for="lastname">Temperature <input type="text" name="" id=""></label>

                            <label for="lastname">Blood Pressure <input type="text" name="" id=""></label>
                            <label for="lastname">Pulse Rate <input type="text" name="" id=""></label>
                            <label for="lastname">Weight <input type="text" name="" id=""></label>
                        </div>
                    </div>
                    <div class="row13">
                        <h4>Medical Information</h4>
                        <div class="personal">
                            <label for="lastname">Age <input type="text" name="" id=""></label>

                            <label for="lastname">Genotype <input type="text" name="" id=""></label>
                            <label for="lastname">Blood Group <input type="text" name="" id=""></label>
                            <label for="lastname">Height <input type="text" name="" id=""></label>
                            <label for="lastname">Number of Children <input type="text" name="" id=""></label>
                        </div>
                    </div>
                    <div class="row14">
                        <h4>Next of Kin Information</h4>
                        <div class="personal">
                            <label for="lastname">Fullname <input type="text" name="" id=""></label>

                            <label for="lastname">Relationship <input type="text" name="" id=""></label>
                            <label for="lastname">Phone Number <input type="text" name="" id=""></label>
                            <label for="lastname">House Address <input type="text" name="" id=""></label>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- SEARCH AND DISPLAY PATIENT PROFILE -->

            <!-- CREATE MEDICAL RECORD FOR PATIENT -->
            <div id="createmed">
                <h1>Add Patient Medical Record</h1>
                <p>Add or Create new patient medical record.</p>
                <div class="medicalform">
                    <form action="" action="post" id="medical_rec">
                        <div class="row20">
                            <label for="position">
                                Input ID of Patient
                                <input type="text" name="patient_id" id="patient_id" placeholder="Input ID of Patient">
                            </label>
                        </div>
                        <div class="row21">
                            <label for="diagnosis">
                                Doctor's Diagnosis or Examination
                                <textarea name="diagnosis" id="diagnosis" cols="30" rows="5"></textarea>
                            </label>
                        </div>
                        <div class="row22">
                            <label for="prescription">
                                Doctor's Prescription or Recommendation
                                <textarea name="prescription" id="prescription" cols="30" rows="5"></textarea>
                            </label>
                        </div>
                        <div class="row23">
                            <input type="file" class="inputfile" name="files[]" multiple>
                            <!-- <div class="photo">
                                <p>Choose Preffered photo</p>
                                <input type="file" id="staffphoto" class="inputfile" name="files[]" multiple>
                                <label for="staffphoto" id="label2">Click to choose picture</label>
                            </div> -->
                        </div>

                        <input type="submit" value="Add Medical Record" id="med_submit">

                    </form>
                </div>
            </div>
            <!-- CREATE MEDICAL RECORD FOR PATIENT -->

            <!-- SEARCH FOR MEDICAL RECORD -->
            <div id="searchmedrec">
                <h1>Search Patient Medical Record</h1>
                <p>Get medical history of each patient for proper diagnosis.</p>

                <!-- <label for="search" class="searchlabel">Input ID or Name of Patient to Search<input type="text" name="" id="medical_val" class="search"></label> -->

                <label for="position" class="searchlabel">Choose ID of Patient

                    <input type="text" name="patient_id" id="medical_val" class="search">
                </label>

                <div class="medrecform" id="med_record">
                    <span class="material-icons-sharp">
                        error
                    </span>
                    <p>No Search Result.</p>

                    <!-- <div class="row30">
                        <div class="row30a">
                            <label for="lastname">Record Number <input type="text" name="" id=""></label>
                            <label for="lastname">Patient ID <input type="text" name="" id=""></label>
                            <label for="lastname">Doctor <input type="text" name="" id=""></label>
                            <label for="lastname">Date Recorded <input type="text" name="" id=""></label>
                        </div>

                        <div class="row30b">
                            <label for="lastname">Diagnosis <textarea name="" id="" cols="30" rows="5"></textarea></label>
                            <label for="lastname">Prescription <textarea name="" id="" cols="30" rows="5"></textarea></label>
                        </div>
                        <div class="row30c">
                            <div><img src="4.png" alt=""></div>
                            <div><img src="4.png" alt=""></div>
                            <div><img src="4.png" alt=""></div>
                        </div>
                    </div> -->
                </div>

            </div>
            <!-- SEARCH FOR MEDICAL RECORD -->


            <!-- NEW APPOINTMENT FOR PATIENT -->
            <div id="newappointment">
                <h1>New Appointment for Patients</h1>
                <p>Make new appointment schedule for patient.</p>

                <div class="appointform">
                    <form method="post" id="addappointment">
                        <div class="row20">
                            <label for="patient">Choose ID of Patient
                                <select name="patient" id="patient">
                                    <option value=""> Choose Patient ID </option>
                                    <?php while ($result6 = mysqli_fetch_assoc($sql6)) : ?>
                                        <option value="<?= $result6['patient_id'] ?>"> <?= $result6['patient_id'] ?> </option>
                                    <?php endwhile ?>
                                </select>
                            </label>
                        </div>
                        <div class="row21">
                            <label for="date" class="date">Choose Date for Appointment<input type="date" name="appdate" id=""></label>

                            <div class="appointtime">
                                <p>Pick from the time available</p>
                                <div class="time">
                                    <label for="9am">
                                        <input type="radio" name="apptime" id="9am" class="timer" value="9:00 - 10:00AM">
                                        <span class="gen" id="pick-time">
                                            9:00AM - 10:00AM
                                        </span>
                                    </label>
                                    <label for="11am">
                                        <input type="radio" name="apptime" id="11am" class="timer" value="11:00 - 12:00AM">
                                        <span class="gen" id="pick-time">
                                            11:00AM - 12:00PM
                                        </span>
                                    </label>
                                    <label for="1pm">
                                        <input type="radio" name="apptime" id="1pm" class="timer" value="1:00 - 2:00PM">
                                        <span class="gen" id="pick-time">
                                            1:00PM - 2:00PM
                                        </span>
                                    </label>
                                    <label for="3pm">
                                        <input type="radio" name="apptime" id="3pm" class="timer" value="3:00 - 4:00PM">
                                        <span class="gen" id="pick-time">
                                            3:00PM - 4:00PM
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row22">
                            <label for="purpose">Pick Purpose of apoointment.
                                <select name="purpose">
                                    <option value="CONSULTATION">CONSULTATION</option>
                                    <option value="DELIVERY">DELIVERY</option>
                                    <option value="OPERATION">OPERATION</option>
                                </select>
                            </label>
                        </div>
                        <div class="row22">
                            <label for="lastname">Add Note or Comment on the Appointment. <span class="red">Optional.</span><textarea name="comment" id="comment" cols="30" rows="5"></textarea></label>
                        </div>

                        <input type="submit" value="Add Appointment" id="addappoint">
                    </form>
                </div>
            </div>
            <!-- NEW APPOINTMENT FOR PATIENT -->

            <!-- MANAGE APPOINTMNETS -->
            <div id="manageappointment">
                <h1>Manage all your Appointments for this month</h1>
                <p>Make changes to your booked days. Delete appointments. 5.9pounds</p>

                <div class="manageapp">
                    <div class="apphead">
                        <h3>Patient Photo</h3>
                        <h3>Patient Info</h3>
                        <h3>Appointment Time</h3>
                        <h3>Appointment Date</h3>
                        <h3>Action</h3>
                    </div>
                    <?= $output1 ?>

                    <?php while ($result7 = mysqli_fetch_assoc($sql7)) {
                        $id_get = $result7['patient_id'];

                        $sql9 = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$id_get' ");

                        $sql8_array = mysqli_fetch_assoc($sql9);

                    ?>
                        <div class="appdetails" id="delete-row-<?= $result7['id'] ?>">
                            <div class="app appimg">
                                <img src="images/patient<?= $sql8_array['photo'] ?>" alt="">
                            </div>
                            <div class="app patientdetails">
                                <h4><?= $result7['patient_id'] ?></h4>
                                <h4><?= $sql8_array['firstname'] ?> <?= $sql8_array['lastname'] ?></h4>
                            </div>
                            <div class="app">
                                <p><?= $result7['app_time'] ?></p>
                            </div>
                            <div class="app">
                                <p><?= $result7['app_date'] ?></p>
                            </div>
                            <div class="app action">
                                <span class="material-icons-sharp remove2" data-patientid="<?= $result7['id'] ?>">
                                    delete_forever
                                </span>
                            </div>

                        </div>
                    <?php } ?>

                </div>
            </div>
            <!-- MANAGE APPOINTMNETS -->
        </div>


    </main>


    <script src="scripts/theme_toggle.js"></script>
    <script src="scripts/doctor-nav.js"></script>
    <script src="scripts/staff_profile_update.js"></script>
    <script src="scripts/search_for_patient.js"></script>
    <script src="scripts/add_medical_record.js"></script>
    <script src="scripts/search_for_medical_record.js"></script>
    <script src="scripts/add_appointment.js"></script>
    <!-- <script src="scripts/users_messaging.js"></script> -->
    <!-- <script src="scripts/delete_appointment.js"></script> -->
</body>

<script type="text/javascript">
    $(document).ready(function() {
        // var delete_id = $('.remove').data('userid');

        $('.remove2').click(function() {

            delete_id = $(this).data("patientid");

            $('.notifier').css("display", "grid");
            $('#delete-row-' + delete_id).css("background", "var(--color-light)");
            $('.notif').html("Are you sure you want to cancel this apointment ");

        });



        $('#delete').click(function() {
            // var delete_id2 = $('.remove').data("userid");

            $('.notifier').css("display", "none");
            // alert(delete_id);
            $.ajax({
                url: 'php/delete_appointment.php',
                type: 'post',
                data: {
                    delete_id: delete_id
                },
                dataType: 'html',
                success: function(response) {
                    $('.success-message').css("display", "grid");
                    $('.succ').html(response);

                    $('#delete-row-' + delete_id).remove();

                }
            });
        });

        $('#stop').click(function() {

            $('.notifier').css("display", "none");

            $('#delete-row-' + delete_id).css("background", "var(--color-white)");

            $('#delete-row-' + delete_id).hover(function() {
                $(this).css("background-color", "var(--color-light)");
            }, function() {
                $(this).css("background-color", "var(--color-white)");
            });


        });


        setInterval(function() {
            // $('#activity').load(window.location.href + " #activity");
            $('#statpro').load(window.location.href + " #statpro");
        }, 5000);




    });
</script>