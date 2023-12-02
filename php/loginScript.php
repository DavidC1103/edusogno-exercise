<?php

// Leggi il JSON
$fileName = '../users.json';
$jsonData = file_get_contents($fileName);
// Converte il JSON in un array associativo
$users = json_decode($jsonData, true);
$ciao = 'ciao';
$errors = array();

// Verifica i dati inviati tramite il form in POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica che email e password siano state inviate
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Recupera le credenziali dal file JSON
        $email = $_POST['email'];
        $password = $_POST['password'];
        $loggedIn = false;

        // Cicla gli utenti e verifica le credenziali
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
                header('Location: ../admin.php');
                exit;
                break;
            }
        }
        if (!$loggedIn) {
            array_push($errors, 'Email o password errata');
            // Reindirizzamento alla pagina di login
            header('Location: ../login.php');
            exit;
        }
    }
}
?>