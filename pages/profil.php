<?php 
include_once('../liens/config.php');
require_once('../src/userclass.php');
require_once('../src/scoreclass.php');
?>

<?php
$msg ='';
if(isset($_POST['modifier'])){
    $msg = $_SESSION['user']->update($_POST['login'], $_POST['password']);
    if($msg == ''){
        header('Location: ../index.php');
    }
}
$user=$_SESSION['user'];
if(isset($_SESSION['game'])){
    $game=$_SESSION['game'];
}else{
    $game=new score();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel='stylesheet' href='./style/profil.css'>
</head>
<body>
    <form class="formulaire" method="post">
        <h2>Modifiez vos informations</h2>
        <input class="information" type="text" name="login" placeholder="New username">
        <input class="information" type="password" name="password" placeholder="New password">
        <input class="information connect_btn" type="submit" value="Modifier" name="modifier">
    <?php
        if($msg != '') {
            echo "<div class='errormessage'> $msg </div>";
        }
    ?>           
    <div class="score">
        <h2 id='titrescore'>Vos meilleurs scores:</h2>
        <table>
            <?php
            $id=$user->getId();
            $db = new PDO('mysql:host=localhost;dbname=memory', 'root', '');
            $query = $db->prepare("SELECT * FROM score WHERE id_utilisateur = '$id' ORDER BY score DESC");
            $query->execute();
            $scoreutilisateur = $query->fetchAll();
            for($i=0;isset($scoreutilisateur[$i]);$i++){ ?>
                <tr>
                    <td>
                        <?php echo $scoreutilisateur[$i][2]; ?>
                    <td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
    </form>
</body>
</html>