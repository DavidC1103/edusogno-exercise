<?php

session_start();
if ($_SESSION['logged'] !== true || !isset($_SESSION['logged'])) {
    header('location: login.html');
    exit;
}
var_dump($_SESSION['first_name']);
var_dump($_SESSION['email']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>Dashboard</h1>
    <p><?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></p>
    <a href="./php/logout.php">Logout</a>
</body>

</html>