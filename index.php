<?php
session_start();

require_once('controller/controller.php');
require_once('controller/controllerCom.php');
require_once('controller/controllerLogin.php');
require_once('controller/controllerNewEpisode.php');
require_once('controller/controllerUpdateEpisode.php');

require_once('controller/controllerFlash.php');


if (isset($_GET['action'])) {
    // post d'un commentaire
    if ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment'], $_SESSION['ID']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }

    // affichage page des membres
    elseif ($_GET['action'] == 'login') {
        displayLogin();
    }   
    // connection du membre
    elseif ($_GET['action'] == 'loginSubmit') {
        $resultat = testLogIn($_POST['nom']);

        authUser($resultat);
        displayLogin();
    }

    elseif ($_GET['action'] == 'signUp') {
        // appelle des fonctions qui vérifie si utilisateur deja enregistré puis création de l'utilisateur
        $etat = registerUser($_POST['nom'], $_POST['mot_de_passe'], $_POST['email']);
        displayLogin();
        
        /*
            if ($etat > 0) {
                // utilisateur existe deja
                $etat = 'utilisateur deja enregistré';
                displayLoginError($etat);
            } else {
                // nouvel utilisateur a été créé on redirige vers la page des membres
                displayLogin();
            }
        */
    }  
    // deconnection du membre
    elseif ($_GET['action'] == 'logout') {
            $_SESSION = array();    
            session_destroy();
            displayLogin();
    }   

    // affichage billet
    elseif ($_GET['action'] == 'bill') {
        displayBill();
    }

    // publication nouvel épisode
    elseif ($_GET['action'] == 'newEpisode') {
        newEpisode($_POST['titreEpisode'], $_POST['contenuEpisode']);
        displayLogin();

    }
    // modification épisode
    elseif ($_GET['action'] == 'episodeUpdate') {
        updateEpisode($_GET['idBill'], $_POST['titreEpisodeUpdate'], $_POST['contenuEpisodeUpdate']);
        displayLogin();


    }
    // suppression épisode
    elseif ($_GET['action'] == 'episodeDelete') {
        deleteEpisode($_GET['idBill']);
        // header("Location: ".$_SERVER['HTTP_REFERER']."");
        displayLogin();
    }

    // suppression d'un commentaire signalé
    elseif ($_GET['action'] == 'comDelete') {
        deleteSignaledCom($_GET['idCom']);
        displayLogin();
    }
    // validation d'un commentaire signalé
    elseif ($_GET['action'] == 'comValidate') {
        acceptSignaledCom($_GET['idCom']);
        displayLogin();        
    }
    // signalement d'un commentaire
    elseif ($_GET['action'] == 'signalCom') {
        signalCom($_GET['idCom']);
        header("Location: ".$_SERVER['HTTP_REFERER']."");

    }

}
else {
    viewHome();
}


