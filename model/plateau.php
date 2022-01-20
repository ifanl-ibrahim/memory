<?php
include "carte.php";

    class Plateau {
        public $nbpaire;
    

        function __construct($nbpaire){
            $this->nbpaire=$nbpaire;
        }

        function _creeplateau () {
            $plateau=array();
            $img = [0,1,2,3,4,5,6,7,8,9,10,11,12];
            for($i = 0; $i<$this->nbpaire; $i++) {
                shuffle($img);
                $carte1 = new Carte (0, "images/dos.jpg", "images/$img[0].jpg");
                $carte2 = new Carte (0, "images/dos.jpg", "images/$img[0].jpg");
                unset($img[0]);
                array_push($plateau, $carte1, $carte2);
            }
            return ($plateau);
        }
    }
?>