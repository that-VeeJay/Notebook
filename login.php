<?php include(__DIR__ . '/templates/head.php') ?>

<body>
    <div class="wrapper">
        <div class="card">
            <h1>LOGIN</h1>
            <hr>
            <form action="#" method="">
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
                <!-- Forgot Password -->
                <a class="forgot-password" href="forgotPassword.php">Forgot Password?</a>
                <!-- Button -->
                <button class="register-button">LOGIN</button>
                <p class="login">Not a member yet? <strong><a href="register.php">Register.</a></strong></p>
            </form>
        </div>
    </div>
</body>

</html>