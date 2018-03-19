<?php

require_once('model/modelPost.php');


// fonction pour delete un episode en appelant la fonction dans le model
    function deleteEpisode($idBillet) {
        $postManager = new PostManager();

        $delete = $postManager->deleteEpisodeDb($idBillet);
    };


// fonction pour afficher les commentaires signalés
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


// fonction pour modifier un épisode
    function updateEpisode($id, $titre, $contenu) {
        $postManager = new PostManager();

        $update = $postManager->updateEpisodeDb($id, $titre, $contenu);
    };


// fonction pour réunir les fonctions affichant dans la pageLOGIN et faire un appel de la vue



// fonctions de modifications (celles avec des paramètres)






// fonctions de tests
    function displayComSignaled() {
        $comManager = new ComManager();

        $signaledCom = $comManager->signaledComDb();
    };

