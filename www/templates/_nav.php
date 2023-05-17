<nav>
    <a href="/">Accueil</a>
    &nbsp;
    <?php if (!isset($_GET['action']) || $_GET['action'] !== 'login') {
        if (isset($_SESSION['user'])) { ?>
            <a href="index.php?action=logout">Déconnexion</a>
        <?php } else { ?>
            <a href="index.php?action=login">Connexion</a>
    <?php }
    } ?>
</nav>