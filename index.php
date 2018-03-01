<?php
require('modele.php');

$billets = getPosts5();
$lastBill = getPost();
$comm = getComs5();

require('home.php');

