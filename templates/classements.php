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
    <link rel="stylesheet" href="../styles/classements.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" href="../img/logo2.webp">
    <title>Classements</title>
</head>
<body>
    <?php require_once '../struct_files/header_menu.php'; //importation du header et du nav ?>
    <main class="partie_classements"> <!--conteneur principal des sous conteneurs de classements-->
        <div class="conteneur_classment">
            <h2>Classement par cocktail:</h2>
            <h5>Selon le rapport officiel de <a href="https://drinksint.com/" target="_blank">Drinks International</a></h5>
            <br>
            <ol>
                <li>Negroni</li>
                <li>Old Fashioned</li>
                <li>Dry Martini</li>
                <li>Margarita</li>
                <li>Daiquiri</li>
                <li>Aperol Spritz</li>
                <li>Espresso Martini</li>
                <li>Manhattan</li>
                <li>Mojito</li>
                <li>Whisky Sour</li>
            </ol>
        </div>
        <br>
        <div class="conteneur_classment">
            <h2>Classement des alcools les plus forts:</h2>
            <br>
            <ol>
                <li>Absinthe (90%)</li>
                <li>Rhum (80%)</li>
                <li>Chartreuse (55%)</li>
                <li>Cognac (40% et +)</li>
                <li>Vodka (40%)</li>
                <li>Whisky (40%)</li>
                <li>Pastis (40 à 45%)</li>
                <li>Cointreau (40%)</li>
                <li>Kirsch (40%)</li>
                <li>Grand Marnier (40%)</li>
            </ol>
        </div>
        <br>
        <div class="conteneur_classment">
            <h2>Classement des meilleures bières:</h2>
            <br>
            <ol>
                <li>Paix Dieu</li>
                <li>Cuvée des trolls</li>
                <li>Triple Karmeliet</li>
                <li>Westmalle</li>
                <li>Rince Cochon</li>
                <li>Goudale</li>
                <li>Kwak</li>
                <li>Franne</li>
                <li>3 Monts</li>
                <li>Pelforth</li>
            </ol>
        </div>
        <br>
        <div class="conteneur_classment">
            <h2>Classement des pires alcools:</h2>
            <br>
            <ol>
                <li>Everclear (95% - USA)</li>
                <li>Cocoroco (90-95% - Guatemala)</li>
                <li>Spirytus Rektyfikowany (90% - Pologne)</li>
            </ol>
        </div>
        <br>
    </main>
</body>
</html>