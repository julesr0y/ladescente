<?php
session_start(); //démarrage de la session
require_once '../../php_files/fonctions.php'; //importation des fonctions
verif_cookie(); //on vérifie si les cookies existent
is_connected_global(); //on vérifie que l'utilisateur est connecté
is_admin(); //on vérifie que l'utilisateur soit un admin

    if(isset($_GET["idmr"])){ //si la donnée concernée existe
        try{
            require_once '../../php_files/connect_db.php'; //connexion a la bdd
            $req = $db->prepare("UPDATE recipes SET approved = 1 WHERE id = ?"); //requete et preparation
            $req->execute([$_GET["idmr"]]); //execution de la requete
            header("Location: /templates/admin/approve_recipe.php"); //on redirige
        }
        catch(Exception $e){ //en cas d'erreur
            die("Erreur : " . $e->getMessage());
        }
    }

?>