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
    <link rel="stylesheet" href="../styles/ajout_recette.css">
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
    <main>
        <h2>Ajouter une recette</h2><br>
        <form method="post" enctype="multipart/form-data" class="ajout_form">
            <fieldset class="debut">
                <section class="texte">
                    <h4>Je choisis un nom et une description à ma recette</h4><br>
                </section>
                <input type="text" name="nom" id="nom" placeholder="Nom de cette Masterclass" required><br><br>
                <input type="text" name="desc" id="desc" placeholder="Description" required><br>
            </fieldset>
            <fieldset class="ingredients">
                <section class="texte">
                    <h4>J'indique les ingrédients nécessaires</h4><br>
                    <p class="info">Ne remplissez que les champs dont vous avez besoin (Min 2)</p><br>
                </section>
                <input type="text" name="ingredient1" id="ingredient1" placeholder="ingredient" required><br><br>
                <input type="text" name="ingredient2" id="ingredient2" required><br><br>
                <input type="text" name="ingredient3" id="ingredient3"><br><br>
                <input type="text" name="ingredient4" id="ingredient4"><br><br>
                <input type="text" name="ingredient5" id="ingredient5"><br><br>
                <input type="text" name="ingredient6" id="ingredient6"><br><br>
                <input type="text" name="ingredient7" id="ingredient7"><br><br>
                <input type="text" name="ingredient8" id="ingredient8"><br><br>
            </fieldset>
            <fieldset class="preparation">
                <section class="texte">
                    <h4>Je remplis les instructions de préparation</h4><br>
                    <p class="info">Ne remplissez que les champs dont vous avez besoin (Min 2)</p><br>
                </section>
                <input type="text" name="preparation1" id="preparation1" placeholder="preparation" required><br><br>
                <input type="text" name="preparation2" id="preparation2" required><br><br>
                <input type="text" name="preparation3" id="preparation3"><br><br>
                <input type="text" name="preparation4" id="preparation4"><br><br>
                <input type="text" name="preparation5" id="preparation5"><br><br>
                <input type="text" name="preparation6" id="preparation6"><br><br>
                <input type="text" name="preparation7" id="preparation7"><br><br>
                <input type="text" name="preparation8" id="preparation8"><br><br>
            </fieldset>
            <fieldset class="end">
                <section class="texte">
                    <h4>J'ajoute éventuellement un conseil, puis je propose ma recette !</h4><br>
                </section>
                <input type="text" name="conseil" id="conseil" placeholder="Conseil (facultatif)"><br><br>
                <button type="submit">Ajouter une recette</button>
                <section class="texte">
                    <br><p class="info">Afin d'éviter les dérapages, votre recette devra être approuvée par les administrateurs avant d'être publiée</p>
                </section>
                <section class="warning"><br>Attention, certains champs obligatoires sont vides</section>
            </fieldset>
        </form>
    </main>
<?php
if (!empty($_POST["nom"]))
{
    if(!isset($_POST["nom"])){
        echo "<style>.warning{ display: inline; }</style>";
        return;
    }
    $nom = $_POST["nom"];
    $sql = "INSERT INTO recipes(`nom`, `description`,
    `ingredient1`, `ingredient2`, `ingredient3`, `ingredient4`, `ingredient5`, 
    `ingredient6`, `ingredient7`, `ingredient8`,
    `preparation1`, `preparation2`, `preparation3`, `preparation4`, `preparation5`, 
    `preparation6`, `preparation7`, `preparation8`, 
    `conseil`, `approved`, `id_user`) 
    VALUES(:nom, :descr,
    :ingredient1, :ingredient2, :ingredient3, :ingredient4, :ingredient5,
    :ingredient6, :ingredient7, :ingredient8,
    :preparation1, :preparation2, :preparation3, :preparation4, :preparation5,
    :preparation6, :preparation7, :preparation8,
    :conseil, 0, :id_user)";
    $query = $db->prepare($sql);
    $query->bindValue(":nom", $nom, PDO::PARAM_STR);
    $query->bindValue(":descr", $_POST["desc"], PDO::PARAM_STR);
    $query->bindValue(":ingredient1", $_POST["ingredient1"], PDO::PARAM_STR);
    $query->bindValue(":ingredient2", $_POST["ingredient2"], PDO::PARAM_STR);
    $query->bindValue(":ingredient3", $_POST["ingredient3"], PDO::PARAM_STR);
    $query->bindValue(":ingredient4", $_POST["ingredient4"], PDO::PARAM_STR);
    $query->bindValue(":ingredient5", $_POST["ingredient5"], PDO::PARAM_STR);
    $query->bindValue(":ingredient6", $_POST["ingredient6"], PDO::PARAM_STR);
    $query->bindValue(":ingredient7", $_POST["ingredient7"], PDO::PARAM_STR);
    $query->bindValue(":ingredient8", $_POST["ingredient8"], PDO::PARAM_STR);
    $query->bindValue(":preparation1", $_POST["preparation1"], PDO::PARAM_STR);
    $query->bindValue(":preparation2", $_POST["preparation2"], PDO::PARAM_STR);
    $query->bindValue(":preparation3", $_POST["preparation3"], PDO::PARAM_STR);
    $query->bindValue(":preparation4", $_POST["preparation4"], PDO::PARAM_STR);
    $query->bindValue(":preparation5", $_POST["preparation5"], PDO::PARAM_STR);
    $query->bindValue(":preparation6", $_POST["preparation6"], PDO::PARAM_STR);
    $query->bindValue(":preparation7", $_POST["preparation7"], PDO::PARAM_STR);
    $query->bindValue(":preparation8", $_POST["preparation8"], PDO::PARAM_STR);
    $query->bindValue(":conseil", $_POST["conseil"], PDO::PARAM_STR);
    $query->bindValue(":id_user", $id_user, PDO::PARAM_STR);
    $query->execute();
}
?>
</body>
</html>