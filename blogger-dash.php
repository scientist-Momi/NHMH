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
    $sql2 = mysqli_query($conn, "select * from nhmh_blogposts_db");
    $staffcount = mysqli_num_rows($sql2);

    // counting the number of staff and getting their information
    $sql4 = mysqli_query($conn, "select * from nhmh_blogposts_db");

    // counting the number of patients and getting their record
    $sql5 = mysqli_query($conn, "select * from nhmh_patient_db");
    // $patcount = mysqli_num_rows($sql3);

    // getting user log
    $sql6 = mysqli_query($conn, "select * from nhmh_users_log order by id desc");

    $sql8 = mysqli_query($conn, "select * from nhmh_blog_visits_db ");
    $totalviewcount = mysqli_num_rows($sql8);

    $sql9 = mysqli_query($conn, "select * from nhmh_posts_comment_db ");
    $totalcomm = mysqli_num_rows($sql9);
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
                    <small>Blogger</small>
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
                        <p>Do you really want to delete this record. This action can not be undone.</p>
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
                    <small>Blogger</small>
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
                        note_add
                    </span>
                    <h3>Add New Blog Post</h3>
                </a>
                <a id="allmystaff">
                    <span class="material-icons-sharp">
                        list_alt
                    </span>
                    <h3>All Blog Post</h3>
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
                <h1>Blogger Dashboard</h1>
                <div class="displays">
                    <div class="left_display">
                        <div class="welcome-msg">
                            <h2>Good Day, Blogger <span><?= $staff_info["firstname"] ?> <?= $staff_info["lastname"] ?></span>.</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore sit consequuntur, neque non voluptatem ducimus? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, quam?</p>
                        </div>
                        <div class="stats_display">
                            <h2>Blog Statistics.</h2>
                            <div class="stats">
                                <div class="stat">
                                    <span class="material-icons-sharp">
                                        note
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>Number of Posts</h3>
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
                                        question_answer
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>Total Blog Comments</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1><?= $totalcomm ?></h1>
                                        </div>
                                    </div>
                                    <small>
                                        <span class="material-icons-sharp" id="update1">update</span>
                                        Updated Today
                                    </small>
                                </div>
                                <div class="stat">
                                    <span class="material-icons-sharp span-money">
                                        visibility
                                    </span>
                                    <div class="middle">
                                        <div class="stat-name">
                                            <h3>Total Blog Views</h3>
                                        </div>
                                        <div class="stat-value">
                                            <h1><?= $totalviewcount ?></h1>
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
                        <!-- <h2>Activity Log</h2>
                        <div class="activity_display" id="activity">

                            
                             <div class="activity">
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
                            </div> 

                        </div> -->
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

            <!-- ADD POST -->
            <div id="add_staff">
                <h1>Add New Post Form</h1>
                <p>You can add new blog post.</p>

                <div class="add-staff_page add_blog_form">
                    <form action="logic.php" method="post" id="add_post_js">
                        <label for="">
                            <p>Post Title</p>
                            <input type="text" name="ptitle" id="ptitle">
                        </label>
                        <label for="">
                            <p>Article Author</p>
                            <input type="text" name="pauthor" id="pauthor">
                        </label>
                        <div class="photo">
                            <p>Post Thumbnail</p>
                            <input type="file" name="avatar" id="pphoto" class="inputfile staff-data" accept="image/x-png,image/gif,image/jpeg,image/jpg">
                            <label for="pphoto" id="label3">Click to choose picture</label>
                        </div>
                        <label for="">
                            <p>Body</p>
                            <textarea name="pbody" id="pbody" cols="30" rows="10"></textarea>
                        </label>
                        <input type="submit" value="Publish Post" class="submit" id="addpostbtn">
                    </form>
                </div>
            </div>
            <!-- ADD POST -->

            <!-- ALL BLOG POSTS -->
            <div id="allstaff">
                <h1>All Blog Posts</h1>

                <div class="all-staff-page all-blog" id="all_staff">
                    <div id="optional_msg">
                        <span class="material-icons-sharp">
                            error
                        </span>
                        <p>No Search Result.</p>
                    </div>

                    <?php while ($result4 = mysqli_fetch_assoc($sql4)) : ?>

                        <?php
                        $pID = $result4['post_id'];
                        $sql3 = mysqli_query($conn, "select * from nhmh_posts_comment_db where post_id = ' $pID ' ");
                        $comcount = mysqli_num_rows($sql3);

                        $sql7 = mysqli_query($conn, "select * from nhmh_blog_visits_db where post_id = ' $pID ' ");
                        $viewcount = mysqli_num_rows($sql7);


                        ?>
                        <div class="blog">
                            <img src="images/blog_posts/post<?= $result4['post_photo'] ?>" alt="">
                            <div class="blog_details">
                                <h3><?= $result4['post_title'] ?></h3>
                                <p><?= $result4['publish_date'] ?>.</p>
                            </div>
                            <div class="blog_stats">
                                <div class="blog_owner">
                                    <h4><?= $result4['post_author'] ?></h4>
                                    <!-- <img src="4.png" alt=""> -->
                                </div>
                                <div class="blog_stat">
                                    <div class="blog_stat1">
                                        <p><?= $comcount ?></p>
                                        <span class="material-icons-sharp">
                                            mode_comment
                                        </span>
                                    </div>
                                    <div class="blog_stat1">
                                        <p><?= $viewcount ?></p>
                                        <span class="material-icons-sharp">
                                            visibility
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>

                </div>
            </div>
            <!-- ALL BLOG POSTS -->

        </div>
    </main>
    <script src="scripts/theme_toggle2.js"></script>
    <script src="scripts/blogger-nav.js"></script>
    <script src="scripts/publish_posts.js"></script>
    <script src="scripts/staff_profile_update.js"></script>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        // var delete_id = $('.remove').data('userid');

        $('.remove').click(function() {

            delete_id = $(this).data("userid");

            $('.notifier').css("display", "grid");
            $('.notif').html("DELETE STAFF " + delete_id);

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