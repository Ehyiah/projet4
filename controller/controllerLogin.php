<?php
require_once('model/modelLogin.php');

function displayLogin() {
    $billMenu = billMenu();

    require ('view/login.php');
};
