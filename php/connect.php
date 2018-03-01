<?php
try 
{
    $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
    // $bdd = new PDO('mysql:host=db724862783.db.1and1.com;dbname=db724862783;charset=utf8', 'dbo724862783', 'Chobits69');

} catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}


// récupération des billets
    $reponse = $bdd->query('SELECT * FROM billet');

    