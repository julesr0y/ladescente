<?php
session_start(); //demarrage de la session
require_once 'php_files/fonctions.php'; //importation des fonctions
verif_cookie(); //on vérifie si les cookies existent
is_connected_global(); //on vérifie que l'utilisateur est connecté
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-witdh, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/general/style_commun.css">
    <link rel="icon" href="img/logo.ico">
    <title>Accueil</title>
</head>
<body>
    <header>
        <a href="index.php">La Descente</a>
        <?php
        if(is_connected_global()){
            $account_name = $_SESSION["watibuveur"]["genre"]." ".$_SESSION["watibuveur"]["nom"]." ".$_SESSION["watibuveur"]["prenom"];
            echo "<a href='templates/page_compte.php'>$account_name</a>";
        }
        else{
            echo "<a href='templates/connexion.php'>Compte</a>";
        }
        ?>
    </header>
    <br>
    <nav>
        <a href="index.php" class="accueil">Accueil</a>
        <a href="templates/recettes.php" class="recettes">Recettes et conseils</a>
        <a href="templates/decouvertes.php" class="decouverte">Découverte</a>
        <a href="templates/classements.php" class="classements">Classements</a>
        <a href="templates/newsletter.php" class="newsletter">Newsletter</a>
        <a href="templates/a_propos.php" class="a_propos">A propos</a>
    </nav>
    <br>
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