<?php

session_start();
if ($_SESSION['logged'] !== true || !isset($_SESSION['logged'])) {
    header('location: login.html');
    exit;
}
$userEmail = $_SESSION['email'];
$jsonData = file_get_contents('users.json');
$data = json_decode($jsonData, true);

$loggedUser = null;
foreach ($data as $user) {
    if ($user['email'] === $userEmail) {
        $loggedUser = $user;
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
        <h1>Ciao <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?> ecco i tuoi Eventi</h1>

        <div class="container">
            <?php if (!empty($loggedUser['events'])) : ?>
                <?php foreach ($loggedUser['events'] as $event) : ?>
                    <div class="todo">
                        <h2><?php echo $event['title']; ?></h2>
                        <a id="submit" href="/view/view.php">VAI!</a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Nessun evento disponibile.</p>
            <?php endif; ?>

        </div>

        <a href="./view/create.php">prova</a>
        <a href="./php/logout.php" style="font-size: 25px; color:grey">Logout</a>
    </main>
    <script src="js/main.js"></script>
</body>

</html>