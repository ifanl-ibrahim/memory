<?php
include_once ("../liens/config.php");
require ("../src/userclass.php");
$user = new classes();
$user->dbconnect();
$user->block();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="connexion.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shorcut icon" href="./images-salles/avatar_ciné.png">
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
  </head>
<body>
    <header>
        <?php include_once('header.php') ?>
    </header>
    <main> 
        <section class = "connexion">
            <div class = "caseco">
                <h3 class = "H3C">Connexion</h3>
                <form method="post">
                    <label for="login">ID </label>
                    <input type="text" name="login" id="login" ><br><br>
                    <label for="password">MDP </label>
                    <input type="password" name="password" id="password"><br>
                    <input type="submit" name="submit" value="Confirmer" class = "confirm">
                    <?php
                        if(isset($_POST['submit'])){
                            $user->connect($_POST['login'], $_POST['password']);
                        }
                    ?>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <?php include_once('footer.php') ?>
    </footer>
</body>
</html>