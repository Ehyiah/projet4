<?php
require_once('model/modelPost.php');
require_once('model/dbManager.php');



function viewHome()
    {
        $postManager = new PostManager();
        $comManager = new ComManager();

        $billets = $postManager->getPost5();
        $comm = $comManager->getComs5();
        $firstBill = $postManager->getFirstPost();
        $billMenu = $postManager->billMenu();

        require('view/home.php');
    };



/*
function post()
    {
        $lastBill = getPost($_GET['id']);
        $comm = getComs5($_GET['id']);

        require('view/template.php');
    };
*/

function displayBill() {
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $postManager = new PostManager();
        $comManager = new ComManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $comManager->getComments($_GET['id']);
        $billMenu = $postManager->billMenu();
        
        require('view/vueCom.php');
    }
    else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    };

};