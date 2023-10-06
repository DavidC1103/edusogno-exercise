<?php
$fileName = '../users.json';
$jsonData = file_get_contents($fileName);

class User
{
    // Proprietà della classe User
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $events;

    // Costruttore della classe User
    public function __construct($userData)
    {
        $this->firstName = $userData['first_name'];
        $this->lastName = $userData['last_name'];
        $this->email = $userData['email'];
        $this->password = $userData['password'];
        $this->events = [];
    }


    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEvents()
    {
        return $this->events;
    }

    public function addEvent(Event $newEvent)
    {
        $this->events[] = $newEvent->getEventData();
    }

    public function getData()
    {
        return [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password,
            'events' => $this->events,
        ];
    }
}
