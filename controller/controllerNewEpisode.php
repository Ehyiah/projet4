<?php
require_once('model/modelPost.php');

// fonction de publication de nouvel épisode

function newEpisode($titreEpisode, $contenuEpisode)
    {
        $postManager = new PostManager();

        $publish = $postManager->publishEpisode($titreEpisode, $contenuEpisode);
    };

