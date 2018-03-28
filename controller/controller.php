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
        $postManager = new PostManager();
        $comManager = new ComManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $comManager->getComments($_GET['id']);
        $billMenu = $postManager->billMenu();
        
        require('view/vueCom.php');
    };

