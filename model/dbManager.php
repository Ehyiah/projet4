<?php

class DbManager
{
    public function dbConnect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
//            $db = new PDO('mysql:host=db724862783.db.1and1.com;dbname=db724862783;charset=utf8', 'dbo724862783', 'Chobits69');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
};
