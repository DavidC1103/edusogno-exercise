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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Dashboard</title>
</head>

<body>
    <header>
        <img src="logo.svg" alt="Edusogno">
    </header>
    <div class="cta-container">
        <a href="./php/logout.php" class="logout">Logout</a>
    </div>
    <main>
        <h1>Ciao <?php echo ucfirst($user->getFirstName()) . ' ' . ucfirst($user->getLastName()); ?> ecco i tuoi Eventi
        </h1>
        <h3>Aggiungi evento</h3>
        <a href="./view/create.php" class="btnAdd"><i class="fa-solid fa-square-plus"></i></a>

        <div class="container">
            <?php if (!empty($_SESSION['events'])) : ?>
            <?php foreach ($_SESSION['events'] as $event) : ?>
            <div class="todo">
                <h2 class="title"><?php echo $event['title']; ?></h2>
                <a id="btnSub" class="btnEvent" href="view/view.php?event_id=<?php echo $event['id']; ?>">VAI!</a>
            </div>
            <?php endforeach; ?>
            <?php else : ?>
            <p>Nessun evento disponibile.</p>
            <?php endif; ?>


        </div>
        <div class="cta-container">
            <a href="resetPw.php">Reset Password</a>
        </div>
    </main>

</body>

</html>