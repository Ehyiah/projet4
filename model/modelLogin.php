<?php

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
    



function isNewUser($nom, $mot_de_passe, $email) 
    {
        $bdd = new dbManager();
        $db = $bdd->dbConnect();


        $reqExist = $db->prepare('SELECT EXISTS (SELECT * FROM users WHERE PSEUDO = :pseudo)');
        $reqExist->execute(array(
            'pseudo' => $nom
        ));

        $exist = $reqExist->fetchColumn();
        

        // si speudo deja présent
        if ($exist > 0) {
            echo 'utilisateur deja enregistré';
        }

        // sinon on crée le nouvel utilisateur
        else {
            $req = $db->prepare('INSERT INTO users(PSEUDO, PASS, MAIL) VALUES (:pseudo, :pass, :email)');
            $register = $req->execute(array(
                'pseudo' => $nom,
                'pass' => $mot_de_passe,
                'email' => $email
            ));
            return $register;
        }

    };
