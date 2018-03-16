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


// fonction pour modifier un épisode
    function updateEpisode($id, $titre, $contenu) {
        $update = updateEpisodeDb($id, $titre, $contenu);
    };




// fonctions de tests
    function displayComSignaled()
        {
            $signaledCom = signaledComDb();
            require('view/test.php');
        }