<?php
require_once('model/modelCom.php');

// ajout d'un commentaire
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


// signaler un commentaire
    function signalCom($id) {
        $comManager = new ComManager();

        $update = $comManager->signalComDb($id);
    };


    

// fonction pour afficher les commentaires signalés dans backend
function signaledCom() {
    $comManager = new ComManager();

    $signaledCom = $comManager->signaledComDb();
};

// fonction pour supprimer un commentaire signalé
    function deleteSignaledCom($idCom) {
        $comManager = new ComManager();

        $idCom = $comManager->deleteSignaledComDb($idCom);
    };

// fonction pour accepter un commentaire signalé
    function acceptSignaledCom($idCom) {
        $comManager = new ComManager();

        $accept = $comManager->acceptSignaledComDb($idCom);
    };
