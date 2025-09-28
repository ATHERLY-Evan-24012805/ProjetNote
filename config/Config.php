<?php
abstract class Config
{
    private static $_bdd;

    // instancie la connexions
    private static function setBdd()
    {
        self::$_bdd = new PDO ('mysql:host=mysql-blocnote.alwaysdata.net;dbname=blocnote_pw;charset=utf8','blocnote','BlocnoteAdmin4368');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }


    // recupere la connexion
    protected function getBdd()
    {
        if(self::$_bdd == null)
        {
            self::setBdd();
        }
        return self::$_bdd;
    }

    //protected function getAllNote($user) cette methode me permettrat de recup toute les notes d'un utilisateurs
    protected function getAll($table, $obj)
    {
        $var=[];
        $query = self::$_bdd->prepare('SELECT * FROM ' . $table . ' ORDER BY ID desc;');
        $query->execute();
        while ($data = $query->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}
