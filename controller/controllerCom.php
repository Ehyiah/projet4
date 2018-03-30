<?php
require_once('model/modelCom.php');

// ajout d'un commentaire
// add new comment
function addComment($postId, $author, $comment, $idUser)
{
    $comManager = new ComManager();

    $affectedLines = $comManager->postComment($postId, $author, $comment, $idUser);

    if ($affectedLines === false) {
        $Session = new SessionFlash();
        $Session->setFlash('Impossible d\'ajouter le commentaire', 'red');
    }
    else {
        
    $Session = new SessionFlash();
    $Session->setFlash('Le commentaire a bien été ajouté', 'green');
    }
};


// signaler un commentaire
// signal a comment
    function signalCom($id) {
        $comManager = new ComManager();

        $update = $comManager->signalComDb($id);
        
        $Session = new SessionFlash();
        $Session->setFlash('Le commentaire a bien été signalé', 'green');
    };


    

// fonction pour afficher les commentaires signalés dans backend
// show signaled comments in backend
function signaledCom() {
    $comManager = new ComManager();

    $signaledCom = $comManager->signaledComDb();

};

// fonction pour supprimer un commentaire signalé
// delete signaled comment
    function deleteSignaledCom($idCom) {
        $comManager = new ComManager();

        $idCom = $comManager->deleteSignaledComDb($idCom);

        $Session = new SessionFlash();
        $Session->setFlash('Le commentaire a bien été supprimé', 'red');
    };

// fonction pour accepter un commentaire signalé
// approve signaled comment
    function acceptSignaledCom($idCom) {
        $comManager = new ComManager();

        $accept = $comManager->acceptSignaledComDb($idCom);
        
        $Session = new SessionFlash();
        $Session->setFlash('Le commentaire a bien été validé', 'green');
    };
