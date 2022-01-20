<?php
include ("../model/userclass.php");
require ('header.php');
$user = new user();
$user->block();
?>

<title>Connexion</title>
<link rel="stylesheet" href="connexion.css">
    
<body>
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
   
<?php require ('footer.php') ?>
   
