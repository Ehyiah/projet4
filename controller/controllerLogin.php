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
            $Session = new SessionFlash();
            $Session->setFlash('Mauvais identifiant (et/ou Mot de passe)', 'red');
        }  
        elseif ($resultat != $passCorrect)  {
            $Session = new SessionFlash();
            $Session->setFlash('Mauvais identifiant (et/ou Mot de passe)', 'red');
        }
        else {
            if ($passCorrect) {
                $_SESSION['ID'] = $resultat['ID'];
                $_SESSION['PSEUDO'] = $resultat['PSEUDO'];
                $_SESSION['GROUPE'] = $resultat['GROUPE'];
                $_SESSION['MAIL'] = $resultat['MAIL'];

                $Session = new SessionFlash();
                $Session->setFlash('Vous êtes maintenant connecté en tant que ' . htmlspecialchars($_SESSION['PSEUDO']), 'green');
            }
        }
    };




// fonction de vérification et de création de nouveaux membres
    function registerUser($nom,$mot_de_passe,$email) {
        $loginManager = new LoginManager();

        $userExist = $loginManager->checkIfUserExist($nom);
            if ($userExist > 0) {
                $Session = new SessionFlash();
                $Session->setFlash('Nom d\'utilisateur deja enregistré', 'red');
            } else {
                $loginManager->createNewUser($nom, $mot_de_passe, $email);

                $Session = new SessionFlash();
                $Session->setFlash('Nouvel utilisateur enregistré avec succès', 'green');
            }
    };



// fonction pour renvoyer les commentaires d'un USER dans espace membre
    function getComUser($id) {
        $loginManager = new LoginManager();

        $comUser = $loginManager->getComUserdB($id);
    };

//
