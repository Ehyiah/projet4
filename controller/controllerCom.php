<?php
require_once('model/modelCom.php');


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