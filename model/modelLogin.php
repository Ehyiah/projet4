<?php

// foncton de login

function login($pseudo)
    {
        $bdd = new dbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('SELECT ID, PASS, PSEUDO FROM users WHERE PSEUDO = :pseudo');
        $req->execute(array(
            'pseudo' => $pseudo
        ));

        return $resultat = $req->fetch();

    };
    

// nouvelles fonctions création membres

    function checkIfUserExist($nom) {
        $bdd = new dbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('SELECT EXISTS(SELECT * FROM users WHERE PSEUDO = :pseudo)');
        $req->execute(array(
            'pseudo' =>$nom
        ));

        $userExist = $req->fetchColumn();
        return $userExist;
    };

    function createNewUser($nom, $mot_de_passe, $email) {
        $bdd = new dbManager();
        $db = $bdd->dbConnect();

        $req = $db->prepare('INSERT INTO users(PSEUDO, PASS, MAIL) VALUES(:pseudo, :pass, :email)');
        $req->execute(array(
            'pseudo' => $nom,
            'pass' => $mot_de_passe,
            'email' => $email
        ));
    };

