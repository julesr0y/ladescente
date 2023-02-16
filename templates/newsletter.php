<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../db/connect_db.php'; //connexion a la bdd
require_once '../db/verif_session.php'; //verification de la session
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-witdh, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../styles/newsletter.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" href="../img/logo2.webp">
    <title>Newsletter</title>
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
    <form class="formLetter" method="post" action="#"> <!--"On crée un formulaire" -->
        <fieldset>  
            <legend class="legende">Vos informations</legend>
                <label>Genre:</label>
                    <input type="radio" name="genre" id="mme" value="Madame" required="required"> <!--"On ajoute required"required" afin de rendre obligatoire cette section du commentaire"-->
                <label for="mme">Madame</label>
                    <input type="radio" name="genre" id="mr" value="Monsieur" required="required">
                <label for="mr">Monsieur</label>
                <br><br>
                <label for="nom">Nom :</label >
                    <input type="text" name="nom" id="nom" placeholder="Votre nom" required="required">
                <br><br>
                <label for="prenom">Prénom :</label >
                    <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required="required">
                <br><br>
                <label for="courriel">Email : </label >
                    <input type="email" name="courriel" id="courriel" placeholder="nom.prenom@student.junia.com" required="required">
                <br><br>
                <label for="start" >Date de naissance: </label>
                    <input type="date" id="start" name="start" min="1910-01-01" max="2004-12-31" required="required">
                <br><br>
                <label class="point">J'accepte les <a href="conditions.php" class="condtion">Conditions d'inscriptions à la Newsletter</a></label>
                    <input type="checkbox" id="conditions" name="conditions" required="required">
                <br><br>
                <button type="submit" class="signupbtn">S'inscrire</button>
                <img src="../img/ctlnewsletter.gif" alt="cocktail" class="cocktailnews"><!--"On ajoute une image afin de remplir un petit peu"-->
        </fieldset>
    </form>
    <main>
        <div class="main">
            <p>La descente est un site qui vous permet de découvrir des recettes de cocktail mais aussi d'en échanger avec d'autres utilisateurs dans le futur</p>
            <br>
            <p>En vous inscrivant à notre newsletter vous allez recevoir de temps en temps des mails d'information</p>
        </div>        
    </main>
</body>
</html>
<?php
//on verifie que le formulaire est complet
if (!empty($_POST))
{
    if (isset($_POST["genre"], $_POST["nom"], $_POST["prenom"], $_POST["courriel"], $_POST["start"], $_POST["conditions"]) && !empty($_POST["genre"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["courriel"]) && !empty($_POST["start"] && !empty($_POST["conditions"])))
    {
        //formulaire complet
        //on protège les données
        $genre = strip_tags($_POST["genre"]);
        $nom = strip_tags($_POST["nom"]);
        $prenom = strip_tags($_POST["prenom"]);
        //on vérifie que l'entrée "email" est bien de type email, sinon on retourne une erreur
        if (!filter_var($_POST["courriel"], FILTER_VALIDATE_EMAIL))
        {
            die("Adresse mail incorrecte");
        }

        //traitement date de naissance
        $birthdate = date('Y-m-d', strtotime($_POST['start']));
        //on enregistre en bdd
        require_once '../db/connect_db.php'; //connexion a la bdd
        $sql = "INSERT INTO newsletter(`genre`, `nom`, `prenom`, `email`, `naissance`) VALUES(:genre, :nom, :prenom, :email, :naissance)";
        //préparation de la requête sql
        $query = $db->prepare($sql);
        $query->bindValue(":genre", $genre, PDO::PARAM_STR);
        $query->bindValue(":nom", $nom, PDO::PARAM_STR);
        $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $query->bindValue(":email", $_POST["courriel"], PDO::PARAM_STR);
        $query->bindValue(":naissance", $birthdate, PDO::PARAM_STR);
        $query->execute();

        //on redirige
        header("Location: /templates/newsletter.php");
    }
    else
    {
        echo "<div class='erreur'>Attention, tous les champs sont obligatoires</div>";
    }
}
?>