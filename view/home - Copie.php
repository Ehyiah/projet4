<!DOCTYPE html>
<html lang="fr">
    <head>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="public/css/materialize.min.css"  media="screen,projection"/>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="public/css/style.css" />
        <title>Jean Forteroche, "Billet simple pour l'Alaska"</title>
		<!-- favicon -->
		<link rel="icon" type="image/png" href="public/images/favicon.png" />
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
			<header>
				<!-- menu classique desktop -->
					<div class="navbar-fixed" id="menuDesktop">
						<nav>
							<a href="http://projet4.gostiaux.net" id="logo">
								<img src="public/images/logo.png" alt="Logo du site">
							</a>

							<!-- contenu menu déroulant pour les épisodes -->
								<ul id="dropdown1" class="dropdown-content">
									<?php echo $contentMenuHome ?>
								</ul>

							<ul class="right hide-on-med-and-down" id="menuDroit">
								<li><a href="http://projet4.gostiaux.net"><i class="material-icons left">home</i>Accueil</a></li>
								<li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons left">local_library</i>Episodes<i class="material-icons right">arrow_drop_down</i></a></li>
								<li><a href="index.php?action=login"><i class="material-icons left">lock_open</i>Identification</a></li>
							</ul>
						</nav>
					</div>

				<!-- menu mobile responsive -->
					<div id="menuMobile">
						<nav>
							<div class="nav-wrapper" class="navbar-fixed">
									<a href="http://projet4.gostiaux.net" id="logo">
										<img src="public/images/logo.png" alt="Logo du site">
									</a>
									<a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
							</div>
						</nav>
							<!-- elements du menu responsive -->
								<ul id="dropdown2" class="dropdown-content">
									<?php echo $contentMenuHome ?>
								</ul>

							<ul class="sidenav" id="mobile-menu">
								<li><a href="http://projet4.gostiaux.net">Accueil</a></li>
								<li><a href="#!" class="dropdown-trigger" data-target="dropdown2">Episodes</a></li>
								<li><a href="index.php?action=login">Identification</a></li>
							</ul>
					</div>
				</header>



		<!-- CONTENU CENTRAL DU SITE -->
			<div class="container">
				
				<!-- SLIDER -->
					<section class="slider">
						<ul class="slides">
							<li>
								<img src="public/images/diapo/02.jpg">
								<div class="caption center-align">
									<h3 class="black-text text-darken-3">Bienvenue sur le blog de Jean Forteroche</h3>
									<h5 class="black-text text-darken-3">Retrouvez régulièrement mes dernières publications</h5>
								</div>
							</li>
							<li>
								<img src="public/images/diapo/01.jpg">
								<div class="caption center-align">
									<h3 class="black-text text-darken-3">Mon dernier roman</h3>
									<h5 class="black-text text-darken-3">se déroule sur une terre paradisiaque</h5>
								</div>
							</li>
							<li>
								<img src="public/images/diapo/03.jpg">
								<div class="caption right-align">
									<h3 class="black-text text-darken-3">Alors prenez donc un : </h3>
									<h5 class="black-text text-darken-3">"Billet simple pour l'Alaska"</h5>
								</div>
							</li>
						</ul>
					</section>
				
				
				<!-- BLOG -->
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
			</div>


		<!-- FOOTER -->
			<footer class="page-footer">
				<div>
					<p> Test footer </p>
					<div class="divider"></div>
				</div>
			</footer>


		<!-- SCRIPTS -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	<!-- JQuery -->
			<script type="text/javascript" src="public/js/materialize.min.js"></script>						<!-- Materialize -->
			<script src="public/js/main.js"></script> 															<!-- JS d'initialisation -->
    </body>
</html>
