<?php
require(__DIR__ . '../../config/constants.php');

if (!isset($_SESSION['loggedIn-admin'])) {
    header('Location: ' . ROOT_URL . 'login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Welcome to ADMINS Homepage</h1>
    <a href="/logout.php">Logout</a>
</body>

</html>