<?php
session_start(); //demarrage de la session
require_once '../php_files/fonctions.php'; //importation des fonctions
verif_cookie(); //on vérifie si les cookies existent
is_connected_pagecompte(); //on vérifie que l'utilisateur est connecté

try{
    $id_user = $_SESSION["watibuveur"]["id"];
    require_once '../php_files/connect_db.php'; //connexion a la bdd
    $req_prep = $conn->prepare("SELECT * FROM users WHERE id = :id"); //requete et préparation
    $req_prep->execute( //execution
        array(
            ":id" => $id_user
        )
    );
    $resultat = $req_prep->fetch();
    //on stocke les données dans des variables
    $email = $resultat["email"];
    $username = $resultat["username"];
}
catch(Exception $e){ //en cas d'erreur
    die("Erreur : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-witdh, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="../styles/page_compte.css">
    <link rel="stylesheet" href="../styles/general/style_commun.css">
    <link rel="stylesheet" href="../styles/compte.css">
    <link rel="stylesheet" href="../styles/modifier_compte.css">
    <link rel="icon" type="image/x-icon" href="../img/logo.ico">
    <title>Modifier le compte</title>
</head>
<body>
    <header>
        <a href="../index.php">La Descente</a>
        <?php
            $account_name = $_SESSION["watibuveur"]["genre"]." ".$_SESSION["watibuveur"]["nom"]." ".$_SESSION["watibuveur"]["prenom"];
            echo "<a href='page_compte.php'>$account_name</a>";
        ?>
    </header>
    <?php require_once '../struct_files/menu.html'; ?>
    <br>
    <form class="formLetter" method="post">
        <fieldset>
            <legend>Modifier votre compte</legend>
            <input type="text" name="courriel" id="courriel" value="<?php echo $email ?>" required>
            <br>
            <input type="text" name="username" id="username" value="<?php echo $username ?>" required>
            <br><br>
            <p style="font-size:10px; color:red;">Remplissez le champ du mot de passe uniquement si vous souhaitez le changer. Dans le cas contraire laissez-le vide et votre mot de passe restera tel quel.</p>
            <input type="text" id="mdp" name="mdp" placeholder="Modifier le mot de passe">
            <br>
            <label class="point">Je confirme les modifications apportées : </label>
            <input type="checkbox" id="conditions" name="conditions" required="required">
            <br>
            <div class="btn">
                <input type="submit" class="signupbtn" name="Modifier" value="Modifier" style="height: 7vh;">
                <button type="button" class="inscbtn" onclick="window.location.href='page_compte.php';">Retour</button>
            </div>
            <p class='erreur-pseudo'>Erreur, ce pseudo est déjà utilisé</p>
            <p class='erreur-email'>Erreur, cet email est déjà utilisé</p>
        </fieldset>
    </form>
    <?php
    if(isset($_POST["Modifier"])){
        try{
            require_once '../php_files/connect_db.php'; //connexion a la bdd
            $new_email = valider_donnees($_POST["courriel"]);
            $new_username = valider_donnees($_POST["username"]);

            //on vérifie que l'username n'existe pas déjà en bdd
            if($new_username != $username){ //si le nouveau nom d'utilisateur n'est pas équivalent à celui de l'utilisateur
                $verif_username = $conn->prepare("SELECT * FROM users WHERE username = ?"); //preparation de la requete
                $verif_username->execute([$new_username]); //execution de la requete
                if($verif_username->fetch()){ //si on a retrouvé la même valeur dans la bdd
                    die("<style>.erreur-pseudo{ display: block; }</style>"); //on rend le message d'erreur visible, et on stoppe le traitement des données
                }
            }

            //on vérifie que l'adresse mail n'existe pas déjà en bdd
            if($new_email != $email){
                $verif_email = $conn->prepare("SELECT * FROM users WHERE email = ?"); //preparation de la requete
                $verif_email->execute([$new_email]); //execution de la requete
                if($verif_email->fetch()){ //si on a retrouvé la même valeur dans la bdd
                    die("<style>.erreur-email{ display: block; }</style>"); //on rend le message d'erreur visible, et on stoppe le traitement des données
                }
            }
    
            if(!empty($_POST["mdp"])){ //si l'utilisateur souhaite modifier son mot de passe
                $new_password = valider_donnees($_POST["mdp"]);
                //on hashe le mdp pour le stocker dans la bdd
                $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                $req_prep = $conn->prepare("UPDATE users SET email = :email, username = :username, mdp = :mdp WHERE id = :id"); //requete et preparation
                $req_prep->execute(array(
                        ":email" => $new_email,
                        ":username" => $new_username,
                        ":mdp" => $new_password,
                        ":id" => $id_user
                    ));
            }
            else{ //sinon
                $req_prep = $conn->prepare("UPDATE users SET email = :email, username = :username WHERE id = :id"); //requete et preparation
                $req_prep->execute(array(
                        ":email" => $new_email,
                        ":username" => $new_username,
                        ":id" => $id_user
                    )
                );
            }
    
            //on modifie les variables de session et de cookies pour les faire correspondre aux nouvelles modifications
            $_SESSION["watibuveur"]["username"] = $new_username;
            $_SESSION["watibuveur"]["email"] = $new_email;

            //on supprime les cookies déjà existant
            require_once '../php_files/unset_cookies.php';

            //on crée de nouveaux cookies, qui contiendront les valeurs mises à jour par l'utilisateur
            require_once '../php_files/set_cookies.php';

            //on redirige
            header("Location: /templates/modifier_compte.php");
    
        }
        catch(Exception $e){ //en cas d'erreur
            die("Erreur : " . $e->getMessage());
        }
    }
    ?>
</body>
</html>