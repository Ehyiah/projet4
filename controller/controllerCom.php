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


function addComment($postId, $author, $comment)
{
    // var_dump($postId);        var_dump($author);        var_dump($comment);
    // var_dump($affectedLines);
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        displayBill();
    }
};