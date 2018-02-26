<?php include("connect.php");

echo (" ID du billet : " . $_GET['id_billet']);



/* AFFICHAGE DU BILLET SELECTIONNE */

    $req = $bdd->prepare('SELECT * FROM billet WHERE ID = ?');
    $req->execute(array($_GET['id_billet']));
    $donnees = $req->fetch();
    ?>

    <h1>Affichage des commentaires du billet sélectionné</h1>
    <h2>Billet</h2>
            <?php echo "titre : " . $donnees['TITRE']; ?>
            </br>
            <?php echo "date : " . $donnees['DATE']; ?>
            </br>
            <?php echo "contenu : " . $donnees['CONTENU']; ?></p>

    <?php $req->closeCursor(); ?>



<!-- AFFICHAGE DES COMMENTAIRES LIES AU BILLET SELECTIONNE -->

    <h2>Commentaires</h2>

    <?php
    $req = $bdd->prepare('SELECT * FROM commentaires WHERE ID_BILLET = ?');
    $req->execute(array($_GET['id_billet']));

    while ($donnees = $req->fetch()) 
    { 
    ?>
        <p>Auteur : <?php echo $donnees['AUTEUR'];?></p> 
        <p>Commentaire : <?php echo $donnees['CONTENU']; ?></p> 

    <?php
    };
    $req->closeCursor();
    ?>
