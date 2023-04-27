<?php
session_start(); //démarrage de la session
require_once '../../php_files/fonctions.php'; //importation des fonctions
verif_cookie(); //on vérifie si les cookies existent
is_connected_global(); //on vérifie que l'utilisateur est connecté
is_admin(); //on vérifie que l'utilisateur soit un admin

    if(isset($_GET["idsr"])){ //si la donnée concernée existe
        try{
            require_once '../../php_files/connect_db.php'; //connexion a la bdd
            $req = $conn->prepare("DELETE FROM recipes WHERE id = ?"); //requete et preparation
            $req->execute([$_GET["idsr"]]); //execution de la requete
            header("Location: /templates/admin/recipes_management.php"); //on redirige
        }
        catch(Exception $e){ //en cas d'erreur
            die("Erreur : " . $e->getMessage());
        }
    }
?>