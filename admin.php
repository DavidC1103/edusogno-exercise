<?php
session_start();
if ($_SESSION['logged'] !== true || !isset($_SESSION['logged'])) {
    header('location: login.html');
    exit;
} else {
    require_once 'php/UserEvent.php';

    $user = new User($_SESSION['user_data']); // Crea un oggetto User utilizzando i dati dell'utente in sessione

    $userEmail = $_SESSION['email']; // Ottieni l'email dell'utente dalla sessione

    $jsonData = file_get_contents('users.json');
    $data = json_decode($jsonData, true);

    $loggedUser = null;
    foreach ($data as $userData) {
        if ($userData['email'] === $userEmail) {
            $loggedUser = $userData; // Trova l'utente corrente nel JSON
        }
    }
}
var_dump($user)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Dashboard</title>
</head>

<body>
    <header>
        <img src="logo.svg" alt="Edusogno">
    </header>

    <main>
        <h1>Ciao <?php echo $user->getFirstName() . ' ' . $user->getLastName(); ?> ecco i tuoi Eventi</h1>
        <a href="./view/create.php">provaaaaaa</a>

        <div class="container">
            <?php if (!empty($loggedUser['events'])) : ?>
                <?php foreach ($loggedUser['events'] as $event) : ?>
                    <div class="todo">
                        <h2><?php echo $event['title']; ?></h2>
                        <a id="submit" href="/view/edit.php">VAI!</a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Nessun evento disponibile.</p>
            <?php endif; ?>

            <a href="./php/logout.php" style="font-size: 25px; color:grey">Logout</a>
        </div>

    </main>
    <script src="js/main.js"></script>
</body>

</html>