<?php $title = "Page de connection" ?>

<?php ob_start(); ?>
        <!-- CONTENU DE LA PAGE -->
            <?php
                // Le mot de passe n'a pas été envoyé ou n'est pas bon alors on affiche le formulaire
                // no connected member or wrong password or username
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

                                        <button class="btn waves-effect waves-light" type="submit" name="action">Connection
                                            <i class="material-icons right">send</i>
                                        </button>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header">Pas encore inscrit ? </br>

                                </div>
                                    <div class="collapsible-body">
                                        <form action="index.php?action=signUp" method="post">
                                            <div class="input-field col s12">
                                                <input id="nameUP" type="text" name="nom"/>
                                                <label for="name">Nom</label>
                                            </div>
                                            
                                            <div class="input-field col s12">
                                                <input id="passwordUP" type="password" name="mot_de_passe"/>
                                                <label for="password">Password</label>
                                            </div>
                                            
                                            <div class="input-field col s12">
                                                <input id="email" type="email" name="email"/>
                                                <label for="email">e-mail</label>
                                            </div>

                                            <button class="btn waves-effect waves-light" type="submit" name="action">S'enregistrer
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </form>
                                    </div>
                            </li>
                        </ul>
                    </div> <!-- fin container -->
                <?php
                }

                // si le pseudo est celui d'un admin (GROUPE = 1 dans BDD)
                // if Admin is connected (GROUPE = 1 in DB)
                elseif ($_SESSION['GROUPE'] == 1) 
                { $title = 'Espace Administration';
                ?>
                    <div class="container">
                        <p class="center"> Bonjour et bienvenue dans votre espace personnel d'administration</p>
                        <div class="divider"></div>


                    <!-- on affiche ici ce que l'admin a besoin de voir -->
                    <!-- display Admin panel -->
                        <ul class="collapsible popout">
                            <!-- création nouvel épisode -->
                            <!-- publish new episode -->
                            <li id="newEpisode">
                                <div class="collapsible-header"><i class="material-icons">add</i>Ecrire un épisode</div>
                                <div class="collapsible-body">
                                <form action="index.php?action=newEpisode" method="post">
                                    <textarea id="mytexttitle" name="titreEpisode">Titre de l'épisode</textarea>
                                    <textarea id="mytextarea" name="contenuEpisode">Contenu de l'épisode</textarea>
                                    <button class="btn waves-effect waves-light" type="submit" name="publish">Publier nouvel épisode
                                        <i class="material-icons right">send</i></button>
                                </form>
                                </div>
                            </li>

                            <!-- modification épisode -->
                            <!-- update episode -->
                            <li id="updateEpisode" class="<?php if(isset($_GET['etatUpdate'])) {echo $_GET['etatUpdate'];} ?>">
                                <div class="collapsible-header"><i class="material-icons">wrap_text</i>Modifier un épisode</div>
                                <div class="collapsible-body">
                                    <?php if(isset($episodeUpdate)) {
                                        echo $episodeUpdate;
                                    }
                                    ?>
                                </div>
                            </li>

                            <!-- gérer les commentaires signalés -->
                            <!-- manage signaled comments -->
                            <li id="signaledCom" class="<?php if(isset($_GET['etatCom'])) {echo $_GET['etatCom'];} ?>">
                                <div class="collapsible-header"><i class="material-icons">message</i>Gérer les commentaires signalés</div>
                                <div class="collapsible-body">
                                <?php if (isset($contentSignaledCom)) {
                                    echo $contentSignaledCom;
                                }
                                ?>
                                </div>
                            </li>

                            <!-- suppression d'un épisode -->
                            <!-- delete episode -->
                            <li id="deleteEpisode" class="<?php if(isset($_GET['etatDel'])) {echo $_GET['etatDel'];} ?>">
                                <div class="collapsible-header"><i class="material-icons">delete_sweep</i>Supprimer un épisode</div>
                                <div class="collapsible-body">
                                    <?php if(isset($episodeDelete)) {
                                        echo $episodeDelete;
                                    }
                                    ?>
                                </div>
                            </li>
                        </ul>

                    </div>
                <?php
                }

                
                // si l'utilisateur est un user standard
                // if standard user
                else 
                { $title = 'Espace Membre';
                ?>
                    <div class="container">


                        <p class="center-align"> Bienvenue <?= htmlspecialchars($_SESSION['PSEUDO']) ?>, vous êtes maintenant dans votre espace personnel</p>
                        <div class="divider"></div>

                        <!-- on affiche ici ce que l'utilisateur standard va avoir besoin dans son espace perso -->
                        <!-- display what standard user need to see -->
                        <p>Votre Pseudo : <?= htmlspecialchars($_SESSION['PSEUDO']) ?></p>
                        <p>Votre e-mail : <?= $_SESSION['MAIL'] ?></p>

                        <!-- liste des commentaires deja postés par le membre -->
                        <!-- display all comments from user -->
                        <p>Vos commentaires postés : </p>
                        <div class="divider"></div>

                        <?php
                            while ($com = $comUser->fetch()) {
                        ?>
                            <p><strong>A propos de l'épisode : </strong><?= strip_tags($com['TITRE_BILLET']) ?></p>
                            <p><strong>Commentaire : </strong><?= htmlspecialchars($com['CONTENU_COM']) ?></p>
                            <div class="divider"></div>
                        <?php
                            }
                            $comUser->closeCursor();
                        ?>

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