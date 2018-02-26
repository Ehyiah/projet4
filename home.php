<!DOCTYPE html>
<html lang="fr">
    <head>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/style.css" />
        <title>Jean Forteroche, "Billet simple pour l'Alaska"</title>
		<!-- favicon -->
		<link rel="icon" type="image/png" href="images/favicon.png" />
		<meta name="description" content="Blog de Jean Forteroche, écrivain">
		<!-- Open Graph data -->
		<meta property="og:title" content="Blog de Jean Forteroche, écrivain" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="http://projet4.gostiaux.net/" />
		<meta property="og:image" content="http://projet4.gostiaux.net/images/logo.png" />
		<meta property="og:description" content="Blog de Jean Forteroche, écrivain"	/>
		<!-- Twitter Card data -->
		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="Jean Forteroche">
		<meta name="twitter:title" content="Jean Forteroche, Billet simple pour l'Alaska">
		<meta name="twitter:description" content="Blog de Jean Forteroche, écrivain">
		<meta name="twitter:image" content="http://projet4.gostiaux.net/images/logo.png">
    </head>

    <body>
		<!-- HEADER AVEC MENU -->
			<!-- include header et menu -->
			<?php include("includes/header.html");?>



		<!-- CONTENU CENTRAL DU SITE -->
		<div class="container">
			
			<!-- SLIDER -->
			<section class="slider">
				<ul class="slides">
					<li>
						<img src="images/diapo/02.jpg">
						<div class="caption center-align">
							<h3 class="black-text text-darken-3">Bienvenue sur le blog de Jean Forteroche</h3>
							<h5 class="black-text text-darken-3">Retrouvez régulièrement mes dernières publications</h5>
						</div>
					</li>
					<li>
						<img src="images/diapo/01.jpg">
						<div class="caption center-align">
							<h3 class="black-text text-darken-3">Mon dernier roman</h3>
							<h5 class="black-text text-darken-3">se déroule sur une terre paradisiaque</h5>
						</div>
					</li>
					<li>
						<img src="images/diapo/03.jpg">
						<div class="caption right-align">
							<h3 class="black-text text-darken-3">Alors prenez donc un : </h3>
							<h5 class="black-text text-darken-3">"Billet simple pour l'Alaska"</h5>
						</div>
					</li>
				</ul>
			</section>
			
			
			<!-- CONTENU DU BLOG -->
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
							contenu épisode <br>

							<p> affichage contenu BDD titre épisode</p>

							<?php
								try {
									$bdd = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
									// $bdd = new PDO('mysql:host=db724862783.db.1and1.com;dbname=db724862783;charset=utf8', 'dbo724862783', 'Chobits69');

								} catch (Exception $e) {
									die ('Erreur : ' . $e->getMessage());
								}
							
								$reponse = $bdd->query('SELECT * FROM billet');

								while ($donnees = $reponse->fetch()) {
							?>
								<p>Affichage Titre épisode de la BDD</p> <?php echo $donnees['TITRE'];?>
							<?php
								}
								$reponse->closeCursor(); // Termine le traitement de la requête
							?>

						</div>

					<!-- menu des épisodes et derniers commentaires -->
						<div class="col s12 m4 l3">
							<div class="row">
								<div class="col s12">
									<p>Liste des derniers épisodes</p>


									<div class="divider"></div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<p>Les 5 derniers commentaires</p>
										<!-- RECUPERATION DES 5 DERNIERS COMMENTAIRES -->
										<?php
											$comm = $bdd->query('SELECT * FROM commentaires ORDER BY ID DESC LIMIT 5');
											while ($reponsecomm = $comm->fetch()) {
										?>
											<p>ID : <?php echo $reponsecomm['ID']; ?> </p>
											<p>Auteur : <?php echo $reponsecomm['AUTEUR']; ?> </p>
											<p>Commentaire : <?php echo $reponsecomm['CONTENU']; ?> </p>

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


		</div>


		<!-- FOOTER -->
			<!-- include du footer -->
			<?php include("includes/footer.html");?>


		<!-- SCRIPTS -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	<!-- JQuery -->
			<script type="text/javascript" src="js/materialize.min.js"></script>						<!-- Materialize -->
			<script src="js/main.js"></script> 															<!-- JS d'initialisation -->
    </body>
</html>
