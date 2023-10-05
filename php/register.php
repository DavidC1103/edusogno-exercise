<?php
//leggo il json
$fileName = '../users.json';
$jsonData = file_get_contents($fileName);
//rendo il json un array associativo
$users = json_decode($jsonData, true);
//creo un nuovo utente
$newUser = array(
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
);
//push into array or json
$users[] = $newUser;
//codifico l'array aggiornato in json
$newJsonData = json_encode($users);

//aggiorno il json
file_put_contents($fileName, $newJsonData);


header('location: ../login.html');
