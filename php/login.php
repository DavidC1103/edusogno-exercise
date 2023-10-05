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
    //ciclo gli utenti e verifico solo le credenziali che ci interessano
    foreach ($users as $user) {
        //se sono uguali a quelle salvate allora lo reindirizzo alla pagina admin
        if ($user['email'] === $email && $user['password'] === $password) {
            session_start();

            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['events'] = $events;

            $_SESSION['logged'] = true;

            header('Location: ../admin.php');
            exit;

            //altrimenti lo riporto al login
        } else {
            header('Location: ../login.html');
        }
    }
}
