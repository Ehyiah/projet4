<?php

function getPost0($postId)
    {
        $db = dbConnect();
        $req = $db->prepare('SELECT * FROM billet WHERE ID = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    };

function getComments0($postId)
    {
        $db = dbConnect();
        $comments = $db->prepare('SELECT * FROM commentaires WHERE ID_BILLET = ?');
        $comments->execute(array($postId));

        return $comments;
    };



function postComment($postId, $author, $comment)
    {
        // var_dump($postId);        var_dump($author);        var_dump($comment);
        
        $db = dbConnect();
        $comments = $db->prepare('INSERT INTO commentaires(ID_BILLET, AUTEUR, CONTENU) VALUES(:ID_BILLET, :AUTEUR, :CONTENU)');
        $affectedLines = $comments->execute(array(
            'ID_BILLET' => $postId,
            'AUTEUR' => $author,
            'CONTENU' => $comment
            ));

        return $affectedLines;
    };







/*
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
    };
*/