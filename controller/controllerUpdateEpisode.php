<?php

require_once('model/modelUpdateEpisode.php');

// fonction pour delete un episode en appelant la fonction dans le model
    function deleteEpisode($idBillet) {
        $delete = deleteEpisodeDb($idBillet);
    };


// fonction pour afficher les commentaires signalés
    function signaledCom() {
        $signaledCom = signaledComDb();
    };

    // fonction pour supprimer un commentaire signalé
        function deleteSignaledCom($idCom) {
            $idCom = deleteSignaledComDb($idCom);
        };
    // fonction pour accepter un commentaire signalé
        function acceptSignaledCom($idCom) {
            $accept = acceptSignaledComDb($idCom);
        };


// au clic sur l'épisode présent dans la liste, ouverture d'une division
// permettant de récupérer le titre et le contenu et de 
// l'envoyer dans un tinyMCE


// fonction pour modifier un épisode
    function updateEpisode() {
        $update = updateEpisodeDb();
//        include('view/login.php');
        // tenter d'ajouter le include dans une variable transmise au clic de modification d'un épisode

    };

