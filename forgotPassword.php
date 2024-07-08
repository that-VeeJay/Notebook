<?php
require(__DIR__ . '/config/constants.php');

require(BASE_PATH . 'templates/head.php');
require(BASE_PATH . 'app/helpers/authentication.helper.php');

if (isset($_SESSION['loggedIn-user'])) {
    header('Location: ' . ROOT_URL . 'app/views/user/homepage.php');
    exit();
} elseif (isset($_SESSION['loggedIn-admin'])) {
    header('Location: ' . ROOT_URL . 'app/views/admin/homepage.php');
    exit();
}


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