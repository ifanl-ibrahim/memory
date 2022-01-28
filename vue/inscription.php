<?php
include ("../model/userclass.php");
require ('header.php');
$user->block();
?>

<title>Inscription</title>
<link rel="stylesheet" href="style/inscription.css">
    
<main> 
    <h2>Inscription</h2>
    <form method="post">
        <label for="login" id=label>LOGIN</label>
        <input type="text" name="login"><br>
        <label for="password" id=label>PASSWORD</label>
        <input type="password" name="password"><br>
        <label for="confirm_password" >CONFIRM PASSWORD</label>
        <input type="password" name="confirm_password">
        <input type="submit" name="submit" value="S'inscrire !">
        <?php
            if(isset($_POST['submit'])){
                $user->register($_POST['login'], $_POST['password'], $_POST['confirm_password']);
            }
        ?>
    </form>
</main>

<?php require ('footer.php'); ?>