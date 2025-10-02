<?php
class ControllerAccueil
{
    private $_noteManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
        {
            throw new Exception ('Page introuvable');
        }
        else
        {
            echo"et la ";
            $this->notes();
        }
    }

    private function notes()
    {
        $this->_noteManager = new NoteManager;
        $notes = $this->_noteManager->getNotes();

        require_once('views/ViewAccueil.php');
    }
}