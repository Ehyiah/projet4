<?php
require_once('model/modelLogin.php');

function displayLogin() {
    $billMenu = billMenu();
    require ('view/login.php');
};

function displayCom() {
    $signaledCom = signaledComDb();
    require('view/episodeUpdate.php');
};

// fonction pour utilisateur deja enregistré
    function displayLoginError($etat) {
        $billMenu = billMenu();
        require ('view/login.php');
    };


// fonction pour la connection de l'utilisateur

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
                $_SESSION['GROUPE'] = $resultat['GROUPE'];
                $_SESSION['MAIL'] = $resultat['MAIL'];
                // echo 'vous etes maintenant connecté en tant que : ' . $_SESSION['PSEUDO'];
            }
        }
    };




// fonction de vérification et de création de nouveaux membres

    function registerUser($nom,$mot_de_passe,$email) {
        $userExist = checkIfUserExist($nom);
            if ($userExist > 0) {
                $etat = 1;
            } else {
                createNewUser($nom, $mot_de_passe, $email);
                $etat = 0;
            }
        return $etat;
    };



// fonction pour renvoyer les commentaires d'un USER
    function getComUser($id) {
        $comUser = getComUserdB($id);
    };