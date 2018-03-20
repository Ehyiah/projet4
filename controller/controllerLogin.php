<?php
require_once('model/modelLogin.php');

// page de connection et membres
function displayLogin() {
    $postManager = new PostManager();
    $logManager = new LoginManager();

    $billMenu = $postManager->billMenu();

    if (isset($_SESSION['ID'])) {

        $comUser = $logManager->getComUserdB($_SESSION['ID']);
    }

    require ('view/episodeUpdate.php');
    require ('view/login.php');
};


// fonction pour utilisateur deja enregistré
    function displayLoginError($etat) {
        $postManager = new PostManager();

        $billMenu = $postManager->billMenu();
        require ('view/login.php');
    };

// fonction login pour récupérer les infos depuis la BDD
    function testLogIn($test)
    {
        $loginManager = new LoginManager();

        $resultat = $loginManager->login($test);

        return $resultat;
    }

// fonction pour la connection de l'utilisateur si mot de passe correspond
    function authUser($resultat) {
        $passCorrect = password_verify($_POST['mot_de_passe'], $resultat['PASS']);

        if ($_POST['mot_de_passe'] == $passCorrect) {
            $passCorrect = true;
        } else {
            $passCorrect = false;
        }

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
        $loginManager = new LoginManager();

        $userExist = $loginManager->checkIfUserExist($nom);
            if ($userExist > 0) {
                $etat = 1;
            } else {
                $loginManager->createNewUser($nom, $mot_de_passe, $email);
                $etat = 0;
            }
        return $etat;
    };



// fonction pour renvoyer les commentaires d'un USER dans espace membre
    function getComUser($id) {
        $loginManager = new LoginManager();

        $comUser = $loginManager->getComUserdB($id);
    };

//
