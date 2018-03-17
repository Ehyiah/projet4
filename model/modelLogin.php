<?php

class LoginManager
{
    // fonction pour login
    public function login($pseudo)
    {
        $bdd = new DbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('SELECT ID, PASS, PSEUDO, MAIL, GROUPE FROM users WHERE PSEUDO = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo
        ));

        return $resultat = $req->fetch();
    }


    // fonction pour vérifier si un USER existe
    public function checkIfUserExist($nom) 
    {
        $bdd = new DbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('SELECT EXISTS(SELECT * FROM users WHERE PSEUDO = :pseudo)');
        $req->execute(array(
            'pseudo' =>$nom
        ));

        $userExist = $req->fetchColumn();
        return $userExist;
    }


    // fonction pour créer un nouvel utilisateur
    public function createNewUser($nom, $mot_de_passe, $email) {
        $bdd = new DbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('INSERT INTO users(PSEUDO, PASS, MAIL) VALUES(:pseudo, :pass, :email)');
        $req->execute(array(
            'pseudo' => $nom,
            'pass' => $mot_de_passe,
            'email' => $email
        ));
    }


    // fonction pour récupérer les commentaires d'un membre
    public function getComUserdB($id) {
        $bdd = new DbManager();
        $db = $bdd->dbConnect();
    
        $req = $db->prepare('SELECT * FROM commentaires WHERE ID_USER = :id');
        $comUser = $req->execute(array(
            'id' => $id
        ));
    
        // var_dump($com);
        return $comUser;
    }

}
