<?php
abstract class Config
{
    private static $_bdd;

    // instancie la connexions
    private static function setBdd()
    {
        self::$_bdd = new PDO ('msql:host=mysql-blocnote.alwaysdata.net;dbname=blocnote_pw;charset=utf8','blocnote','blocnoteAdmin4368');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }


    // recupere la connexion
    protected function getBdd()
    {
        if($_bdd == null)
        {
            self::setBdd();
        }
        return self::$_bdd
    }

    //protected function getAllNote($user) cette methode me permettrat de recup toute les notes d'un utilisateurs
}
