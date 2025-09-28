<?php
require_once __DIR__ . "/../config/Config.php";
class NoteManager extends Config  //extends config
{
    public function getNotes()
    {
        $this->getBdd();
        return $this->getAll('Notes','Note');
    }
}