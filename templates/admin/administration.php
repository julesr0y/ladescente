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
    <link rel="stylesheet" href="../../styles/administration.css">
    <link rel="stylesheet" href="../../styles/general/style_commun.css">
    <link rel="icon" href="../../img/logo2.webp">
    <title>Administration</title>
</head>
<body>
    <header>
        <a href="../index.php">La Descente - Admin</a>
        <a href="../page_compte.php">Retour au site</a>
    </header>
    <br>
    <div class="titre">
        <h1>Administration</h1>
        <br>
        <h3><? echo $_SESSION["watibuveur"]["prenom"]." ".$_SESSION["watibuveur"]["nom"]." - Administrateur"; ?></h3>
    </div>
    <main>
        <br><br>
        <?php
            //badge notification recettes non approuvées
            $req = $conn->prepare("SELECT COUNT(*) AS nb_recipes_to_approve FROM recipes WHERE approved = 0"); //requete et preparation
            $req->execute(); //execution de la requete
            $nb_recipes_to_approve = $req->fetch(); //récupération du nb de recettes approuvées
            $nb_recipes_to_approve = $nb_recipes_to_approve["nb_recipes_to_approve"]; //récupération du nombre
            if($nb_recipes_to_approve == 0){ //si il n'y a aucune recette a approuver
                echo "<span class='approve'><a href='approve_recipe.php'>Voir les recettes à approuver</a></span><br>";
            }
            else{ //si il y a des recettes
                echo "<span class='approve'><a href='approve_recipe.php'>Voir les recettes à approuver</a><span style='color: red;'>&nbsp;$nb_recipes_to_approve</span></span><br>";
            }
        ?>
        <a href="recipes_management.php" class="approve">Voir toutes les recettes approuvées</a>
        <br>
        <a href="newsletter_management.php" class="approve">Voir tous les inscrits à la newsletter</a>
        <br>
        <div class="stats">
            <div class="nb_recettes">
                <?php
                    //statistiques nombre de recettes approuvées
                    $req = $conn->prepare("SELECT COUNT(*) AS nb_recipes FROM recipes WHERE approved = 1"); //requete et préparation
                    $req->execute(); //execution de la requete
                    $nb_recipes = $req->fetch(); //récupération du nb de recettes approuvées
                    echo $nb_recipes["nb_recipes"];
                    echo "<p>Recettes approuvées</p>";
                ?>
            </div>
            <div class="nb_users">
                <?php
                    //statistiques nombre de comptes créés
                    $req = $conn->prepare("SELECT COUNT(*) AS nb_users FROM users"); //requete et préparation
                    $req->execute(); //execution de la requete
                    $nb_recipes = $req->fetch(); //récupération du nb d'utilisateurs
                    $nb_recipes = $nb_recipes["nb_users"];
                    echo "<span>$nb_recipes</span>";
                    echo "<p>Utilisateurs inscrits</p>";
                ?>
            </div>
            <div class="nb_newsletter">
                <?php
                    //statistiques nombre d'abonnés à la newsletter
                    $req = $conn->prepare("SELECT COUNT(*) AS nb_newsletter FROM newsletter"); //requete et préparation
                    $req->execute(); //execution de la requete
                    $nb_newsletter = $req->fetch(); //récupération du nb d'utilisateurs
                    $nb_newsletter = $nb_newsletter["nb_newsletter"];
                    echo "<span>$nb_newsletter</span>";
                    echo "<p>Inscrits à la newsletter</p>";
                ?>
            </div>
        </div>
    </main>
</body>
</html>