<?php

    function is_connected_global(){
        /*
            is_connected_global permet de vérifier si l'utilisateur est connecté
            cette fonction renvoie juste true ou false
        */
        if(isset($_SESSION['watibuveur'])){
            return true; //si l'utilisateur est connecté, on retourne true
        }
        else{
            return false; //si l'utilisateur n'est pas connecté, on retourne false
        }
    }

    function is_connected_connexion_inscription(){
        /*
            is_connected_connexion_inscription permet de vérifier si l'utilisateur est connecté quand 
            il utilise les formulaires d'inscription/connexion
            si oui, on le renvoie sur la page du compte
        */
        if(isset($_SESSION['watibuveur'])){
            header("Location: /templates/page_compte.php"); //si l'utilisateur est connecté, on le renvoie sur la page de compte
        }
    }

    function is_connected_pagecompte(){
        /*
            is_connected_pagecompte permet de vérifier que l'utilisateur est bien connecté,
            dans le cas contraire, on le renvoie à la page de connexion
        */
        if(isset($_SESSION['watibuveur'])){ //si l'utilisateur est connecté
            return true;
        }
        else{
            header("Location: /templates/connexion.php"); //si l'utilisateur n'est pas connecté, on le renvoie sur la page de connexion
            return false;
        }
    }

    function is_admin(){
        /*
            is_admin permet de vérifier si l'utilisateur connecté a le rôle d'administrateur
        */
        if(isset($_SESSION['watibuveur'])){ //si l'utilisateur est connecté
            if($_SESSION['watibuveur']['roles'] == 0){ //si le rôle de l'utilisateur est 0 (correspond au rôle d'admin)
                return true;
            }
        }
        else{
            header("Location: /templates/connexion.php");
        }
    }

    function get_user_id(){
        /*
            get_user_id permet d'obtenir l'id de l'utilisateur connecté
            cela permet par exemple d'identifier l'auteur des recettes proposées
        */
        if(is_connected_global()){
            $id_user = $_SESSION["watibuveur"]["id"]; //variable qui permet d'identifier l'utilisateur
            return $id_user;
        }
    }

    function authorized_cookies(){
        /*
            authorized_cookies pemet de vérifier si l'utilisateur a accepté l'utilisation des cookies
        */
        if(!isset($_COOKIE["cookies_autorises"])){ //si le cookie concerné n'existe pas
            echo "<style>.container_banniere{ display: block; }</style>"; //on fait apparaitre la bannière pour l'autorisations des cookies
        }
        else{
            return true;
        }
    }

    function verif_cookie(){
        /*
            verif cookies est une fonction de vérification pour savoir si les cookies sont défini
        */
        if( //si la session n'existe pas, mais que tous les cookies existent
            !isset($_SESSION["watibuveur"])
            &&
            isset($_COOKIE["cookies_autorises"])
            &&
            isset($_COOKIE["id"])
            &&
            isset($_COOKIE["genre"])
            &&
            isset($_COOKIE["nom"])
            &&
            isset($_COOKIE["prenom"])
            &&
            isset($_COOKIE["username"])
            &&
            isset($_COOKIE["email"])
            &&
            isset($_COOKIE["birthdate"])
            &&
            isset($_COOKIE["role"])
        ){
            //on crée la session avec les données des cookies
            $_SESSION["watibuveur"] = array(
                "id" => $_COOKIE["id"],
                "genre" => $_COOKIE["genre"],
                "nom" => $_COOKIE["nom"],
                "prenom" => $_COOKIE["prenom"],
                "username" => $_COOKIE["username"],
                "email" => $_COOKIE["email"],
                "birthdate" => $_COOKIE["birthdate"],
                "roles" => $_COOKIE["role"],
            );
        }
    }

    function valider_donnees($donnee){
        /*
            valider_donnees permet de verifier si les données récupérées ne sont pas un danger
            pour ce faire elle fait appel à différentes fonctions natives de php pour la validation
            des données
        */
        $donnee = trim($donnee);
        $donnee = stripslashes($donnee);
        $donnee = htmlspecialchars($donnee);
        return $donnee;
    }
?>