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
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" href="../img/logo2.webp">
    <title>Accueil</title>
</head>
<body>
    <?php require_once '../struct_files/header_menu.php'; //importation du header et du nav ?>
    <main><!--contenu principal, placé avec grid-->
        <div class="txt1">
            <h1>Bienvenue</h1>
        </div>
        <div class="img1"></div>
        <div class="img2"></div>
        <div class="txt2">
            <p>Découvrez des recettes/boissons du monde entier</p>
        </div>
        <div class="txt3">
            <p>Partagez vos idées et vos expériences</p>
        </div>
        <div class="img3"></div>
    </main>
</body>
</html>