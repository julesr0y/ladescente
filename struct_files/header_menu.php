<header>
    <a href="../index.php">La descente</a>
    <?php
    if(is_connected_global()){
        $account_name = $_SESSION["watibuveur"]["genre"]." ".$_SESSION["watibuveur"]["nom"]." ".$_SESSION["watibuveur"]["prenom"];
        echo "<a href='page_compte.php'>$account_name</a>";
    }
    else{
        echo "<a href='connexion.php'>Compte</a>";
    }
    ?>
</header>
<br>
<nav>
    <a href="accueil_presentation.php" class="accueil">Accueil</a>
    <a href="recettes.php" class="recettes">Recettes et conseils</a>
    <a href="decouvertes.php" class="decouverte">Découverte</a>
    <a href="classements.php" class="classements">Classements</a>
    <a href="newsletter.php" class="newsletter">Newsletter</a>
    <a href="a_propos.php" class="a_propos">A propos</a>
</nav>
<br>