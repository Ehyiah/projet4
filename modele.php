<?php
function getBillets()
{
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->query('SELECT * FROM billets');

	return $req;
}

function getComm()
{
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->query('SELECT * FROM commentaires');

	return $req;
}

?>

