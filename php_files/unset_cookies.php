<?php
    //supprime les cookies, en supprimant du temps, ce qui indique au navigateur qu'ils ne sont plus valides
    setcookie("id",$_SESSION['watibuveur']['id'],time() - (365*24*3600),'/', '',false,true);
    setcookie("genre",$_SESSION['watibuveur']['genre'],time() - (365*24*3600),'/', '',false,true);
    setcookie("nom",$_SESSION['watibuveur']['nom'],time() - (365*24*3600),'/', '',false,true);
    setcookie("prenom",$_SESSION['watibuveur']['prenom'],time() - (365*24*3600),'/', '',false,true);
    setcookie("username",$_SESSION['watibuveur']['username'],time() - (365*24*3600),'/', '',false,true);
    setcookie("email",$_SESSION['watibuveur']['email'],time() - (365*24*3600),'/', '',false,true);
    setcookie("birthdate",$_SESSION['watibuveur']['birthdate'],time() - (365*24*3600),'/', '',false,true);
    setcookie("role",$_SESSION['watibuveur']['roles'],time() - (365*24*3600),'/', '',false,true);
?>