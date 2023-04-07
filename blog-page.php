<?php
include "includes/head1.php";

$post_id = stripslashes($_GET['id']);

$guest_ip = $_SERVER['REMOTE_ADDR'];
if (isset($guest_ip)) {
    $today = date("Y-m-d");
    $todaytime = date("H:i");

    $publish = date('F j, Y.', strtotime($today));

    $post_time = $publish . " " . $todaytime;

    $sql125 = mysqli_query($conn, "insert into nhmh_blog_visits_db (visitor_ip, visit_date, post_id) values ('$guest_ip', '$post_time', '$post_id')");
}



$sql = mysqli_query($conn, "select * from nhmh_blogposts_db where post_id = '$post_id' ");

$sql1 = mysqli_query($conn, "select * from nhmh_blogposts_db where not post_id = '$post_id' ");

$sql2 = mysqli_query($conn, "select * from nhmh_posts_comment_db where post_id = '$post_id' order by comment_id desc ");

$sql_array = mysqli_fetch_assoc($sql);
?>

<div class="main">
    <div class="width-control1">
        <div class="blog_head">
            <p>NHMH PREGNANCY BLOG POST.</p>
            <h1>
                <!-- post_title -->
                <?= $sql_array['post_title'] ?>
            </h1>
            <p class="who">BY: <?= $sql_array['post_author'] ?></p>
            <p class="who"><?= $sql_array['publish_date'] ?>.</p>
        </div>
        <div class="blog_body">
            <img src="images/blog_posts/post<?= $sql_array['post_photo'] ?>" alt="">
            <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam itaque velit quos neque alias quae.</h3>
            <p><?= $sql_array['content'] ?></p>
        </div>
        <h2 class="breaker">You may also like to view</h2>
        <div class="related_posts">
            <!-- <h2>Related posts</h2> -->
            <?php while ($result1 = mysqli_fetch_assoc($sql1)) : ?>
                <a href="blog-page.php?id=<?= $result1['post_id'] ?>" target="_blank">
                    <div class="blog">
                        <img src="images/blog_posts/post<?= $result1['post_photo'] ?>" alt="">
                        <div class="blog_details">
                            <h3><?= $result1['post_title'] ?></h3>
                            <p><?= $result1['publish_date'] ?></p>
                        </div>
                    </div>
                </a>
            <?php endwhile ?>

        </div>


    </div>
    <div class="comments">
        <div class="add_comment">
            <h2>Add a comment or contribution to the blog</h2>
            <form action="" method="post" id="addcomment">
                <div class="comment_error">
                    <p class="comment_err">Error</p>
                </div>
                <div class="comment_success">
                    <p class="comment_succ">Error</p>
                </div>
                <label for="">
                    <p>Your Name</p>
                    <input type="text" name="commentname" placeholder="Your name" id="commentname">
                    <input type="text" name="postID" value="<?= $post_id ?>" hidden>
                </label>
                <label for="">
                    <p>Comment or Contribution</p>
                    <textarea name="commentbody" cols="30" rows="5" id="commentbody"></textarea>
                </label>
                <input type="submit" value="Post Comment" id="addcommentbtn" data-postid="<?= $post_id ?>">
            </form>
        </div>
        <div class="view_comments" id="view_comments12">
            <h2>Comments and contributions on this post.</h2>
            <div class="comment_wrap">
                <?php while ($result2 = mysqli_fetch_assoc($sql2)) : ?>
                    <div class="comment">
                        <div class="comment_msg"><?= $result2['comment'] ?></div>
                        <div class="commenter">
                            <p><?= $result2['who_commented'] ?></p>
                            <small><?= $result2['comment_date'] ?></small>
                        </div>
                    </div>
                <?php endwhile ?>

            </div>
        </div>
    </div>
</div>

<script src="scripts/add_comment.js"></script>