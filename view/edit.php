<?php
session_start();


if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header('location: ./loginScript.php');
    exit;
}


include '../php/Event.php';
include '../php/User.php';


$fileName = '../users.json';
$jsonData = file_get_contents($fileName);
$usersData = json_decode($jsonData, true);


$userEmail = $_SESSION['email'];
$userIndex = null;
$loggedInUser = null;

// Trova l'utente loggato nei dati dell'utente
foreach ($usersData as $key => $userData) {
    if ($userData['email'] === $userEmail) {
        $loggedInUser = new User($userData);
        $userIndex = $key; // Salva l'indice dell'utente loggato
    }
}

$selectedEvent = null;
// Verifica se è stato passato un parametro "event_id" nell'URL
if (isset($_GET['event_id'])) {
    $eventID = $_GET['event_id'];

    // Cerca l'evento corrispondente nell'utente loggato
    foreach ($_SESSION['events'] as $event) {
        if (isset($event['id']) && $event['id'] == $eventID) {
            $selectedEvent = $event;
            $eventName = $event['title'];
            $eventpartecipants = $event['partecipants'];
            $eventDescription = $event['description'];
        }
    }
    if ($selectedEvent === null) {
        echo "L'evento con ID $eventID non è stato trovato.";
    }
}
var_dump($selectedEvent);
var_dump($_GET['event_id']);
var_dump($eventID);
var_dump($eventName);
var_dump($eventpartecipants);
var_dump($eventDescription);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <img src="../logo.svg" alt="Edusogno">
    </header>

    <main>

        <h1>Nome evento: <em><?php echo $eventName ?></em></h1>


        <div class="container">


            <a href="../php/logout.php" style="font-size: 25px; color:grey;">Logout</a>
            <a href="create.php">prova</a>
        </div>

    </main>

    <script src="../js/main.js"></script>
</body>

</html>