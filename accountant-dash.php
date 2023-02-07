<?php
include "includes/dash-head.php";
include "includes/stats3.php";

if (!isset($_SESSION['staff_uid'])) {
    header("location: index.php");
}

if (isset($_SESSION['patientsearched'])) {
    $patientsearched = $_SESSION['patientsearched'];
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
                    <small>Accountant</small>
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
                            payments
                        </span>
                    </div>
                    <div class="notifier_msg">
                        <h3 class="notif">Clear Debt</h3>
                        <form action="" method="post">
                            <label for="">
                                <p>Amount to clear(&#8358;)</p>
                                <input type="text" name="clearamount" readonly class="notif2">
                            </label>
                        </form>
                    </div>
                    <div class="notifier_btn">
                        <button id="stop">Cancel</button>
                        <button id="delete">Pay Now</button>
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
                    <small>Accountant</small>
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
                <a id="search4patient">
                    <span class="material-icons-sharp">
                        person_search
                    </span>
                    <h3>Check Patients Profile</h3>
                </a>
                <a id="addaccountBtn">
                    <span class="material-icons-sharp">
                        add_card
                    </span>
                    <h3>Record Payment for patient</h3>
                </a>
                <a id="show_finance">
                    <span class="material-icons-sharp">
                        manage_search
                    </span>
                    <h3>Check Patient Payment Record</h3>
                </a>
                <a id="upcoming">
                    <span class="material-icons-sharp">
                        queue
                    </span>
                    <h3>Upcoming Payments</h3>
                </a>
                <a id="showbillings">
                    <span class="material-icons-sharp">
                        list_alt
                    </span>
                    <h3>Services and Pricing</h3>
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
                <h1>Accountant Dashboard</h1>
                <div class="displays">
                    <div class="left_display">
                        <div class="welcome-msg">
                            <h2>Good Day, Accountant <span><?= $staff_info["firstname"] ?> <?= $staff_info["lastname"] ?></span>.</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore sit consequuntur, neque non voluptatem ducimus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, quam?</p>
                        </div>
                        <div class="stats_display">
                            <h2>Hospital Statistics.</h2>
                            <div class="stats">
                                <div class="stat">
                                    <span class="material-icons-sharp span-money">
                                        stacked_line_chart
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>Monthly Revenue</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1>&#8358;<?= number_format($mdeposits) ?></h1>
                                        </div>
                                    </div>
                                    <small>
                                        <span class="material-icons-sharp" id="update1">update</span>
                                        Updated Today
                                    </small>
                                </div>
                                <div class="stat">
                                    <span class="material-icons-sharp span-pat">
                                        add_card
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>Account Receivable</h3>
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
                                <div class="stat">
                                    <span class="material-icons-sharp span-money">
                                        stacked_line_chart
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>All Time Revenue</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1>&#8358;<?= number_format($deposits) ?></h1>
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

                                <label for="oldpass">Enter your Old Password <input type="password" name="oldpass"></label>

                                <label for="newpass">New Password <input type="password" name="uppassword"></label>

                                <label for="connewpass">Confirm New Password <input type="password" name="upconpassword"></label>
                            </div>

                        </div>
                        <input type="submit" value="Update Profile" class="submit" id="update">
                    </form>
                </div>
            </div>
            <!-- MY PROFILE PAGE -->

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

            <!-- ADD PATIENT ACCOUNT -->
            <div id="addaccount">
                <h1>New account for patient.</h1>
                <p>Create new financial account for new or returning patient.</p>

                <form action="" method="post" id="addmoneyForm">

                    <!-- one -->
                    <div id="formOne">
                        <label for="">
                            <p>Input ID of patient</p>
                            <div class="verifier">
                                <input type="text" name="patientID" id="patientinput" placeholder="Input ID of patient">

                                <span class="material-icons-sharp verified">
                                    done
                                </span>
                                <span class="material-icons-sharp unverified">
                                    error_outline
                                </span>

                            </div>

                        </label>

                        <label for="">
                            <p>Choose Service to render</p>
                            <select name="service" id="accService">
                                <option value="">Choose service needed</option>
                                <?php while ($result9 = mysqli_fetch_assoc($sql9)) : ?>
                                    <option value="<?= $result9['service_name'] ?>"><?= $result9['service_name'] ?></option>
                                <?php endwhile ?>
                            </select>
                        </label>
                    </div>

                    <!-- two -->
                    <div id="formTwo">
                        <label for="">
                            <p>Price of Service(&#8358;)</p>
                            <h2 id="price">50000</h2>
                        </label>
                        <label for="">
                            <p>Pay installmentally</p>
                            <select name="" id="inschoice">
                                <option value="">Choose option</option>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </label>
                    </div>

                    <!-- three -->
                    <div id="formThree">
                        <div>
                            <label for="">
                                <p>Down payment(&#8358;)</p>
                                <h2 id="downPrice">12500</h2>
                            </label>
                            <label for="">
                                <p>Deposit(&#8358;)</p>
                                <input type="number" name="deposit" id="">
                            </label>
                            <label for="">
                                <p>Choose Installment Plan</p>
                                <select name="planChoice" id="planChoice">
                                    <option value="">Choose installment plan</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </label>
                            <label for="">
                                <p>Mode of Payment</p>
                                <select name="modeofPay1">
                                    <option value="">Choose Mode of Payment</option>
                                    <option value="Cash">Cash</option>
                                    <option value="POS">POS</option>
                                    <option value="Transfer">Transfer</option>
                                </select>
                            </label>
                        </div>
                        <input type="submit" value="Get Installment" id="getInstallments">
                    </div>

                    <!-- four -->
                    <div id="formFour">
                        <div>
                            <label for="">
                                <p>Deposit(&#8358;)</p>
                                <input type="number" name="depmoney">
                            </label>
                            <label for="">
                                <p>Mode of Payment</p>
                                <select name="modeofPay">
                                    <option value="">Choose Mode of Payment</option>
                                    <option value="Cash">Cash</option>
                                    <option value="POS">POS</option>
                                    <option value="Transfer">Transfer</option>
                                </select>
                            </label>
                        </div>
                        <input type="submit" value="Add Record" id="addmoneyOne">
                    </div>

                    <!-- five -->
                    <div id="formFive">
                        <div>
                            <label for="" class="remain">
                                <p>Remaining Amount(&#8358;)</p>
                                <h2 class="remaining">12500</h2>
                            </label>

                            <label for="">
                                <p>Installment Plan</p>
                                <div class="plans">

                                </div>

                            </label>
                        </div>
                        <input type="submit" value="Save Payment " id="savePayment">
                    </div>
                </form>
            </div>
            <!-- ADD PATIENT ACCOUNT -->


            <!-- GET PATIENT FINANCIAL ACCOUNT -->
            <div id="patient_finance">
                <h1>Get to view the financial record of all patients.</h1>
                <p>Search for patients and see their total deposit and debts with NHMH.</p>

                <label for="search" class="searchlabel">Input ID or Name of Patient to Search
                    <input type="text" id="patient_detail" class="search">
                </label>

                <div class="patient_frecord">
                    <span class="material-icons-sharp">
                        error
                    </span>
                    <p>No Search Result.</p>

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
                </div>





            </div>
            <!-- GET PATIENT FINANCIAL ACCOUNT -->


            <!-- UPCOMING PAYMENT -->
            <div id="upcomingpays">
                <h1>All payment to be received this month.</h1>
                <p>List of all patient to remit their installment payment for services this month.</p>

                <div class="pays">
                    <div class="payhead">
                        <div>Patient Photo</div>
                        <div>Patient ID</div>
                        <div>Patient Name</div>
                        <div>Amount to be paid</div>
                        <div>Date to pay</div>
                        <div>Action</div>
                    </div>

                    <?php if (mysqli_num_rows($sql115) > 0) { ?>
                        <?php while ($result115 = mysqli_fetch_assoc($sql115)) : ?>

                            <?php
                            $id = $result115['patient_id'];
                            $sql116 = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$id' ");
                            $patient_data = mysqli_fetch_assoc($sql116);
                            ?>
                            <div class="pay" id="delete-row-<?= $result115['plan_id'] ?>">
                                <div><img src="images/patient<?= $patient_data['photo'] ?>" alt=""></div>
                                <div><?= $result115['patient_id'] ?></div>
                                <div><?= $patient_data['firstname'] ?> <?= $patient_data['lastname'] ?></div>
                                <div>&#8358;<?= number_format($result115['amount_to_pay'], 2); ?></div>
                                <div><?= $result115['date_to_pay'] ?></div>
                                <button data-userid="<?= $result115['plan_id'] ?>" data-transid="<?= $result115['transaction_id'] ?>" data-useramount="<?= number_format($result115['amount_to_pay'], 2) ?>" class="updebtBtn"><span class="material-icons-sharp">
                                        check_circle
                                    </span></button>
                            </div>
                        <?php endwhile ?>
                    <?php } else { ?>
                        <div class="optional">
                            <span class="material-icons-sharp">
                                error
                            </span>
                            <p>No Search Result.</p>
                        </div>

                    <?php } ?>
                </div>
            </div>
            <!-- UPCOMING PAYMENT -->


            <!-- ALL BILLINGS -->
            <div id="billings">
                <h1>NHMH services list</h1>
                <p>You can view and edit the name and prices of the services we offer.</p>

                <div class="operations">
                    <label for="">
                        <p>Search for service</p>
                        <input type="text" name="" id="">
                    </label>
                    <button id="addaservice">Add Service</button>
                    <button id="upService">Update Service</button>
                </div>

                <div class="billing_slide" id="serviceupform">
                    <div class="billing_head">
                        <h3>Service ID</h3>
                        <h3>Service Name</h3>
                        <h3>Service Price (&#8358;)</h3>
                        <h3>Service Description</h3>
                    </div>
                    <form action="" method="post" id="updateService">
                        <?php while ($result7 = mysqli_fetch_assoc($sql7)) : ?>

                            <label for=""><?= $result7['id'] ?></label>

                            <input type="text" readonly value="<?= $result7['service_name'] ?>">
                            <input type="text" readonly value="<?= number_format($result7['service_price']); ?>">
                            <input type="text" readonly value="<?= $result7['service_description'] ?>">

                        <?php endwhile ?>

                    </form>
                </div>

            </div>
            <!-- ALL BILLINGS -->


            <!-- ADD SERVICE  -->
            <div id="addservice">
                <span class="material-icons-sharp" id="closeaddservice">
                    close
                </span>
                <h2>Add a new service name and price</h2>
                <form action="" method="post" id="serviceform">
                    <label for="">
                        <p>Service Name:</p>
                        <input type="text" name="servename">
                    </label>
                    <label for="">
                        <p>Service Price (&#8358;):</p>
                        <input type="number" name="serveprice">
                    </label>
                    <label for="">
                        <p>Service Description:</p>
                        <textarea name="servedesc" cols="10" rows="5"></textarea>
                    </label>
                    <input type="submit" value="Add Service" id="serviceformBtn">
                </form>
            </div>
            <!-- ADD SERVICE  -->


            <!-- UPDATE SERVICE  -->
            <div id="upservice">
                <span class="material-icons-sharp" id="closeupservice">
                    close
                </span>
                <h2>Update services</h2>
                <label for="">
                    <p>Choose Record ID</p>
                    <select name="serveId" id="servesearch">
                        <option value="">Choose ID of service to update.</option>
                        <?php while ($result18 = mysqli_fetch_assoc($sql18)) : ?>
                            <option value="<?= $result18['id'] ?>"><?= $result18['id'] ?></option>
                        <?php endwhile ?>
                    </select>
                </label>
                <form action="" method="post" id="upserviceform">


                    <!-- <label for="">
                        <p>Service Name:</p>
                        <input type="text" name="servename">
                    </label>
                    <label for="">
                        <p>Service Price (&#8358;):</p>
                        <input type="number" name="serveprice">
                    </label>
                    <label for="">
                        <p>Service Description:</p>
                        <textarea name="servedesc" cols="10" rows="5"></textarea>
                    </label> -->
                    <!-- <input type="submit" value="Update Service" id="serviceformBtn"> -->
                </form>
            </div>
            <!-- UPDATE SERVICE  -->

        </div>
    </main>
    <script src="scripts/theme_toggle.js"></script>
    <script src="scripts/acc-nav.js"></script>
    <script src="scripts/acc_search_for_patient.js"></script>
    <script src="scripts/staff_profile_update.js"></script>
    <script src="scripts/add_service.js"></script>
    <script src="scripts/retrieve_service.js"></script>
    <script src="scripts/update_service.js"></script>
    <script src="scripts/retrieve_serveprice.js"></script>
    <script src="scripts/get_finance.js"></script>
    <script src="scripts/verify_patient_id.js"></script>
    <!-- <script src="scripts/getPdfTransact.js"></script> -->
    <!-- <script src="scripts/retrieve_installOne.js"></script> -->

</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        // var delete_id = $('.remove').data('userid');

        $('.updebtBtn').click(function() {

            delete_id = $(this).data("userid");
            user_Amount = $(this).data("useramount");
            trans_id = $(this).data("transid");

            $('.notifier').css("display", "grid");
            $('.notif').html("CLEAR DEBT ON PLAN ID " + delete_id);
            $('.notif2').val(user_Amount);

        });

        $('#delete').click(function() {
            // var delete_id2 = $('.remove').data("userid");

            $('.notifier').css("display", "none");

            // alert(delete_id);
            $.ajax({
                url: 'php/pay_debt.php',
                type: 'post',
                data: {
                    delete_id: delete_id,
                    user_Amount: user_Amount,
                    trans_id: trans_id
                },
                dataType: 'html',
                success: function(response) {
                    $('.success-message').css("display", "grid");
                    $('.succ').html(response);

                    // $('#delete-row-' + delete_id).remove();
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