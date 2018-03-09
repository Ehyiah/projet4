<?php
require_once('model/modelNewEpisode.php');

// fonction de publication de nouvel épisode

function newEpisode($titreEpisode, $contenuEpisode)
    {
        $publish = publishEpisode($titreEpisode, $contenuEpisode);
    };

