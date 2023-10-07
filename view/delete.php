<?php
session_start();

if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header('location: login.php');
    exit;
}

$fileName = '../users.json';
$jsonData = file_get_contents($fileName);
$usersData = json_decode($jsonData, true);


$userEmail = $_SESSION['email'];
$userIndex = null;
$loggedInUser = null;


foreach ($usersData as $key => $userData) {
    if ($userData['email'] === $userEmail) {
        $loggedInUser = $userData;
        $userIndex = $key;
        break;
    }
}

$eventID = null;

if (isset($_GET['event_id'])) {
    $eventID = $_GET['event_id'];


    if (isset($_SESSION['events'])) {
        foreach ($_SESSION['events'] as $key => $event) {
            if (isset($event['id']) && $event['id'] == $eventID) {
                // Rimuovi l'evento da $_SESSION
                unset($_SESSION['events'][$key]);

                // Rimuovi l'evento anche dal file JSON
                unset($usersData[$userIndex]['events'][$key]);

                $newJsonData = json_encode($usersData);
                file_put_contents($fileName, $newJsonData);


                header('location: ../admin.php');
                exit;
            }
        }
    }
}
