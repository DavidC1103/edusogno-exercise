<?php
session_start();

if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header('location: login.php');
    exit;
}

$fileName = 'users.json';
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
// Gestione del cambio password
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPassword = $_POST['password'];
    $newPassword = $_POST['newPw'];

    // Verifica che la vecchia password coincida con quella nel file JSON
    if ($loggedInUser['password'] === $oldPassword) {

        $usersData[$userIndex]['password'] = $newPassword;
        $newJsonData = json_encode($usersData);
        file_put_contents($fileName, $newJsonData);


        header('location: admin.php');
        exit;
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
    <title>Document</title>
</head>

<body>
    <header>
        <img src="logo.svg" alt="Edusogno">
    </header>
    <a href="admin.php" class="back">Torna indietro</a>

    <main>
        <h1>Modifica Password</h1>
        <form action="" method="POST" id="pw_form">
            <div class="password-input">
                <label for="password">Vecchia password</label>
                <input type="password" name="password" id="password" placeholder="Scrivila qui" required>
                <i class="fa-regular fa-eye-slash" id="togglepw"></i>
            </div>
            <div class="password-input">
                <label for="newPw">Nuova password</label>
                <input type="password" name="newPw" id="newPw" placeholder="Scrivila qui" required>
                <i class="fa-regular fa-eye-slash" id="toggleNew"></i>
            </div>

            <input type="submit" value="Aggiorna" id="btnSub">
        </form>
        <div id="error-div"></div>
    </main>
    <script src="js/main.js"></script>
    <script src="js/newPwValidation.js" type="module"></script>
</body>

</html>