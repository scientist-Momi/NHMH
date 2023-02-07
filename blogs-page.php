<?php
include "includes/head1.php";

$sql = mysqli_query($conn, "select * from nhmh_blogposts_db order by post_id desc");

?>

<div class="main">
    <h1 class="h1">Hospital Blog</h1>

    <div class="blog_wrap">
        <?php while ($result = mysqli_fetch_assoc($sql)) : ?>
            <?php
            $postID = $result['post_id'];
            $sql1 = mysqli_query($conn, "select * from nhmh_posts_comment_db where post_id = '$postID '");
            $comcount = mysqli_num_rows($sql1);

            $sql7 = mysqli_query($conn, "select * from nhmh_blog_visits_db where post_id = ' $postID ' ");
            $viewcount = mysqli_num_rows($sql7);

            ?>
            <a href="blog-page.php?id=<?= $result['post_id'] ?>" target="_blank">
                <div class="blog">
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
                    <img src="images/blog_posts/post<?= $result['post_photo'] ?>" alt="">
                    <div class="blog_details">
                        <h3><?= $result['post_title'] ?></h3>
                        <p><?= $result['publish_date'] ?>.</p>
                    </div>
                </div>
            </a>
        <?php endwhile ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.blog').hover(function() {
            $('.blog_stat').css("display", "flex");
        });

        $('.blog').mouseleave(function() {
            $('.blog_stat').css("display", "none");
        });

    });
</script>