<?php

session_start();
if ($_SESSION['logged'] !== true || !isset($_SESSION['logged'])) {
    header('location: login.html');
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Dashboard</title>
</head>

<body>
    <header>
        <img src="logo.svg" alt="Edusogno">
    </header>

    <main>
        <h1>Ciao <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?> ecco i tuoi Eventi</h1>

        <div class="container">
            <div class="todo">
                <h2>Nome evento</h2>
                <p>15-10-2022 15:00</p>
                <input type="submit" value="JOIN" id="submit">
            </div>
            <div class="todo">
                <h2>Nome evento</h2>
            </div>
            <div class="todo">
                <h2>Nome evento</h2>
            </div>
        </div>

        <a href="./php/logout.php" style="font-size: 25px; color:grey">Logout</a>
    </main>
    <script src="js/main.js"></script>
</body>

</html>