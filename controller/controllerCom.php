<?php
require_once('model/modelCom.php');

function displayBill() {
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $post = getPost0($_GET['id']);
        $comments = getComments0($_GET['id']);
        $billMenu = billMenu();
        
        require('view/vueCom.php');
    }
    else {
        echo 'Erreur : aucun identifiant de billet envoyé';
    };

};


function addComment($postId, $author, $comment, $idUser)
{
    $affectedLines = postComment($postId, $author, $comment, $idUser);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        displayBill();
    }
};


// fonction pour signaler un commentaire
    function signalCom($id) {
        $update = signalComDb($id);
    };