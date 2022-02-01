<title>profil</title>
<link rel="stylesheet" href="style/profil.css">

<?php 
require ('header.php');
if (!isset($_SESSION['user'])) {
    header("Refresh: 2; url=connexion.php");
    echo "<p>connecte toi.</p><br><p>Redirection...</p>";
    exit();
}
else { 
?>

<main>
    <?php
        echo "<h3 class='titre_user'>Bienvenue sur ton profil ".$_SESSION['user']['login']."</h3>";
    }
    ?>

    <?php

    if(isset($_SESSION['game'])){
        $game=$_SESSION['game'];
    }else{
    }
    ?>

    <form class="profil" action="#" method="POST">
                    <input class="btn" type="submit" id="modifier" name="modifier" value="Modifier mes information"> <br><br>

                <!-- UPDATE -->

                <?php

                //zone de modif//

                    if (isset($_POST['modifier'])) {
                        echo "<p id= modif>
                                Modifier le Login <input class='btn' type=\"submit\" name=\"modifierlogin\" value=\"ici\"><br>
                                Modifier le Mot de passe <input class='btn' type=\"submit\" name=\"modifierpass\" value=\"ici\">
                            </p><br>";
                    }

                //modif login//
                
                    if (isset($_POST['modifierlogin'])) {
                        echo  
                            "<form method=\"post\">
                                <input type=\"text\" name=\"login\" id=\"login\" placeholder=\"nouveau login\">
                                <input class='btn' type=\"submit\" name=\"validerlog\" value=\"valider\">
                            </form>";
                    }

                    if(isset($_POST['validerlog'])) {
                        $user -> update($_POST['login']);
                    }

                //modif password//
                
                    if (isset($_POST['modifierpass'])) { 
                        echo 
                            "<form method=\"post\">
                                <input type=\"password\" name=\"pass\" id=\"nom\" placeholder=\"Entrer un nouveau Password\"><br>
                                <input class='btn' type=\"submit\" name=\"validerpass\" value=\"valider\">
                            </form>
                        ";
                    }

                    if(isset($_POST['validerpass'])) {
                        $user -> updatepass($_POST['pass']);
                    }
                ?>
                </form>
            <h2>Vos meilleurs scores:</h2>
                <?php
                    $score -> getInfos($_SESSION['user']['id']);
                ?>
</main>
<?php 
require "footer.php";
?>
</html>