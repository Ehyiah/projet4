<?php
require_once('model/modele.php');
require_once('model/dbManager.php');



function viewHome()
    {
        $billets = getPosts5();
        $comm = getComs5();
        $firstBill = getPost();
        $billMenu = billMenu();

        require('view/home.php');
    };


function post()
    {
        $lastBill = getPost($_GET['id']);
        $comm = getComs5($_GET['id']);

        require('view/template.php');
    };


