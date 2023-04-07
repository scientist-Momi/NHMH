<?php

session_start();
include_once "db_connector.php";

// Getting all inputs from form
$title = stripslashes($_POST['ptitle']);
$author = stripslashes($_POST['pauthor']);
$body = stripslashes($_POST['pbody']);
$avatar =  $_FILES['avatar'];

// Check if fields are empty
if (empty($title)) {
    echo "Title field cannot be empty.";
} elseif (empty($author)) {
    echo "Add the Author of the post.";
} elseif (empty($body)) {
    echo "Add the contents of the post.";
} elseif (!$avatar['name']) {
    echo "Please add a thumbnail for post.";
} else {

    // To work on uploading photo
    $affix = "nhmh";
    $avatar_name = $affix . $avatar['name'];
    $avatar_tmp_name = $avatar['tmp_name'];
    $avatar_destination_path = '../images/blog_posts/post' . $avatar_name;

    // make sure file is an image
    $allowed_files = ['png', 'jpg', 'jpeg'];
    $extension = explode('.', $avatar_name);
    $extension = end($extension);

    if (in_array($extension, $allowed_files)) {
        //make sure image is not too large
        if ($avatar['size'] < 2000000) {
            // to check if file already exists
            if (file_exists($avatar_destination_path)) {
                echo "Sorry, file already exist";
            } else {
                // upload avatar
                if (!move_uploaded_file($avatar_tmp_name, $avatar_destination_path)) {
                    echo "Thumbnail failed to upload";
                } else {

                    $today = date("Y-m-d");

                    $publish_date = date('F j, Y', strtotime($today));

                    // echo "$publish_date";

                    // insert inputs into database
                    $sql1 = mysqli_query($conn, "insert into nhmh_blogposts_db (post_title,post_author,publish_date,content,post_photo) values('$title', '$author', '$publish_date', '$body', '$avatar_name') ");

                    if ($sql1) {

                        echo "Successful";
                    } else {
                        echo "An error occurred.";
                    }
                }
            }
        } else {
            echo "File size is too big. Should be less than 2mb.";
        }
    } else {
        echo "File should be png, jpg or jpeg.";
    }
}
