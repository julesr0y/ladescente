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
    <link rel="stylesheet" href="../styles/administration.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" href="../img/logo2.webp">
    <title>Administration</title>
</head>
<body>
    <header>
        <a href="#">La descente - Admin</a>
        <a href="page_compte.php">Retour au site</a>
    </header>
    <br>
    <div class="titre">
        <h1>Administration</h1>
        <br>
        <h3>Bonjour <? echo $_SESSION["watibuveur"]["prenom"]; ?></h3>
    </div>
    <main>
        <br><br>
        <?php
            //badge recettes non approuvées
            $sql = "SELECT COUNT(*) AS nb_recipes_to_approve FROM `recipes` WHERE `approved` = 0"; //récupération du nb de recettes approuvées
            $requete = $db->query($sql);
            $nb_recipes_to_approve = $requete->fetch();
            $nb_recipes_to_approve = $nb_recipes_to_approve["nb_recipes_to_approve"];
            if($nb_recipes_to_approve == 0){
                echo "<span class='approve'><a href='approve_recipe.php'>Voir les recettes à approuver</a></span><br>";
            }
            else{
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
                    //statistiques
                    $sql = "SELECT COUNT(*) AS nb_recipes FROM `recipes` WHERE `approved` = 1"; //récupération du nb de recettes approuvées
                    $requete = $db->query($sql);
                    $nb_recipes = $requete->fetch();
                    echo $nb_recipes["nb_recipes"];
                    echo "<p>Recettes approuvées</p>";
                ?>
            </div>
            <div class="nb_users">
                <?php
                    //statistiques
                    $sql = "SELECT COUNT(*) AS nb_users FROM `users`"; //récupération du nb d'utilisateurs'
                    $requete = $db->query($sql);
                    $nb_recipes = $requete->fetch();
                    $nb_recipes = $nb_recipes["nb_users"];
                    echo "<span>$nb_recipes</span>";
                    echo "<p>Utilisateurs inscrits</p>";
                ?>
            </div>
            <div class="nb_newsletter">
                <?php
                    //statistiques
                    $sql = "SELECT COUNT(*) AS nb_newsletter FROM `newsletter`"; //récupération du nb d'utilisateurs'
                    $requete = $db->query($sql);
                    $nb_newsletter = $requete->fetch();
                    $nb_newsletter = $nb_newsletter["nb_newsletter"];
                    echo "<span>$nb_newsletter</span>";
                    echo "<p>Inscrits à la newsletter</p>";
                ?>
            </div>
        </div>
    </main>
</body>
</html>