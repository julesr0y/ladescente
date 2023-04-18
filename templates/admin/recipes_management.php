<?php
session_start(); //démarrage de la session
require_once '../../php_files/connect_db.php'; //connexion a la bdd
require_once '../../php_files/fonctions.php'; //importation des fonctions
verif_cookie(); //on vérifie si les cookies existent
is_connected_global(); //on vérifie que l'utilisateur est connecté
is_admin(); //on vérifie que l'utilisateur soit un admin
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-witdh, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../../styles/r_n_management.css">
    <link rel="stylesheet" href="../../styles/general/style_commun.css">
    <link rel="icon" href="../../img/logo2.webp">
    <title>Administration</title>
</head>
<body>
    <header>
        <a href="#">La descente - Admin</a>
        <a href="administration.php">Retour</a>
    </header>
    <br>
    <div class="titre">
        <h1>Gérer toutes les recettes approuvées</h1>
        <br>
        <h3><? echo $_SESSION["watibuveur"]["prenom"]." ".$_SESSION["watibuveur"]["nom"]." - Administrateur"; ?></h3><br>
        <p>Affichage de la recette la plus récente en premier</p><br>
    </div>
    <?php
        //récupération des recettes approuvées
        $req = $db->prepare("SELECT * FROM recipes WHERE approved = 1 ORDER BY id DESC"); //requete et preparation
        $req->execute(); //execution de la requete
        $recipes = $req->fetchAll(); //resultat de la requete
    ?>
    <?php foreach($recipes as $recipe): ?>
        <div class="elems">
            <p class="recette"><? echo $recipe["nom"] ?></p>
            <a href="delete_recipe.php?idsr=<?= $recipe["id"] ?>" style="color: red;">Supprimer</a>
        </div>
        <br>
    <?php endforeach; ?>
</body>
</html>