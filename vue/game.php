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
$existCart = [
        0=>'images/0.jpg',
        1=>'images/1.jpg',
        2=>'images/2.jpg',
        3=>'images/3.jpg',
        4=>'images/4.jpg',
        5=>'images/5.jpg',
        6=>'images/6.jpg',
        7=>'images/7.jpg',
        8=>'images/8.jpg',
        9=>'images/9.jpg',
        10=>'images/10.jpg',
        11=>'images/11.jpg',
        12=>'images/12.jpg'
    ];

    
    // foreach ($plateau as $_SESSION['carte']) {
    //     foreach($_SESSION['carte'] as $value) {
    //       if($value == $value->face){
    //           echo $value.'</br>';
    //       }else{
    //         echo 'non';

    //       }

    // }
    // }
if(isset($_POST['button'])) {
    $position = $_POST['position']; //reucpaire la position d'un objet du tableau
    $_SESSION['plateau'][$position]->etat = 2; //pour manipuler l'état de l'objet parcourir avec cette méthode
    $_SESSION['carte'] = $_SESSION['plateau'][$position]->face;

array_push($existCart, $_SESSION['carte']);
if ($existCart==$_SESSION['carte']) {
    unset($existCart);
    $_SESSION['carte2'];
}
if ($_SESSION['carte']==$_SESSION['carte2']) {
    unset($existCart);
    echo 'oui';
} else {
    unset($existCart);
    echo 'non';
}
    

}
var_dump($_SESSION['carte']);



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