<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" href="images/noctali.png">
    <link rel="stylesheet" href="style/header.css">
</head>
<body>
    <header>
        <img class = "logo" src="images/noctali.png" alt = "Logo">
        <nav>
            <li><a href = "index.php">Accueil<a></li>
            <li><a href="classement.php">Classement</a></li>
            <?php 
                if (isset($_SESSION['user'])) {
                echo "<li><a href='profil.php'>Profil</a></li>";
                echo "<li><form method='post'><input type = 'submit' name = 'deconnexion' value='Deconnexion' class = 'deco'></form></li>";
                }
                else{
                echo "<li><a href='inscription.php'>Inscription</a></li>";
                echo "<li><a href='connexion.php'>Connexion</a></li>";
                }
            ?>
        </nav>
    </header>