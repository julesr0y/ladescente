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
    <link rel="stylesheet" href="../../styles/approve_recipe.css">
    <link rel="stylesheet" href="../../styles/general/style_commun.css">
    <link rel="icon" type="image/x-icon" href="../../img/logo.ico">
    <title>Administration - Recettes à approuver</title>
</head>
<body>
    <header>
        <a href="../../index.php">La Descente - Admin</a>
        <a href="administration.php">Retour</a>
    </header>
    <br>
    <div class="titre">
        <h1>Recettes à approuver</h1>
        <br>
        <h3><? echo $_SESSION["watibuveur"]["prenom"]." ".$_SESSION["watibuveur"]["nom"]." - Administrateur"; ?></h3>
    </div>
    <main>
        <?php
            $requete = "SELECT * FROM recipes WHERE approved = 0 ORDER BY id DESC"; //requete
            $reqprep = $conn->prepare($requete); //preparation
            $reqprep->execute(); //execution
            $recipes = $reqprep->fetchAll(); //récupération des recettes non approuvées uniquement
        ?>
        <div class="prepost">
            <?php if($recipes == null){echo "<br><br><h2>Aucune recette à approuver <span style='color: green;'>#win</span></h2>";} ?>
            <?php foreach($recipes as $recipe): ?>
                <div class="post">
                    <p class="titre_recette"><? echo $recipe["nom"]; ?></p>
                    <p class="descript"><? echo $recipe["descr"]; ?></p>
                    <br><br>
                    <ul class="ingredient">
                        <li><strong>Ingrédients:</strong></li>
                        <!-- si l'élément récupéré n'est pas vide (null), on l'affiche grâce à echo -->
                        <!-- sinon, on ne fait rien -->
                        <?php if($recipe["ingredient1"] != null){echo "<li>".$recipe["ingredient1"]."</li>";} ?>
                        <?php if($recipe["ingredient2"] != null){echo "<li>".$recipe["ingredient2"]."</li>";} ?>
                        <?php if($recipe["ingredient3"] != null){echo "<li>".$recipe["ingredient3"]."</li>";} ?>
                        <?php if($recipe["ingredient4"] != null){echo "<li>".$recipe["ingredient4"]."</li>";} ?>
                        <?php if($recipe["ingredient5"] != null){echo "<li>".$recipe["ingredient5"]."</li>";} ?>
                        <?php if($recipe["ingredient6"] != null){echo "<li>".$recipe["ingredient6"]."</li>";} ?>
                        <?php if($recipe["ingredient7"] != null){echo "<li>".$recipe["ingredient7"]."</li>";} ?>
                        <?php if($recipe["ingredient8"] != null){echo "<li>".$recipe["ingredient8"]."</li>";} ?>
                        <?php if($recipe["ingredient9"] != null){echo "<li>".$recipe["ingredient9"]."</li>";} ?>
                        <?php if($recipe["ingredient10"] != null){echo "<li>".$recipe["ingredient10"]."</li>";} ?>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation:</strong></li>
                        <!-- si l'élément récupéré n'est pas vide (null), on l'affiche grâce à echo -->
                        <!-- sinon, on ne fait rien -->
                        <?php if($recipe["preparation1"] != null){echo "<li>".$recipe["preparation1"]."</li>";} ?>
                        <?php if($recipe["preparation2"] != null){echo "<li>".$recipe["preparation2"]."</li>";} ?>
                        <?php if($recipe["preparation3"] != null){echo "<li>".$recipe["preparation3"]."</li>";} ?>
                        <?php if($recipe["preparation4"] != null){echo "<li>".$recipe["preparation4"]."</li>";} ?>
                        <?php if($recipe["preparation5"] != null){echo "<li>".$recipe["preparation5"]."</li>";} ?>
                        <?php if($recipe["preparation6"] != null){echo "<li>".$recipe["preparation6"]."</li>";} ?>
                        <?php if($recipe["preparation7"] != null){echo "<li>".$recipe["preparation7"]."</li>";} ?>
                        <?php if($recipe["preparation8"] != null){echo "<li>".$recipe["preparation8"]."</li>";} ?>
                        <?php if($recipe["preparation9"] != null){echo "<li>".$recipe["preparation9"]."</li>";} ?>
                        <?php if($recipe["preparation10"] != null){echo "<li>".$recipe["preparation10"]."</li>";} ?>
                    </ul>
                    <br><br>
                    <? if($recipe["conseil"] != null){
                        $conseil = $recipe["conseil"];
                        echo '<p class="conseil">Le conseil du chef :</p>';
                        echo "<p>$conseil</p>";
                        echo "<br>";
                    }
                    ?>
                    <div class="approvebox">
                        <a href="approvment.php?idmr=<?= $recipe["id"] ?>" style="color: green;">Approuver</a>
                        <a href="refuse_recipe.php?idsr=<?= $recipe["id"] ?>" style="color: red;">Refuser</a>
                    </div>
                    <br><br>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>