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
    <title>Inscription</title>
    <link rel="stylesheet" href="inscription.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shorcut icon" href="./images-salles/avatar_ciné.png">
    <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
  </head>
<body>
    <header>
        <?php include_once('header.php') ?>
    </header>
    <main> 
        <section class = "inscription">
            <div class = "caseinscription">
                <h3 class = "H3C">Inscription</h3>
                <form method="post">
                    <label for="login">LOGIN</label>
                    <input type="text" name="login" id="login" class = "marge" ><br>
                    <label for="password">MDP</label>
                    <input type="password" name="password" id="password" class = "marge3"><br>
                    <label for="confirm_password">CONFIRMEZ</label>
                    <input type="password" name="confirm_password" id="confirm_password" class = "marge2" >
                    <input type="submit" name="submit" value="S'inscrire !" class = "confirm" class = "marge" >
                    <?php
                        if(isset($_POST['submit'])){
                            $user->register($_POST['login'], $_POST['password'], $_POST['confirm_password']);
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
