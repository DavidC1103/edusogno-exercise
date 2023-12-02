<?php
    @include './php/loginScript.php';
    var_dump($errors);
    var_dump($ciao);
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

        <div id="error-div">
            <?php
                 if (!empty($errors)) {
                    echo '<ul>';
                    foreach ($errors as $error) {
                        echo '<li>' . htmlspecialchars($error) . '</li>';
                    }
                    echo '</ul>';
                }
            ?>
        </div>
        <form action="php/loginScript.php" method="POST" id="login_form">

            <label for="email">Inserisci l'email</label>
            <input type="email" name="email" id="email">

            <div class="password-input">
                <label for="password">Inserisci la password</label>
                <input type="password" name="password" id="password">
                <i class="fa-regular fa-eye-slash" id="togglepw"></i>
            </div>

            <input type="submit" value="Accedi" id="btnSub">
            <p>Non hai ancora un profilo? <a href="index.php">Registrati</a></p>
        </form>

    </main>
    <script src="js/main.js"></script>
    <script src="js/login.js" type="module"></script>

</body>


</html>