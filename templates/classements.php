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
    <link rel="stylesheet" href="../styles/classements.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" href="../img/logo2.webp">
    <title>Classements</title>
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
    <main class="partie_classements"> <!--conteneur principal des sous conteneurs de classements-->
        <div class="conteneur_classment">
            <h2>La partie classement est décédée</h2>
            <br>
            <h3>Sad :(</h3>
        </div>
        <br>
    </main>
</body>
</html>