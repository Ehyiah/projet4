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
		<header>
			<!-- menu classique desktop -->
			<div class="navbar-fixed" id="menuDesktop">
				<nav>
					<a href="http://projet4.gostiaux.net" id="logo">
						<img src="images/logo.png" alt="Logo du site">
					</a>

					<ul class="right hide-on-med-and-down" id="menuDroit">
						<li><a href="#"><i class="material-icons left">home</i>Accueil</a></li>
						<li><a href=""><i class="material-icons left">local_library</i>Episodes</a></li>
						<li><a href=""><i class="material-icons left">lock_open</i>Identification</a></li>
					</ul>
				</nav>
			</div>

			<!-- menu mobile responsive -->
			<div id="menuMobile">
				<nav>
					<div class="nav-wrapper" class="navbar-fixed">
							<a href="http://projet4.gostiaux.net" id="logo">
								<img src="images/logo.png" alt="Logo du site">
							</a>
							<a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					</div>
				</nav>
					<!-- elements du menu responsive -->
					<ul class="sidenav" id="mobile-menu">
						<li><a href="sass.html">Accueil</a></li>
						<li><a href="badges.html">Episodes</a></li>
						<li><a href="collapsible.html">Identification</a></li>
					</ul>
			</div>
		</header>



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
						<p>Bienvenue sur mon blog</p>
						<div class="divider"></div>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<p>Vous retrouvez sur ce blog, en exclusivité la publication de mon nouveau roman dont voici le premier épisode</p>
						<div class="divider"></div>
					</div>

					<!-- corps de l'épisode -->
						<div class="col s12 m8 l9">
							contenu épisode <br>
							<?php echo "test affichage PHP";
							?>
						</div>

					<!-- menu des épisodes et derniers commentaires -->
						<div class="col s12 m4 l3">
							<div class="row">
								<div class="col s12">
									menu épisode
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									derniers commentaires
								</div>
							</div>
						</div>
				</div>
			</section>


			<!-- FOOTER -->
			<footer>
				footer
			</footer>
		</div>

		<!-- SCRIPTS -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	<!-- JQuery -->
			<script type="text/javascript" src="js/materialize.min.js"></script>					<!-- Materialize -->
			<script src="js/main.js"></script> 													<!-- JS d'initialisation -->
    </body>
</html>
