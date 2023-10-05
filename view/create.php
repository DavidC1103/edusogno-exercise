<?php
session_start();
if ($_SESSION['logged'] !== true || !isset($_SESSION['logged'])) {
    header('location: login.html');
    exit;
}
var_dump($_SESSION['logged'])
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Create</title>
</head>

<body>
    <header>
        <img src="logo.svg" alt="Edusogno">
    </header>
    <main>
        <h1>Crea un nuovo Evento!</h1>
        <form action="../php/events.php" method="POST">
            <label for="title">Inserisci il titolo</label>
            <input type="text" name="title" id="title">

            <label for="partecipants">Inserisci il numero di partecipanti</label>
            <input type="text" name="partecipants" id="partecipants">

            <label for="email">Inserisci una descrizione</label>
            <input type="text" name="description" id="description">

            <input type="submit" value="Aggiungi" id="submit">

        </form>

        <a href="../admin.php">aaa</a>
    </main>
    <script src="../js/main.js"></script>
</body>

</html>