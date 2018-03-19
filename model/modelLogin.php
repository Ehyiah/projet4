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

        $pass_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        $req = $db->prepare('INSERT INTO users(PSEUDO, PASS, MAIL) VALUES(:pseudo, :pass, :email)');
        $req->execute(array(
            'pseudo' => $nom,
            'pass' => $pass_hache,
            'email' => $email
        ));
    }


    // fonction pour récupérer les commentaires d'un membre
    public function getComUserdB($id) {
        $bdd = new DbManager();
        $db = $bdd->dbConnect();
    
        $req = $db->prepare('SELECT c.ID ID_COM, c.ID_BILLET ID_BILLET, c.CONTENU CONTENU_COM, b.TITRE TITRE_BILLET
        FROM commentaires c
        INNER JOIN billet b
        on c.ID_BILLET = b.ID
        WHERE ID_USER = :ID_USER
        ');
        
        $req->execute(array(
            'ID_USER' => $id
        ));
    
        return $req;
    }

}
