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
    <link rel="stylesheet" href="../styles/decouvertes.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" href="../img/logo2.webp">
    <title>Découvertes</title>
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
    <div id="content" > <!--contenu propre à cette page-->
        <div class="description">
            <h1>Découvrez des recettes pour des cocktails aux saveurs locales!</h1>
        </div>
        <br>
        <div class="post"> <!-- ce conteneur contient toutes les découvertes-->
            <div class="Cocktail"> <!--cette classe sert à mettre en forme chaque image à côté des ingrédients -->
                <div class="image">
                    <div class="nom"> <!--cette classe sert à placer le nom sur l'image-->
                        <h2>Genevria</h2>
                    </div>
                    <img src="../img/genevriaa.webp" alt="Cocktail Genevria" class="Genevria">
                </div>
                <div class="ingredients"> <!--conteneur pour les ingrédients-->
                    <h3>Préparation au shaker</h3>
                    <ul>
                        <li>3 cl de genièvre</li>
                        <li>9 cl de cidre bien frais</li>
                        <li>1 filet de curaçao</li>
                    </ul>
                    <h3>Préparation classique</h3>
                    <ul>
                        <li>Dans un verre à cocktail, versez le Genièvre puis le cidre bien frais.</li>
                        <li>Terminez le cocktail en versant un filet de curaçao puis ajoutez des glaçons.</li>
                    </ul>
                </div>
            </div>
            <div class="Cocktail"> <!--cette classe sert à mettre en forme chaque image à côté des ingrédients -->
                <div class="image"> 
                    <div class="nom"> <!--cette classe sert à placer le nom sur l'image-->
                        <h2>La Fleur de bière</h2>
                    </div>
                    <img src="../img/fleur_de_biere.webp" alt="Cocktail Fleur-de-bière" class="a" >
                </div>
                <div class="ingredients"> <!--conteneur pour les ingrédients-->
                    <h3>Préparation au shaker</h3>
                    <ul>
                        <li>2 cl de fleur de bière</li>
                        <li>1 cuillère à café de sucre de canne</li>
                        <li>1 tranche de citron</li>
                    </ul>             
                </div>
            </div>
            <div class="Cocktail"> <!--cette classe sert à mettre en forme chaque image à côté des ingrédients -->
                <div class="image">
                    <div class="nom"> <!--cette classe sert à placer le nom sur l'image-->
                        <h2>Le Beffroi</h2>
                    </div>
                    <img src="../img/beffroi.webp" alt="Cocktail Le Beffroi" class="a">
                </div>
                <div class="ingredients"> <!--conteneur pour les ingrédients-->
                    <h3>Préparation au shaker</h3>
                    <ul>
                        <li>4 cl de fleur de bière</li>
                        <li>1 cl de sirop de fruit de la passion</li>
                        <li>4 cl de jus de mandarine</li>
                        <li>1 quartier de citron vert à écraser au pilon dans un verre</li>
                    </ul>
                </div>
            </div>
            <div class="Cocktail"> <!--cette classe sert à mettre en forme chaque image à côté des ingrédients -->
                <div class="image">
                    <div class="nom"> <!--cette classe sert à placer le nom sur l'image-->
                        <h2>La Rose du Nord</h2>
                    </div>
                    <img src="../img/rose_du_nord.webp" alt="Cocktail La Rose du Nord" class="a">
                </div>
                <div class="ingredients"> <!--conteneur pour les ingrédients-->
                    <h3>Préparation au shaker</h3>
                    <ul>
                        <li>2,5 cl de genièvre</li>
                        <li>1 cl de jus de citron</li>
                        <li>25 cl de Jenlain ambrée</li>
                        <li>1 cl de grenadine </li>
                    </ul>                    
                    <h3>Nos petits conseils </h3>
                    <ul>
                        <li>Versez en dernier la grenadine et ajoutez quelques framboises.</li>
                    </ul>
                </div>
            </div>
            <div class="Cocktail"> <!--cette classe sert à mettre en forme chaque image à côté des ingrédients -->
                <div class="image">
                    <div class="nom"> <!--cette classe sert à placer le nom sur l'image-->
                        <h2>Ti-punch</h2>
                    </div>
                    <img src="../img/ti_punch.webp" alt="Cocktail Ti-punch" class="a">
                </div>
                <div class="ingredients"> <!--conteneur pour les ingrédients-->
                    <h3>Ingrédients</h3>
                    <ul>
                        <li>5 cl de Rhum Blanc Agricole 50°</li>
                        <li>Des bâtons de cannelle</li>
                        <li>1 demi citron vert</li>
                        <li>Noix de Coco fraîche</li>
                        <li>Vergeoise brune</li>
                    </ul>
                    <h3>Préparation</h3>
                    <ul>
                        <li>Infuser 3 bâtons de cannelle pendant 24h dans du Rhum blanc agricole.</li>
                        <li>Râper de la noix de coco fraîche et la faire griller.</li>
                        <li>Mélangez ensuite la noix de coco grillée avec de la vergeoise brune.</li>
                    </ul>
                </div>
            </div>
            <div class="Cocktail"> <!--cette classe sert à mettre en forme chaque image à côté des ingrédients -->
                <div class="image">
                    <div class="nom"> <!--cette classe sert à placer le nom sur l'image-->
                    <h2> Le Ch'timi</h2>
                    </div>
                    <img src="../img/chtimi.webp" alt="Cocktail Ch'timi" class="a">
                </div>
                <div class="ingredients"> <!--conteneur pour les ingrédients-->
                    <h3>Préparation au shaker</h3>
                    <ul>
                        <li>30 ml de sirop de Spéculoos</li>
                        <li>40 ml de Vermouth blanc</li>
                    </ul>  
                    <h3>Nos petits conseils</h3>
                    <ul>
                        <li>Ajoutez une rondelle d'orange</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>