<?php
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
    <form class="formLetter" method="post" action="#">
        <fieldset> <!--On regroupe les champs du formulaire-->
            <legend>Connexion</legend>
            <label for="courriel">Email :</label>
            <input type="email" name="courriel" id="courriel" placeholder="nom.prenom@student.junia.com" required="required">
            <br><br>
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" required="required">
            <br><br>
            <div class="btn">
                <button type="submit" class="signupbtn">Connexion</button>
                <img src="../img/biere.gif" alt="Biere" class="biere">
                <a href="inscription.php">S'inscrire</a>
            </div>
        </fieldset>
    </form>
</body>
</html>
<?php
if(!empty($_POST)){
    if (isset($_POST["courriel"], $_POST["mdp"]) && !empty($_POST["courriel"] && !empty($_POST["mdp"])))
    {
        if (!filter_var($_POST["courriel"], FILTER_VALIDATE_EMAIL))
        {
            die ("Email incorrect");
        }

        $sql = "SELECT * FROM `users` WHERE `email` = :email";
        $query = $db->prepare($sql);
        $query->bindValue(":email", $_POST["courriel"], PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        
        if (!$user)
        {
            die("L'user n'existe pas");
        }

        //user existant ici, on verifie le mdp
        if(!password_verify($_POST["mdp"], $user["password"]))
        {
            die("L'user et/ou le mdp n'existe pas");
        }

        $_SESSION["watibuveur"] = [
            "id" => $user["id"],
            "genre" => $user["genre"],
            "nom" => $user["nom"],
            "prenom" => $user["prenom"],
            "username" => $user["username"],
            "email" => $user["email"],
            "birthdate" => $user["datebirth"],
            "roles" => $user["roles"],
        ];
        
        //on redirige
        header("Location: /templates/page_compte.php");
    }
}
?>