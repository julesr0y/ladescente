<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); //démarrage de la session
require_once '../db/connect_db.php'; //connexion a la bdd
require_once '../db/verif_admin.php'; //on vérifie que l'user est admin
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-witdh, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../styles/recipes_management.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" href="../img/logo2.webp">
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
        $sql = "SELECT * FROM `recipes` WHERE `approved` = 1 ORDER BY `id` DESC"; //récupération des recettes approuvées
        $requete = $db->query($sql);
        $recipes = $requete->fetchAll();
    ?>
    <table>
    <?php foreach($recipes as $recipe): ?>
        <tr>
            <td class="nom"><? echo $recipe["nom"] ?></td>
            <td><a href="delete2.php?id=<?= $recipe["id"] ?>" style="color: red;">Supprimer</a></td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>