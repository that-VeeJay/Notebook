<?php include(__DIR__ . '/templates/head.php') ?>

<body>
    <div class="wrapper">
        <div class="card">
            <h1>REGISTER</h1>
            <hr>
            <form action="#" method="">
                <!-- Username -->
                <div class="input-container">
                    <img class="icon" src="assets/user-solid.svg" alt="">
                    <input class="input" type="text" placeholder="Username" name="username">
                </div>
                <!-- Email -->
                <div class="input-container">
                    <img class="icon" src="assets/envelope-solid.svg" alt="">
                    <input class="input" type="email" placeholder="Email" name="email">
                </div>
                <!-- Password -->
                <div class="input-container">
                    <img class="icon" src="assets/key-solid.svg" alt="">
                    <input class="input" type="password" placeholder="Password" name="password">
                    <img class="eye-toggle" src="assets/eye-solid.svg" alt="">
                </div>
                <!-- Confirm Password -->
                <div class="input-container">
                    <img class="icon" src="assets/key-solid.svg" alt="">
                    <input class="input" type="password" placeholder="Confirm Password" name="confirm_password">
                    <img class="eye-toggle-confirm" src="assets/eye-solid.svg" alt="">
                </div>
                <!-- Button -->
                <button class="register-button">REGISTER</button>
                <p class="login">Already a member? <strong><a href="login.php">Login.</a></strong></p>
            </form>
        </div>
    </div>
</body>

</html>