<?php
include "includes/head1.php";
?>

<div class="main main2">
    <div class="bg-big">
        <img src="img_resource/contact.jpg" alt="">
        <div class="textwrap">
            <div class="text-on-img">
                <h1>CONTACT US AT NHMH</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, a ullam? Temporibus, eligendi facilis!</p>
            </div>
        </div>
        <div class="cover_up"></div>
    </div>
    <div class="contact-wrap">
        <div class="contact-container">
            <div class="contacts">
                <div class="contact">

                    <span class="material-icons-sharp">
                        phone
                    </span>
                    <div class="contact-info">
                        <p>Call us directly at</p>
                        <h3>+2348105029113</h3>
                        <small></small>
                    </div>
                </div>
                <div class="contact">
                    <span class="material-icons-sharp">
                        fmd_good
                    </span>
                    <div class="contact-info">
                        <p>Visit NHMH at</p>
                        <h3>D29 LEJINA ESTATE ADAMO IKORODU. LAGOS STATE.</h3>
                        <small></small>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <h2>Send us a message</h2>
                <p>For enquiry on our services or you want advice from one of our physicians. Fill the form below.</p>
                <form action="" method="post" id="enquiryform">
                    <div class="comment_error">
                        <p class="comment_err">Error</p>
                    </div>
                    <div class="comment_success">
                        <p class="comment_succ">Error</p>
                    </div>
                    <label for="">
                        <p>Your Name</p>
                        <input type="text" name="enquirer">
                    </label>
                    <label for="">
                        <p>Your Email</p>
                        <input type="email" name="mail_enquirer">
                    </label>
                    <label for="">
                        <p>Your Message or Question</p>
                        <textarea name="enquire_msg" cols="30" rows="5"></textarea>
                    </label>
                    <input type="submit" value="Submit" id="enquirebtn">
                </form>
            </div>
        </div>
    </div>
</div>

<script src="scripts/add_enquiry.js"></script>