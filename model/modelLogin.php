<?php

class LoginManager
{
    // attribut privé
    private $_bdd;
    // fonction de construction appelée automatiquement
    public function __construct() {
        $bdd = new DbManager();

        return $this->_bdd = $bdd->dbConnect();
    }

    // fonction pour login
    public function login($pseudo)
    {
        $db = $this->_bdd;

        $req = $db->prepare('SELECT ID, PASS, PSEUDO, MAIL, GROUPE FROM users WHERE PSEUDO = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo
        ));

        return $resultat = $req->fetch();
    }


    // fonction pour vérifier si un USER existe
    public function checkIfUserExist($nom) 
    {
        $db = $this->_bdd;

        $req = $db->prepare('SELECT EXISTS(SELECT * FROM users WHERE PSEUDO = :pseudo)');
        $req->execute(array(
            'pseudo' =>$nom
        ));

        $userExist = $req->fetchColumn();
        return $userExist;
    }


    // fonction pour créer un nouvel utilisateur
    public function createNewUser($nom, $mot_de_passe, $email) {
        $db = $this->_bdd;

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
        $db = $this->_bdd;
    
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
