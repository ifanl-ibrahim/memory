<?php 
require "../model/plateau.php";
require "./header.php";
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
    $_SESSION['plateau'] = $plateau; //tableau est dans une session
    $_SESSION['ExistCard'] = array();
    $_SESSION['decouvCard'] = array();
}

    
    
if(isset($_POST['button'])) {
    $position = $_POST['position']; //reucpaire la position d'un objet du tableau
    $_SESSION['plateau'][$position]->face;//pour manipuler l'état de l'objet parcourir avec cette méthode
    array_push($_SESSION['ExistCard'], $_SESSION['plateau'][$position]->face);

    if($_SESSION['ExistCard'] >= 2) {
        if($_SESSION['ExistCard'][0] == $_SESSION['ExistCard'][1]) {
            array_push($_SESSION['decouvCard'], $_SESSION['ExistCard'][0], $_SESSION['ExistCard'][1]);
            unset($_SESSION['ExistCard']);
            $_SESSION['ExistCard'] = array();
        }
        else {
            foreach ($_SESSION['ExistCard'] as $key => $value) {
                $value->etat=0;
            }
        }
    }    
    else {}

    var_dump($_SESSION['plateau'][$position]->etat=2);
    var_dump($_SESSION['ExistCard']);
    var_dump($_SESSION['decouvCard']);


    /*
        On créer deux tableau avec aucune données nommé ExistCard + decouvCard

        Lorsqu'on appuie sur une carte ont la stock dans le tableau, ensuite quand on retourne une deuxième on la compare à la première
        si les deux cartes sont identique alors on les met dans un tableau decouvCard puis on les laisse afficher si elle sont pas identique
        alors on les refait se retourner, donc reset le tableau ExistCard


    */
}




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