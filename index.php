<?php
session_start();

require_once('controller/controller.php');
require_once('controller/controllerCom.php');
require_once('controller/controllerLogin.php');


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listPosts') {
        listPosts();
    }

    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }

    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }

    elseif ($_GET['action'] == 'login') {
        displayLogin();
    }   
    
    
    elseif ($_GET['action'] == 'loginSubmit') {
        $resultat = login($_POST['nom']);
        authUser($resultat);
        
        displayLogin();
    }

    elseif ($_GET['action'] == 'signUp') {
        newUser($_POST['nom'], $_POST['mot_de_passe'], $_POST['email']);



    }  

    elseif ($_GET['action'] == 'logout') {
            $_SESSION = array();    
            session_destroy();
            displayLogin();
    }   


    elseif ($_GET['action'] == 'bill') {
        displayBill();
    }

}
else {
    viewHome();
}






