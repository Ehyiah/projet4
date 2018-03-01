<?php
require('../model/modelCom.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost0($_GET['id']);
    $comments = getComments0($_GET['id']);
    require('../view/vueCom.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}

