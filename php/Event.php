<?php

$fileName = '../users.json';
$jsonData = file_get_contents($fileName);
class Event
{
    private $id;
    private $title;
    private $partecipants;
    private $description;

    public function __construct($eventData)
    {
        $this->id = $eventData['id'];
        $this->title = $eventData['title'];
        $this->partecipants = $eventData['partecipants'];
        $this->description = $eventData['description'];
    }

    public function getID()
    {
        return $this->id;
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
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setPartecipants($partecipants)
    {
        $this->partecipants = $partecipants;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getEventData()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'partecipants' => $this->partecipants,
            'description' => $this->description,
        ];
    }
}