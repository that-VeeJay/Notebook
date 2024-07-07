<?php
include(__DIR__ . '/templates/reg_head.php');
require_once(__DIR__ . '/app/helpers/authentication.helper.php');
?>

<body>
    <div class="wrapper">
        <div class="card">
            <h1>Registration</h1>
            <hr>

            <?php
            flashMessage('errors');
            flashMessage('success');
            ?>

            <form action="./app/controllers/Registration.controller.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="type" value="register">
                <div class="first-row">
                    <div class="input-container">
                        <img src="assets/user-solid.svg" class="icon" alt="icon">
                        <input class="input" type="text" placeholder="First Name" value="<?php echo htmlspecialchars($first_name); ?>" name="first_name">
                    </div>
                    <div class="input-container">
                        <img src="assets/user-solid.svg" class="icon" alt="icon">
                        <input class="input" type="text" placeholder="Last Name" value="<?= htmlspecialchars($last_name); ?>" name="last_name">
                    </div>
                </div>
                <div class="second-row">
                    <div class="input-container">
                        <img src="assets/address-card-solid.svg" class="icon" alt="icon">
                        <input class="input" type="text" placeholder="Username" value="<?= htmlspecialchars($username); ?>" name="username">
                    </div>
                    <div class="input-container">
                        <img src="assets/envelope-solid.svg" class="icon" alt="icon">
                        <input class="input" type="email" placeholder="Email" value="<?= htmlspecialchars($email); ?>" name="email">
                    </div>
                </div>
                <div class="third-row">
                    <div class="input-container">
                        <img src="assets/key-solid.svg" class="icon" alt="icon">
                        <input class="input" type="password" placeholder="Password" value="<?= htmlspecialchars($password); ?>" name="password">
                        <img class="eye-toggle-confirm" src="assets/eye-solid.svg" alt="">
                    </div>
                    <div class="input-container">
                        <img src="assets/key-solid.svg" class="icon" alt="icon">
                        <input class="input" type="password" placeholder="Confirm Password" value="<?= htmlspecialchars($password); ?>" name="confirm_password">
                        <img class="eye-toggle-confirm" src="assets/eye-solid.svg" alt="">
                    </div>
                </div>
                <input id="file-upload" class="file-upload" type="file" accept="image/*" name="avatar">
                <button type="submit">SUBMIT</button>
            </form>
            <p>Already a member? <a href="login.php"><strong>Login.</strong></a></p>
        </div>
    </div>
</body>

</html>