<?php
session_start(); //demarrage de la session
require_once '../php_files/fonctions.php'; //importation des fonctions
verif_cookie(); //on vérifie si les cookies existent
is_connected_pagecompte(); //on vérifie que l'utilisateur est connecté
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-witdh, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../styles/page_compte.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.ico">
    <title>Mon compte</title>
</head>
<body>
<header>
        <a href="../index.php">La Descente</a>
        <?php
            $account_name = $_SESSION["watibuveur"]["genre"]." ".$_SESSION["watibuveur"]["nom"]." ".$_SESSION["watibuveur"]["prenom"];
            echo "<a href='page_compte.php'>$account_name</a>";
        ?>
    </header>
    <?php require_once '../struct_files/menu.html'; ?>
    <h2 class="titre">Bienvenue sur votre compte</h2>
    <br><br>
    <main>
        <?php
        $mail = $_SESSION["watibuveur"]["email"];
        $pseudo = $_SESSION["watibuveur"]["username"];
        $date = $_SESSION["watibuveur"]["birthdate"];
        ?>
        <div class="gauche">
            <? echo "<p style='font-size: 30px;'>$account_name</p>"; ?>
            <br>
            <? echo "<p style='font-size: 20px;'>Votre mail: $mail</p>"; ?>
            <? echo "<p style='font-size: 20px;'>Votre nom d'utilisateur: $pseudo</p>"; ?>
            <?
            if($_SESSION["watibuveur"]["genre"] == "Mr"){
                echo "<p style='font-size: 20px;'>Né le $date</p>";
            }
            else{
                echo "<p style='font-size: 20px;'>Née le $date</p>";
            }
            ?>
        </div>
        <div class="droite">
            <?php
                if(is_admin()){ //si l'utilisateur est un administrateur, on lui propose le lien pour accéder à la partie d'administration du site
                    echo "<br><a href='admin/administration.php' style='color: red; text-decoration: none;'>Accéder à l'administration</a>";
                }
            ?>
            <br><br>
            <a href="modifier_compte.php" style="color:black; text-decoration: none;">Modifier les informations du compte</a><br><br>
            <a href="ajout_recette.php" style="color:black; text-decoration: none;">Proposer une recette</a><br><br>
            <a href="../php_files/deconnexion.php" style="color:black; text-decoration: none;">Deconnexion</a>
        </div>
    </main>
</body>
</html>