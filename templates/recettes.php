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
    <link rel="stylesheet" href="../styles/recettes.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" href="../img/logo2.webp">
    <title>Recettes</title>
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
    <div id="ent">
        <h1>Les Recettes</h1>
            <!--Pour la v2-->
            <!--<h2>Pour maintenant</h2>
            <p>Vous devez rentrer ce que vous avez chez vous et nous vous proposons des recetttes</p>
            <label>Vous voulez consommer de l'alcool :</label >
                <input type="radio" name="alcool" id="alcooloui">  
                    <label for="alcooloui">Oui</label>
                <input type="radio" name="alcool" id="alcoolnon" > 
                    <label for="alcooloui">Non</label>
            <br><br>
            <label>Vous voulez consommer de l'alcool :</label >
                <input type="radio" name="temp" id="tempChaud">  
                    <label for="tempChaud">Chaud</label>
                <input type="radio" name="alcool" id="tempFroid" > 
                    <label for="tempFroid">Froid</label>
            <br><br>
            <ul>Type d'alcool : 
                <li>Vodka</li>
                <li>Vodka</li>
                <li>Vodka</li>
                <li>Vodka</li>
                <li>Vodka</li>
                <li>Vodka</li>
            </ul>-->
            <h2>Découvertes</h2>
            <p></p><!--Description de la rublique-->
            <p>Nous vous proposons une large gamme de recette.</p>
            <a href="#shooters"><h3>Les Shooters</h3></a>
            <a href="#basebiere"><h3>Des Boissons a Base de Bière</h3></a>
            <h3>Les Cocktails :</h3>
                <a href="#classiques"><h4>-Les Classiques</h4></a>
                <a href="#exotiques"><h4>-Les Exotiques</h4></a>
            <a href="#rhumarrange"><h3>Rhum Arrangé</h3></a>
            <p>Nous vous proposons une large gamme de rhum Arrangé que vous pouvez preparer a la maison.</p><!--Description de la rublique-->
            <!--<h2>Le coin dégustation</h2>
            <p>Nous vous proposons une large gamme de vin.</p>
            <h3>Les vins rouges</h3>
            <h3>Les vins blancs</h3>
            <h3>Les vins rosés</h3>
            -->
            <?php
            $sql = "SELECT * FROM `recipes` WHERE `approved` = 1 ORDER BY `id` DESC"; //récupération des recettes approuvées
            $requete = $db->query($sql);
            $recipes = $requete->fetchAll();
            ?>
            <br>
            <h3 class="type" id="new">Nouvelles Recettes</h3>
            <div class="prepost">
                <?php foreach($recipes as $recipe): ?>
                    <div class="post">
                        <p class="titre"><? echo $recipe["nom"]; ?></p>
                        <p class="descript"><? echo $recipe["description"]; ?></p>
                        <br><br>
                        <ul class="ingredient">
                            <li><strong>Ingrédients:</strong></li>
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
                            echo "<br><br>";
                        } 
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <br><br>
            <h3 class="type" id="shooters">Les Shooters</h3>
            <div class="prepost">
                <div class="post">
                    <p class="titre">Buttery Nipple</p>
                    <p class="descript">Ce shooter s’adresse aux personnes qui aiment les boissons sucrées ! Versez 1/2 shooter de schnaps au caramel dans un verre à shooter et ajoutez la même quantité de crème irlandaise.</p>
                    <br><br>
                    <img src="../img/shooters/butterynipple.webp" alt ="butterynipple" id="butterynipple" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour un shooter):</strong></li>
                        <li>1/2 shooter de schnaps au caramel</li>
                        <li>1/2 shooter de crème irlandaise</li>
                    </ul>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Peanut Butter & jelly</p>
                    <p class="descript">Original et rafraîchissant, le Peanut Butter and Jelly est un shooter où les ingrédients sont agités avec les glaçons avant d’être servis dans un verre froid.</p>
                    <br><br>
                    <img src="../img/shooters/peanutbutterjelly.webp" alt ="peanutbutter&jelly" id="peanutbutterjelly" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour un shooter):</strong></li>
                        <li>30 ml de Frangelico</li>
                        <li>30 ml de liqueur de framboise</li>
                        <li>15 ml de butterscotch schnaps</li>
                    </ul>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Melon Ball</p>
                    <p class="descript">Dans un verre à shooter, déposez quelques glaçons et versez tous les ingrédients. Mélangez et garnissez de feuilles de menthe.</p>
                    <br><br>
                    <img src="../img/shooters/melonball.webp" alt ="melonball" id="melonball" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour un shooter):</strong></li>
                        <li>10 ml de liqueur de melon</li>
                        <li>10 ml de jus d’ananas</li>
                        <li>10 ml de vodka</li>
                    </ul>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Washington Apple</p>
                    <p class="descript">À la fois doux et acidulé, le Washington Apple se savoure ! Dans un shaker, versez le whisky canadien, la liqueur de pomme acide et le jus de cranberry. Ajoutez de la glace pilée et agitez.</p>
                    <br><br>
                    <img src="../img/shooters/washingtonapple.webp" alt ="washingtonapple" id="washingtonapple" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour un shooter):</strong></li>
                        <li>30 ml de Whiskey canadien</li>
                        <li>30 ml de liqueur de pomme acide</li>
                        <li>30 ml de jus de cranberry</li>
                    </ul>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Nutty Irishman</p>
                    <p class="descript">Cocktail très populaire, le Nutty Irshman est un mélange de Baileys et Frangelico. Certains ajoutent un trait de whisky irlandais ou l’agrémentent de café chaud, mais la clé de ce cocktail gagnant réside dans ses notes de noisettes ! </p>
                    <br><br>
                    <img src="../img/shooters/nuttyirishman.webp" alt ="nuttyirishman" id="nuttyirishman" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour un shooter):</strong></li>
                        <li>1/2 liqueur de noisette Frangelico</li>
                        <li>1/2 liqueur de crème irlandaise</li>
                    </ul>
                    <br><br>
                </div>
                <h3 class="type" id="basebiere">A base de bière</h3>
                <div class="post">
                    <p class="titre">Cocktail Monaco</p>
                    <p class="descript">Un Monaco est une boisson alcoolisée, constituée de bière mélangée à de la limonade et du sirop de grenadine.</p>
                    <br><br>
                    <img src="../img/biere/monaco.webp" alt ="monaco" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>2 trait de sirop de grenadine</li>
                        <li>10 cl de bière</li>
                        <li>10 cl de limonade</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Versez au fond d'un verre le sirop de grenadine, ajoutez la bière et allongez avec la limonade.</li>
                        <li>Pour réaliser ce cocktail, nous vous conseillons d'utiliser de la bière blonde.</li>
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Dégustez bien frais !</p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Cocktail Delirium</p>
                    <p class="descript">Original et rafraîchissant, le Cocktail Delirium est un melange de Martini blanc et de bière.</p>
                    <br><br>
                    <img src="../img/biere/delirium.webp" alt ="delirium" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>7 cl de Martini blanc</li>
                        <li>2 trait de sirop de citron</li>
                        <li>15 ml de bière</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Versez le Martini blanc et le sirop de citron dans un verre.</li>
                        <li>Ajoutez la bière jusqu'au bord du verre.</li>  
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Utiliser de préférence la bière Délirium Tremens.</p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Cocktail Pelco</p>
                    <p class="descript">Le Cocktail Pelco est un mélange de cognac et de bière</p>
                    <br><br>
                    <img src="../img/biere/pelco.webp" alt ="pelco" id="pelco" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>bière Pelforth brune</li>
                        <li>5 cl de Cognac</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Versez au fond d'un verre le Cognac, ajoutez la bière Pelforth brune.</li> 
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Dégustez bien frais !</p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Cocktail à la bière et au citron vert</p>
                    <p class="descript">Cocktail à la bière et au citron vert est un cocktail léger et frais parfait pour l'été</p>
                    <br><br>
                    <img src="../img/biere/biere_citron_vert.webp" alt ="bière et au citron vert" id="citronvert" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>25 cl de bière blonde</li>
                        <li>2 cl de jus de citron vert</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Versez dans un grand verre préalablement placé au frais, le jus de citron vert pressé et la bière.</li> 
                        <li>Servez très frais.</li>
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Vous pouvez prendre un citron vert frais. Dégustez bien frais !</p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Cocktail ginger beer</p>
                    <p class="descript">Cocktail très populaire, le Nutty Irshman est un mélange de Baileys et Frangelico. Certains ajoutent un trait de whisky irlandais ou l’agrémentent de café chaud, mais la clé de ce cocktail gagnant réside dans ses notes de noisettes ! </p>
                    <br><br>
                    <img src="../img/biere/ginger_beer.webp" alt ="ginger beer" id="gingerbeer" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>12 cl de bière blonde</li>
                        <li>4 cl de champagne brut frappé</li>
                        <li>4 cl de soda au gingembre</li>
                        <li>4 cl de crème de framboise</li>
                        <li>1 pincée de gingembre en poudre</li>
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Vous pouvez mettre les verres au réfrigirateur avant de servir le cocktail</p>
                    <br><br>
                </div>
                <h3 class="type" id="classiques">Les Classiques</h3>  
                <div class="post">
                    <p class="titre">Mojito</p>
                    <p class="descript">Le mojito est un cocktail traditionnel de la cuisine cubaine et de la culture de Cuba, à base de rhum, de soda, de citron vert, et de feuilles de menthe fraîche.</p>
                    <br><br>
                    <img src="../img/classique/mojito.webp" alt ="Mojito" id="Mojito" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>2 cl de rhum blanc</li>
                        <li>3 feuilles de menthe</li>
                        <li>0,5L eau gazeuse</li>
                        <li>1 cl de sirop de sucre de canne</li>
                        <li>0,5 citron vert</li>
                        <li>5 glaçons</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Mettez vos glaçons dans un torchon, refermez-le puis, à l'aide d'un rouleau à pâtisserie, pilez la glace.</li>
                        <li>Vous pouvez encore avoir des morceaux. Versez dans un bol et réservez au congélateur.</li>    
                        <li>On ne déchire pas les feuilles de menthe car les huiles essentielles se situent sur la surface. Cela permet aussi de ne pas avoir de petits bouts de menthe qui vont bloquer la paille. On les dépose juste au fond du verre.</li>    
                        <li>Coupez le citron en deux puis chaque demi citron en 6 morceaux.</li>   
                        <li>Ajoutez les 6 morceaux de citron dans le verre</li> 
                        <li>Ajoutez le sirop de sucre de canne. Le fait d'utiliser un sucre liquide permet de ne pas sentir les cristaux du sucre à la dégustation du cocktail.</li>
                        <li>Ecrasez le citron avec un pilon spécial cocktail. Il est important que la menthe soit au fond du verre afin qu'elle soit protégée à la fois par le sirop de sucre de canne et par les morceaux de citron.</li>
                        <li>Ajoutez la glace pilée en laissant 2 cm de libre. Plus il y a de glace, moins elle fondra rapidement.</li>
                        <li>Ajoutez le rhum.</li>
                        <li>Complétez avec l'eau gazeuse.</li>
                        <li>Mélangez le cocktail afin que les saveur se mêlent.</li>
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Utilisez de préférence du jus de citron vert frais (pressé). Bien que la recette originale ne contienne pas d'angostura, vous pouvez y ajouter quelques gouttes afin de le rendre un peu plus sec. </p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Aperol Spritz</p>
                    <p class="descript">Le spritz est un cocktail alcoolisé largement consommé en apéritif dans les grandes villes de la Vénétie et du Frioul-Vénétie Julienne, et également répandu dans toute l'Italie.</p>
                    <br><br>
                    <img src="../img/classique/aperol.webp" alt ="Aperol" id="Aperol" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>2 cl d'eau gazeuse</li>
                        <li>5 cl de vin blanc</li>
                        <li>3 cl d'Aperol</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Réalisez la recette de l'Aperol Spritz directement dans le verre.</li> 
                        <li>Mélanger délicatement dans le verre contenant des glaçons.</li> 
                        <li>Servir dans un verre à vin</li>  
                        <li>Ajouter une rondelle d’orange.</li> 
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Utilisez de préférence du vin blanc sec.</p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Pina colada</p>
                    <p class="descript">La piña colada est un cocktail officiel de l'IBA, à base de rhum, jus d'ananas et crème de noix de coco, originaire de l’île de Porto Rico des grandes Antilles de la mer des Caraïbes, dont elle est déclarée boisson nationale depuis 1978.</p>
                    <br><br>
                    <img src="../img/classique/pina_colada.webp" alt ="Pina Colada" id="pinacolada" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>4 cl de rhum blanc</li>
                        <li>2 cl de rhum ambré</li>
                        <li>12 cl de jus d'ananas</li>
                        <li>4 cl de lait de coco</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation : </strong></li>
                        <li>Réalisez la recette du Piña Colada au mixer.</li>
                        <li>Dans un blender, versez les ingrédients avec 5 ou 6 glaçons et mixez le tout. C'est prêt ! Versez dans le verre et dégustez. Peut aussi se réaliser au shaker si c'est juste pour une personne.</li> 
                        <li>Servir dans un verre à vin.</li> 
                        <li>Décorer avec un morceau d'ananas et une cerise confite.</li>
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Vous pouvez ajouter une touche d'onctuosité en ajoutant une cuillère à soupe de crème fraîche dans le mixer. </p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Margarita</p>
                    <p class="descript">La Margarita est un cocktail à base de tequila, inventé par des Américains au Mexique. C'est un before lunch qui serait une version du cocktail daisy (« margarita » en espagnol) dans lequel le brandy est remplacé par de la tequila durant la prohibition, période où les Américains ouvrirent des bars au Mexique et au Canada dans les zones frontalières.</p>
                    <br><br>
                    <img src="../img/classique/magarita.webp" alt ="Margarita" id="Margarita" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>5 cl de tequila</li>
                        <li>3 cl de triple sec</li>
                        <li>2 cl de jus de citron vert</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Réalisez la recette de la Margarita au shaker.</li>
                        <li>Frapper les ingrédients au shaker avec des glaçons puis verser dans le verre givré au citron et au sel fin. Pour givrer facilement le verre, passer le citron sur le bord du verre et tremper les bords dans le sel.</li>
                        <li>Servir dans un verre à margarita.</li> 
                        <li>Décorer d'une tranche de citron vert.</li>
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Vous pouvez mettre les verres au réfrigirateur avant de servir le cocktail</p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Sex on the beach</p>
                    <p class="descript">La Margarita est un cocktail à base de tequila, inventé par des Américains au Mexique. C'est un before lunch qui serait une version du cocktail daisy (« margarita » en espagnol) dans lequel le brandy est remplacé par de la tequila durant la prohibition, période où les Américains ouvrirent des bars au Mexique et au Canada dans les zones frontalières.</p>
                    <br><br>
                    <img src="../img/classique/sex_on_the_beach.webp" alt ="Sex on the beach" id="Sexonthebeach" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>3 cl de vodka</li>
                        <li>2 cl de sirop de melon</li>
                        <li>2 cl de chambord</li>
                        <li>5 cl de jus d'ananas</li>
                        <li>6 cl de jus de cranberry</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation : </strong></li>
                        <li>Réalisez la recette du Sex on the beach dans un verre à mélange.</li>
                        <li>Verser les alcools sur des glaçons, mélanger et compléter avec les jus de fruits.</li> 
                        <li>Servir dans un verre tulipe.</li> 
                        <li>Ajouter un morceau d'ananas et une cerise confite.</li> 
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Vous pouvez mettre les verres au réfrigirateur avant de servir le cocktail</p>
                    <br><br>
                </div>
                <h3 class="type" id="exotiques">Les Exotiques</h3>   
                <div class="post">
                    <p class="titre">Corail</p>
                    <p class="descript"> Imaginez-vous au bord de la plage, face à un lagon turquoise protégé par une barrière de corail qui scintille sous les feux d’un magnifique coucher de soleil. Vous y êtes ! Il ne vous reste plus qu’à déguster notre cocktail Corail !</p>
                    <br><br>
                    <img src="../img/exotiques/corail.webp" alt ="Corail" id="Corail" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>5 cl de vodka</li>
                        <li>5 cl d’eau de coco</li>
                        <li>3 cl de liqueur de litchi</li>
                        <li>2 cl de jus de citron vert</li>
                        <li>5 feuilles de menthe</li>
                        <li>1 rondelle de citron vert</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Mélangez la vodka, la liqueur de litchi, le jus de citron vert et 2 feuilles de menthe avec de la glace dans un shaker et secouez jusqu’à ce que le mélange prenne un aspect givré.</li>
                        <li>Versez dans un verre à Martini ou à cocktail et ajoutez l’eau de coco, la rondelle de citron vert, les feuilles de menthe et ajoutez des glaçons.</li>
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Utilisez de préférence du jus de citron vert frais (pressé).</p>
                    <br><br>
                </div>
                <div class="post">
                    <a class="titre">Acapulco, ananas et pamplemousse rose</a>
                    <p class="descript">Direction le Mexique et plus précisément la célèbre ville d’Acapulco, au bord de l’océan Pacifique. C’est là que seraient nés la tequila, le rhum, l’ananas et le pamplemousse. Un cocktail qui séduira aussi les amateurs d’agrumes.</p>
                    <br><br>
                    <img src="../img/exotiques/acapulco.webp" alt ="Acapulco" id="Acapulco" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>3 cl de jus de pamplemousse rose</li>
                        <li>3 cl de jus d’ananas</li>
                        <li>2 cl de tequila</li>
                        <li>2 cl de rhum agricole blanc</li>
                        <li>1 zeste de pamplemousse</li>
                        <li>1 rondelle de citron vert</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation : </strong></li>
                        <li>Prélevez un zeste de pamplemousse avec un épluche-légume et réservez.</li>
                        <li>Mélangez la tequila, le rhum et les jus de fruits dans un shaker rempli de glaçons et secouez pendant une minute. </li>
                        <li>Versez dans un verre à cocktail ou à Martini et décorez avec le zeste de pamplemousse et la rondelle de citron.</li>
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef :</p> 
                    <p>Utilisez de préférence du jus de citron vert frais (pressé).Vous pouvez mettre les verres au réfrigirateur avant de servir le cocktail.</p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Mai Tai</p>
                    <p class="descript"> Inventé en 1944 par Benoît Brochot à Oakland, en Californie, le Mai Tai est un cocktail exotique à base de rhum dont le nom provient du tahitien Maita’i, qui signifie « bon » ou « le meilleur ».</p>
                    <br><br>
                    <img src="../img/exotiques/maitai2.webp" alt ="Mai Tai" id="MaiTai" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>3 cl de rhum agricole blanc</li>
                        <li>3 cl de rhum agricole ambré</li>
                        <li>2 cl de Grand Marnier ou de Cointreau</li>
                        <li>1 cl de sucre de canne</li>
                        <li>1 cl de sirop d’orgeat</li>
                        <li>1/2 citron vert</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Coupez une rondelle dans le demi-citron vert et pressez le reste.</li>
                        <li>Versez le jus de citron avec le rhum, le Grand Marnier, le sucre de canne et le sirop d’orgeat avec des glaçons dans un shaker et mélangez durant une minute</li> 
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef :</p> 
                    <p>Versez dans un verre à cocktail avec des glaçons et la rondelle de citron.</p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Rhum Tonic</p>
                    <p class="descript">Avec cette recette nous revisitions la recette traditionnelle de l’iconique Gin Tonic.  Un cocktail original qui surprendra très certainement vos convives au cours de vos soirées d’été.</p>
                    <br><br>
                    <img src="../img/exotiques/rhumtonic.webp" alt ="RhumTonic" id="RhumTonic" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>3cl de rhum blanc</li>
                        <li>12cl de tonic</li>
                        <li>1 rondelle de citron jaune frais</li>
                        <li>Glaçons</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Dans un verre, mélangez le rhum et le tonic sans mélanger.</li>
                        <li>Ajoutez les glaçons.</li> 
                        <li>Vous pouvez également ajouter un peu de jus de citron.</li>
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Pour décorez voter verre, ajoutez une rondelle de citron sur le bord du verre. A l’instar du traditionnel Gin tonic, ajouter quelques grains de poivre noir dans votre cocktail pour lui donner encore plus de caractère !</p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Punch</p>
                    <p class="descript">Valeur sûre mais surtout le cocktail idéal pour vos apéros en grand groupe, sa recette est adaptée pour être réalisée en grande quantité sans en impacter sa qualité. Un cocktail traditionnel mais qui fait toujours son effet pour vos apéritifs de l’été.</p>
                    <br><br>
                    <img src="../img/exotiques/punch.webp" alt ="Punch" id="Punch" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients (pour une personne):</strong></li>
                        <li>4L de jus d’oranges</li>
                        <li>1 verre de sirop de sucre de canne</li>
                        <li>1L de rhum blanc</li>
                        <li>1L de jus de fruits exotiques</li>
                        <li>2 gousses de vanille</li>
                        <li>40cl de rhum ambré</li>
                    </ul>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Prenez un grand récipient.</li>
                        <li>Fendez les deux gousses de vanille, ajoutez-les avec tous les autres ingrédients.</li>  
                        <li>Laissez reposer entre 4h et 2 jours.</li>
                        <li>Le jour de la consommation, ajustez le goût avec un complément de sucre de canne si trop acide et avec du jus d’orange si trop sucré.</li>
                        <li>Ne pas ajouter de glace et servez à la louche pour plus de convivialité !</li>
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>
                        Ajoutez de la cannelle en poudre (dont la quantité dépendra de vos goûts) pour apporter davantage de caractère à votre punch !
                    </p>
                    <br><br>
                </div>
                <h3 class="type" id="rhumarrange">Rhum Arrangé</h3>
                <p><strong>Quel rhum choisir pour faire son rhum aromatisé ?</strong></p>
                <p>Il existe de nombreux types de rhums, dont certains sont plus appropriés pour la préparation d’un rhum maison. Sur le podium des rhums les plus utilisés on retrouve le rhum blanc agricole à 50° de milieu de gamme et le rhum traditionnel de l’Ile de la Réunion, le Charrette à 49°. Sinon, on peut dissocier :</p>
                <br><br>
                <ul class="rhum_liste">
                    <li>Les rhums agricoles : ils sont généralement assez forts, dans les 50°, mais sont parfaits pour aromatiser. On retrouve parmi les plus connus le Dillon, Saint James, Damoiseau, Séverin, Havana club, Varadero, etc. Fabriqués à partir du jus de canne on les retrouve surtout dans les Antilles françaises. Ce sont des rhums blancs, ambrés, vieux, voire très vieux, même si pour un bon rhum arrangé il est préférable d’utiliser du rhum blanc.</li>
                    <li>Les rhums traditionnels : eux aussi sont assez forts. Parmi eux on retrouve le fameux rhum Charrette de l’Ile de la Réunion. Fabriqués à partir de la mélasse (sous-produit du raffinage du sucre), ils représentent 90% de la production de rhum.</li>
                    <li>Le taux d’alcool n’importe que peu, c’est selon votre goût. On pourra utiliser un rhum à 40° comme le Damoiseau par exemple, ou alors un Trois Rivières qui monte jusqu’à 62°, tout dépend si vous appréciez les alcools forts ou doux.</li>
                    <li><strong>Concrètement, tout rhum peut être utilisé pour faire du rhum arrangé, nous vous conseillons de prendre un rhum qui vous plait nature.</strong></li>
                </ul>
                <p><strong>Nous allons vous proposer 5 recettes de rhum arrangé avec du gingembre, de la mangue, du cagé, du fruit de la passion et du fruit de la passion </strong></p>
                <div class="post">
                    <p class="titre">Rhum arrangé Gingembre</p>
                    <p class="descript">Contrairement au rhum, le gingembre ne met pas tout le monde d’accord. Mais si vous mélangez les deux, vous découvrirez des saveurs originales et exotiques qui changent du quotidien. Retrouvez ma recette détaillée de rhum arrangé gingembre et découvrez comment utiliser cet ingrédient pour donner un goût parfait à votre préparation alcoolisée. Cette recette de rhum arrangé gingembre est prête très rapidement : laissez macérer 3 semaines et c’est prêt !</p>
                    <br><br>
                    <img src="../img/rhum_arrange/gingembre.webp" alt ="Rhum arrangé Gingembre" id="gingembre" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients:</strong></li>
                        <li>500g de gingembre</li>
                        <li>1 litre de rhum blanc agricole 50°</li>
                        <li>4 cuillères à soupe de sucre de canne (ou sirop de sucre de canne)</li>
                        <li>En option : un bâton de cannelle</li>
                    </ul>
                    <p>Le temps de macération : 2-3 semaines</p>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Commencez par préparer votre gingembre : épluchez-le et coupez-le en tranche assez fines pour le faire rentrer dans votre récipient (bouteille ou bocal). Je vous déconseille de mettre votre gingembre entier dans votre bocal, c’est mieux de le couper pour que les arômes se diffusent plus rapidement.</li>
                        <li>Placez vos tranches de gingembre dans votre récipient et ajoutez le rhum blanc 50° (ou 55° si vous aimez les alcools plus forts).</li>  
                        <li>Versez ensuite votre sucre de canne ou sirop de sucre de canne à l’intérieur de votre bouteille (ou bocal) rempli de gingembre. Il faut que l’alcool recouvre la totalité des ingrédients. Veillez donc à bien remplir votre récipient jusqu’en haut.</li>
                        <li>Vous pouvez ensuite introduire un bâton de cannelle à l’intérieur de votre bouteille.</li>   
                        <li>Laissez macérer trois semaines puis filtrez !</li> 
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Je vous recommande de goûter votre rhum arrangé gingembre toutes les semaines pour surveiller que la cannelle ne prenne pas trop le dessus. Je vous conseille également de filtrer votre rhum arrangé gingembre une fois que sa saveur vous convient car le gingembre infuse très rapidement. Pour cette recette, vous pouvez filtrer au chinois très facilement. Si vous aimez la vanille, vous pouvez ajouter une gousse de vanille fendue en deux mais vous devrez attendre 6 mois minimum pour réellement sentir le goût de la vanille.</p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Rhum arrangé Mangue</p>
                    <p class="descript">Contrairement au rhum, le gingembre ne met pas tout le monde d’accord. Mais si vous mélangez les deux, vous découvrirez des saveurs originales et exotiques qui changent du quotidien. Retrouvez ma recette détaillée de rhum arrangé gingembre et découvrez comment utiliser cet ingrédient pour donner un goût parfait à votre préparation alcoolisée. Cette recette de rhum arrangé gingembre est prête très rapidement : laissez macérer 3 semaines et c’est prêt !</p>
                    <br><br>
                    <img src="../img/rhum_arrange/mangue.webp" alt ="Rhum arrangé Mangue" id="mangue" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients:</strong></li>
                        <li>Une belle mangue bien mûre</li>
                        <li>1 litre de rhum blanc 50°</li>
                        <li>3 cuillères à soupe de sucre de canne</li>
                        <li>Une gousse de vanille</li>
                    </ul>
                    <p>Le temps de macération : 1 mois</p>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Commencez par éplucher votre mangue, il ne doit rester que la chair du fruit, veillez donc à retirer toute la peau ainsi que le noyau de votre fruit.</li> 
                        <li>Une fois votre mangue épluchée et dénoyautée, vous allez pouvoir la découper en lamelles plus ou moins fines en fonction de la taille du goulot de votre bouteille. Si vous faites votre mélange dans un bocal, vous pouvez couper plus grossièrement votre mangue. En revanche, si vous souhaitez introduire vos morceaux de mangue dans une bouteille, tranchez-la en fines lamelles.</li> 
                        <li>Mettez toutes les lamelles de mangue à l’intérieur de votre récipient et recouvrez de rhum blanc agricole 50°. Tous les morceaux de fruits doivent être recouverts pour éviter l’apparition de moisissure.</li> 
                        <li>N’oubliez pas d’ajouter votre gousse de vanille fendue en deux pour diffuser plus rapidement ses arômes.</li> 
                        <li>Refermez votre bouteille et laissez macérer pendant 1 mois.</li> 
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Au bout d’un mois, vous pouvez goûter votre rhum arrangé mangue. Si vous trouvez qu’il manque de saveur, vous pouvez le laisser macérer pendant 1 mois supplémentaire.
                    </p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Rhum arrangé Café</p>
                    <p class="descript">Quand on aime autant le café que le rhum arrangé, il n’y a pas de raison de ne pas mélanger les deux ! Surtout que c’est délicieux. Le rhum arrangé café est très simple à réaliser et vous garantira des arômes de café incroyables en bouche pour ravir vos convives à la fin d’un bon repas. En plus, le rhum arrangé café est très rapide à faire puisqu’il nécessite un temps de macération de seulement quelques semaines. Découvrez ici la recette du rhum arrangé café.</p>
                    <br><br>
                    <img src="../img/rhum_arrange/cafe.webp" alt ="Rhum arrangé Café" id="cafe" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients:</strong></li>
                        <li>40 grains de café environ</li>
                        <li>1 litre de rhum blanc 50°</li>
                        <li>3 cuillères à soupe de sucre de canne</li>
                        <li>Une gousse de vanille</li>
                    </ul>
                    <p>Le temps de macération : 3 semaines</p>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Tout d’abord, il vous faudra choisir de bons grains de café et surtout pas de café moulu ! Il faut absolument vous munir de grains de café pour faire un bon rhum arrangé café.</li> 
                        <li>Introduisez vos grains de café à l’intérieur de votre bouteille de rhum. La taille des grains est assez petite, ce qui est pratique pour insérer les grains à l’intérieur de votre récipient. Vous pouvez utiliser votre bouteille de rhum blanc, pour cela pensez à la vider d’un quart environ pour éviter que le mélange ne déborde.</li>   
                        <li>Une fois que tous vos grains sont à l’intérieur de votre récipient, vous pouvez ajouter le rhum (si ce n’est pas déjà fait).</li>  
                        <li>Prenez votre gousse de vanille et fendez-la en deux dans le sens de la longueur. Si vous souhaitez qu’elle infuse plus vite, vous pouvez aussi gratter les grains qui se trouvent à l’intérieur de la gousse.</li>  
                        <li>Mettez votre gousse à l’intérieur de votre récipient et refermez.</li> 
                    </ul>
                    <br><br>
                    <p class="conseil"><strong>Le conseil du chef :</strong></p> 
                    <p>Ce rhum arrangé maison passe très bien en fin de repas.</p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Rhum arrangé Mangue Passion</p>
                    <p class="descript">Deux fruits suffisent à créer la recette de rhum arrangé parfaite aux notes exotiques et fruitées. Si vous aimez les alcools aux fruits, vous allez adorer cette recette de rhum arrangé manque passion. Très facile à réaliser, vous n’aurez besoin que de deux mangues et quatre fruits de la passion pour réussir votre mélange.</p>
                    <br><br>
                    <img src="../img/rhum_arrange/manguepassion.webp" alt ="Rhum arrangé Mangue Passion" id="manguepassion" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients:</strong></li>
                        <li>2 mangues bien mûres</li>
                        <li>4 fruits de la passion</li>
                        <li>1 de rhum blanc 50°</li>
                        <li>3 cuillères à soupe de sucre de canne</li>
                    </ul>
                    <p>Le temps de macération : 3 mois</p>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Préparez 2 belles mangues, épluchez-les et retirez leurs noyaux. Découpez-les en tranches ou en morceaux suffisamment fins pour qu’ils puissent s’insérer aisément dans votre récipient.</li> 
                        <li>Préparez ensuite vos fruits de la passion en retirant toute la peau qui les recouvrent pour ne garder que la pulpe.</li> 
                        <li>Introduisez ensuite vos fruits dans un bocal ou une bouteille en verre. Évitez les récipients en plastique car ils dénaturent le goût de votre rhum arrangé.</li>   
                        <li>Versez ensuite votre rhum blanc agricole 50° (ou 55° si vous aimez les alcools plus forts).</li>  
                        <li>Laissez macérer votre rhum arrangé mangue passion pendant 3 mois à température ambiante. Le mieux est de laisser votre rhum dans un endroit assez chaud mais évitez au maximum la fraîcheur car elle ralentit la macération de vos fruits.</li> 
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef : </p> 
                    <p>Vous pouvez ajouter une gousse de vanille. Au bout de 3 mois de macération, vous pouvez déguster tranquillement votre rhum arrangé mangue passion. Ce dernier peut se garder plusieurs dizaines d’années avec les fruits à l’intérieur.</p>
                    <br><br>
                </div>
                <div class="post">
                    <p class="titre">Rhum arrangé Myrtille</p>
                    <p class="descript">Certainement la recette de rhum arrangé aux fruits la plus simple au monde ! Vous ne pourrez pas vous rater avec cette recette de rhum arrangé myrtille au goût délicatement fruité. 3 ingrédients et 2 petits mois de macération suffisent pour cette de rhum arrangé à la myrtille. Découvrez comment vous régaler en 3 étapes simples et rapides pour un rhum arrangé myrtille aussi beau que bon.</p>
                    <br><br>
                    <img src="../img/rhum_arrange/myrtille.webp" alt ="Rhum arrangé Myrtille" id="myrtille" class="img">
                    <ul class="ingredient">
                        <li><strong>Ingrédients:</strong></li>
                        <li>400g de myrtilles</li>
                        <li>1 litre de rhum blanc agricole 50°</li>
                        <li>3 cuillère à soupe de sucre roux</li>
                    </ul>
                    <p>Le temps de macération : 2 mois</p>
                    <ul class="preparation">
                        <li><strong>Préparation :</strong></li>
                        <li>Prenez 400g de myrtilles. Inutile de préciser que plus vos myrtilles seront de bonne qualité, meilleur votre rhum arrangé myrtille sera !</li> 
                        <li>Pour le récipient, c’est comme vous voulez ! Vous pouvez insérer les myrtilles directement dans votre bouteille de rhum blanc (pensez à la vider d’un tiers environ au préalable). Si vous aimez les grandes quantités, vous pouvez opter pour un bocal ou une jar avec une contenance plus importante (il faudra donc adapter le nombre de myrtilles à la contenance de votre récipient).</li>  
                        <li>Quoi qu’il en soit, versez vos myrtilles dans votre bouteille, votre jar, votre bocal, que sais-je !</li> 
                        <li>Ajoutez 3 cuillères à soupe de sucre roux (très important). Vous pourrez ajuster la quantité de sucre à la fin de la macération, veillez donc à en mettre le minimum possible pour éviter d’obtenir un rhum arrangé myrtille trop sucré.</li> 
                        <li>Versez ensuite votre rhum blanc agricole par dessus vos myrtilles.</li> 
                    </ul>
                    <br><br>
                    <p class="conseil">Le conseil du chef :</p> 
                    <p>Pensez à secouer le rhum de temps en temps afin de bien mélanger les saveurs. Allez-y tout de même doucement afin de ne pas abimer les ingrédients.</p>
                    <br><br>
                </div>
            </div>
        </div>
</body>
</html>