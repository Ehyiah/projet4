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
    
