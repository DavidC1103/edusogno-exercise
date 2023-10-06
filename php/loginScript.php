<?php
//Leggo il json
$fileName = '../users.json';
$jsonData = file_get_contents($fileName);
//Rendo il json un array associativo mettendo true
$users = json_decode($jsonData, true);

$error = array('ciao');
//Verifico i dati inviati tramite il form in POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Recupero le credenziali nel file json
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loggedIn = false;

    //Ciclo gli utenti e verifico solo le credenziali che ci interessano
    foreach ($users as $user) {

        if ($user['email'] === $email && $user['password'] === $password) {
            session_start();

            $_SESSION['user_data'] = [
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'email' => $email,
                'password' => $user['password'],
                'events' => $user['events'],
            ];

            $_SESSION['logged'] = true;
            $_SESSION['email'] = $email;
            $loggedIn = true;
            break;
        }
    }
    if ($user['email'] !== $email) {
        array_push($error, 'Email non presente nel nostro database');
    } elseif ($user['password'] !== $password) {
        array_push($error, 'Password errata');
    }


    if ($loggedIn) {
        header('Location: ../admin.php');
        exit;
    } else {
        header('Location: ../login.php');
    }
}
