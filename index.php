<?php
include "includes/head1.php";
?>

<!-- END OF NAVIGATION -->

<!-- MAIN -->
<div class="main">
    <div class="width-control main-section">
        <div class="left-side">

        </div>
        <div class="right-side">
            <div class="form-wrap">
                <h2>Sign In</h2>
                <small>Choose your position and input data.</small>
                <form action="logic/signin-logic.php" method="post">
                    <!-- <span class="error">
                        <span class="material-icons-sharp">
                            warning_amber
                        </span>
                    </span> -->
                    <!-- <span class="error">
                        <span class="material-icons-sharp">
                            warning_amber
                        </span>
                    </span> -->

                    <select name="position" id="position">
                        <option value="patient"> Patient </option>
                        <option value="staff"> Staff </option>
                    </select>
                    <input type="text" name="username" id="username" placeholder="Username">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                    <input type="submit" value="Sign In" id="submit" name="submit">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OF MAIN -->


<!-- FOOTER -->
<?php
include "includes/footer.php";
?>
<!-- END OF FOOTER -->


<script src="scripts/signin.js"></script>

<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function() {

        // toggle the icon
        togglePassword.classList.toggle("bi-eye");

        // toggle the type attribute
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    });
</script>
</body>

</html>