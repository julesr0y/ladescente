<?php
session_start(); //demarrage de la session
require_once '../php_files/fonctions.php'; //importation des fonctions
verif_cookie(); //on vérifie si les cookies existent
is_connected_global(); //on vérifie que l'utilisateur est connecté
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-witdh, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../styles/conditions.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" href="../img/logo2.webp">
    <title>Conditions</title>
</head>
<body>
    <?php require_once '../struct_files/header_menu.php'; //importation du header et du nav ?>
    <fieldset > <!-- Création de boites pour compartimenter -->
        <legend>Conditions générales de la newsletter</legend>
        <br>
        <p class="loi">Conformément à l'article 32 de la Loi informatique et Libertés : </p>
            <br>
            <p class="actu">Afin de recevoir des actualitées et informations à propos du site 
            <br>Vous acceptez que : </p>
            <ul>
                <li>Votre nom , prénom , adresse mail et date de naissance soit sauvgardés</li>
                <li>Vous recevrez des informations par mail</li>
                <li>Vous pouvez vous désinscrire à tout moment</li>
                
            </ul>
    </fieldset>
    <fieldset > <!-- Création de boites pour compartimenter et afficher les mentions légales nécessaire -->
            <legend>Mentions légales</legend>
            <p>Siège social : </p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1615.9592987754531!2d14.5153466!3d35.9000093!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x130e452bd79a2d43%3A0x546eb52dba2a5ebf!2sGrandmaster%20Palace%20Courtyard!5e0!3m2!1sen!2sfr!4v1670410952293!5m2!1sen!2sfr" width="250" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p>Téléphone : 09 71 07 29 48</p>
            <p>Pour plus d'informations :<a href="a_propos.php">A propos</a> </p>
    </fieldset>
    
    <footer>
        <p>Auteurs : Simon Leroy, Antonin Dumas, Jules Roy, Maxime Basset</p>
        <p>© 2022 La descente™</p>
    </footer>
    
</body>
</html>