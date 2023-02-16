<?php
session_start();

//redirige vers connexion.php si l'utilisateur n'est pas connecté
if(!isset($_SESSION["watibuveur"])){
    header("Location: /templates/connexion.php");
    exit;
}

//supprime une variable
unset($_SESSION["watibuveur"]);

header("Location: /templates/connexion.php");
?>