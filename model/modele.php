<?php

// fonction pour ajouter les billets dans le menu
	function billMenu() 
	{
		$bdd = new DbManager();

		$db = $bdd->dbConnect();
		$req = $db->query('SELECT ID, TITRE FROM billet ORDER BY ID');
		
		return $req;
	};


// fonction pour récupérer les 5 derniers billets
	function getPosts5()
	{
		$bdd = new DbManager();

		$db = $bdd->dbConnect();
		$req = $db->query('SELECT * FROM billet ORDER BY ID DESC LIMIT 5');

		return $req;
	};


// fonction pour récupérer le premier billet
	function getPost()
	{
		$bdd = new DbManager();

		$db = $bdd->dbConnect();
		$req = $db->query('SELECT * FROM billet ORDER BY ID LIMIT 1');

		return $req;
	};


// fonction pour récupérer les 5 derniers commentaires
	function getComs5()
	{
		$bdd = new DbManager();

		$db = $bdd->dbConnect();
		$req = $db->query('SELECT * FROM commentaires ORDER BY ID DESC LIMIT 5');

		return $req;
	};

// fonction pour récupérer tous les billets
	function getAllPosts()
	{
		$bdd = new DbManager();

		$db = $bdd->dbConnect();
		$req = $db->query('SELECT * FROM billet ORDER BY ID DESC');

		return $req;
	};