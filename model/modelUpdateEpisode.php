<?php

// function pour supprimer un article de la BDD et ses commentaires liés
    function deleteEpisodeDb($idBillet) {
        $bdd = new dbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('DELETE FROM billet WHERE ID = :id');
        $delete = $req->execute(array(
            'id' => $idBillet,
        ));

        $reqCom = $db->prepare('DELETE FROM commentaires WHERE ID_BILLET = :id');
        $deletCom = $reqCom->execute(array(
            'id' => $idBillet
        ));

        // return $delete;
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




    // fonction pour mettre a jour l'épisode
    function updateEpisodeDb($id, $titre, $contenu) {
        $bdd = new dbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('UPDATE billet SET TITRE = :titre, CONTENU = :contenu WHERE ID = :id');
        $update = $req->execute(array(
            'titre' => $titre,
            'contenu' => $contenu,
            'id' => $id
        ));

        return $update;

    };

