<?php
//création du cookie qui permet de vérifier que les cookies ont étés acceptés
setcookie("cookies_autorises","oui",time() + (365*24*3600),'/', '',false,true);
header("Location: /templates/connexion.php"); //on actualise la page
?>