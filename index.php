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
                header("Location: ".$_SERVER['HTTP_REFERER']."");

            }
            else {
                // echo 'Erreur : tous les champs ne sont pas remplis !';
                $Session = new SessionFlash();
                $Session->setFlash('Erreur : Tous les champs ne sont pas remplis !', 'red');
                header("Location: ".$_SERVER['HTTP_REFERER']."");

            }
        }
        else {
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Envoi du message impossible, aucun identifiant/identifiant inconnu de billet envoyé', 'red');
            header("Location: ".$_SERVER['HTTP_REFERER']."");
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
    // création nouveau membre
    elseif ($_GET['action'] == 'signUp') {
        // appelle des fonctions qui vérifie si utilisateur deja enregistré puis création de l'utilisateur
        if (isset($_POST['nom']) && $_POST['mot_de_passe'] && $_POST['email']) {
            $etat = registerUser($_POST['nom'], $_POST['mot_de_passe'], $_POST['email']);
        } else {
            // message erreur
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Tous les champs ne sont pas remplis !', 'red');        }
        
        displayLogin();

    }  
    // deconnection du membre
    elseif ($_GET['action'] == 'logout') {
            $_SESSION = array();    
            session_destroy();

            $Session = new SessionFlash();
            $Session->setFlash('Vous êtes maintenant déconnecté', 'red');
            
            viewHome();
    }   

    // affichage billet
    elseif ($_GET['action'] == 'bill') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            displayBill();
        } else {
            // message erreur
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : aucun identifiant/identifiant inconnu de billet envoyé', 'red');

            viewHome();
        }

    }

    // publication nouvel épisode
    elseif ($_GET['action'] == 'newEpisode') {
        if (!empty($_POST['titreEpisode']) && ($_POST['contenuEpisode'])) {
            newEpisode($_POST['titreEpisode'], $_POST['contenuEpisode']);
        } else {
            // tous les champs ne sont pas remplis
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Tous les champs ne sont pas remplis !', 'red');
        }

        displayLogin();
    }

    // modification épisode
    elseif ($_GET['action'] == 'episodeUpdate') {
        if(isset($_GET['idBill']) && $_GET['idBill'] > 0) {
            if(!empty($_POST['titreEpisodeUpdate']) && $_POST['contenuEpisodeUpdate'] ) {
                updateEpisode($_GET['idBill'], $_POST['titreEpisodeUpdate'], $_POST['contenuEpisodeUpdate']);
            } else {
                $Session = new SessionFlash();
                $Session->setFlash('Erreur : Tous les champs ne sont pas remplis !', 'red');
            }
        } else {
            // message erreur
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Aucun identifiant/Mauvais identifiant de billet envoyé !', 'red');
        }

        displayLogin();
    }
    // suppression épisode
    elseif ($_GET['action'] == 'episodeDelete') {
        if (isset($_GET['idBill']) & ($_GET['idBill'] > 0)) {
            deleteEpisode($_GET['idBill']);
        }  else {
            // message erreur
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Aucun identifiant/Mauvais identifiant de billet envoyé !', 'red');
        }

        displayLogin();
    }

    // suppression d'un commentaire signalé
    elseif ($_GET['action'] == 'comDelete') {
        if (isset($_GET['idCom']) && ($_GET['idCom'] > 0)) {
            deleteSignaledCom($_GET['idCom']);
        } else {
            // message erreur
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Aucun identifiant/Mauvais identifiant de commentaire envoyé !', 'red');
        }

        displayLogin();
    }
    // validation d'un commentaire signalé
    elseif ($_GET['action'] == 'comValidate') {
        if(isset($_GET['idCom']) && ($_GET['idCom'] > 0)) {
            acceptSignaledCom($_GET['idCom']);
        } else {
            // message erreur
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Aucun identifiant/Mauvais identifiant de commentaire envoyé !', 'red');
        }

        displayLogin();        
    }
    // signalement d'un commentaire
    elseif ($_GET['action'] == 'signalCom') {
        if (isset($_GET['idCom']) & ($_GET['idCom'] > 0)) {
            signalCom($_GET['idCom']);
            header("Location: ".$_SERVER['HTTP_REFERER']."");
        } else {
            // message erreur
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Aucun identifiant/Mauvais identifiant de commentaire envoyé !', 'red');

            displayBill();
        }
    }

}
else {
    viewHome();
}


