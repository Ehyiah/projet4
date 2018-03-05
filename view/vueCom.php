<?php $title = "test de titre pour page template"; ?>


<?php ob_start(); ?>
        <p><a href="index.php">Retour à Home</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['TITRE']) ?>
                <em>,ID : <?= $post['ID'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['CONTENU'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['AUTEUR']) ?></strong> le <?= $comment['DATE'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['CONTENU'])) ?></p>
        <?php
        }
        ?>


        <h4>Ajouter un commentaire</h4>
            <form action="index.php?action=addComment&amp;id=<?= $post['ID'] ?>" method="post">
                <div>
                    <label for="author">Auteur</label><br />
                    <input type="text" id="author" name="author" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>

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



<?php require("template.php"); ?>
