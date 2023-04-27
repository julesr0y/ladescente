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
    <title>Administration - Newsletter</title>
</head>
<body>
    <header>
        <a href="../index.php">La Descente - Admin</a>
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
        //récupération des inscrits à la newsletter
        $req = $conn->prepare("SELECT * FROM newsletter ORDER BY id DESC"); //préparation de la requete
        $req->execute(); //execution
        $inscrits = $req->fetchAll(); //resultat
    ?>
    <table>
    <?php foreach($inscrits as $inscrit): ?>
        <div class="elems">
            <p class="mail"><? echo $inscrit["email"] ?></p>
            <a href="delete_newsletter.php?idsn=<?= $inscrit["id"] ?>" style="color: red;">Supprimer</a>
        </div>
        <br>
    <?php endforeach; ?>
    </table>
</body>
</html>