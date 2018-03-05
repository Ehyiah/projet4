<?php

// fonction pour ajouter les billets dans le menu
	function billMenu() 
	{
		$db = dbConnect();
		$req = $db->query('SELECT ID, TITRE FROM billet');
		
		return $req;
	};


// fonction pour récupérer les 5 derniers billets
	function getPosts5()
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}

		$req = $bdd->query('SELECT * FROM billet ORDER BY ID DESC LIMIT 5');

		return $req;
	};


// fonction pour récupérer le premier billet
	function getPost()
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
			die('Errer : '.$e->getMessage());
		}

		$req = $bdd->query('SELECT * FROM billet ORDER BY ID LIMIT 1');

		return $req;
	};


// fonction pour récupérer les 5 derniers commentaires
	function getComs5()
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
			die('Errer : '.$e->getMessage());
		}

		$req = $bdd->query('SELECT * FROM commentaires ORDER BY ID DESC LIMIT 5');

		return $req;
	};




	function dbConnect()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    };

