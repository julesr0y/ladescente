<?php
session_start(); //demarrage de la session
require_once '../php_files/fonctions.php'; //importation des fonctions
verif_cookie(); //on vérifie si les cookies existent
is_connected_global(); //on vérifie que l'utilisateur est connecté
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
    <title>Newsletter</title>
</head>
<body>
    <?php require_once '../struct_files/header_menu.php'; //importation du header et du nav ?>
    <form class="formLetter" method="post"> <!--"On crée un formulaire" -->
        <fieldset>  
            <legend class="legende">S'inscrire à la newsletter</legend>
                <label>Genre:</label>
                <input type="radio" name="genre" id="mme" value="Madame" required="required"> <!--"On ajoute required"required" afin de rendre obligatoire cette section du commentaire"-->
                <label for="mme">Madame</label>
                <input type="radio" name="genre" id="mr" value="Monsieur" required="required">
                <label for="mr">Monsieur</label>
                <br>
                <input type="text" name="nom" id="nom" placeholder="Votre nom" required="required">
                <br>
                <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required="required">
                <br>
                <input type="email" name="courriel" id="courriel" placeholder="nom.prenom@student.junia.com" required="required">
                <br>
                <section class="datenaissance">
                    <section>
                        <label for="start">Date de naissance:</label>
                        <input type="date" id="start_n" name="start" min="1910-01-01" max="2004-12-31" required="required">
                    </section>
                    <img src="../img/ctlnewsletter.gif" alt="cocktail" class="cocktailnews"><!--"On ajoute une image afin de remplir un petit peu"-->
                </section>
                <label class="point">J'accepte les <a href="conditions.php" class="condtion">conditions d'inscription</a></label>
                <input type="checkbox" id="conditions" name="conditions" required="required">
                <br>
                <div class="btn">
                    <button type="submit" class="signupbtn" name="inscrire_n">S'inscrire</button>
                </div>
                <p class='erreur-email'><br>Attention, cet email est déjà inscrit</p>
                <p class="succes"><br>Inscription réalisée avec succès</p>
        </fieldset>
    </form>
</body>
</html>
<?php
if (isset($_POST["inscrire_n"])) { //si le formulaire concerné existe
    try{
        require_once '../php_files/connect_db.php'; //connexion a la bdd
        //validation des données
        $genre = valider_donnees($_POST["genre"]);
        $nom = valider_donnees($_POST["nom"]);
        $prenom = valider_donnees($_POST["prenom"]);
        $email = valider_donnees($_POST["courriel"]);
        $birthdate = valider_donnees($_POST["start"]);

        //on vérifie que l'adresse mail n'existe pas déjà en bdd
        $verif_requete = "SELECT * FROM newsletter WHERE email=?";
        // Process the query
        $verif_query = $conn->prepare($verif_requete);
        $verif_query->execute([$email]);
        if($verif_query->fetch()){
            die("<style>.erreur-email{ display: block; }</style>"); //on rend le message d'erreur visible, et on stoppe le traitement des données
        }

        //traitement date de naissance
        $birthdate = date('Y-m-d', strtotime($birthdate));
        //on enregistre en bdd
        $sql = "INSERT INTO newsletter(`genre`, `nom`, `prenom`, `email`, `naissance`) VALUES(:genre, :nom, :prenom, :email, :naissance)";
        //préparation de la requête sql
        $query = $conn->prepare($sql);
        $query->bindValue(":genre", $genre, PDO::PARAM_STR);
        $query->bindValue(":nom", $nom, PDO::PARAM_STR);
        $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $query->bindValue(":email", $_POST["courriel"], PDO::PARAM_STR);
        $query->bindValue(":naissance", $birthdate, PDO::PARAM_STR);
        $query->execute();

        //fin du traitement
        die("<style>.succes{ display: block; }</style>"); //on rend le message de succès visible
    }
    catch(Exception $e){ //en cas d'erreur
        die("Erreur : " . $e->getMessage());
    }
}
?>