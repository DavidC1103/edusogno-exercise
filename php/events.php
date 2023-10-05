<?php
session_start();
if ($_SESSION['logged'] !== true || !isset($_SESSION['logged'])) {
    header('location: login.html');
    exit;
}
$fileName = '../users.json';
$jsonData = file_get_contents($fileName);
$data = json_decode($jsonData, true);

//Recupero l'utente loggato
$userEmail = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    foreach ($data as &$user) {
        if ($user['email'] === $userEmail) {
            // Assicurati che $user['events'] sia un array associativo
            if (!isset($user['events'])) {
                $user['events'] = array();
            }
            $newEvent = array(
                'title' => $_POST['title'],
                'partecipants' => $_POST['partecipants'],
                'description' => $_POST['description'],
            );
            $user['events'][] = $newEvent;
            //aggiorno l'array in sessione
        }
        $newJsonData = json_encode($data);

        file_put_contents($fileName, $newJsonData);
    }
}
header('Location: ../admin.php');
