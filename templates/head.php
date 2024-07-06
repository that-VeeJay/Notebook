<?php
// Sets title based on file name
function getPageTitle()
{
    $uri = $_SERVER["REQUEST_URI"];
    $uri = ltrim($uri, '/');
    $uri = str_replace('.php', '', $uri);
    $uri = ucfirst($uri);
    return $uri ?: 'Home';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= getPageTitle(); ?></title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Javascript -->
    <script src="js/script.js" defer></script>

</head>