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
        <h1>Crea il tuo account</h1>


        <form action="php/register.php" method="POST" id="form">


            <label for="first_name">Inserisci il nome</label>
            <input type="text" name="first_name" id="first_name" placeholder="Inserisci nome" required>

            <label for="last_name">Inserisci il cognome</label>
            <input type="text" name="last_name" id="last_name" placeholder="Inserisci cognome" required>

            <label for="email">Inserisci l'email</label>
            <input type="email" name="email" id="email" placeholder="name@example.com" required>

            <div class="password-input">
                <label for="password">Inserisci la password</label>
                <input type="password" name="password" id="password" placeholder="Scrivila qui" required>
                <i class="fa-regular fa-eye-slash" id="togglepw"></i>
            </div>


            <input type="submit" name="submit" value="Registrati" id="btnSub">
            <p>Sei gia registrato? <a href="login.php">Accedi</a></p>
        </form>

    </main>
    <script src="js/main.js"></script>
</body>


</html>