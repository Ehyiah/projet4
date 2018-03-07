<?php $title = "Page de membre" ?>

<?php ob_start(); ?>
        <!-- CONTENU DE LA PAGE -->
            <?php
                // Le mot de passe n'a pas été envoyé ou n'est pas bon alors on affiche le formulaire
                if (!isset($_SESSION['PSEUDO'])) { ?>
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
                }

                // si le pseudo est celui de l'admin
                elseif ($_SESSION['PSEUDO'] == 'Jean') 
                { ?>
                    <p> Bonjour Jean </p>
                <?php
                }

                
                // si l'utilisateur est un user standard
                else 
                { ?>
                    <div class="container">
                        <p class="center-align"> Bienvenue <?= $_SESSION['PSEUDO'] ?>, vous êtes maintenant connecté dans votre espace personnel</p>
                        <div class="divider"></div>

                        <!-- on affiche ici ce que l'utilisateur standard va avoir besoin dans son espace perso -->



                    </div>


                <?php
                };
            ?>


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