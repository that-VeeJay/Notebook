<?php include(__DIR__ . '/templates/reg_head.php') ?>

<body>
    <div class="wrapper">
        <div class="card">
            <h1>Registration</h1>
            <hr>
            <form action="#" method="post">
                <div class="first-row">
                    <div class="input-container">
                        <img src="assets/user-solid.svg" class="icon" alt="icon">
                        <input class="input" type="text" placeholder="First Name">
                    </div>
                    <div class="input-container">
                        <img src="assets/user-solid.svg" class="icon" alt="icon">
                        <input class="input" type="text" placeholder="Last Name">
                    </div>
                </div>
                <div class="second-row">
                    <div class="input-container">
                        <img src="assets/address-card-solid.svg" class="icon" alt="icon">
                        <input class="input" type="text" placeholder="Username">
                    </div>
                    <div class="input-container">
                        <img src="assets/envelope-solid.svg" class="icon" alt="icon">
                        <input class="input" type="text" placeholder="Email">
                    </div>
                </div>
                <div class="third-row">
                    <div class="input-container">
                        <img src="assets/key-solid.svg" class="icon" alt="icon">
                        <input class="input" type="password" placeholder="Password">
                        <img class="eye-toggle-confirm" src="assets/eye-solid.svg" alt="">
                    </div>
                    <div class="input-container">
                        <img src="assets/key-solid.svg" class="icon" alt="icon">
                        <input class="input" type="password" placeholder="Confirm Password">
                        <img class="eye-toggle-confirm" src="assets/eye-solid.svg" alt="">
                    </div>
                </div>
                <input id="file-upload" class="file-upload" type="file" accept="image/*">
                <button>SUBMIT</button>
            </form>
            <p>Already a member? <a href="login.php"><strong>Login.</strong></a></p>
        </div>
    </div>
</body>

</html>