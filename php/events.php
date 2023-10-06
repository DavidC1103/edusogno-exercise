<?php
session_start();
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header('location: login.php');
    exit;
}
include 'User.php';
include 'Event.php';

$fileName = '../users.json';
$jsonData = file_get_contents($fileName);
$usersData = json_decode($jsonData, true);

// Recupera l'email dell'utente loggato
$userEmail = $_SESSION['email'];
$userIndex = null;
$loggedInUser = null;
foreach ($usersData as $key => $userData) {
    if ($userData['email'] === $userEmail) {
        $loggedInUser = new User($userData);
        $userIndex = $key; // Salva l'indice dell'utente loggato
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);

    $eventId = uniqid();
    if ($loggedInUser !== null) {
        // Crea un nuovo oggetto Event utilizzando i dati del form
        $newEventData = [
            'id' => $eventId,
            'title' => $_POST['title'],
            'partecipants' => $_POST['partecipants'],
            'description' => $_POST['description'],
        ];
        $newEvent = new Event($newEventData);

        // Aggiungi il nuovo evento all'utente loggato
        if ($newEvent instanceof Event) {
            $loggedInUser->addEvent($newEvent);
            echo 'è un istanza';
        } else {
            // Gestire l'errore o fare il debug qui, ad esempio:
            echo "L'oggetto non è un'istanza di Event.";
        }


        // Aggiorna il file JSON con i dati aggiornati
        $usersData[$userIndex]['events'][] = $newEvent->getEventData();
    }
}

$newJsonData = json_encode($usersData);

file_put_contents($fileName, $newJsonData);

header('location: ../admin.php');
