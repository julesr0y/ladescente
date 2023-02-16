<?php
session_start(); //démarrage de la session

//si l'utilisateur n'est pas connecté, on le renvoie sur la page de connexion
if(!isset($_SESSION['watibuveur'])){
    header("Location: /templates/connexion.php");
    exit;
}
else
{
    //si l'utilisateur est connecté, on récupère son id de connexion (idd)
    $id_user = $_SESSION['watibuveur']['id'];
}

function verification_session(){
    if(isset($_SESSION['watibuveur'])){
        return true;
    }
    else{
        return false;
    }
}
?>