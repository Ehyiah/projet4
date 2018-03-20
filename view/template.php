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
        <title><?= $title ?> </title>
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
		
		<!-- tinyMCE -->
		<!-- <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script> -->
		<script src="public/tinymce/tinymce.min.js"></script>
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
									<?php echo $contentMenu ?>
								</ul>
								
							<ul class="right hide-on-med-and-down" id="menuDroit">
								<li><a href="http://projet4.gostiaux.net"><i class="material-icons left">home</i>Accueil</a></li>
								<li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons left">local_library</i>Episodes<i class="material-icons right">arrow_drop_down</i></a></li>
								<?php 
									if(isset($_SESSION['PSEUDO'])) {
								?>
									<li><a href="index.php?action=logout"><i class="material-icons left">lock_open</i>Deconnection</a></li>
									<li><a href="index.php?action=login"><i class="material-icons left">contacts</i>Espace Membre</a></li>
								<?php
									} 
									else {
								?>
										<li><a href="index.php?action=login"><i class="material-icons left">lock_open</i>Identification</a></li>
								<?php
									}
								?>
							</ul>



							<!-- affichage pseudo par session -->
							<?php
								if (isset($_SESSION['PSEUDO'])) {
									echo 'Bonjour ' . $_SESSION['PSEUDO'];
								};
							?>
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
									<?php echo $contentMenu ?>
								</ul>

							<ul class="sidenav" id="mobile-menu">
								<li><a href="http://projet4.gostiaux.net">Accueil</a></li>
								<li><a href="#!" class="dropdown-trigger" data-target="dropdown2">Episodes</a></li>
								<?php 
									if(isset($_SESSION['PSEUDO'])) {
								?>
									<li><a href="index.php?action=logout"><i class="material-icons left">lock_open</i>Deconnection</a></li>
									<li><a href="index.php?action=login"><i class="material-icons left">contacts</i>Espace Membre</a></li>
								<?php
									} 
									else {
								?>
										<li><a href="index.php?action=login"><i class="material-icons left">lock_open</i>Identification</a></li>
								<?php
									}
								?>
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
									<h5 class="black-text text-darken-3">se déroule sur une terre lointaine</h5>
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
					<!-- content -->
						<section>
							<?php echo $content ?>
						</section>



			</div>	<!-- fin container -->


		<!-- FOOTER -->
			<footer class="page-footer">
				<div class="center">
					<p> 2018, Jean Forteroche </p>
					<div class="divider"></div>
				</div>
			</footer>




		<!-- SCRIPTS -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	<!-- JQuery -->
			<script type="text/javascript" src="public/js/materialize.min.js"></script>					<!-- Materialize -->
			<script src="public/js/main.js"></script> 													<!-- JS d'initialisation -->
    </body>
</html>
