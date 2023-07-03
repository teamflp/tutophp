<!-- Barre de navigation -->
<div class="navbar">
    <div>
        <a href="index.php">Membres</a>
    </div>
    <div class="navbar-right">
    <?php
    session_start();
    if (isset($_SESSION['user'])) {
        echo '<span>' . $_SESSION['user']['email'] . '</span>';
        echo '<a href="account.php">Compte</a>';
        echo '<a href="logout.php">Déconnexion</a>';
    } else {
        echo '<a href="login.php">Connexion</a>';
        echo '<a href="add.php">Inscription</a>';
    }
    ?>
    </div>
</div>
