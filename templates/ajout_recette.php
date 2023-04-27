<?php
session_start(); //demarrage de la session
require_once '../php_files/fonctions.php'; //importation des fonctions
verif_cookie(); //on vérifie si les cookies existent
is_connected_global(); //on vérifie que l'utilisateur est connecté
$id_user = get_user_id(); //on récupère l'id de l'utilisateur pour le définir en tant qu'auteur de la recette
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-witdh, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../styles/ajout_recette.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.ico">
    <title>Proposer une recette</title>
</head>
<body>
    <?php require_once '../struct_files/header_menu.php'; //importation du header et du nav ?>
    <main>
        <form method="post" enctype="multipart/form-data" class="ajout_form">
            <section>
                <h2>Ajouter une recette</h2><br>
                <fieldset class="debut">
                    <section class="texte">
                        <h4>Je choisis un nom et une description à ma recette</h4><br>
                    </section>
                    <input type="text" name="nom" id="nom" placeholder="Nom de cette Masterclass" required><br><br>
                    <input type="text" name="descr" id="descr" placeholder="Description" required><br>
                </fieldset>
            </section>
            <fieldset class="ingredients">
                <section class="texte">
                    <h4>J'indique les ingrédients nécessaires</h4><br>
                    <p class="info">Ne remplissez que les champs dont vous avez besoin (Min 2)</p><br>
                </section>
                <input type="text" name="ingredient1" id="ingredient1" placeholder="Obligatoire" required><br><br>
                <input type="text" name="ingredient2" id="ingredient2" placeholder="Obligatoire" required><br><br>
                <input type="text" name="ingredient3" id="ingredient3" placeholder="Optionnel"><br><br>
                <input type="text" name="ingredient4" id="ingredient4" placeholder="Optionnel"><br><br>
                <input type="text" name="ingredient5" id="ingredient5" placeholder="Optionnel"><br><br>
                <input type="text" name="ingredient6" id="ingredient6" placeholder="Optionnel"><br><br>
                <input type="text" name="ingredient7" id="ingredient7" placeholder="Optionnel"><br><br>
                <input type="text" name="ingredient8" id="ingredient8" placeholder="Optionnel"><br><br>
            </fieldset>
            <fieldset class="preparation">
                <section class="texte">
                    <h4>Je remplis les instructions de préparation</h4><br>
                    <p class="info">Ne remplissez que les champs dont vous avez besoin (Min 2)</p><br>
                </section>
                <input type="text" name="preparation1" id="preparation1" placeholder="Obligatoire" required><br><br>
                <input type="text" name="preparation2" id="preparation2" placeholder="Obligatoire" required><br><br>
                <input type="text" name="preparation3" id="preparation3" placeholder="Optionnel"><br><br>
                <input type="text" name="preparation4" id="preparation4" placeholder="Optionnel"><br><br>
                <input type="text" name="preparation5" id="preparation5" placeholder="Optionnel"><br><br>
                <input type="text" name="preparation6" id="preparation6" placeholder="Optionnel"><br><br>
                <input type="text" name="preparation7" id="preparation7" placeholder="Optionnel"><br><br>
                <input type="text" name="preparation8" id="preparation8" placeholder="Optionnel"><br><br>
            </fieldset>
            <fieldset class="end">
                <section class="texte">
                    <h4>J'ajoute éventuellement un conseil, puis je propose ma recette !</h4><br>
                </section>
                <input type="text" name="conseil" id="conseil" placeholder="Conseil (facultatif)"><br><br>
                <button type="submit" name="Proposer" value="Proposer" class="proposer">Ajouter une recette</button>
                <section class="texte">
                    <br><p class="info">Afin d'éviter les dérapages, votre recette devra être approuvée par les administrateurs avant d'être publiée</p>
                </section>
                <section class="warning"><br>Attention, certains champs obligatoires sont vides</section>
            </fieldset>
        </form>
    </main>
