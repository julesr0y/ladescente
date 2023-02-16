<?php
session_start(); //démarrage de la session

//si l'utilisateur n'est pas connecté, on le renvoie sur la page de connexion
if(isset($_SESSION['watibuveur'])){
    header("Location: /templates/page_compte.php");
    //l'utilisateur est connecté, on récupère son id de connexion (idd)
    $idd_user = $_SESSION['watibuveur']['id'];
}
?>