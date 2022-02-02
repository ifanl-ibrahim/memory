<?php
     if (isset($_SESSION['user'])) {
        ?>
        <form class="select" method="post" action="#">
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
    
        <?php
            if (isset($_POST['envoyer'])) { 
            $p = $_POST['select']; //$p = le nombre de paire choisie sur dans le selecteur
            $_SESSION['pair'] = $p;
            $plateau= new Plateau($p); //connexion a la class plateau
            $shuffle_plateau = $plateau->_creeplateau($plateau); //mélange les objets du tableau crée
            $plateau = $shuffle_plateau; 
            // shuffle($plateau); //mélange le tableau
            $_SESSION['plateau'] = $plateau; //tableau est dans une session
            $_SESSION['ExistCard'] = array();
            $_SESSION['decouvCard'] = array();
            $_SESSION['count'] = 0;
            $_SESSION['erreur'] = 0;
            }
    
            if(isset($_POST['button'])) {
                $position = $_POST['position']; //reucpaire la position d'un objet du tableau
                $_SESSION['plateau'][$position]->etat=2;//change l'etat de l'objet pour passer de dos a face
                $_SESSION['carte'] =[$_SESSION['plateau'][$position]->face, $_SESSION['plateau'][$position]->etat, $position]; //envoi l'etat, le nom et la position de l'objet dans un tableau
            
                array_push($_SESSION['ExistCard'], $_SESSION['carte']); //envoi le resultat dans un tablau pour les comparer
            
                if(isset($_SESSION['ExistCard'][1])) {
                    if($_SESSION['ExistCard'][0][0] == $_SESSION['ExistCard'][1][0]) { //compare le nom et l'etat de l'objet
                        array_push($_SESSION['decouvCard'], $_SESSION['ExistCard'][0], $_SESSION['ExistCard'][1]); //envoiles bon resultat dans un tableau

                         $_SESSION['count']++;
                        unset($_SESSION['ExistCard']); //vide le tableau de comparaison
                        $_SESSION['ExistCard'] = array(); //recrée un tableau de comparaison
                        if($_SESSION['pair']*2 == count( $_SESSION['decouvCard']) ){
                            echo '<p>fin de partie</p>';
                            echo '<p>Pour un Score de : '.$_SESSION['count'].'<br>'.'vous avez fait : '.$_SESSION['erreur'].' erreur </p>';
                            $score->addscore($_SESSION['user']['id'], $_SESSION['erreur']);
                        }
                    }
                    else {
                        $pos1 = $_SESSION['ExistCard'][0][2]; //recupaire la nouvel position de l'objet
                        $pos2 = $_SESSION['ExistCard'][1][2]; //recupaire la nouvel position de l'objet
                        $_SESSION['plateau'][$pos1]->etat=0; //change l'etat pour le remettre a 0
                        $_SESSION['plateau'][$pos2]->etat=0; //change l'etat pour le remettre a 0

                        unset($_SESSION['ExistCard']);
                        $_SESSION['ExistCard'] = array();
                        $_SESSION['erreur']++;
                    }
                }
                else {}
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
                if ( $value->etat ==2) {
                ?>
                    <img src="<?= $value->face?>" alt="carte" height="200" width="100">
                <?php 
                }
            }
        }
    }
    else {
        echo 
            '<p>
                Bienvenue sur le plus dur des<br><br>
                Memory game<br><br>
                inscrit-toi ou connecte-toi<br>
                et amuse toi !
            </p>';
    }
    ?>

        </div>