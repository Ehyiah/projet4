<?php
require('model/modele.php');

$billets = getPosts5();
$lastBill = getPost();
$comm = getComs5();

require('view/home.php');

