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
    <a href="../admin.php" class="back">Torna alla Dashboard</a>
    <main>
        <h1>Crea un nuovo Evento!</h1>
        <form action="../php/events.php" method="POST">
            <label for="title">Titolo dell'evento</label>
            <input type="text" name="title" id="title" required>

            <label for="partecipants">Partecipanti dell'evento</label>
            <input type="text" name="partecipants" id="partecipants" required>

            <label for="description">Descrizione dell'evento</label>
            <textarea type="text" name="description" id="description" style="height: 200px; margin-bottom: 20px" required></textarea>


            <input type="submit" value="Aggiungi" id="btnSub">

        </form>

    </main>
    <script src="../js/main.js"></script>
</body>

</html>