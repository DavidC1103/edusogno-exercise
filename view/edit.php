<?php
session_start();

if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {
    header('location: login.php');
    exit;
}

$fileName = '../users.json';
$jsonData = file_get_contents($fileName);
$usersData = json_decode($jsonData, true);

// Recupera l'email dell'utente loggato
$userEmail = $_SESSION['email'];
$userIndex = null;
$loggedInUser = null;

// Trova l'utente loggato nei dati degli utenti
foreach ($usersData as $key => $userData) {
    if ($userData['email'] === $userEmail) {
        $loggedInUser = $userData;
        $userIndex = $key;
        break;
    }
}



$eventID = null;
$updatedEvent = array();

// Verifica se è stato passato un parametro "event_id" nell'URL
if (isset($_GET['event_id'])) {
    $eventID = $_GET['event_id'];

    // Cerca l'evento corrispondente nell'utente loggato
    if (isset($_SESSION['events'])) {
        foreach ($_SESSION['events'] as $key => $event) {

            if (isset($event['id']) && $event['id'] == $eventID) {
                // Se l'evento è stato trovato e la richiesta è di tipo POST, aggiorna i dati dell'evento
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $updatedEvent = $event;
                    $updatedEvent['title'] = $_POST['title'];
                    $updatedEvent['partecipants'] = $_POST['partecipants'];
                    $updatedEvent['description'] = $_POST['description'];
                    echo "Updated event: ";
                    print_r($updatedEvent);

                    // Aggiorna $_SESSION con i nuovi dati
                    $_SESSION['events'][$key] = $updatedEvent;

                    // Aggiorna il file JSON con i dati aggiornati
                    $usersData[$userIndex]['events'][$key] = $updatedEvent;
                    $newJsonData = json_encode($usersData);
                    file_put_contents($fileName, $newJsonData);

                    header('location: view.php?event_id=' . $eventID);
                    exit;
                }
            }
        }
    }
}






?>



<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" type="text/css" href="../style.css">
<title>Edit Event</title>

<head>

</head>

<body>
    <header>
        <img src="../logo.svg" alt="Edusogno">
    </header>
    <a href="view.php" class="back">Torna indietro</a>
    <main>

        <h1>Modifica Evento</h1>
        <form method="POST" action="">

            <input type="hidden" name="event_id" value="<?php echo $eventID; ?>">
            <label for="title">Titolo:</label>
            <input type="text" id="title" name="title" value="<?php echo isset($updatedEvent['title']) ? $updatedEvent['title'] : ''; ?>" required>
            <label for="partecipants">Partecipanti:</label>
            <input type="text" id="partecipants" name="partecipants" value="<?php echo isset($updatedEvent['partecipants']) ? $updatedEvent['partecipants'] : ''; ?>" required>
            <label for="description">Descrizione:</label>
            <textarea id="description" name="description" style="height: 200px; margin-bottom: 20px" required><?php echo isset($updatedEvent['description']) ? $updatedEvent['description'] : ''; ?></textarea>
            <input type="submit" value="Salva Modifiche" id="btnSub">
        </form>
    </main>
</body>

</html>