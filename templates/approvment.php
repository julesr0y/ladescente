<?php
session_start(); //démarrage de la session
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../db/connect_db.php'; //connexion a la bdd
//si l'utilisateur n'est pas connecté, on le renvoie sur la page de connexion
if(isset($_SESSION['watibuveur'])){
    if($_SESSION['watibuveur']['roles'] == '[\"ROLE_ADMIN\"]'){
        //si l'utilisateur est connecté, on récupère son id de connexion (idd)
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
<?php
if (!empty($_GET))
{
    if (isset($_GET) && !empty($_GET))
    {
        $query = $db->prepare("UPDATE recipes SET approved = 1 WHERE id=:num");
        $query->bindValue(':num', intval($_GET['id']), PDO::PARAM_INT);
        $query->execute();
        header("Location: /templates/approve_recipe.php");
    }
}
?>