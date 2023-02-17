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
        <h1>Gérer les inscrits à la newsletter</h1>
        <br>
        <h3><? echo $_SESSION["watibuveur"]["prenom"]." ".$_SESSION["watibuveur"]["nom"]." - Administrateur"; ?></h3><br>
        <p>Affichage de l'inscription la plus récente en premier</p><br>
    </div>
    <?php
        $sql = "SELECT * FROM `newsletter` ORDER BY `id` DESC"; //récupération des inscrits à la newsletter
        $requete = $db->query($sql);
        $inscrits = $requete->fetchAll();
    ?>
    <table>
    <?php foreach($inscrits as $inscrit): ?>
        <tr>
            <td class="mail"><? echo $inscrit["email"] ?></td>
            <td><a href="delete3.php?id=<?= $inscrit["id"] ?>" style="color: red;">Supprimer</a></td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>