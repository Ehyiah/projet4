<?php

// function pour supprimer un article de la BDD
    function deleteEpisodeDb($idBillet) {
        $bdd = new dbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('DELETE FROM billet WHERE ID = :id');
        $delete = $req->execute(array(
            'id' => $idBillet,
        ));

        return $delete;
    };

// fonction pour récupérer les commentaires signalés
    function signaledComDb() {
        $bdd = new dbManager();
        $db = $bdd->dbConnect();

        // $signaledCom = $db->query('SELECT * FROM commentaires WHERE SIGNALE = 1');
        
        $signaledCom = $db->query('SELECT c.ID ID_COM, c.ID_BILLET, c.AUTEUR AUTEUR_COM, c.CONTENU, c.SIGNALE, b.ID, b.TITRE TITRE_BILLET, b.AUTEUR AUTEUR_BILLET
        FROM commentaires c
        INNER JOIN billet b
        ON c.ID_BILLET = b.ID
        WHERE c.SIGNALE = 1
        ');

        return $signaledCom;
    };

// fonction pour supprimer commentaire de la BDD
    function deleteSignaledComDb($idCom) {
        $bdd = new dbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('DELETE FROM commentaires WHERE ID = :id');
        $delete = $req->execute(array(
            'id' => $idCom
        ));

        return $delete;
    };

// fonction pour valider un commentaire signalé
    function acceptSignaledComDb($idCom) {
        $bdd = new dbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('UPDATE commentaires SET SIGNALE = 0 WHERE ID = :id');
        $update = $req->execute(array(
            'id' => $idCom
        ));

        return $update;

    };



// fonction pour modifier un épisode
// UNE fonction pour afficher les épisodes dans un tinyMCE
// par les variables titres et contenu transmises 
// dans le textarea pour pouvoir les modifier
// ET une fonction pour valider la modification dans la BDD

    // fonction pour afficher les épisodes à modifier dans un tinyMCE
    function updateEpisodeShowDb() {

    };
    // fonction pour mettre a jour l'épisode
    function updateEpisodeDb() {

    };

