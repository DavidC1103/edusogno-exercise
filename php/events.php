<?php
session_start();
if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header('location: login.html');
    exit;
}
require_once 'UserEvent.php';

$fileName = '../users.json';
$jsonData = file_get_contents($fileName);
$usersData = json_decode($jsonData, true);

// Recupera l'email dell'utente loggato
$userEmail = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Trova l'utente loggato tra gli utenti
    $loggedInUser = null;
    foreach ($usersData as $key => $userData) {
        if ($userData['email'] === $userEmail) {
            $loggedInUser = new User($userData);
            $userIndex = $key; // Salva l'indice dell'utente loggato
        }
    }

    if ($loggedInUser !== null) {
        // Crea un nuovo oggetto Event utilizzando i dati del form
        $newEventData = [
            'title' => $_POST['title'],
            'participants' => $_POST['partecipants'],
            'description' => $_POST['description'],
        ];
        $newEvent = new Event($newEventData);

        // Aggiungi il nuovo evento all'utente loggato
        $loggedInUser->addEvent($newEvent);


        // Aggiorna il file JSON con i dati aggiornati
        $usersData[$userIndex] = $loggedInUser->getData();
        $newJsonData = json_encode($usersData);


        file_put_contents($fileName, $newJsonData);
    }
}

header('Location: ../admin.php');
