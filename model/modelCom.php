<?php

function getPost0($postId)
    {
        $bdd = new DbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('SELECT * FROM billet WHERE ID = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    };

function getComments0($postId)
    {
        $bdd = new DbManager();
        $db = $bdd->dbConnect();

        $comments = $db->prepare('SELECT * FROM commentaires WHERE ID_BILLET = ?');
        $comments->execute(array($postId));

        return $comments;
    };



function postComment($postId, $author, $comment, $idUser)
    {
        $bdd = new DbManager();
        $db = $bdd->dbConnect();

        $comments = $db->prepare('INSERT INTO commentaires(ID_USER, ID_BILLET, AUTEUR, CONTENU) VALUES(:ID_USER, :ID_BILLET, :AUTEUR, :CONTENU)');
        $affectedLines = $comments->execute(array(
            'ID_BILLET' => $postId,
            'AUTEUR' => $author,
            'CONTENU' => $comment,
            'ID_USER' => $idUser
            ));

        return $affectedLines;
    };



// fonction pour signaler un commentaire dans la BDD
    function signalComDb($id) {
        $bdd = new dbManager();
        $db= $bdd->dbConnect();

        $req = $db->prepare('UPDATE commentaires SET SIGNALE = 1 WHERE ID = :id');
        $update = $req->execute(array(
            'id' => $id
        ));

        return $update;
    };




// PASSAGE DU MODEL EN POO
class ComManager
{
    // fonction pour récupérer les 5 derniers billets


    // fonction pour récupérer le premier billet


    // fonction pour récupérer les commentaires d'un billet
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM commentaires WHERE ID_BILLET = :id');
        $req->execute(array(
            'id' => $postId
        ));

        return $req;
    }


}