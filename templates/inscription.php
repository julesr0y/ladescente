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
            $verif_username = $conn->prepare("SELECT * FROM users WHERE username = ?"); //preparation de la requete
            $verif_username->execute([$username]); //execution de la requete
            if($verif_username->fetch()){ //si on a retrouvé la même valeur dans la bdd
                die("<style>.erreur-pseudo{ display: block; }</style>"); //on rend le message d'erreur visible, et on stoppe le traitement des données
            }

            //on vérifie que l'adresse mail n'existe pas déjà en bdd
            $verif_email = $conn->prepare("SELECT * FROM users WHERE email = ?"); //preparation de la requete
            $verif_email->execute([$courriel]); //execution de la requete
            if($verif_email->fetch()){ //si on a retrouvé la même valeur dans la bdd
                die("<style>.erreur-email{ display: block; }</style>"); //on rend le message d'erreur visible, et on stoppe le traitement des données
            }

            //traitement de la date de naissance
            $birthdate = date('Y-m-d', strtotime($start));

            //préparation de la requête sql
            $req = $conn->prepare("INSERT INTO users(genre, nom, prenom, username, email, mdp, datebirth, roles) VALUES(:genre, :nom, :prenom, :username, :email, :mdp, :birthdate, :roles)"); //preparation de la requete
            $req->execute(array( //execution de la requete
                ':genre' => $genre,
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':username' => $username,
                ':email' => $courriel,
                ':mdp' => $mdp,
                ':birthdate' => $birthdate,
                ':roles' => 1 //1 correspond au rôle d'utilisateur de base, un utilisateur avec un rôle 0 est administrateur
			));

            
            //on recupere l'id de l'utilisateur
            $id = $conn->lastInsertId();

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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-witdh, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../styles/compte.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.ico">
    <title>Inscription</title>
</head>
<body>
    <header>
        <a href="index.php">La Descente</a>
        <a href="connexion.php">Compte</a>
    </header>
    <?php require_once '../struct_files/menu.html'; ?>
    <form class="formLetter" method="post" action="#">
        <fieldset><!--On regroupe les champs du formulaire-->  
            <legend>Créer votre compte</legend>
            <label>Genre:</label>
            <input type="radio" name="genre" id="genre" value="Mme" required="required">
            <label for="genre">Madame</label>
            <input type="radio" name="genre" id="genre" value="Mr" required="required">
            <label for="genre">Monsieur</label>
            <br>
            <input type="text" name="nom" id="nom" placeholder="Votre nom" required="required">
            <br>
            <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required="required">
            <br>
            <input type="text" name="username" id="username" placeholder="Votre nom d'utilisateur" required="required">
            <br>
            <input type="email" name="courriel" id="courriel" placeholder="Votre adresse mail" required="required">
            <br>
            <input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" required="required">
            <br>
            <label for="start">Date de naissance:</label>
            <input type="date" id="start" name="start" min="1910-01-01" max="2004-12-31" required="required">
            <br>
            <label class="point">J'accepte les conditions générales d'inscription : </label>
            <input type="checkbox" id="conditions" name="conditions" required="required"><!--checkbox permet d'afficher une case a cocher--> 
            <br>
            <div class="btn">
                <button type="submit" class="signupbtn" name="Inscription" value="Inscription">S'inscrire</button>
                <img src="../img/biere.gif" alt="gif biere" class="biere">
                <button type="button" class="inscbtn" onclick="window.location.href='connexion.php';">Connexion</button>
            </div>
            <p class='erreur-pseudo'>Erreur, ce pseudo est déjà utilisé</p>
            <p class='erreur-email'>Erreur, cet email est déjà utilisé</p>
        </fieldset>
    </form>
</body>
</html>