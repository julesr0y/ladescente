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
    <link rel="stylesheet" href="../styles/a_propos.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.ico">
    <title>A Propos</title>
</head>
<body>
    <?php require_once '../struct_files/header_menu.php'; //importation du header et du nav ?>
    <div class="div">
        <fieldset > 
            <legend>Fonctionnalités actuelles</legend>
            <ul>
                <li>Page d'accueil</li>
                <li>Page de recettes et de conseils</li>
                <li>Page découverte</li>
                <li>Classements des alcools</li>
                <li>Inscription à la newsletter</li>
                <li>Page à propos</li>
                <li>Ajouts de nouvelles recettes</li>
                <li>Créations de comptes personnelles </li>
                <li>Inscription à la newsletter </li>
                <li>Préférences</li>
                <li>Commentaires</li>
                <li>Possibilité pour les utilisateurs de proposer de nouvelles recettes</li>
            </ul>
        </fieldset >
    </div>
    <fieldset >
       <legend>Nous contacter</legend>
            <p class="textcontact">En cas de besoin contactez-nous via : </p>
            <br>
            <div class="logo">
                <a href="https://www.instagram.com/ladescente_lille/"><img src="../img/instagram.webp" alt="Instagram La descente" class="logos"></a>
                <a href="https://discord.gg/VCeQEHmQK2"><img src="../img/discord.webp" alt="Discord La descente" class="logos"></a>
                <a href="https://github.com/julesroy/ladescente"><img src="../img/github.webp" alt="Github La descente" class="logos"></a>
            </div>
        </fieldset>
    <footer>
        <p class="foot_centre1">Auteurs: Simon Leroy, Antonin Dumas, Jules Roy, Maxime Basset, Lucas Hu</p>
        <p class="foot_centre2">© La Descente™ 2022</p>
    </footer>
</body>
</html>