<?php
include "includes/dash-head.php";

include "includes/stats2.php";
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
                <div class="mail">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <span class="notify">
                    </span>
                </div>
                <div class="profile_img">
                    <img src="images/patient<?= $patient_info["photo"] ?>" alt="">
                </div>
                <div class="profile_info">
                    <p><?= $patient_info["firstname"] ?> <?= $patient_info["lastname"] ?></p>
                    <small>Patient</small>
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
                    <p><?= $patient_info["firstname"] ?> <?= $patient_info["lastname"] ?></p>
                    <small>Patient</small>
                </div>
                <a id="dash">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a id="profile">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3>My Profile</h3>
                </a>
                <a id="medrecsearch">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>My Medical Record</h3>
                </a>
                <a id="finance">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>My financial Record</h3>
                </a>
                <a id="bookappoint">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>Book Appointments</h3>
                </a>
                <a id="edd">
                    <span class="material-icons-sharp">
                        receipt_long
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
                <h1>Patient Dashboard</h1>
                <div class="displays">
                    <div class="left_display">
                        <div class="welcome-msg">
                            <h2>Good Day, <span><?= $patient_info["firstname"] ?> <?= $patient_info["lastname"] ?></span>. </h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore sit consequuntur, neque non voluptatem d</p>
                        </div>
                        <div class="stats_display">
                            <h2>Patient Latest Vitals.</h2>
                            <div class="stats pat_stats">
                                <div class="stat">
                                    <span class="material-icons-sharp">
                                        badge
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3> EDD</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h2><?= $patient_info["edd_date"] ?> </h2>
                                        </div>
                                    </div>
                                    <small>
                                        <span class="material-icons-sharp" id="update1">calendar_month</span>
                                        <span>Updated 22-10-05</span>
                                    </small>
                                </div>
                                <!-- <div class="stat">
                                    <span class="material-icons-sharp">
                                        badge
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3> My Age</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h2><?= $patient_info["age"] ?> years old </h2>
                                        </div>
                                    </div>
                                    <small>
                                        <span class="material-icons-sharp" id="update1">calendar_month</span>
                                        <span>Updated Today</span>
                                    </small>
                                </div> -->
                                <div class="stat">
                                    <span class="material-icons-sharp">
                                        badge
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>My Weight</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1><?= $vital_info["weight"] ?>kg</h1>
                                        </div>
                                    </div>
                                    <small>
                                        <span class="material-icons-sharp" id="update1">calendar_month</span>
                                        <span>Updated <?= $vital_info["date"] ?></span>
                                    </small>
                                </div>
                                <div class="stat">
                                    <span class="material-icons-sharp">
                                        badge
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>My Height</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1><?= $patient_info["height"] ?>cm</h1>
                                        </div>
                                    </div>
                                    <small>
                                        <span class="material-icons-sharp" id="update1">calendar_month</span>
                                        <span>Updated Today</span>

                                    </small>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="right_display">
                        <h2>Next Appointments</h2>
                        <div class="activity_display">
                            <?php include "php/display_patient_appointment.php"; ?>
                            <!-- <div class="activity">
                                <div class="patpic">
                                    <img src="4.png" alt="">
                                </div>
                                <div class="activity-user">
                                    <h4>Matthew Hoser [20001]</h4>
                                    <small class="reason">CONSULTATION</small>
                                </div>
                                <div class="activity-time">
                                    <p>9:00-10:00PM</p>
                                </div>
                            </div>
                            <div class="activity">
                                <div class="patpic">
                                    <img src="4.png" alt="">
                                </div>
                                <div class="activity-user">
                                    <h4>Matthew Hoser [20001]</h4>
                                    <small class="reason">CONSULTATION</small>
                                </div>
                                <div class="activity-time">
                                    <p>9:00-10:00PM</p>
                                </div>
                            </div> -->


                        </div>
                    </div>
                </div>
            </div>

            <!-- MY PROFILE PAGE -->
            <div id="myprofile">
                <h1>My Profile</h1>
                <p>You can edit your profile information.</p>

                <div class="profile_page">
                    <form action="" method="post" id="updatepatient">

                        <div class="profile-image">
                            <img src="images/patient<?= $patient_info["photo"] ?>" alt="">
                            <input type="file" name="file" id="file" class="inputfile">
                            <label for="file" id="label">Change picture</label>
                        </div>
                        <div class="row1">
                            <div class="profile-personal">
                                <label for="firstname">Firstname <input type="text" name="upfname" value="<?= $patient_info["firstname"] ?>"></label>

                                <label for="lastname">Lastname <input type="text" name="uplname" value="<?= $patient_info["lastname"] ?>"></label>

                                <label for="phone">Phone Number <input type="text" name="upphone" value="<?= $patient_info["phone"] ?>"></label>

                                <label for="email">Email <input type="text" name="upemail" value="<?= $patient_info["email"] ?>"></label>

                                <label for="address">House Address <input type="text" name="upaddress" value="<?= $patient_info["address"] ?>"></label>

                            </div>
                        </div>

                        <div class="row12">
                            <p>Medical Details</p>
                            <div class="med">
                                <label for="dob">Date Of Birth <input type="date" name="" id=""></label>

                                <label for="genotype"> My Genotype
                                    <input type="text" readonly value="<?= $patient_info["genotype"] ?>">
                                </label>



                                <label for="phone">Height <input type="text" readonly value="<?= $patient_info["height"] ?>"></label>

                                <label for="phone">Weight <input type="text" readonly value="<?= $vital_info["weight"] ?>kg"></label>

                                <label for="email">Number of Children <input type="text" readonly value="<?= $patient_info["children"] ?>"></label>
                            </div>


                        </div>


                        <div class="row13">
                            <p>Next of Kin Details</p>
                            <div class="nok">
                                <label for="lastname">Fullname <input type="text" name="upnokname" value="<?= $patient_info["nokname"] ?>"></label>

                                <label for="lastname">Relationship <input type="text" name="upnokrel" value="<?= $patient_info["nokrel"] ?>"></label>
                                <label for="lastname">Phone Number <input type="text" name="upnokphone" value="<?= $patient_info["nokphone"] ?>"></label>
                                <label for="lastname">House Address <input type="text" name="upnokaddress" value="<?= $patient_info["nokaddress"] ?>"></label>
                            </div>

                        </div>
                        <div class="row2">
                            <p>To edit Username and change password.</p>

                            <div class="account">
                                <label for="username">Username <input type="text" name="upusername" value="<?= $patient_info["username"] ?>"></label>

                                <label for="oldpass">Old Password <input type="password" name="oldpass"></label>

                                <label for="newpass">New Password <input type="password" name="uppassword"></label>

                                <label for="connewpass">Confirm New Password <input type="password" name="upconpassword"></label>
                            </div>

                        </div>
                        <input type="submit" value="Update Profile" class="submit" id="updateBtn">
                    </form>
                </div>
            </div>
            <!-- MY PROFILE PAGE -->

            <!-- SEARCH FOR PATIENT MEDICAL RECORD -->
            <div id="searchmedrec">
                <h1>Your Medical Record</h1>
                <p>Here is the documentation of your medical record history with NHMH. It contains all diagnosis and prescriptions ever given to you at a particular time. Do well to adhere to advice and instructions of the Doctors.</p>

                <label for="search" class="searchlabel">Filter Record by date
                    <input type="date" name="recdate" id="recdate" class="search">
                </label>

                <div class="medrecform" id="med_record">
                    <?= $output1 ?>

                    <?php while ($result4 = mysqli_fetch_assoc($sql4)) : ?>
                        <?php
                        $unique = $result4['unique_id'];

                        $sql9 = mysqli_query($conn, "select * from nhmh_record_images_db where unique_id = '$unique' ");
                        ?>
                        <div class="row30">
                            <div class="row30a">
                                <label for="lastname">Record Number <input type="text" value="<?= $result4['id'] ?>" readonly></label>
                                <label for="lastname">Patient ID <input type="text" value="<?= $result4['patient_id'] ?>" readonly></label>
                                <label for="lastname">Doctor <input type="text" value="<?= $result4['attending_doctor'] ?>" readonly></label>
                                <label for="lastname">Date Recorded <input type="text" value="<?= $result4['created_at'] ?>" readonly></label>
                            </div>

                            <div class="row30b">
                                <label for="lastname">Diagnosis <textarea readonly cols="30" rows="5"><?= $result4['diagnosis'] ?></textarea></label>
                                <label for="lastname">Prescription <textarea readonly cols="30" rows="5"><?= $result4['instruction'] ?></textarea></label>
                            </div>
                            <div class="row30c">
                                <?php while ($result9 = mysqli_fetch_assoc($sql9)) : ?>
                                    <div><img src="images/medrec_images/<?= $result9['file_name'] ?>" alt=""></div>
                                <?php endwhile ?>
                                <!-- <div><img src="4.png" alt=""></div>
                                <div><img src="4.png" alt=""></div> -->
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>

            </div>
            <!-- SEARCH FOR PATIENT MEDICAL RECORD -->

            <!-- FINANCIAL RECORD OF PATIENT -->

            <div id="finrecord">
                <h1>All your financial transactions with NHMH will be displayed below.</h1>
                <div class="patient_frecord">
                    <!-- <span class="material-icons-sharp">
                        error
                    </span>
                    <p>No Search Result.</p> -->

                    <div class="patient_acc">
                        <div class="pics"><img src="images/patient<?= $patient_info["photo"] ?>" alt=""></div>
                        <div class="pic1">
                            <h3><?= $patient_info["firstname"] ?>
                                <?= $patient_info["lastname"] ?></h3>
                            <p><?= $patient_info["patient_id"] ?></p>
                        </div>
                        <a href="php/getPdfTransact.php?patid=<?= $patient_info["patient_id"] ?> " target="_blank"><button class="finsearch">Download Report</button></a>
                        <div class="pics pic3">
                            <span class="material-icons-sharp">
                                payments
                            </span>
                            <span>Total Deposit</span>
                            <h2>&#8358;<?= number_format($deposits, 2) ?></h2>
                        </div>
                        <div class="pics pic2">
                            <span class="material-icons-sharp">
                                payments
                            </span>
                            <span>Total Debt</span>
                            <h2>&#8358;<?= number_format($debts, 2) ?></h2>
                        </div>

                    </div>

                </div>

                <p>Transaction records</p>
                <div class="records">



                    <div class="headTransrecord">
                        <div class="transID">
                            <h3>TRANSACTION ID</h3>
                        </div>
                        <div class="transID">
                            <h3>SERVICE</h3>
                        </div>
                        <div class="transID">
                            <h3>AMOUNT PAID</h3>
                        </div>
                        <div class="transID">
                            <h3>AMOUNT REMAINING</h3>
                        </div>
                        <div class="transID">
                            <h3>DATE OF TRANSACTION</h3>
                        </div>
                    </div>

                    <!-- <div id="wrapup">
                    </div> -->

                </div>
                <div id="wrapuppop">
                    <?php while ($result8 = mysqli_fetch_assoc($sql8)) : ?>
                        <div class="record">
                            <div class="transrecords">
                                <div class="transrecord">
                                    <p><?= $result8['id'] ?></p>
                                </div>
                                <div class="transrecord">
                                    <p><?= $result8['payment_for'] ?></p>
                                </div>
                                <div class="transrecord">&#8358;<?= number_format($result8['deposited_amount'], 2) ?></div>
                                <div class="transrecord">&#8358;<?= number_format($result8['remaining_amount'], 2) ?></div>
                                <div class="transrecord"><?= $result8['date_of_transaction'] ?></div>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
            <!-- FINANCIAL RECORD OF PATIENT -->


            <!-- EDD CALCULATOR -->
            <div id="eddcalculator">
                <h1>Estimated Delivery Date Calculator</h1>
                <p>Calculate your Estimated Delivery Date and also get updated Gestation period. This allows for better care and preparation.</p>

                <div class="eddform">
                    <form action="">
                        <div class="row50">
                            <label for="lastname">First day of last menstrual period<input type="date" id="folm"></label>
                            <label for="lastname">Conception date<input type="text" id="concept" readonly></label>
                        </div>
                        <div class="row50">
                            <label for="lastname">Estimated Due Date<input type="text" name="" id="edd_cak" readonly></label>
                            <label for="lastname">Gestational Age <input type="text" name="" id="gestage" readonly></label>
                        </div>
                        <!-- <input type="submit" value="Record EDD"> -->
                    </form>
                </div>
            </div>
            <!-- EDD CALCULATOR -->

            <!-- NEW APPOINTMENT FOR PATIENT -->
            <div id="newappointment">
                <h1>Book Appointment with a Doctor</h1>
                <p>Make new appointment schedule with your Doctor and get to see them on the day and time you picked. You will receive an email confirming this booking.</p>

                <div class="appointform">
                    <form action="" method="post" id="patient_app">
                        <div class="row20">
                            <label for="doctor">Choose Doctor you want to book<select name="doctor" id="doctor">
                                    <option value=""> Choose your Doctor </option>
                                    <?php while ($result3 = mysqli_fetch_assoc($sql3)) : ?>
                                        <option value="<?= $result3['firstname'] ?>"> Doctor <?= $result3['firstname'] ?> </option>
                                    <?php endwhile ?>
                                </select>
                            </label>
                        </div>
                        <div class="row21">
                            <label for="date" class="date">Choose Date for Appointment<input type="date" name="appdate"></label>

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
                            <label for="lastname">Add Note or Comment on the Appointment <textarea name="comment" cols="30" rows="5"></textarea></label>
                        </div>

                        <input type="submit" value="Book Appointment" id="patient_appBtn">
                    </form>
                </div>
            </div>
            <!-- NEW APPOINTMENT FOR PATIENT -->
        </div>
    </main>

    <script src="scripts/theme_toggle.js"></script>
    <script src="scripts/patient-nav.js"></script>
    <script src="scripts/patient_self_update.js"></script>
    <script src="scripts/edd_calculator.js"></script>
    <script src="scripts/patient_add_appointment.js"></script>
    <script src="scripts/filter_medical_record.js"></script>
</body>