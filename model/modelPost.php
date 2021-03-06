<?php

class PostManager
{
    // private attribute
	private $_bdd;

	public function __construct() {
		$bdd = new DbManager();

		return $this->_bdd = $bdd->dbConnect();
	}


	// fonction pour récupérer tous les billets
	// get all bills
	public function getPosts()
	{
        $db = $this->_bdd;

		$req = $db->query('SELECT * FROM billet ORDER BY ID');

		return $req;
	}

	// fonction pour récupérer un billet
	// get a bill
	public function getPost($id)
	{
        $db = $this->_bdd;

		$req = $db->prepare('SELECT * FROM billet WHERE ID = :id');
		$req->execute(array(
			'id' => $id
		));
		$post = $req->fetch();

		return $post;

	}

	// fonction pour récupérer le premier billet
	// get first bill
	public function getFirstPost()
	{
        $db = $this->_bdd;

		$req = $db->query('SELECT * FROM billet ORDER BY ID LIMIT 1');

		return $req;
	}

	// fonction pour récupérer les 5 derniers billets
	// get last 5 bills
	public function getPost5()
	{
        $db = $this->_bdd;

		$req = $db->query('SELECT * FROM billet ORDER BY ID DESC LIMIT 5');

		return $req;
	}


	// fonction pour ajouter les billets dans le menu
	// get bills title in menu
	public function billMenu()
	{
        $db = $this->_bdd;

		$req = $db->query('SELECT ID, TITRE FROM billet ORDER BY ID');
		
		return $req;
	}


	// fonction pour publier un nouvel épisode
	// publish new episode
	public function publishEpisode($titre, $contenu)
	{
        $db = $this->_bdd;

	
		$req = $db->prepare('INSERT INTO billet(AUTEUR, TITRE, CONTENU) VALUES(:auteur, :titre, :contenu)');
		$publish = $req->execute(array(
			'auteur' => $_SESSION['PSEUDO'],
			'titre' => $titre,
			'contenu' => $contenu
		));
	
		return $publish;
	}

	// fonction pour supprimer un épisode et les commentaires associés
	// delete a bill and related comments
	public function deleteEpisodeDb($idBillet)
	{
        $db = $this->_bdd;


        $req = $db->prepare('DELETE FROM billet WHERE ID = :id');
        $delete = $req->execute(array(
            'id' => $idBillet,
        ));

        $reqCom = $db->prepare('DELETE FROM commentaires WHERE ID_BILLET = :id');
        $deletCom = $reqCom->execute(array(
            'id' => $idBillet
        ));

	}

	// fonction pour mettre à jour un épisode
	// update an episode
	public function updateEpisodeDb($id, $titre, $contenu)
	{
        $db = $this->_bdd;


        $req = $db->prepare('UPDATE billet SET TITRE = :titre, CONTENU = :contenu WHERE ID = :id');
        $update = $req->execute(array(
            'titre' => $titre,
            'contenu' => $contenu,
            'id' => $id
        ));

        return $update;
	}

};