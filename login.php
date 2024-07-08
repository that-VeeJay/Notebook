<?php
include(__DIR__ . '/templates/head.php');
require_once(__DIR__ . '/app/helpers/authentication.helper.php');
?>

<body>
    <div class="wrapper">
        <div class="card">
            <h1>LOGIN</h1>
            <hr>

            <?php
            flashMessage('errors');
            flashMessage('success');
            ?>

            <form action="./app/controllers/Login.controller.php" method="post">
                <input type="hidden" name="type" value="login">
                <!-- Email -->
                <div class="input-container">
                    <img class="icon" src="assets/envelope-solid.svg" alt="">
                    <input class="input" type="email" placeholder="Email" value="<?= htmlspecialchars($email_login); ?>" name="email">
                </div>
                <!-- Password -->
                <div class="input-container">
                    <img class="icon" src="assets/key-solid.svg" alt="">
                    <input class="input" type="password" placeholder="Password" name="password">
                    <img class="eye-toggle" src="assets/eye-solid.svg" alt="">
                </div>
                <!-- Forgot Password -->
                <a class="forgot-password" href="forgotPassword.php">Forgot Password?</a>
                <!-- Button -->
                <button class="register-button" type="submit">LOGIN</button>
                <p class="login">Not a member yet? <strong><a href="register.php">Register.</a></strong></p>
            </form>
        </div>
    </div>
</body>

</html>