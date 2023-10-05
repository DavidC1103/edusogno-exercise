<?php
//leggo il json
$fileName = '../users.json';
$jsonData = file_get_contents($fileName);
//rendo il json un array associativo mettendo true
$users = json_decode($jsonData, true);

//verifico i dati inviati tramite il form in POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //recupero le credenziali nel file json
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $events = $_POST['events'];
    $loggedIn = false;

    //ciclo gli utenti e verifico solo le credenziali che ci interessano
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


    if ($loggedIn) {
        header('Location: ../admin.php');
        exit;
    } else {
        header('Location: ../login.html');
    }
}
