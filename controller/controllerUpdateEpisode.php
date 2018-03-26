<?php

require_once('model/modelPost.php');


// fonction pour supprimer un episode
    function deleteEpisode($idBillet) {
        $postManager = new PostManager();

        $delete = $postManager->deleteEpisodeDb($idBillet);

        $Session = new SessionFlash();
        $Session->setFlash('L\'épisode a bien été supprimé', 'red');

    };


// fonction pour modifier un épisode
    function updateEpisode($id, $titre, $contenu) {
        $postManager = new PostManager();

        $update = $postManager->updateEpisodeDb($id, $titre, $contenu);

        $Session = new SessionFlash();
        $Session->setFlash('L\'épisode a bien été modifié', 'green');
    };


