<?php
session_start(); //démarrage de la session
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../db/connect_db.php'; //connexion a la bdd
require_once '../db/verif_admin.php'; //on vérifie que l'user est admin
?>
<?php
if (!empty($_GET))
{
    if (isset($_GET) && !empty($_GET))
    {
        $query = $db->prepare("DELETE FROM recipes WHERE id=:num");
        $query->bindValue(':num', intval($_GET['id']), PDO::PARAM_INT);
        $query->execute();
        header("Location: /templates/recipes_management.php");
    }
}
?>