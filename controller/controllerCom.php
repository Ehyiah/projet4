<?php
require_once('model/modelCom.php');
require_once('model/modelPost.php');

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


function addComment($postId, $author, $comment, $idUser)
{
    $comManager = new ComManager();

    $affectedLines = $comManager->postComment($postId, $author, $comment, $idUser);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        displayBill();
    }
};


// fonction pour signaler un commentaire
    function signalCom($id) {
        $comManager = new ComManager();

        $update = $comManager->signalComDb($id);
    };