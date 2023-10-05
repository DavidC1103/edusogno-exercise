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

        if (isset($userData['events']) && is_array($userData['events'])) {
            foreach ($userData['events'] as $eventData) {
                $event = new Event($eventData);
                $this->events[] = $event;
            }
        }
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

    public function addEvent($event)
    {
        $this->events[] = $event;
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


class Event
{
    private $title;
    private $partecipants;
    private $description;

    public function __construct($eventData)
    {
        if (is_array($eventData)) {
            if (isset($eventData['title'])) {
                $this->title = $eventData['title'];
            } else {
                // Gestisci il caso in cui la chiave "title" sia mancante
            }

            if (isset($eventData['partecipants'])) {
                $this->partecipants = $eventData['partecipants'];
            } else {
                // Gestisci il caso in cui la chiave "partecipants" sia mancante
            }

            if (isset($eventData['description'])) {
                $this->description = $eventData['description'];
            } else {
                // Gestisci il caso in cui la chiave "description" sia mancante
            }
        } else {
            // Gestisci il caso in cui $eventData non sia un array
        }
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPartecipants()
    {
        return $this->partecipants;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function getEventData()
    {
        return [
            'title' => $this->title,
            'partecipants' => $this->partecipants,
            'description' => $this->description,
        ];
    }
}
