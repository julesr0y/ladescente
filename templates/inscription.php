<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../db/connect_db.php'; //connexion a la bdd
require_once '../db/verif_session_conn_insc.php'; //verification de la session
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-witdh, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../styles/compte.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" href="../img/logo2.webp">
    <title>Mon compte</title>
</head>
<body>
    <header>
        <a href="../index.php">La descente</a>
        <a href="connexion.php">Compte</a>
    </header>
    <?php require_once "../files/menu.html"; ?>
    <form class="formLetter" method="post">
        <fieldset><!--On regroupe les champs du formulaire-->  
            <legend>Creer Votre Compte</legend>
            <label>Genre:</label>
            <input type="radio" name="genre" id="genre" value="Mme" required="required">
            <label for="genre">Madame</label>
            <input type="radio" name="genre" id="genre" value="Mr" required="required">
            <label for="genre">Monsieur</label>
            <br><br>
            <label for="nom">Nom :</label >
            <input type="text" name="nom" id="nom" placeholder="Votre nom" required="required">
            <br><br>
            <label for="prenom">Prénom :</label >
            <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required="required">
            <br><br>
            <label for="username">Username :</label >
            <input type="text" name="username" id="username" placeholder="Votre username" required="required">
            <br><br>
            <label for="courriel">Email : </label >
            <input type="email" name="courriel" id="courriel" placeholder="nom.prenom@student.junia.com" required="required">
            <br><br>
            <label for="mdp">Mot de passe </label>
            <input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" required="required">
            <br><br>
            <label for="start">Date de naissance: </label>
            <input type="date" id="start" name="start" min="1910-01-01" max="2004-12-31" required="required">
            <br><br>
            <label class="point">J'accepte les conditions générales d'inscription : </label>
            <input type="checkbox" id="conditions" name="conditions" required="required"><!--checkbox permet d'afficher une case a cocher--> 
            <br><br>
            <button type="submit" class="signupbtn">S'inscrire</button>
        </fieldset>
    </form>
</body>
</html>
<?php
//on verifie que le formulaire est complet
if (!empty($_POST))
{
    if (isset($_POST["genre"], $_POST["nom"], $_POST["prenom"], $_POST["username"], $_POST["courriel"], $_POST["mdp"], $_POST["start"], $_POST["conditions"]) && !empty($_POST["genre"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["username"]) && !empty($_POST["courriel"]) && !empty($_POST["mdp"]) && !empty($_POST["start"] && !empty($_POST["conditions"])))
    {
        //formulaire complet
        //on protège les données
        $genre = strip_tags($_POST["genre"]);
        $nom = strip_tags($_POST["nom"]);
        $prenom = strip_tags($_POST["prenom"]);
        $username = strip_tags($_POST["username"]);
        //on vérifie que l'entrée "email" est bien de type email, sinon on retourne une erreur
        if (!filter_var($_POST["courriel"], FILTER_VALIDATE_EMAIL))
        {
            die("Adresse mail incorrecte");
        }

        //on hashe le mdp
        $pass = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
        //traitement date de naissance
        $birthdate = date('Y-m-d', strtotime($_POST['start']));
        //on enregistre en bdd
        require_once '../db/connect_db.php'; //connexion a la bdd
        $sql = "INSERT INTO users(`genre`, `nom`, `prenom`, `username`, `email`, `password`, `datebirth`, `roles`) VALUES(:genre, :nom, :prenom, :username, :email, :pass, :datebirth, :roles)";
        //préparation de la requête sql
        $query = $db->prepare($sql);
        $query->bindValue(":genre", $genre, PDO::PARAM_STR);
        $query->bindValue(":nom", $nom, PDO::PARAM_STR);
        $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $query->bindValue(":username", $username, PDO::PARAM_STR);
        $query->bindValue(":email", $_POST["courriel"], PDO::PARAM_STR);
        $query->bindValue(":pass", $pass, PDO::PARAM_STR);
        $query->bindValue(":datebirth", $birthdate, PDO::PARAM_STR);
        $query->bindValue(":roles", '[\"ROLE_USER\"]', PDO::PARAM_STR);
        $query->execute();

        //on recupere l'id de l'utilisateur
        $id = $db->lastInsertId();

        //on crée la session
        $_SESSION["watibuveur"] = ["id" => $id, "genre" => $genre, "nom" => $nom, "prenom" => $prenom, "username" => $username, "email" => $_POST["email"], "birthdate" => $birthdate, "roles" => ["ROLE_USER"]];

        //on définit l'id de session
        $id_user = $_SESSION['watibuveur']['id'];
        
        //on redirige
        header("Location: /templates/page_compte.php");
    }
    else
    {
        echo "<div class='erreur'>Attention, tout les champs sont obligatoires</div>";
    }
}
?>