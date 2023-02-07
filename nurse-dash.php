<?php
include "includes/dash-head.php";

if (!isset($_SESSION['staff_uid'])) {
    header("location: index.php");
}

include_once "includes/stats.php";

?>

<body>
    <div class="otp_page">
        <span class="material-icons-sharp close_otp2" id="cancelOtp">
            close
        </span>
        <div class="otp_container">

            <h2>Please enter verification code sent to patient's email, to finish registration.</h2>
            <p id="otpContainer">A 6-digit verification code has been sent to <span><?= $_SESSION['patient_email']; ?> <?= $_SESSION['uniqueOtp']; ?></span></p>

            <form method="post" class="digit-group" id="otpform" data-group-name="digits" data-autosubmit="false" autocomplete="off">
                <input type="number" id="digit-1" name="digit-1" data-next="digit-2" maxlength="1" />
                <input type="number" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
                <input type="number" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
                <input type="number" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
                <input type="number" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" />
                <input type="number" id="digit-6" name="digit-6" data-previous="digit-5" />
            </form>

            <!-- <input type="submit" value="Resend Code" id="resend"> -->
            <input type="submit" value="Change Email" id="changeEmail">

        </div>

        <div class="otp_status">
            <div class="otp_error">
                <span class="material-icons-sharp close_otp" id="close_otp1">
                    close
                </span>
                <span class="material-icons-sharp">
                    error
                </span>
                <p class="otp_msg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, veritatis.</p>
            </div>
        </div>
        <div class="otp_status " id="otp_status2">
            <div class="otp_success">
                <span class="material-icons-sharp close_otp " id="close_otp3">
                    close
                </span>
                <span class="material-icons-sharp">
                    check_circle_outline
                </span>
                <p class="otp_msg otp_msg2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, veritatis.</p>
            </div>
        </div>
    </div>
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
                <!-- <span class="material-icons-sharp" id="preg">
                    pregnant_woman
                </span> -->
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
                    <small>Nurse</small>
                </div>
                <div class="error-message">
                    <div class="error">
                        <span class="material-icons-sharp">
                            error
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
                    <small>Nurse</small>
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
                <a id="newpatient">
                    <span class="material-icons-sharp">
                        person_add
                    </span>
                    <!-- <span class="fi fi-sr-user-add"></span> -->
                    <h3>Create New Patient Profile</h3>
                </a>
                <a id="addnewvital">
                    <span class="material-icons-sharp">
                        edit_note
                    </span>
                    <h3>Record/Update Patient's Vital</h3>
                </a>
                <a id="search4patient">
                    <span class="material-icons-sharp">
                        <span class="material-icons-sharp">
                            person_search
                        </span>
                    </span>
                    <h3>Search for Patient Profile</h3>
                </a>
                <a id="medrecsearch">
                    <span class="material-icons-sharp">
                        person_search
                    </span>
                    <h3>Search for Patient Medical Record</h3>
                </a>
                <a id="allappoint">
                    <span class="material-icons-sharp">
                        today
                    </span>
                    <h3>All Today's Appointments</h3>
                </a>
                <a id="edd">
                    <span class="material-icons-sharp">
                        calculate
                    </span>
                    <h3>EDD Calculator</h3>
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
                <h1>Nurse Dashboard</h1>
                <div class="displays">
                    <div class="left_display">
                        <div class="welcome-msg">
                            <h2>Good Day, Nurse <span><?= $staff_info["firstname"] ?> <?= $staff_info["lastname"] ?></span>. </h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore sit consequuntur, neque non voluptatem ducimus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, quam?</p>
                        </div>
                        <div class="stats_display">
                            <h2>Nurse Statistics.</h2>
                            <div class="stats">
                                <div class="stat">
                                    <span class="material-icons-sharp">
                                        today
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3> All Today's Appointments</h3>
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
                                        medical_information
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>Available Doctors</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1><?= $sql2_count ?></h1>
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
                                            <h1><?= $sql3_count ?></h1>
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
                        <h2>Doctors Activity</h2>
                        <div class="activity_display">

                            <?php include "php/display_online_doctors.php" ?>
                            <!-- <div class="activity">
                                <div class="patpic">
                                    <img src="4.png" alt="">
                                </div>
                                <div class="activity-user">
                                    <h4>Matthew Hoser [10003]</h4>
                                    <small class="reason">DOCTOR</small>
                                </div>
                                <div class="status2">
                                    <p>Offline now</p>
                                </div>
                            </div> -->


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
                            <img src="images/staff<?= $staff_info["photo"] ?>" alt="4.png" onerror="this.onerror=null;this.src='4.png'; ">
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

                                <label for="oldpass">Old Password <input type="password" name="oldpass"></label>

                                <label for="newpass">New Password <input type="password" name="uppassword"></label>

                                <label for="connewpass">Confirm New Password <input type="password" name="upconpassword"></label>
                            </div>

                        </div>
                        <input type="submit" value="Update Profile" class="submit" id="update">
                    </form>
                </div>
            </div>
            <!-- MY PROFILE PAGE -->

            <!-- CREATE NEW PATIENT PROFILE -->
            <div id="add_staff">
                <h1>Add New Patient Form</h1>
                <p>You can add new Patient Profile that contains all their information. Form automatically generates Username and Password for patient, which is sent to their Email. They can later update on their profile. </p>

                <div class="add-staff_page add-patient_page">
                    <form action="" method="post" id="add_patient_js">
                        <p>Personal Details</p>
                        <div class="row11">
                            <label for="firstname">Firstname <input type="text" name="fname"></label>

                            <label for="lastname">Lastname <input type="text" name="lname"></label>

                            <label for="phone">Phone Number <input type="text" name="phone"></label>

                            <label for="email">Email <input type="text" name="email"></label>

                            <label for="address">House Address <input type="text" name="address"></label>

                        </div>
                        <p>Medical Details</p>
                        <div class="row12">
                            <label for="dob">Date Of Birth <input type="date" name="dob"></label>

                            <label for="genotype">Choose genotype of patient<select name="genotype" id="genotype">
                                    <option value=""> Choose genotype of patient...... </option>
                                    <option value="AA"> AA </option>
                                    <option value="AS"> AS </option>
                                    <option value="AC"> AC </option>
                                    <option value="SS"> SS </option>
                                    <option value="SC"> SC </option>
                                </select>
                            </label>

                            <label for="bgroup">Choose blood group of patient<select name="bgroup" id="bgroup">
                                    <option value=""> Choose blood group of patient..... </option>
                                    <option value="A+"> A+ </option>
                                    <option value="A-"> A- </option>
                                    <option value="B+"> B+ </option>
                                    <option value="B-"> B- </option>
                                    <option value="AB+"> AB+ </option>
                                    <option value="AB-"> AB- </option>
                                    <option value="O+"> O+ </option>
                                    <option value="O-"> O- </option>
                                </select>
                            </label>

                            <label for="height">Height(cm) <input type="number" name="height"></label>

                            <!-- <label for="children">Number of Children <input type="text" name="children" inputmode="numeric"></label> -->

                            <label for="children">Choose blood group of patient<select name="children">
                                    <option value=""> Choose Number of Children of patient..... </option>
                                    <option value="0">0</option>
                                    <option value="Less than 5">Less than 5</option>
                                    <option value="Above 5">Above 5</option>
                                </select>
                            </label>

                            <!-- <div class="photo">
                                <p>Choose Preffered photo</p>
                                <input type="file" name="staffphoto" id="staffphoto" class="inputfile">
                                <label for="staffphoto" id="label2">Click to choose picture</label>
                            </div> -->
                        </div>

                        <p>Next of Kin Details</p>
                        <div class="row13">
                            <label for="fullname">Full name <input type="text" name="nokname"></label>

                            <label for="relationship">Relationship
                                <select name="nokrel">
                                    <option value="">Choose next of kin relationship with patient.....</option>
                                    <option value="Husband">Husband</option>
                                    <option value="Father">Father</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Others">Other relations</option>
                                </select></label>
                            <label for="phone">Phone Number <input type="text" name="nokphone"></label>
                            <label for="address">House Address <input type="text" name="nokaddress"></label>
                        </div>
                        <input type="submit" value="Verify Patient" class="submit" id="addpatientbtn">
                    </form>
                </div>
            </div>
            <!-- CREATE NEW PATIENT PROFILE -->

            <!-- RECORD PATIENT VITALS -->
            <div id="newvital">
                <h1>Record Patient Vital</h1>
                <p>Record the vital of patients before they go in to see a Doctor. </p>


                <div class="addvital-form">
                    <form action="" method="post" id="add_vitals">
                        <div class="row12">
                            <label for="position">Choose ID of Patient<select name="pid">
                                    <option value=""> Choose ID of Patient </option>
                                    <?php while ($result3 = mysqli_fetch_assoc($sql3)) : ?>
                                        <option value="<?= $result3['patient_id'] ?>"> <?= $result3['patient_id'] ?> </option>

                                    <?php endwhile ?>
                                </select>
                            </label>

                            <label for="lastname">Body Temperature of patient
                                <select name="temp">
                                    <option value="">Choose temperature range</option>
                                    <option value="Low (less than 35.8)">Low (less than 35.8)</option>
                                    <option value="Normal (between 35.8 - 37.0)">Normal (between 35.8 - 37.0)</option>
                                    <option value="Moderate High (between 37.1 - 38.0)">Moderately High (between 37.1 - 38.0)</option>
                                    <option value="High (between 38.1 - 42.0)">High (between 38.1 - 42.0)</option>
                                </select>
                            </label>

                            <label for="lastname">Blood Pressure
                                <select name="bpressure">
                                    <option value="">Choose Blood pressure range</option>
                                    <option value="Low (less than 90 / 60)">Low (less than 90 / 60)</option>
                                    <option value="Normal (120/80)">Normal (120-91 / 80-61)</option>
                                    <option value="Elevated(120-129 / 80-61)">Elevated (120-129 / 80-61)</option>
                                    <option value="High Blood Pressure(greater than 130 / greater than 80)">High Blood Pressure(greater than 130 / greater than 80)</option>
                                </select>
                            </label>
                            <label for="lastname">Pulse Rate
                                <select name="pulse">
                                    <option value="">Choose Pulse rate range</option>
                                    <option value="Low (less than 60 beats per minute)">Low (less than 60 beats per minute)</option>
                                    <option value="Normal (between 60 - 100 beats per minute)">Normal (between 60 - 100 beats per minute)</option>
                                    <option value="High ( above 100 beats per minute)">High ( above 100 beats per minute)</option>

                                </select>
                            </label>
                            <label for="lastname">Weight <input type="number" name="weight"></label>
                        </div>

                        <input type="submit" value="Add Record" id="addvitalsbtn">
                    </form>
                </div>

            </div>
            <!-- RECORD PATIENT VITALS -->

            <!-- SEARCH FOR PATIENT PROFILE -->
            <div id="searchpatient">
                <h1>Search for Profile of Patients</h1>
                <p>Get the profile information of all your patients for update and view.</p>

                <label for="search" class="searchlabel">Input ID or Name of Patient to Search<input type="text" id="patient_val" class="search"></label>


                <div class="patient_profile_view" id="profile_display">
                    <span class="material-icons-sharp">
                        error
                    </span>
                    <p>No Search Result.</p>
                    <form action="" method="post" id="nur_update_form">
                        <!--<div class="row10">
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
                        </div>

                        <input type="submit" value="Update Profile" class="submit1">-->
                    </form>
                </div>
            </div>
            <!-- SEARCH FOR PATIENT PROFILE -->


            <!-- SEARCH FOR PATIENT MEDICAL RECORD -->
            <div id="searchmedrec">
                <h1>Search Patient Medical Record</h1>
                <p>Get medical history of each patient for proper diagnosis.</p>

                <label for="search" class="searchlabel">Choose ID of Patient
                    <select name="patient_id" id="medical_val" class="search">
                        <option value=""> Choose ID of Patient </option>
                        <?php while ($result4 = mysqli_fetch_assoc($sql4)) : ?>
                            <option value="<?= $result4['patient_id'] ?>"> <?= $result4['patient_id'] ?> </option>

                        <?php endwhile ?>
                    </select>
                </label>

                <div class="medrecform" id="med_record">
                    <span class="material-icons-sharp">
                        error
                    </span>
                    <p>No Search Result.</p>

                    <!--<div class="row30">
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
            <!-- SEARCH FOR PATIENT MEDICAL RECORD -->


            <!-- ALL TODAY'S APPOINTMENT -->
            <div id="todayappoint">
                <h1>All Appointments for Today</h1>
                <p>Here is the list of all appointments set for today. You can also search for specific patient if the list appears to be too long.</p>

                <div class="appointment-list">
                    <div class="apphead">
                        <h3>Patient Photo</h3>
                        <h3>Patient Info</h3>
                        <h3>Appointment Time</h3>
                        <h3>Appointment Date</h3>
                        <h3>Doctor to see</h3>
                    </div>
                    <?php include "php/nur_display_today_appointment.php"; ?>

                </div>
            </div>
            <!-- ALL TODAY'S APPOINTMENT -->

            <!-- EDD CALCULATOR -->
            <div id="eddcalculator">
                <h1>Estimated Delivery Date Calculator</h1>
                <p>Calculate the Estimated Delivery Date of each patient and get updated Gestation period.</p>

                <div class="eddform">
                    <form action="" method="post" id="recordEdd">
                        <div class="row50">
                            <label for="position">Choose ID of Patient<select name="patient">
                                    <option value=""> Choose ID of Patient </option>
                                    <?php while ($result6 = mysqli_fetch_assoc($sql6)) : ?>
                                        <option value="<?= $result6['patient_id'] ?>"> <?= $result6['patient_id'] ?> </option>

                                    <?php endwhile ?>
                                </select>
                            </label>
                            <label for="lastname">First day of last menstrual period of patient<input type="date" id="folm"></label>
                            <label for="lastname">Conception date<input type="text" id="concept" readonly></label>
                        </div>
                        <div class="row50">
                            <label for="lastname">Estimated Due Date<input type="text" name="edd" id="edd_cak" readonly></label>
                            <label for="lastname">Gestational Age <input type="text" id="gestage" readonly></label>
                        </div>
                        <input type="submit" value="Record EDD for patient" id="recordEddBtn">
                    </form>
                </div>
            </div>
            <!-- EDD CALCULATOR -->
        </div>
    </main>

    <script src="scripts/theme_toggle.js"></script>
    <script src="scripts/nurse-nav.js"></script>
    <script src="scripts/staff_profile_update.js"></script>
    <script src="scripts/add_patient_profile.js"></script>
    <script src="scripts/patient_vital.js"></script>
    <script src="scripts/nur_search_for_patient.js"></script>
    <script src="scripts/nur_update_patient_profile.js"></script>
    <script src="scripts/search_for_medical_record.js"></script>
    <script src="scripts/edd_calculator.js"></script>
    <script src="scripts/record_edd.js"></script>
    <script src="scripts/verify_otp.js"></script>
</body>

<script type="text/javascript">
    document.getElementById('cancelOtp').addEventListener('click', () => {
        document.querySelector('.otp_page').style.display = 'none';
    });

    document.getElementById('changeEmail').addEventListener('click', () => {
        document.querySelector('.otp_page').style.display = 'none';
    });


    $('.digit-group').find('input').each(function() {
        // $(this).attr('maxlength', 1);
        $(this).on('keyup', function(e) {
            var parent = $($(this).parent());

            if (e.keyCode === 8 || e.keyCode === 37) {
                var prev = parent.find('input#' + $(this).data('previous'));

                if (prev.length) {
                    $(prev).select();
                }
            } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                var next = parent.find('input#' + $(this).data('next'));

                if (next.length) {
                    $(next).select();
                } else {
                    if (parent.data('autosubmit')) {
                        parent.submit();
                    }
                }
            }
        });
    });
</script>