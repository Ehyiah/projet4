<?php
require_once('model/modelLogin.php');

function displayLogin() {
    $billMenu = billMenu();

    require ('view/login.php');
};



function authUser($resultat) {
    // var_dump($resultat);
    // var_dump($_POST['mot_de_passe']);

    // $passCorrect = password_verify($_POST['mot_de_passe'], $resultat['PASS']);

    if ($_POST['mot_de_passe'] == $resultat['PASS']) {
        $passCorrect = true;
    } else {
        $passCorrect = false;
    }

    // var_dump($passCorrect);
    
    if (!$resultat) {
        echo 'mauvais identifiant ou mot de passe';
    }   
    else {
        if ($passCorrect) {
            $_SESSION['ID'] = $resultat['ID'];
            $_SESSION['PSEUDO'] = $resultat['PSEUDO'];
            // echo 'vous etes maintenant connecté en tant que : ' . $_SESSION['PSEUDO'];
        }
    }
};


/*
    function newUser($nom, $mot_de_passe, $email) {
        $register = isNewUser($nom, $mot_de_passe, $email);

        if ($register === false) {
            die('impossible de créer le nouvel utilisateur');
        } else {
            displayLogin();
        }
    ;}   
*/


// appelle de la fonction depuis l'index
    // function (3 paramètres)
        // premier appel BDD pour vérifier si utilisateur deja présent
            // si réponse > 0 alors utilisateur deja enregistré
            // sinon on crée le nouvel utilisateur avec une second fonction

function registerUser($nom,$mot_de_passe,$email) {
    checkIfUserExist($nom);
        if ($userExist > 0) {
            echo 'utilisateur deja enregistré';
        } else {
            createNewUser($nom, $mot_de_passe, $email);
            echo 'nouvel utilisateur créé';
        }
};