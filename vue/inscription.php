<?php
include ("../model/userclass.php");
require ('header.php');
$user = new user();
$user->block();
?>

<title>Inscription</title>
<link rel="stylesheet" href="inscription.css">
    
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

<?php require ('footer.php'); ?>