<?php
include ("../model/userclass.php");
require ('header.php');
$user->block();
?>

<title>Connexion</title>
<link rel="stylesheet" href="style/connexion.css">
    
<main>
    <h2 >Connexion</h2>
    <form method="post">
        <label for="login">LOGIN</label>
            <input type="text" name="login"><br>
        <label for="password">PASSWORD</label>
            <input type="password" name="password"><br>
            <input type="submit" name="submit" value="Confirmer">
        <?php
            if(isset($_POST['submit'])){
                $user->connect($_POST['login'], $_POST['password']);
            }
        ?>
    </form>
</main>
   
<?php require ('footer.php') ?>
   
