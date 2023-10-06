<?php
include './php/loginScript.php'

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login Register for Edusogno</title>
</head>

<body>

    <header>
        <img src="logo.svg" alt="Edusogno">
    </header>

    <main>
        <h1>Hai gia un account?</h1>

        <form action="php/loginScript.php" method="POST" id="login_form">

            <label for="email">Inserisci l'email</label>
            <input type="email" name="email" id="email">

            <div class="password-input">
                <label for="password">Inserisci la password</label>
                <input type="password" name="password" id="password">
                <i class="fa-regular fa-eye-slash" id="togglepw"></i>
            </div>

            <input type="submit" value="Accedi" id="btnSub">
            <p>Non hai ancora un profilo? <a href="index.html">Registrati</a></p>
        </form>

        <div id="error-div"></div>
    </main>
    <script src="js/main.js"></script>
    <script src="js/login.js" type="module"></script>

</body>


</html>