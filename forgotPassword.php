<?php
include(__DIR__ . '/templates/head.php');
require_once(__DIR__ . '/app/helpers/authentication.helper.php');

?>

<body>
    <div class="wrapper">
        <div class="card">
            <h1 class="forgot-password-title">FORGOT PASSWORD</h1>
            <hr>

            <?php
            flashMessage('errors');
            ?>

            <form action="./app/controllers/PasswordRecovery.cont.php" method="post">
                <input type="hidden" name="type" value="recover">
                <!-- Email -->
                <div class="input-container">
                    <img class="icon" src="assets/envelope-solid.svg" alt="">
                    <input class="input" type="email" placeholder="Email" name="email">
                </div>
                <!-- Button -->
                <button class="register-button" type="submit">SEND</button>
                <p class="login">Back to <strong><a href="login.php">Login.</a></strong></p>
            </form>
        </div>
    </div>
</body>

</html>