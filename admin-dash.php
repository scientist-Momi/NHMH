<?php
include "includes/dash-head.php";

if (!isset($_SESSION['staff_uid'])) {
    header("location: index.php");
}

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

    // counting the number of patients and getting their record
    $sql3 = mysqli_query($conn, "select * from nhmh_patient_db");
    $patcount = mysqli_num_rows($sql3);

    // counting the number of patients and getting their record
    $sql5 = mysqli_query($conn, "select * from nhmh_patient_db");
    // $patcount = mysqli_num_rows($sql3);

    // getting user log
    $sql6 = mysqli_query($conn, "select * from nhmh_users_log order by id desc");

    $sql7 = mysqli_query($conn, "select sum(remaining_amount) as debts from nhmh_patient_accounts_db");
    $sql7array = mysqli_fetch_array($sql7);
    $debts = $sql7array['debts'];

    $sql90 = mysqli_query($conn, "select * from nhmh_contact_form_db ");
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
                    <small>Admin</small>
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
                    <a class="close-message2">
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
                        <p class="notif2">Do you really want to delete this record. This action can not be undone.</p>
                    </div>
                    <div class="notifier_btn">
                        <button id="stop">Cancel</button>
                        <button id="delete">Delete</button>
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
                <a id="addstaff">
                    <span class="material-icons-sharp">
                        person_add
                    </span>
                    <h3>Add New Staff</h3>
                </a>
                <a id="allmystaff">
                    <span class="material-icons-sharp">
                        people_alt
                    </span>
                    <h3>All Staff Record</h3>
                </a>
                <a id="allpat">
                    <span class="material-icons-sharp">
                        people_alt
                    </span>
                    <h3>All Patient Record</h3>
                </a>
                <a id="enquire">
                    <span class="material-icons-sharp">
                        help_center
                    </span>
                    <h3>Comments and Enquiry</h3>
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
                <h1>Admin Dashboard</h1>
                <div class="displays">
                    <div class="left_display">
                        <div class="welcome-msg">
                            <h2>Good Day, Admin <span><?= $staff_info["firstname"] ?> <?= $staff_info["lastname"] ?></span>.</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore sit consequuntur, neque non voluptatem ducimus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, quam?</p>
                        </div>
                        <div class="stats_display">
                            <h2>Hospital Statistics.</h2>
                            <div class="stats">
                                <div class="stat">
                                    <span class="material-icons-sharp">
                                        badge
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>Number of Staff</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1><?= $staffcount ?></h1>
                                        </div>
                                    </div>
                                    <small>
                                        <span class="material-icons-sharp" id="update1">update</span>
                                        Updated Today
                                    </small>
                                </div>
                                <div class="stat">
                                    <span class="material-icons-sharp span-pat">
                                        groups
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>Registered Patients</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1><?= $patcount ?></h1>
                                        </div>
                                    </div>
                                    <small>
                                        <span class="material-icons-sharp" id="update1">update</span>
                                        Updated Today
                                    </small>
                                </div>
                                <div class="stat">
                                    <span class="material-icons-sharp span-money">
                                        stacked_line_chart
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>Total Revenue</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1>&#8358;<?= number_format($debts) ?></h1>
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
                        <h2>Activity Log</h2>
                        <div class="activity_display" id="activity">

                            <?php include "php/display_user_log.php"; ?>
                            <!-- <div class="activity">
                                <span class="material-icons-sharp">
                                    login
                                </span>
                                <div class="activity-user">
                                    <h4>Matthew Hoser [10003]</h4>
                                    <small>Doctor</small>
                                </div>
                                <div class="activity-time">
                                    <h4>22:09</h4>
                                    <small>22-11-01</small>
                                </div>
                            </div>



                            <div class="activity logout">
                                <span class="material-icons-sharp">
                                    logout
                                </span>
                                <div class="activity-user">
                                    <h4>Selina Smith [10002]</h4>
                                    <small>Nurse</small>
                                </div>
                                <div class="activity-time">
                                    <h4>10:59</h4>
                                    <small>22-11-01</small>
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

                                <label for="oldpass">Enter your Old Password <input type="password" name="oldpass" readonly></label>

                                <label for="newpass">New Password <input type="password" name="uppassword" readonly></label>

                                <label for="connewpass">Confirm New Password <input type="password" name="upconpassword" readonly></label>
                            </div>

                        </div>
                        <input type="submit" value="Update Profile" class="submit" id="update">
                    </form>
                </div>
            </div>
            <!-- MY PROFILE PAGE -->

            <!-- ADD STAFF -->
            <div id="add_staff">
                <h1>Add New Staff Form</h1>
                <p>You can add new staff according to their position.</p>

                <div class="add-staff_page">
                    <form action="logic.php" method="post" id="add_staff_js">
                        <div class="row11">
                            <label for="position">Choose staff position<select name="position" id="position">
                                    <option value="Doctor"> Doctor </option>
                                    <option value="Nurse"> Nurse </option>
                                    <option value="Accountant"> Accountant </option>
                                    <option value="Blogger"> Blogger </option>
                                    <option value="Admin"> Admin </option>
                                </select>
                            </label>
                            <label for="firstname">Firstname <input type="text" name="fname" id="fname"></label>

                            <label for="lastname">Lastname <input type="text" name="lname" id="lname"></label>

                            <label for="phone">Phone Number <input type="text" name="phone" id="phone"></label>

                            <label for="email">Email <input type="text" name="email" id="email"></label>

                            <label for="address">House Address <input type="text" name="address" id="address"></label>

                        </div>
                        <div class="row12">
                            <div class="gender">
                                <p>Choose staff Gender</p>
                                <label for="male">
                                    <input type="radio" name="gender" id="male" class="male" value="male">
                                    <span class="material-icons-sharp gent" id="alpha">
                                        man
                                    </span>
                                </label>

                                <label for="female">
                                    <input type="radio" name="gender" id="female" class="female" value="female">
                                    <span class="material-icons-sharp gent" id="beta">
                                        woman
                                    </span>
                                </label>
                            </div>
                            <div class="photo">
                                <p>Choose Preffered photo</p>
                                <input type="file" name="avatar" id="staffphoto" class="inputfile staff-data" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                                <label for="staffphoto" id="label2">Click to choose picture</label>
                            </div>
                        </div>
                        <input type="submit" value="Create Staff Profile" class="submit" id="addstaffbtn">
                    </form>
                </div>
            </div>
            <!-- ADD STAFF -->

            <!-- ALL STAFF RECORD -->
            <div id="allstaff">
                <h1>All Staff Record</h1>
                <p>List of all member of staff of NHMH.</p>
                <label for="search" class="searchlabel">Pick ID of Staff from the options below
                    <select name="stsearch_id" id="stsearch_id" class="search">
                        <option value="">Choose ID</option>
                        <?php while ($result4 = mysqli_fetch_assoc($sql4)) : ?>
                            <option value="<?= $result4['Staff_id'] ?>"> <?= $result4['Staff_id'] ?> </option>
                        <?php endwhile ?>
                    </select>

                </label>


                <div class="all-staff-page" id="all_staff">
                    <div id="optional_msg">
                        <span class="material-icons-sharp">
                            error
                        </span>
                        <p>No Search Result.</p>
                    </div>


                    <?php while ($result2 = mysqli_fetch_assoc($sql2)) { ?>
                        <div class="row20" id="delete-row-<?= $result2['Staff_id'] ?>">
                            <div class="row20a">
                                <label for="search">Staff ID<input type="text" name="" id="" value="<?= $result2['Staff_id'] ?>" readonly></label>
                                <label for="search">Staff Full Name<input type="text" name="" id="" value="<?= $result2['firstname'] ?> <?= $result2['lastname'] ?>" readonly></label>
                            </div>
                            <div class="row20a">
                                <label for="search">Staff Email<input type="text" name="" id="" value="<?= $result2['email'] ?>" readonly></label>
                                <label for="search">Staff Phone number<input type="text" name="" id="" value="<?= $result2['phone'] ?>" readonly></label>
                            </div>
                            <div class="row20a">
                                <label for="search">Staff Position<input type="text" name="" id="" value="<?= $result2['position'] ?>" readonly></label>
                                <label for="search">Start Date<input type="text" name="" id="" value="<?= $result2['created_at'] ?>" readonly></label>
                            </div>
                            <div class="row20a">
                                <label for="search">Staff House Address <textarea name="" id="" cols="20" rows="4" readonly><?= $result2['address'] ?></textarea></label>
                            </div>
                            <div class="row20a">
                                <img src="images/staff<?= $result2['photo'] ?>" alt="">
                            </div>
                            <div class="row20a del">
                                <button data-userid="<?= $result2['Staff_id'] ?>" class="remove" name="remove"><span class="material-icons-sharp">
                                        delete_forever
                                    </span></button>
                            </div>
                            <!-- <div class="row20a del">
                                <div id="delete" class="remove">Delete</div>
                            </div> -->

                        </div>
                    <?php } ?>

                </div>
            </div>
            <!-- ALL STAFF RECORD -->


            <!-- ALL PATIENT RECORD -->
            <div id="allpatient">
                <h1>All Patient Record</h1>
                <p>List of all Patients registered at NHMH.</p>
                <label for="search" class="searchlabel">Choose ID of Patient from options below
                    <select name="ptsearch_id" id="ptsearch_id" class="search">
                        <option value="">Choose Patient ID</option>
                        <?php while ($result5 = mysqli_fetch_assoc($sql5)) : ?>
                            <option value="<?= $result5['patient_id'] ?>"> <?= $result5['patient_id'] ?> </option>
                        <?php endwhile ?>
                        <!-- <option value="PAT20001"> PAT20001 </option>
                        <option value="PAT20002"> PAT20002 </option>
                        <option value="PAT20003"> PAT20003 </option>
                        <option value="PAT20003"> PAT20003 </option>
                        <option value="PAT20003"> PAT20003 </option> -->
                    </select>
                </label>


                <div class="all-staff-page all-pat-page" id="all_patient">
                    <?php while ($result3 = mysqli_fetch_assoc($sql3)) : ?>
                        <div class="row20">
                            <div class="row20a">
                                <label for="search">Patient ID<input type="text" name="" id="" value="<?= $result3['patient_id'] ?>" readonly></label>
                                <label for="search">Patient Full Name<input type="text" name="" id="" value="<?= $result3['firstname'] ?> <?= $result3['lastname'] ?>" readonly></label>
                            </div>
                            <div class="row20a">
                                <label for="search">Patient Email<input type="text" name="" id="" value="<?= $result3['email'] ?>" readonly></label>
                                <label for="search">Patient Phone number<input type="text" name="" id="" value="<?= $result3['phone'] ?>" readonly></label>
                            </div>
                            <div class="row20a">
                                <label for="search">Patient Age<input type="text" name="" id="" value="<?= $result3['age'] ?>" readonly></label>
                                <label for="search">Registered Date<input type="text" name="" id="" value="<?= $result3['created_at'] ?>" readonly></label>
                            </div>
                            <div class="row20a">
                                <label for="search">Patient House Address <textarea name="" id="" cols="20" rows="4" readonly><?= $result3['address'] ?>.</textarea></label>
                            </div>
                            <div class="row20a">
                                <img src="images/patient<?= $result3["photo"] ?>" alt="">
                            </div>
                            <!-- <div class="row20a del">
                                <button data-userid="<?= $result3['patient_id'] ?>" class="remove" name="remove">Delete</button>
                            </div> -->
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
            <!-- ALL PATIENT RECORD -->

            <!-- ALL ENQUIRY AND COMMENT -->
            <div id="showenquiry">
                <h1>All Comments and Enquiry </h1>
                <p>List of all comments and enquiry made through the contact form on the contact us page.</p>

                <div class="enquiry_wrapper">
                    <?php while ($result90 = mysqli_fetch_assoc($sql90)) : ?>
                        <div class="the_enquiry">
                            <div class="first_side">
                                <div class="enquire_msg">
                                    <p><?= $result90['enquiry'] ?></p>
                                </div>
                                <div class="enquire_details">
                                    <div class="enquire_detail">
                                        <span class="material-icons-sharp">
                                            person
                                        </span>
                                        <p><?= $result90['name'] ?></p>
                                    </div>
                                    <div class="enquire_detail">
                                        <span class="material-icons-sharp">
                                            mail
                                        </span>
                                        <p><?= $result90['email'] ?></p>
                                    </div>
                                    <div class="enquire_detail">
                                        <span class="material-icons-sharp">
                                            calendar_month
                                        </span>
                                        <p><?= $result90['date'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="sec_side">
                                <button class="enqid" data-enqid="
                                    <span class="material-icons-sharp">
                                        reply
                                    </span>
                                </button>
                            </div> -->
                        </div>
                    <?php endwhile ?>

                </div>
            </div>
            <!-- ALL ENQUIRY AND COMMENT -->

        </div>
    </main>
    <script src="scripts/theme_toggle.js"></script>
    <script src="scripts/admin-nav.js"></script>
    <script src="scripts/add_staff.js"></script>
    <script src="scripts/staff_profile_update.js"></script>
    <script src="scripts/get_staff_profile.js"></script>
    <script src="scripts/get_patient_profile.js"></script>
    <!-- <script src="scripts/delete_staff.js"></script> -->
    <!-- <script src="scripts/refresh.js"></script> -->
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        // var delete_id = $('.remove').data('userid');

        $('.remove').click(function() {

            delete_id = $(this).data("userid");

            $('.notifier').css("display", "grid");
            $('.notif').html("DELETE STAFF " + delete_id);
            $('.notif2').html("Do you really want to delete this record. This action can not be undone. ");

        });

        $('.enqid').click(function() {

            enq_id = $(this).data("enqid");

            $('.notifier').css("display", "grid");
            $('.notif').html("DELETE STAFF " + enq_id);

        });

        $('#delete').click(function() {
            // var delete_id2 = $('.remove').data("userid");

            $('.notifier').css("display", "none");

            // alert(delete_id);
            $.ajax({
                url: 'php/delete_staff.php',
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

        });

        setInterval(function() {
            // $('#activity').load(window.location.href + " #activity");
            $('.right_display').load(window.location.href + " .right_display");
        }, 5000);

    });
</script>