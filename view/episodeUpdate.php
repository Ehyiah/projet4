

<!-- partie concernant la modification des épisodes -->
    <?php
    $billets = getPosts5();
    ?>

    <?php ob_start() ?>

    <!-- affichier la liste des épisodes -->
    <p><strong>Sélectionnez l'épisode à modifier</strong></p>
    <div class="divider"></div>

        <?php 
            while ($reponsepost = $billets->fetch()) {

        ?>
            <a href="">
            <?= $reponsepost['TITRE']; ?></a>
            
            <p>Auteur : <?php echo $reponsepost['AUTEUR']; ?></p>
            <div class="divider"></div>
        <?php
            }
            $billets->closeCursor();
        ?>
    <?php $episodeUpdate = ob_get_clean(); ?>

<!-- au clic sur l'épisode renvoyer vers la page login en ajoutant un include dans la vue
contenant l'épisode à l'aide de variables -->


<!-- partie concernant la suppression des épisodes -->
    <?php
    $billets = getPosts5();
    ?>

    <?php ob_start(); ?>
    <!-- liste des épisodes à supprimer -->
    <p><strong>Sélectionnez l'épisode à supprimer</strong></p>

        <?php 
            while ($reponsepost = $billets->fetch()) {

        ?>
            <a href="index.php?idBill=<?php echo $reponsepost['ID']?>&amp;action=episodeDelete#deleteEpisode">
            <?= $reponsepost['TITRE']; ?></a>
            
            <p>Auteur : <?php echo $reponsepost['AUTEUR']; ?></p>
            <div class="divider"></div>
        <?php
            }
            $billets->closeCursor();
        ?>

    <?php $episodeDelete = ob_get_clean(); ?>


<!-- partie concernant la modération des commentaires signalés -->
    <?php 
    $signaledCom = signaledComDb() 
    ?>
    
    <?php ob_start(); ?>
        <?php 
            while ($reponsecom = $signaledCom->fetch()) {
        ?>
            <p><strong>Auteur du commentaire : </strong> <?= $reponsecom['AUTEUR_COM']?></p>
            <p><strong>Contenu du commentaire : </strong> <?= $reponsecom['CONTENU'] ?></p>
            <strong><?= $reponsecom['TITRE_BILLET'] ?></strong>
            <a href="index.php?action=comDelete&amp;idCom=<?= $reponsecom['ID_COM'] ?>&amp;etatCom=active#signaledCom">Supprimer le commentaire </a>
            <a href="index.php?action=comValidate&amp;idCom=<?= $reponsecom['ID_COM'] ?>&amp;etatCom=active#signaledCom"> Valider le commentaire</a>
            <div class="divider"></div>
        <?php
            }
            $signaledCom->closeCursor();
        ?>


    <?php $contentSignaledCom = ob_get_clean(); ?>
