<?php
include(__DIR__ . '/templates/head.php');
require_once(__DIR__ . '/app/helpers/authentication.helper.php');
?>

<body>
    <div class="wrapper">
        <div class="card">
            <h1 class="change-password-title">CHANGE PASSWORD</h1>
            <hr>

            <?php
            flashMessage('errors');
            ?>

            <form action="./app/controllers/PasswordRecovery.cont.php" method="post">
                <input type="hidden" name="type" value="reset">
                <!-- Password -->
                <div class="input-container">
                    <img class="icon" src="assets/key-solid.svg" alt="">
                    <input class="input" type="password" placeholder="New Password" name="new_password">
                    <img class="eye-toggle" src="assets/eye-solid.svg" alt="">
                </div>
                <!-- Password -->
                <div class="input-container">
                    <img class="icon" src="assets/key-solid.svg" alt="">
                    <input class="input" type="password" placeholder="Confirm Password" name="confirm_password">
                    <img class="eye-toggle" src="assets/eye-solid.svg" alt="">
                </div>
                <!-- Button -->
                <button class="register-button type=" submit">SUBMIT</button>
            </form>
        </div>
    </div>
</body>

</html>