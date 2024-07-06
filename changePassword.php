<?php include(__DIR__ . '/templates/head.php') ?>

<body>
    <div class="wrapper">
        <div class="card">
            <h1 class="change-password-title">CHANGE PASSWORD</h1>
            <hr>
            <form action="#" method="">
                <!-- Password -->
                <div class="input-container">
                    <i class="fa-solid fa-key"></i>
                    <input class="input" type="password" placeholder="New Password" name="password">
                    <img class="eye-toggle" src="assets/eye-solid.svg" alt="">
                </div>
                <!-- Password -->
                <div class="input-container">
                    <i class="fa-solid fa-key"></i>
                    <input class="input" type="password" placeholder="Confirm Password" name="password">
                    <img class="eye-toggle" src="assets/eye-solid.svg" alt="">
                </div>
                <!-- Button -->
                <button class="register-button">SUBMIT</button>
            </form>
        </div>
    </div>
</body>

</html>