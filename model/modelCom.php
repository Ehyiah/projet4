<?php

    function getPost0($postId)
    {
        $db = dbConnect();
        $req = $db->prepare('SELECT * FROM billet WHERE ID = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    function getComments0($postId)
    {
        $db = dbConnect();
        $comments = $db->prepare('SELECT * FROM commentaires WHERE ID_BILLET = ?');
        $comments->execute(array($postId));

        return $comments;
    }

    // Nouvelle fonction qui nous permet d'éviter de répéter du code
    function dbConnect()
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
                return $db;
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
        }
