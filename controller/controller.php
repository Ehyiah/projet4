<?php
require_once('model/modele.php');

function viewHome()
    {
        $billets = getPosts5();
        $comm = getComs5();
        $firstBill = getPost();
        $billMenu = billMenu();

        
        ob_start(); ?>
            <?php 
                foreach($billMenu as $menu)
                {
            ?>
<!--                <li><a href="controller/controllerCom.php?id=<?php echo $menu['ID']; ?>"><?php echo $menu['TITRE'] ?></a></li> -->
                <li><a href="index.php?action=bill&amp;id=<?php echo $menu['ID']; ?>"><?php echo $menu['TITRE'] ?></a></li>
                <li class="divider"></li>

            <?php
                }
            ?>
        <?php $contentMenuHome = ob_get_clean();


        require('view/home.php');
    };


function post()
    {
        $lastBill = getPost($_GET['id']);
        $comm = getComs5($_GET['id']);

        require('view/template.php');
    };


