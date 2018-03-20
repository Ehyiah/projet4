<?php

class PostManager
{
	// fonction pour récupérer tous les billets
	public function getPosts()
	{
		$bdd = new DbManager();

		$db = $bdd->dbConnect();
		$req = $db->query('SELECT * FROM billet ORDER BY ID');

		return $req;
	}

	// fonction pour récupérer un billet
	public function getPost($id)
	{
		$bdd = new DbManager();

		$db = $bdd->dbConnect();
		$req = $db->prepare('SELECT * FROM billet WHERE ID = :id');
		$req->execute(array(
			'id' => $id
		));
		$post = $req->fetch();

		return $post;

	}

	// fonction pour récupérer le premier billet
	public function getFirstPost()
	{
		$bdd = new DbManager();

		$db = $bdd->dbConnect();
		$req = $db->query('SELECT * FROM billet ORDER BY ID LIMIT 1');

		return $req;
	}

	// fonction pour récupérer les 5 derniers billets
	public function getPost5()
	{
		$bdd = new DbManager();

		$db = $bdd->dbConnect();
		$req = $db->query('SELECT * FROM billet ORDER BY ID DESC LIMIT 5');

		return $req;
	}


	// fonction pour ajouter les billets dans le menu
	public function billMenu()
	{
		$bdd = new DbManager();

		$db = $bdd->dbConnect();
		$req = $db->query('SELECT ID, TITRE FROM billet ORDER BY ID');
		
		return $req;
	}


	// fonction pour publier un nouvel épisode
	public function publishEpisode($titre, $contenu)
	{
		$bdd = new DbManager();
		$db = $bdd->dbConnect();
	
		$req = $db->prepare('INSERT INTO billet(AUTEUR, TITRE, CONTENU) VALUES(:auteur, :titre, :contenu)');
		$publish = $req->execute(array(
			'auteur' => $_SESSION['PSEUDO'],
			'titre' => $titre,
			'contenu' => $contenu
		));
	
		return $publish;
	}

	// fonction pour supprimer un épisode et les commentaires associés
	public function deleteEpisodeDb($idBillet)
	{
		$bdd = new DbManager();
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
	}

	// fonction pour mettre à jour un épisode
	public function updateEpisodeDb($id, $titre, $contenu)
	{
		$bdd = new DbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('UPDATE billet SET TITRE = :titre, CONTENU = :contenu WHERE ID = :id');
        $update = $req->execute(array(
            'titre' => $titre,
            'contenu' => $contenu,
            'id' => $id
        ));

        return $update;
	}

};