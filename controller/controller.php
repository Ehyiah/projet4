<?php
require_once('model/modelPost.php');
require_once('model/dbManager.php');


// affichage page accueil et premier billet
function viewHome()
    {
        $postManager = new PostManager();
        $comManager = new ComManager();

        $billMenu = $postManager->billMenu();
        $firstBill = $postManager->getFirstPost();
        $billets = $postManager->getPost5();
        $comm = $comManager->getComs5();

        require('view/home.php');
    };


// affichage d'un billet et ses commentaires
function displayBill() 
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $postManager = new PostManager();
            $comManager = new ComManager();

            $post = $postManager->getPost($_GET['id']);
            $comments = $comManager->getComments($_GET['id']);
            $billMenu = $postManager->billMenu();
            
            require('view/vueCom.php');
        }
        else {
            // echo 'Erreur : aucun identifiant de billet envoyé';
            $Session = new SessionFlash();
            $Session->setFlash('Erreur : aucun identifiant/identifiant inconnu de billet envoyé', 'red');

            viewHome();
        };

    };

