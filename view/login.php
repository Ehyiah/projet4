<?php $title = "Page de connection" ?>

<?php ob_start(); ?>
        <!-- CONTENU DE LA PAGE -->
            <?php
                // Le mot de passe n'a pas été envoyé ou n'est pas bon alors on affiche le formulaire
                if (!isset($_POST['mot_de_passe'])) { ?>
                    <div class="container">
                        <p>Veuillez vous connecter</p>
                        <form action="index.php?action=loginSubmit" method="post">
                                <div class="divider"></div>
                            
                            <div class="input-field col s12">
                                <input id="name" type="text" name="nom"/>
                                <label for="name">Nom</label>
                            </div>
                            
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

                        <form action="index.php?action=loginSubmit" method="post">
                                <div class="divider"></div>
                            
                            <div class="input-field col s12">
                                <input id="name" type="text" name="nom"/>
                                <label for="name">Nom</label>
                            </div>
                            
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
                        <p class="center-align"> Bienvenue Jean, vous êtes maintenant connecté dans votre espace personnel</p>
                        <div class="divider"></div>



                    </div>


                <?php
                };
                ?>


<?php $content = ob_get_clean(); ?>

<!--
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