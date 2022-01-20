<?php 
require "../model/plateau.php";
require "./header.php";
session_start(); 
?>

<link rel="stylesheet" href="vue/style/game.css">
<title>Memory Game</title>

<form method="post" action="#">
    <select name="select" id="select">
        <option value="0">choisie ton nombre de paire</option>
        <?php 
            for ($i = 3; $i <= 12; $i++) {  //incrémente le nombre de paire choisie de 3 à 12
        ?> 
        <option value='<?=$i?>'><?= $i ?></option>
        <?php 
            }
        ?>
    </select>
    <input type="submit" name="envoyer" value="envoyer">
</form>

<?php if (isset($_POST['envoyer'])) { 
    $p = $_POST['select']; //$p = le nombre de paire choisie sur dans le selecteur
    $plateau= new Plateau($p); //connexion a la class plateau
    $shuffle_plateau = $plateau->_creeplateau($plateau); //mélange les objets du tableau crée
    $plateau = $shuffle_plateau; 
    shuffle($plateau); //mélange le tableau
    $_SESSION['plateau']=$plateau; //tableau est dans une session
}
$existCart=[];
if(isset($_POST['button'])) {
    $position = $_POST['position']; //reucpaire la position d'un objet du tableau
    $_SESSION['plateau'][$position]->etat = 2; //pour manipuler l'état de l'objet parcourir avec cette méthode
    $carte = $_SESSION['plateau'][$position]->face;

array_push($existCart,$carte);
if ($existCart[0]==$carte) {
echo'ok';
}
else unset($existCart);
    $carte->etat = 0;

}
var_dump($existCart[0]);



?>
<div class='blocjeux'>
<?php
if(isset($_SESSION['plateau'])) {
    foreach ($_SESSION['plateau'] as $key => $value) {
        if ($value -> etat==0) {
            ?>
            <form action="#" method="post">
                <button name="button">
                    <img src="<?= $value->dos?>" alt="carte" height="200" width="100">
                    <input type="hidden" name="position" value="<?= $key ?>"> 
                </button>
            </form>
        <?php 
        }
        if ( $value->etat ==2){
        ?>
            <img src="<?= $value->face?>" alt="carte" height="200" width="100">
        <?php }
    } 

    
   

    
}
?>
</div>
</body>
</html>