<?php $title = "Page de connection" ?>

<?php ob_start(); ?>
        <!-- CONTENU DE LA PAGE -->
            <?php
                // Le mot de passe n'a pas été envoyé ou n'est pas bon alors on affiche le formulaire
                if (!isset($_SESSION['PSEUDO'])) { ?>
                    <div class="container">
                        <ul class="collapsible popout">
                            <li class="active">
                                <div class="collapsible-header">Deja inscrit
                                </div>
                                <div class="collapsible-body">
                                    <form action="index.php?action=loginSubmit" method="post">
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
                            </li>
                            <li>
                                <div class="collapsible-header">Pas encore inscrit ?</div>
                                    <div class="collapsible-body">
                                        <form action="index.php?action=signUp" method="post">
                                            <div class="input-field col s12">
                                                <input id="name" type="text" name="nom"/>
                                                <label for="name">Nom</label>
                                            </div>
                                            
                                            <div class="input-field col s12">
                                                <input id="password" type="password" name="mot_de_passe"/>
                                                <label for="password">Password</label>
                                            </div>
                                            
                                            <div class="input-field col s12">
                                                <input id="email" type="email" name="email"/>
                                                <label for="email">e-mail</label>
                                            </div>

                                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </form>
                                    </div>
                            </li>
                        </ul>
                    </div> <!-- fin container -->
                <?php
                }

                // si le pseudo est celui de l'admin
                elseif ($_SESSION['PSEUDO'] == 'Jean') 
                { $title = 'Bonjour';
                ?>
                    <p> Bonjour Jean </p>
                    <div class="divider"></div>

                    <!-- on affiche ici ce que l'admin a besoin de voir -->




                <?php
                }

                
                // si l'utilisateur est un user standard
                else 
                { $title = 'Espace Membre';
                ?>
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