<?php
    //traitement php sql de l'ajout d'une recette
    if (isset($_POST["Proposer"])) { //si le formulaire concerné existe
        try{
            require_once '../php_files/connect_db.php'; //connexion a la bdd
            //validation des données
            $_POST["nom"] = valider_donnees($_POST["nom"]);
            $_POST["descr"] = valider_donnees($_POST["descr"]);
            $_POST["ingredient1"] = valider_donnees($_POST["ingredient1"]);
            $_POST["ingredient2"] = valider_donnees($_POST["ingredient2"]);
            $_POST["ingredient3"] = valider_donnees($_POST["ingredient3"]);
            $_POST["ingredient4"] = valider_donnees($_POST["ingredient4"]);
            $_POST["ingredient5"] = valider_donnees($_POST["ingredient5"]);
            $_POST["ingredient6"] = valider_donnees($_POST["ingredient6"]);
            $_POST["ingredient7"] = valider_donnees($_POST["ingredient7"]);
            $_POST["ingredient8"] = valider_donnees($_POST["ingredient8"]);
            $_POST["preparation1"] = valider_donnees($_POST["preparation1"]);
            $_POST["preparation2"] = valider_donnees($_POST["preparation2"]);
            $_POST["preparation3"] = valider_donnees($_POST["preparation3"]);
            $_POST["preparation4"] = valider_donnees($_POST["preparation4"]);
            $_POST["preparation5"] = valider_donnees($_POST["preparation5"]);
            $_POST["preparation6"] = valider_donnees($_POST["preparation6"]);
            $_POST["preparation7"] = valider_donnees($_POST["preparation7"]);
            $_POST["preparation8"] = valider_donnees($_POST["preparation8"]);
            $_POST["conseil"] = valider_donnees($_POST["conseil"]);

            //création de la requete
            $sql = "INSERT INTO recipes(nom, descr,
            ingredient1, ingredient2, ingredient3, ingredient4,
            ingredient5, ingredient6, ingredient7, ingredient8,
            preparation1, preparation2, preparation3, preparation4,
            preparation5, preparation6, preparation7, preparation8, 
            conseil, approved, id_user) 
            VALUES(:nom, :descr,
            :ingredient1, :ingredient2, :ingredient3, :ingredient4,
            :ingredient5, :ingredient6, :ingredient7, :ingredient8,
            :preparation1, :preparation2, :preparation3, :preparation4,
            :preparation5, :preparation6, :preparation7, :preparation8,
            :conseil, 0, :id_user)"; //on place approved sur 0 par défault (correspond à une recette non approuvée par les administrateurs)

            $req = $conn->prepare($sql); //preparation de la requete
            $req->execute(array( //execution de la requete
                ":nom" => $_POST["nom"],
                ":descr" => $_POST["descr"],
                ":ingredient1" => $_POST["ingredient1"],
                ":ingredient2" => $_POST["ingredient2"],
                ":ingredient3" => $_POST["ingredient3"],
                ":ingredient4" => $_POST["ingredient4"],
                ":ingredient5" => $_POST["ingredient5"],
                ":ingredient6" => $_POST["ingredient6"],
                ":ingredient7" => $_POST["ingredient7"],
                ":ingredient8" => $_POST["ingredient8"],
                ":preparation1" => $_POST["preparation1"],
                ":preparation2" => $_POST["preparation2"],
                ":preparation3" => $_POST["preparation3"],
                ":preparation4" => $_POST["preparation4"],
                ":preparation5" => $_POST["preparation5"],
                ":preparation6" => $_POST["preparation6"],
                ":preparation7" => $_POST["preparation7"],
                ":preparation8" => $_POST["preparation8"],
                ":conseil" => $_POST["conseil"],
                ":id_user" => $id_user //id de l'utilisateur (pour identifier l'auteur), la variable provient de /db/verif_session.php
            ));
        }
        catch(Exception $e){ //en cas d'erreur
			die("Erreur : " . $e->getMessage());
        }
    }
?>
</body>
</html>