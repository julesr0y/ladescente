<?php
session_start(); //démarrage de la session

function verification_session(){
    if(isset($_SESSION['watibuveur'])){
        return true;
    }
    else{
        return false;
    }
}

if (verification_session() == true){
    $id_user = $_SESSION['watibuveur']['id']; //si l'utilisateur est connecté, on récupère son id de connexion
}
?>