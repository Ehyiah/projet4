

<!-- partie concernant la modification des épisodes -->
<!-- updating episode -->
    <?php
    $postManager = new PostManager();
    $billets = $postManager->getPosts();
    ?>

    <?php ob_start() ?>

    <!-- affichier la liste des épisodes -->
    <!-- show list of episodes -->
    <p><strong>Sélectionnez l'épisode à modifier</strong></p>
    <div class="divider"></div>

        <?php 
            while ($reponsepost = $billets->fetch()) {

        ?>

            <p>Auteur : <?php echo $reponsepost['AUTEUR']; ?></p>

            <ul class="collapsible popout">
                <li>
                    <div class="collapsible-header">
                    <?= $reponsepost['TITRE']; ?>

                    </div>
                    <div class="collapsible-body">
                            <form action="index.php?action=episodeUpdate&amp;idBill=<?= $reponsepost['ID']?>&amp;etatUpdate=active#updateEpisode" method="post">
                                <textarea class="mytexttitleUpdate" name="titreEpisodeUpdate">
                                    <?= $reponsepost['TITRE']; ?>
                                </textarea>

                                <textarea class="mytextareaUpdate" name="contenuEpisodeUpdate">
                                    <?= $reponsepost['CONTENU'] ?>
                                </textarea>

                                <button class="btn waves-effect waves-light" type="submit" name="publishUpdate">Mettre à jour l'épisode
                                    <i class="material-icons right">send</i>
                                </button>
                        </form>
                        
                    </div>
                </li>
            </ul>

            <div class="divider"></div>
        <?php
            }
            $billets->closeCursor();
        ?>
    <?php $episodeUpdate = ob_get_clean(); ?>





<!-- partie concernant la suppression des épisodes -->
<!-- delete episodes -->
    <?php
    $billets = $postManager->getPosts();
    ?>

    <?php ob_start(); ?>
    <!-- liste des épisodes à supprimer -->
    <!-- list of episodes to delete -->
    <p><strong>Sélectionnez l'épisode à supprimer</strong></p>

        <?php 
            while ($reponsepost = $billets->fetch()) {

        ?>
            <a class="modal-trigger" href="#modal3<?php echo $reponsepost['ID']?>">
            <?= $reponsepost['TITRE']; ?></a>
            
            <p>Auteur : <?php echo $reponsepost['AUTEUR']; ?></p>
            <div class="divider"></div>


            <!-- modal de suppression -->
            <div id="modal3<?php echo $reponsepost['ID']?>" class="modal">
                <div class="modal-content">
                    <h4>Etes-vous sur de vouloir supprimer cet épisode ?</h4>
                </div>
                <div class="modal-footer">
                    <a href="index.php?idBill=<?php echo $reponsepost['ID']?>&amp;action=episodeDelete&amp;etatDel=active#deleteEpisode" class="modal-action modal-close waves-effect waves-green btn-flat ">Oui</a>

                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Non</a>
                </div>
            </div>
        <?php
            }
            $billets->closeCursor();
        ?>

    <?php $episodeDelete = ob_get_clean(); ?>







<!-- partie concernant la modération des commentaires signalés -->
<!-- manage comments -->
    <?php 
    $comManager = new ComManager();
    $signaledCom = $comManager->signaledComDb() 
    ?>
    
    <?php ob_start(); ?>
        <?php 
            while ($reponsecom = $signaledCom->fetch()) {
        ?>
            <p><strong>Auteur du commentaire : </strong> <?= htmlspecialchars($reponsecom['AUTEUR_COM'])?></p>
            <p><strong>Contenu du commentaire : </strong> <?= htmlspecialchars($reponsecom['CONTENU']) ?></p>
            <strong><?= $reponsecom['TITRE_BILLET'] ?></strong>

            <a class="waves-effect waves-light btn modal-trigger" href="#modal2<?php echo $reponsecom['ID_COM']?>">Supprimer </a>
            <a class="waves-effect waves-light btn modal-trigger" href="#modal<?php echo $reponsecom['ID_COM']?>"> Valider</a>

            <div class="divider"></div>


                <!-- modal de confirm -->
                <div id="modal<?php echo $reponsecom['ID_COM']?>" class="modal">
                    <div class="modal-content">
                        <h4>Etes-vous sur de vouloir valider ce commentaire ?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php?action=comValidate&amp;idCom=<?= $reponsecom['ID_COM'] ?>&amp;etatCom=active#signaledCom" class="modal-action modal-close waves-effect waves-green btn-flat ">Oui</a>

                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Non</a>
                    </div>
                </div>
                <!-- modal de suppression -->
                <div id="modal2<?php echo $reponsecom['ID_COM']?>" class="modal">
                    <div class="modal-content">
                        <h4>Etes-vous sur de vouloir supprimer ce commentaire ?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php?action=comDelete&amp;idCom=<?= $reponsecom['ID_COM'] ?>&amp;etatCom=active#signaledCom" class="modal-action modal-close waves-effect waves-green btn-flat ">Oui</a>

                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Non</a>
                    </div>
                </div>

        <?php
            }
            $signaledCom->closeCursor();
        ?>


    <?php $contentSignaledCom = ob_get_clean(); ?>
