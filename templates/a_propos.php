<?php
require_once '../db/connect_db.php'; //connexion a la bdd
require_once '../db/verif_session.php'; //verification de la session
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-witdh, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../styles/a_propos.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" href="../img/logo2.webp">
    <title>A Propos</title>
</head>
<body>
    <header>
        <a href="../index.php">La descente</a>
        <?php
        if(verification_session() == true){
            $account_name = $_SESSION["watibuveur"]["genre"]." ".$_SESSION["watibuveur"]["nom"]." ".$_SESSION["watibuveur"]["prenom"];
            echo "<a href='page_compte.php'>$account_name</a>";
        }
        else{
            echo "<a href='connexion.php'>Compte</a>";
        }
        ?>
    </header>
    <?php require_once "../files/menu.html"; ?>
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
            </ul>
        </fieldset >
        <fieldset>
            <legend>Futures mises à jour</legend>
            <ul>
                <li>Ajouts de nouvelles recettes</li>
                <li>Créations de comptes personnelles </li>
                <li>Inscription à la newsletter </li>
                <li>Préférences</li>
                <li>Commentaires</li>
                <li>Possibilité pour les utilisateurs de proposer de nouvelles recettes</li>
             </ul>
        </fieldset>
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
        <p class="foot_centre1">Auteurs : Simon Leroy, Antonin Dumas, Jules Roy, Maxime Basset</p>
        <p class="foot_centre2">© La descente™ 2022</p>
    </footer>
</body>
</html>