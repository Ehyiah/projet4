<?php $title = "test de titre pour page template"; ?>

<?php ob_start(); ?>
        <p><a href="../index.php">Retour à Home</a></p>

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

<?php $content = ob_get_clean(); ?>

<?php require("../template.php"); ?>