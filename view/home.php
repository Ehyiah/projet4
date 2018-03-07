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
					<p> affichage contenu BDD titre épisode</p>

				<!-- affichage du premier billet -->							
					<?php
						while ($donnees = $firstBill->fetch()) {
					?>
						<div class="divider"></div>
						<p>Titre épisode issu de la BDD : </p> <?php echo $donnees['TITRE'];?>
						<p>ID du billet : </p> <?php echo $donnees['ID'];?>
						<div class="divider"></div>

					
						<em><a href="index.php?action=bill&amp;id=<?php echo $donnees['ID']; ?>">Commentaires Test</a></em>
						
						
						<?php
						}
						$firstBill->closeCursor(); // Termine le traitement de la requête
						?>
					<h2>Commentaires</h2>

				
				</div>

			<!-- menu des épisodes et derniers commentaires -->
				<div class="col s12 m4 l3" id="menudroit">
					<div class="row" id="billetdroit">
						<div class="col s12">
							<p>Liste des derniers épisodes</p>
							<div class="divider"></div>
								<?php 
									while ($reponsepost = $billets->fetch()) {

								?>
									<p>ID : <?php echo $reponsepost['ID']; ?></p>
									<p>Auteur : <?php echo $reponsepost['AUTEUR']; ?></p>
									<p>Titre : <?php echo $reponsepost['TITRE']; ?></p>
									<div class="divider"></div>
								<?php
									}
									$billets->closeCursor();
								?>


						</div>
					</div>

					<div class="row" id="commentairedroit">
						<div class="col s12">
							<p>Les 5 derniers commentaires</p>
							<div class="divider"></div>
								<!-- RECUPERATION DES 5 DERNIERS COMMENTAIRES -->
								<?php
									while ($reponsecomm = $comm->fetch()) {
								?>
									<p>ID : <?php echo $reponsecomm['ID']; ?> </p>
									<p>Auteur : <?php echo $reponsecomm['AUTEUR']; ?> </p>
									<p>Commentaire : <?php echo $reponsecomm['CONTENU']; ?> </p>

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