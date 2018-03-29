<?php $title = "Acceuil Jean Forteroche" ?>


<?php ob_start() ?>
	<section id="contenu">

		<div class="row">
			<div class="col s12">
				<h1>Bienvenue sur mon blog</h1>
				<div class="divider"></div>
			</div>
		</div>

		<div class="row">
			<div class="col s12">
				<p><strong>Vous retrouvez sur ce blog, en exclusivité la publication de mon nouveau roman dont voici le premier épisode</strong></p>
				<div class="divider"></div>
			</div>

			<!-- corps de l'épisode -->
				<div class="col s12 m8 l9">
				<!-- affichage du premier billet -->							
					<?php
						while ($donnees = $firstBill->fetch()) {
					?>
						<div class="divider"></div>
						
						<div class="center-align">
							<?php echo ($donnees['TITRE']);?></p>
						</div>
						<?= $donnees['CONTENU'] ?>

						<div class="divider"></div>

					
						<em><a href="index.php?action=bill&amp;id=<?php echo $donnees['ID']; ?>">Voir les commentaires sur cet épisode</a></em>
						
						
						<?php
						}
						$firstBill->closeCursor(); // Termine le traitement de la requête
						?>

				
				</div>

			<!-- menu des épisodes et derniers commentaires -->
				<div class="col s12 m4 l3" id="menudroit">
					<div class="row" id="billetdroit">
						<div class="col s12">
							<p><strong>Liste des derniers épisodes</strong></p>
							<div class="divider"></div>
								<?php 
									while ($reponsepost = $billets->fetch()) {

								?>
									<!-- <p>ID : <?php echo $reponsepost['ID']; ?></p> -->
									<p>Auteur : <?php echo htmlspecialchars($reponsepost['AUTEUR']); ?></p>
									<p>Titre : <?php echo strip_tags($reponsepost['TITRE']); ?></p>
									<div class="divider"></div>
								<?php
									}
									$billets->closeCursor();
								?>


						</div>
					</div>

					<div class="row" id="commentairedroit">
						<div class="col s12">
							<p><strong>Les 5 derniers commentaires</strong></p>
							<div class="divider"></div>
								<!-- RECUPERATION DES 5 DERNIERS COMMENTAIRES -->
								<?php
									while ($reponsecomm = $comm->fetch()) {
								?>
									<!-- <p>ID : <?php echo $reponsecomm['ID']; ?> </p> -->
									<p>Auteur : <?php echo htmlspecialchars($reponsecomm['AUTEUR']); ?> </p>
									<p>Commentaire : <?php echo htmlspecialchars($reponsecomm['CONTENU']); ?> </p>

									<div class="divider"></div>
								<?php		
									}
									$comm->closeCursor();
								?>


							<div class="divider"></div>
						</div>
					</div>
				</div>
		</div>
	</section>

<?php $content = ob_get_clean(); ?>


<?php ob_start(); ?>
    <?php 
        foreach($billMenu as $menu)
        {
    ?>
        <li><a href="index.php?action=bill&amp;id=<?php echo $menu['ID']; ?>"><?php echo $menu['TITRE'] ?></a></li>
        <li class="divider"></li>

    <?php
        }
    ?>

<?php $contentMenu = ob_get_clean(); ?>

<?php require('template.php'); ?>