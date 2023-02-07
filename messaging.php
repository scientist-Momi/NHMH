<?php

include_once "includes/dash-head.php";
// include_once "doctor-dash.php";

if (!isset($_GET['staff_uid'])) {
    header("location: index.php");
}

$user_id = stripslashes($_GET['staff_uid']);
$sql = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$user_id'");
if (mysqli_num_rows($sql) > 0) {
    $staff_info = mysqli_fetch_assoc($sql);

    $sql10 = mysqli_query($conn, "select * from nhmh_staff_db where not unique_id = '$user_id' order by Staff_id");
} else {
    header("location: index.php");
}

?>

<body>
    <!-- MESSAGING -->

    <div class="messaging_wrapper">
        <h2 class="head">NHMH Messaging System</h2>
        <div class="messaging_list">
            <!-- <h1>NHMH Messaging System</h1> -->
            <div class="messaging_me">
                <!-- <span class="material-icons-sharp">
                    arrow_left
                </span> -->
                <img src="images/staff<?= $staff_info['photo'] ?>" alt="">
                <div class="me_details">
                    <h3><?= $staff_info['position'] ?> <?= $staff_info['firstname'] ?></h3>
                    <small><?= $staff_info['status'] ?></small>
                </div>
            </div>
            <div class="search">
                <span class="text">Select a user to start chat</span>
                <!-- <input type="text" placeholder="Enter name to search...">
                <button>
                    <span class="material-icons-sharp">
                        search
                    </span>
                </button> -->
            </div>
            <div class="messaging_others">
                <?php while ($result10 = mysqli_fetch_assoc($sql10)) : ?>

                    <?php
                    $outgoing_id = $staff_info['unique_id'];

                    $sql11 = mysqli_query($conn, "SELECT * FROM nhmh_internal_messages_db WHERE (incoming_msg_id = {$result10['unique_id']}
                OR outgoing_msg_id = {$result10['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1");

                    $row11 = mysqli_fetch_assoc($sql11);

                    (mysqli_num_rows($sql11) > 0) ? $result = $row11['message'] : $result = "No message available";
                    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

                    if (isset($row11['outgoing_msg_id'])) {
                        ($outgoing_id == $row11['outgoing_msg_id']) ? $you = "You: " : $you = "";
                    } else {
                        $you = "";
                    }


                    ?>
                    <a id="showmessage" data-unique="<?= $result10['unique_id'] ?>" class="gomessage">
                        <div class="messaging_other">
                            <img src="images/staff<?= $result10['photo'] ?>" alt="">
                            <div class="me_details">
                                <h3><?= $result10['position'] ?> <?= $result10['firstname'] ?></h3>
                                <p><?= $you . $msg ?></p>
                            </div>
                        </div>
                        <div class="status-dot">
                            <span class="material-icons-sharp <?= $result10['status'] ?>">
                                circle
                            </span>
                        </div>
                    </a>
                <?php endwhile ?>

            </div>
        </div>

        <div class="messaging_real">
            <header>
                <a class="back-icon">
                    <span class="material-icons-sharp">
                        arrow_back
                    </span>
                </a>
                <img src="4.png" alt="" id="indphoto">
                <div class="details">
                    <span id="indname">Lorem, ipsum.</span>
                    <p id="indstatus">active now</p>
                </div>
            </header>
            <div class="chat-box">
                <!-- <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="4.png" alt="">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur.</p>
                    </div>
                </div> -->
            </div>
            <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                <button id="sendMsg">
                    <span class="material-icons-sharp">
                        send
                    </span>
                </button>
            </form>
        </div>
    </div>
    <!-- MESSAGING -->

    <script src="scripts/chats_messaging.js"></script>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        //WORKING ON MESSAGING
        $('.gomessage').click(function() {

            unique_id = $(this).data("unique");

            $.ajax({
                url: 'php/chat_ui.php',
                type: 'post',
                data: {
                    unique_id: unique_id
                },
                dataType: 'html',
                success: function(response) {
                    $('.messaging_real').css("display", "block");
                    $('.messaging_list').css("display", "none");

                    var arrayDetails = $.parseJSON(response);

                    $('#indphoto').attr("src", "images/staff" + arrayDetails.image);

                    $('#indname').html(arrayDetails.position + ' ' + arrayDetails.fname);

                    $('#indstatus').html(arrayDetails.status);

                    $('.incoming_id').val(arrayDetails.unique);

                    // console.log(arrayDetails.unique);

                }
            });
        });

        $('.back-icon').click(function() {
            $('.messaging_real').css("display", "none");
            $('.messaging_list').css("display", "block");

            document.location.reload();
        });

    });
</script>