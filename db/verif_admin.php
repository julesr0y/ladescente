<?php
if(isset($_SESSION['watibuveur'])){
    if($_SESSION['watibuveur']['roles'] == '[\"ROLE_ADMIN\"]'){
        //si l'utilisateur est connecté, on récupère son id de connexion
        $id_user = $_SESSION['watibuveur']['id'];
    }
    else{
        header("Location: /templates/page_compte.php");
    }
}
else{
    header("Location: /templates/page_compte.php");
}
?>