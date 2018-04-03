<?php
session_start();

require_once('controller/controller.php');
require_once('controller/controllerCom.php');
require_once('controller/controllerLogin.php');
require_once('controller/controllerNewEpisode.php');
require_once('controller/controllerUpdateEpisode.php');

require_once('controller/controllerFlash.php');


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment'], $_SESSION['ID']);
                header("Location: ".$_SERVER['HTTP_REFERER']."");

            }
            else {
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

    // view member page
    elseif ($_GET['action'] == 'login') {
        displayLogin();
    }   
    // connection
    elseif ($_GET['action'] == 'loginSubmit') {
        $resultat = testLogIn($_POST['nom']);

        authUser($resultat);
        displayLogin();
    }
    // new member
    elseif ($_GET['action'] == 'signUp') {
        // check if user already exist // create new user
        if (isset($_POST['nom']) && $_POST['mot_de_passe'] && $_POST['email']) {
            registerUser($_POST['nom'], $_POST['mot_de_passe'], $_POST['email']);
        } else {
            // error message
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Tous les champs ne sont pas remplis !', 'red');        
        }
        
        displayLogin();

    }  
    // deconnection
    elseif ($_GET['action'] == 'logout') {
            $_SESSION = array();    
            session_destroy();

            $Session = new SessionFlash();
            $Session->setFlash('Vous êtes maintenant déconnecté', 'red');
            
            viewHome();
    }   

    // show bill
    elseif ($_GET['action'] == 'bill') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            displayBill();
        } else {
            // error message
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : aucun identifiant/identifiant inconnu de billet envoyé', 'red');

            viewHome();
        }
    }

    // publish new episode
    elseif ($_GET['action'] == 'newEpisode') {
        if (!empty($_POST['titreEpisode']) && ($_POST['contenuEpisode'])) {
            newEpisode($_POST['titreEpisode'], $_POST['contenuEpisode']);
        } else {
            // missing fields
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Tous les champs ne sont pas remplis !', 'red');
        }

        displayLogin();
    }

    // update episode
    elseif ($_GET['action'] == 'episodeUpdate') {
        if(isset($_GET['idBill']) && $_GET['idBill'] > 0) {
            if(!empty($_POST['titreEpisodeUpdate']) && $_POST['contenuEpisodeUpdate'] ) {
                updateEpisode($_GET['idBill'], $_POST['titreEpisodeUpdate'], $_POST['contenuEpisodeUpdate']);
            } else {
                $Session = new SessionFlash();
                $Session->setFlash('Erreur : Tous les champs ne sont pas remplis !', 'red');
            }
        } else {
            // error message
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Aucun identifiant/Mauvais identifiant de billet envoyé !', 'red');
        }

        displayLogin();
    }
    // delete episode
    elseif ($_GET['action'] == 'episodeDelete') {
        if (isset($_GET['idBill']) & ($_GET['idBill'] > 0)) {
            deleteEpisode($_GET['idBill']);
        }  else {
            // error message
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Aucun identifiant/Mauvais identifiant de billet envoyé !', 'red');
        }

        displayLogin();
    }

    // delete signaled com
    elseif ($_GET['action'] == 'comDelete') {
        if (isset($_GET['idCom']) && ($_GET['idCom'] > 0)) {
            deleteSignaledCom($_GET['idCom']);
        } else {
            // error message
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Aucun identifiant/Mauvais identifiant de commentaire envoyé !', 'red');
        }

        displayLogin();
    }
    // approve signaled com
    elseif ($_GET['action'] == 'comValidate') {
        if(isset($_GET['idCom']) && ($_GET['idCom'] > 0)) {
            acceptSignaledCom($_GET['idCom']);
        } else {
            // error message
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Aucun identifiant/Mauvais identifiant de commentaire envoyé !', 'red');
        }

        displayLogin();        
    }
    // signal a comment
    elseif ($_GET['action'] == 'signalCom') {
        if (isset($_GET['idCom']) & ($_GET['idCom'] > 0)) {
            signalCom($_GET['idCom']);
            header("Location: ".$_SERVER['HTTP_REFERER']."");
        } else {
            // error message
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : Aucun identifiant/Mauvais identifiant de commentaire envoyé !', 'red');

            displayBill();
        }
    }

}
else {
    viewHome();
}


