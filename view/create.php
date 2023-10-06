<?php
session_start();

// Verifica se l'utente è loggato
if ($_SESSION['logged'] !== true || !isset($_SESSION['logged'])) {
    header('location: ../login.php');
    exit;
}


// Recupera l'utente loggato dalla sessione
$user = $_SESSION['user_data'];



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
        <img src="../logo.svg" alt="Edusogno">
    </header>
    <main>
        <h1>Crea un nuovo Evento!</h1>
        <form action="../php/events.php" method="POST">
            <label for="title">Titolo del primo evento</label>
            <input type="text" name="title" id="title" required>

            <label for="partecipants">Partecipanti del primo evento</label>
            <input type="text" name="partecipants" id="partecipants" required>

            <label for="description">Descrizione del primo evento</label>
            <input type="text" name="description" id="description" required>


            <input type="submit" value="Aggiungi" id="submit">

        </form>

        <a href="../admin.php">aaa</a>
    </main>
    <script src="../js/main.js"></script>
</body>

</html>