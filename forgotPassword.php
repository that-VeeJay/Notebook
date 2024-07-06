<?php include(__DIR__ . '/templates/head.php') ?>

<body>
    <div class="wrapper">
        <div class="card">
            <h1 class="forgot-password-title">FORGOT PASSWORD</h1>
            <hr>
            <form action="#" method="">
                <!-- Member ID -->
                <div class="input-container">
                    <img class="icon" src="assets/id-card-clip-solid.svg" alt="">
                    <input class="input" type="email" placeholder="Member ID" name="email">
                </div>
                <!-- Email -->
                <div class="input-container">
                    <img class="icon" src="assets/envelope-solid.svg" alt="">
                    <input class="input" type="email" placeholder="Email" name="email">
                </div>
                <!-- Button -->
                <button class="register-button">SUBMIT</button>
                <p class="login">Back to <strong><a href="login.php">Login.</a></strong></p>
            </form>
        </div>
    </div>
</body>

</html>