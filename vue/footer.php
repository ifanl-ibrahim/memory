<link rel="stylesheet" href="style/footer.css">    
    <footer>
        <nav>
            <li><a href = "index.php">Accueil<a></li>
            <li><a href='classement.php'>Classement</a></li>
            <?php 
                if (isset($_SESSION['user'])) {
                echo "<li><a href='profil.php'>Profil</a></li>";
                echo "<li><form method='post'><input type = 'submit' name = 'deconnexion' value='Deconnexion' class = 'deco'></form></li>";
                }else{
                echo "<li><a href='inscription.php'>Inscription</a></li>";
                echo "<li><a href='connexion.php'>Connexion</a></li>";
                    }
            ?>
        </nav>
        
        <a href="https://github.com/ifanl-ibrahim"><img class = "logogit" src="images/github.png" alt = "Logogit"></a>
    </footer>
</body>
</html>