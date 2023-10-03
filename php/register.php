<?php
//leggo il json
$fileName = '../users.json';
$jsonData = file_get_contents($fileName);
//rendo il json un array associativo mettendo true
$users = json_decode($jsonData, true);
//creo un nuovo utente passando i parametri
$newUser = array(
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
);
//lo pusho dentro l'array o json
$users[] = $newUser;
//codifico l'array aggiornato in json
$newJsonData = json_encode($users);
//aggiorno il json
file_put_contents($fileName, $newJsonData);

var_dump($_POST);
