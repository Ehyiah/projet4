<?php

class ComManager
{
    // private attribute
    private $_bdd;

    public function __construct() {
        $bdd = new DbManager();

        return $this->_bdd = $bdd->dbConnect();
    }

    // fonction pour récupérer les 5 derniers commentaires
    // get 5 last comments
    public function getComs5()
    {
        $db = $this->_bdd;
        
		$req = $db->query('SELECT * FROM commentaires ORDER BY ID DESC LIMIT 5');

		return $req;
    }

    // fonction pour récupérer les commentaires d'un billet
    // get comment for a specific bill
    public function getComments($postId)
    {
        $db = $this->_bdd;

        $req = $db->prepare('SELECT * FROM commentaires WHERE ID_BILLET = :id ORDER BY ID');
        $req->execute(array(
            'id' => $postId
        ));

        return $req;
    }


    // fonction pour poster un commentaire
    // post new comment
    public function postComment($postId, $author, $comment, $idUser)
    {
        $db = $this->_bdd;

        $comments = $db->prepare('INSERT INTO commentaires(ID_USER, ID_BILLET, AUTEUR, CONTENU) VALUES(:ID_USER, :ID_BILLET, :AUTEUR, :CONTENU)');
        $affectedLines = $comments->execute(array(
            'ID_BILLET' => $postId,
            'AUTEUR' => $author,
            'CONTENU' => $comment,
            'ID_USER' => $idUser
            ));

        return $affectedLines;
    }


    // fonction pour signaler un commentaire
    // signal a comment
    public function signalComDb($id)
    {
        $db = $this->_bdd;

        $req = $db->prepare('UPDATE commentaires SET SIGNALE = 1 WHERE ID = :id');
        $update = $req->execute(array(
            'id' => $id
        ));

        return $update;
    }

    // fonction pour récupérer les commentaires signalés
    // get signaled comments
    public function signaledComDb()
    {
        $db = $this->_bdd;

        $signaledCom = $db->query('SELECT c.ID ID_COM, c.ID_BILLET, c.AUTEUR AUTEUR_COM, c.CONTENU, c.SIGNALE, b.ID, b.TITRE TITRE_BILLET, b.AUTEUR AUTEUR_BILLET
        FROM commentaires c
        INNER JOIN billet b
        ON c.ID_BILLET = b.ID
        WHERE c.SIGNALE = 1
        ORDER BY ID
        ');

        return $signaledCom;
    }

    // fonction pour supprimer un commentaire de la BDD
    // delete signaled comment
    public function deleteSignaledComDb($idCom)
    {
        $db = $this->_bdd;

        $req = $db->prepare('DELETE FROM commentaires WHERE ID = :id');
        $delete = $req->execute(array(
            'id' => $idCom
        ));

        return $delete;
    }

    // fonction pour valider un commentaire signalé
    // approve signaled comment
    public function acceptSignaledComDb($idCom)
    {
        $db = $this->_bdd;

        $req = $db->prepare('UPDATE commentaires SET SIGNALE = 0 WHERE ID = :id');
        $update = $req->execute(array(
            'id' => $idCom
        ));

        return $update;
    }

}