<header>
    <nav>
        <ul>
            <li><a href="index.php?page=accueil">Accueil</a></li>
            <li><a href="index.php?page=contact">Contact</a></li>
            <?php
            if (isset($_SESSION['loginUser'])) {
            ?>
                <li><i class="fa-solid fa-user"></i></li>
                <li><a href="index.php?page=membre">Espace Membre</a></li>
                <li><a href="index.php?page=logout">Logout</a></li>
                <li><strong><a href="index.php?page=admin"><?= $_SESSION['loginUser'] ?></strong></a></li>
            <?php } else { ?>
                <li><a href="index.php?page=inscription">Inscription</a></li>
                <li><a href="index.php?page=login">Login</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>