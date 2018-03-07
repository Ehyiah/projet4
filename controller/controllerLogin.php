<?php
require_once('model/modelLogin.php');

function displayLogin() {
    $billMenu = billMenu();

    require ('view/login.php');
};





function authUser($resultat) {
    // var_dump($resultat);
    // var_dump($_POST['mot_de_passe']);

    // $passCorrect = password_verify($_POST['mot_de_passe'], $resultat['PASS']);

    if ($_POST['mot_de_passe'] == $resultat['PASS']) {
        $passCorrect = true;
    }

    // var_dump($passCorrect);
    
    if (!$resultat) {
        echo 'mauvais identifiant ou mot de passe';
    }   
    else {
        if ($passCorrect) {
            $_SESSION['ID'] = $resultat['ID'];
            $_SESSION['PSEUDO'] = $resultat['PSEUDO'];
            // echo 'vous etes maintenant connecté en tant que : ' . $_SESSION['PSEUDO'];
        }
        else {
            echo 'mauvais identifiant ou mot de passe 2';
        }
    }
};


