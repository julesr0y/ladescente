<?php
session_start();

//on supprime les cookies
require_once 'unset_cookies.php';

//redirige vers connexion.php si l'utilisateur n'est pas connecté
if(!isset($_SESSION["watibuveur"])){
    header("Location: /templates/connexion.php");
    exit;
}

//supprime la session
session_unset();
session_destroy();
header("Location: /templates/connexion.php");
?>