<?php
session_start();
require_once '../php_files/fonctions.php'; //importation des fonctions
require '../struct_files/banniere_cookies.html'; //importation de la banniere de cookies
authorized_cookies(); //on vérifie si les cookies sont autorisés
verif_cookie(); //on vérifie si les cookies existent
is_connected_connexion_inscription(); //on vérifie que l'utilisateur ne soit pas connecté

    //traitement php sql de l'inscription + mise en place de la session
    if (isset($_POST["Inscription"])) { //si le formulaire concerné existe
        try{
            require_once '../php_files/connect_db.php'; //connexion a la bdd

            //validation des données
            $genre = valider_donnees($_POST["genre"]);
            $nom = valider_donnees($_POST["nom"]);
            $prenom = valider_donnees($_POST["prenom"]);
            $username = valider_donnees($_POST["username"]);
            $courriel = valider_donnees($_POST["courriel"]);
            $mdp = valider_donnees($_POST["mdp"]);
            $start = valider_donnees($_POST["start"]);

            //on vérifie que l'username n'existe pas déjà en bdd
            $verif_username = $db->prepare("SELECT * FROM users WHERE username = ?"); //preparation de la requete
            $verif_username->execute([$username]); //execution de la requete
            if($verif_username->fetch()){ //si on a retrouvé la même valeur dans la bdd
                die("<style>.erreur-pseudo{ display: block; }</style>"); //on rend le message d'erreur visible, et on stoppe le traitement des données
            }

            //on vérifie que l'adresse mail n'existe pas déjà en bdd
            $verif_email = $db->prepare("SELECT * FROM users WHERE email = ?"); //preparation de la requete
            $verif_email->execute([$courriel]); //execution de la requete
            if($verif_email->fetch()){ //si on a retrouvé la même valeur dans la bdd
                die("<style>.erreur-email{ display: block; }</style>"); //on rend le message d'erreur visible, et on stoppe le traitement des données
            }

            //on hashe le mdp pour le stocker dans la bdd
            $pass = password_hash($mdp, PASSWORD_DEFAULT);

            //traitement de la date de naissance
            $birthdate = date('Y-m-d', strtotime($start));

            //préparation de la requête sql
            $req = $db->prepare("INSERT INTO users(genre, nom, prenom, username, email, mdp, datebirth, roles) VALUES(:genre, :nom, :prenom, :username, :email, :mdp, :birthdate, :roles)"); //preparation de la requete
            $req->execute(array( //execution de la requete
                ':genre' => $genre,
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':username' => $username,
                ':email' => $courriel,
                ':mdp' => $pass,
                ':birthdate' => $birthdate,
                ':roles' => 1 //1 correspond au rôle d'utilisateur de base, un utilisateur avec un rôle 0 est administrateur
			));

            
            //on recupere l'id de l'utilisateur
            $id = $db->lastInsertId();

            //on crée la session
            $_SESSION["watibuveur"] = array(
                                        "id" => $id, 
                                        "genre" => $genre, 
                                        "nom" => $nom, 
                                        "prenom" => $prenom, 
                                        "username" => $username, 
                                        "email" => $courriel, 
                                        "birthdate" => $birthdate, 
                                        "roles" => 1
                                    );

            //on définit l'id de session
            $id_user = $_SESSION["watibuveur"]["id"];

            //on crée les cookies avec la fonction setcookie (validité d'un an)
            setcookie("id",$_SESSION['watibuveur']['id'],time() + (365*24*3600),'/', '',false,true);
            setcookie("genre",$_SESSION['watibuveur']['genre'],time() + (365*24*3600),'/', '',false,true);
            setcookie("nom",$_SESSION['watibuveur']['nom'],time() + (365*24*3600),'/', '',false,true);
            setcookie("prenom",$_SESSION['watibuveur']['prenom'],time() + (365*24*3600),'/', '',false,true);
            setcookie("username",$_SESSION['watibuveur']['username'],time() + (365*24*3600),'/', '',false,true);
            setcookie("email",$_SESSION['watibuveur']['email'],time() + (365*24*3600),'/', '',false,true);
            setcookie("birthdate",$_SESSION['watibuveur']['birthdate'],time() + (365*24*3600),'/', '',false,true);
            setcookie("role",$_SESSION['watibuveur']['roles'],time() + (365*24*3600),'/', '',false,true);
            
            //on redirige
            header("Location: /templates/page_compte.php");
        }
        catch(Exception $e){ //en cas d'erreur
			die("Erreur : " . $e->getMessage());
        }
    }
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
    <title>Inscription</title>
</head>
<body>
    <header>
        <a href="../index.php">La descente</a>
        <a href="connexion.php">Compte</a>
    </header>
    <?php require_once '../struct_files/menu.html'; ?>
    <form class="formLetter" method="post" action="#">
        <fieldset><!--On regroupe les champs du formulaire-->  
            <legend>Creer Votre Compte</legend>
            <label>Genre:</label>
            <input type="radio" name="genre" id="genre" value="Mme" required="required">
            <label for="genre">Madame</label>
            <input type="radio" name="genre" id="genre" value="Mr" required="required">
            <label for="genre">Monsieur</label>
            <br>
            <label for="nom">Nom :</label >
            <input type="text" name="nom" id="nom" placeholder="Votre nom" required="required">
            <br>
            <label for="prenom">Prénom :</label >
            <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required="required">
            <br>
            <label for="username">Username :</label >
            <input type="text" name="username" id="username" placeholder="Votre username" required="required">
            <br>
            <label for="courriel">Email : </label >
            <input type="email" name="courriel" id="courriel" placeholder="nom.prenom@student.junia.com" required="required">
            <br>
            <label for="mdp">Mot de passe </label>
            <input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" required="required">
            <br>
            <label for="start">Date de naissance: </label>
            <input type="date" id="start" name="start" min="1910-01-01" max="2004-12-31" required="required">
            <br>
            <label class="point">J'accepte les conditions générales d'inscription : </label>
            <input type="checkbox" id="conditions" name="conditions" required="required"><!--checkbox permet d'afficher une case a cocher--> 
            <br>
            <div class="btn">
                <button type="submit" class="signupbtn" name="Inscription" value="Inscription">S'inscrire</button>
                <button type="button" class="inscbtn" onclick="window.location.href='connexion.php';">Connexion</button>
            </div>
            <p class='erreur-pseudo'>Erreur, ce pseudo est déjà utilisé</p>
            <p class='erreur-email'>Erreur, cet email est déjà utilisé</p>
        </fieldset>
    </form>
</body>
</html>