<?php
session_start();
if ($_SESSION['logged'] !== true || !isset($_SESSION['logged'])) {
    header('location: login.php');
    exit;
} else {
    require_once 'php/User.php';
    require_once 'php/Event.php';

    $jsonData = file_get_contents('users.json');
    $data = json_decode($jsonData, true);

    $user = new User($_SESSION['user_data']);
    $userEmail = $_SESSION['email'];
    // Ottengo i dati degli eventi dell'utente e inizializzo $_SESSION['events']
    $eventData = [];
    foreach ($data as $userData) {
        if ($userData['email'] === $userEmail) {
            $eventData = $userData['events']; // Ottieni i dati degli eventi dell'utente corrente
            break;
        }
    }

    $_SESSION['events'] = $eventData;

    $loggedUser = null;
    foreach ($data as $userData) {
        if ($userData['email'] === $userEmail) {
            $loggedUser = $userData; // Trova l'utente corrente nel JSON
        }
    }
}
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

        <div class="container">
            <?php if (!empty($_SESSION['events'])) : ?>
                <?php foreach ($_SESSION['events'] as $event) : ?>
                    <div class="todo">
                        <h2><?php echo $event['title']; ?></h2>
                        <a id="submit" href="view/edit.php?event_id=<?php echo $event['id']; ?>">VAI!</a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Nessun evento disponibile.</p>
            <?php endif; ?>

            <a href="./php/logout.php" style="font-size: 25px; color:grey;">Logout</a>
            <a href="./view/create.php">prova</a>
        </div>

    </main>
    <script src="js/main.js"></script>
</body>

</html>