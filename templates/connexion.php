<?php
session_start();
require_once '../php_files/fonctions.php'; //importation des fonctions
require '../struct_files/banniere_cookies.html'; //importation de la banniere de cookies
authorized_cookies(); //on vérifie si les cookies sont autorisés
verif_cookie(); //on vérifie si les cookies existent
is_connected_connexion_inscription(); //on vérifie que l'utilisateur ne soit pas connecté
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-witdh, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../styles/compte.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.ico">
    <title>Connexion</title>
</head>
<body>
    <header>
        <a href="index.php">La Descente</a>
        <a href="connexion.php">Compte</a>
    </header>
    <?php require_once '../struct_files/menu.html'; ?>
    <form class="formLetter" method="post">
        <fieldset><!--On regroupe les champs du formulaire-->  
            <legend>Connexion</legend>
            <input type="email" name="courriel" id="courriel" placeholder="nom.prenom@student.junia.com" required="required">
            <br>
            <input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" required="required">
            <br>
            <div class="btn">
                <button type="submit" class="signupbtn" name="Connexion" value="Connexion">Connexion</button>
                <img src="../img/biere.gif" alt="Biere" class="biere">
                <button type="button" class="inscbtn" onclick="window.location.href='inscription.php';">S'inscrire</button>
            </div>
        </fieldset>
    </form>
    <p class="erreur">L'adresse mail et/ou le mot de passe sont incorrects</p>
</body>
</html>
<?php
    //traitement php sql de la connexion avec mise en place de la session
    if(isset($_POST["Connexion"])){ //si le formulaire concernée existe
        try{
            require_once '../php_files/connect_db.php'; //connexion a la bdd

            //validation des données
            $_POST["courriel"] = valider_donnees($_POST["courriel"]);
            $mdp = valider_donnees($_POST["mdp"]);

            //on récupère les données de la bdd associées à l'adresse mail
            $req = $conn->prepare("SELECT * FROM users WHERE email = ?"); //requete et préparation
            $req->execute([$_POST["courriel"]]); //execution de la requete
            $user = $req->fetch(); //recupération des données

            //on verifie le mail et le mot de passe
            if(!$user || !password_verify($_POST["mdp"], $user["mdp"])){ //si le mot de passe ne correspond pas (on vérifie un mot de passe hashé)
                die("<style>.erreur{ display: block }</style>"); //on affiche l'erreur
            }

            //on crée la session
            $_SESSION["watibuveur"] = array(
                "id" => $user["id"],
                "genre" => $user["genre"],
                "nom" => $user["nom"],
                "prenom" => $user["prenom"],
                "username" => $user["username"],
                "email" => $user["email"],
                "birthdate" => $user["datebirth"],
                "roles" => $user["roles"],
            );

            //création des cookies
            require_once '../php_files/set_cookies.php';
            
            //on redirige
            header("Location: /templates/page_compte.php");
        }
        catch(Exception $e){ //en cas d'erreur
            die("Erreur : " . $e->getMessage());
        }
    }
?>