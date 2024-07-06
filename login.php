<?php include(__DIR__ . '/templates/head.php') ?>

<body>
    <div class="wrapper">
        <div class="card">
            <h1>LOGIN</h1>
            <hr>
            <form action="#" method="">
                <!-- Email -->
                <div class="input-container">
                    <i class="fa-solid fa-envelope"></i>
                    <input class="input" type="email" placeholder="Email" name="email">
                </div>
                <!-- Password -->
                <div class="input-container">
                    <i class="fa-solid fa-key"></i>
                    <input class="input" type="password" placeholder="Password" name="password">
                    <img class="eye-toggle" src="assets/eye-solid.svg" alt="">
                </div>
                <!-- Button -->
                <button class="register-button">LOGIN</button>
                <p class="login">Not a member yet? <strong><a href="register.php">Register.</a></strong></p>
            </form>
        </div>
    </div>
</body>

</html>