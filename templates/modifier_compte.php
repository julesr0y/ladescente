<?php
session_start(); //demarrage de la session
require_once '../php_files/fonctions.php'; //importation des fonctions
verif_cookie(); //on vérifie si les cookies existent
is_connected_pagecompte(); //on vérifie que l'utilisateur est connecté

try{
    $id_user = $_SESSION["watibuveur"]["id"];
    require_once '../php_files/connect_db.php'; //connexion a la bdd
    $req_prep = $db->prepare("SELECT * FROM users WHERE id = :id");
    $req_prep->execute(
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
    <link rel="icon" href="../img/logo2.webp">
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
    <form action="" method="post">
        <input type="text" name="email" value="<?php echo $email ?>">
        <br>
        <input type="text" name="pseudo" value="<?php echo $username ?>">
        <br>
        <input type="text" name="mdp" placeholder="Modifier le mot de passe">
        <br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>