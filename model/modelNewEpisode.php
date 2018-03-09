<?php

// fonction pour insérer un nouvel épisode dans BDD
function publishEpisode($titre, $contenu) 
{
    $bdd = new dbManager();
    $db = $bdd->dbConnect();

    $req = $db->prepare('INSERT INTO billet(AUTEUR, TITRE, CONTENU) VALUES(:auteur, :titre, :contenu)');
    $publish = $req->execute(array(
        'auteur' => $_SESSION['PSEUDO'],
        'titre' => $titre,
        'contenu' => $contenu
    ));

    return $publish;
}