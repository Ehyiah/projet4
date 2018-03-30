<?php
require_once('model/modelPost.php');

// fonction de publication de nouvel épisode
// publish new episode

function newEpisode($titreEpisode, $contenuEpisode)
    {
        $postManager = new PostManager();

        $publish = $postManager->publishEpisode($titreEpisode, $contenuEpisode);

        $Session = new SessionFlash();
        $Session->setFlash('L\'épisode a bien été publié', 'green');
    };

