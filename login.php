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
		<link rel="icon" type="image/png" href="../images/favicon.png" />
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



        <!-- CONTENU DE LA PAGE -->
            <?php
                // Le mot de passe n'a pas été envoyé ou n'est pas bon alors on affiche le formulaire
                if (!isset($_POST['mot_de_passe'])) { ?>
                    <div class="container">
                        <p>Veuillez vous connecter</p>
                        <form action="login.php" method="post">
                                <div class="divider"></div>
                            <!--
                            <div class="input-field col s12">
                                <input id="name" type="text" name="nom"/>
                                <label for="name">Nom</label>
                            </div>
                            -->
                            <div class="input-field col s12">
                                <input id="password" type="password" name="mot_de_passe"/>
                                <label for="password">Password</label>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </form>
                    </div>
                <?php 

                // si le mot de passe est incorrect
                } elseif ($_POST['mot_de_passe'] != "password") { ?>
                    <div class="container">
                        <p>Mot de passe incorrect</p>
                        <p>Veuillez réessayer</p>

                        <form action="login.php" method="post">
                                <div class="divider"></div>
                            <!--
                            <div class="input-field col s12">
                                <input id="name" type="text" name="nom"/>
                                <label for="name">Nom</label>
                            </div>
                            -->
                            <div class="input-field col s12">
                                <input id="password" type="password" name="mot_de_passe"/>
                                <label for="password">Password</label>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </form>
                    </div>
                <?php

                // si le mot de passe est le bon alors on affiche la page
                } else { ?>
                    <div class="container">
                        <p> Bienvenue Jean, vous êtes maintenant connecté dans votre espace personnel</p>
                        <div class="divider"></div>



                    </div>


                <?php
                };
                ?>










        <!-- FOOTER -->
			<!-- include du footer -->
			<?php include("includes/footer.html");?>


		<!-- SCRIPTS -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	<!-- JQuery -->
			<script type="text/javascript" src="js/materialize.min.js"></script>						<!-- Materialize -->
			<script src="js/main.js"></script> 	

    </body>
</html>