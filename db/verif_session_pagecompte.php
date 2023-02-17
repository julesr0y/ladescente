<?php
session_start(); //démarrage de la session

function verification_session_pagecompte(){
    if(isset($_SESSION['watibuveur'])){
        return true;
    }
    else{
        return false;
    }
}

if (verification_session_pagecompte() == true){
    $id_user = $_SESSION['watibuveur']['id']; //si l'utilisateur est connecté, on récupère son id de connexion
}
else{
    header("Location: /templates/connexion.php"); //si l'utilisateur n'est pas connecté, on le renvoie sur la page de connexion
}
?>