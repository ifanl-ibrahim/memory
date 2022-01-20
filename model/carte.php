<?php
    class Carte {
        public $etat;
        public $dos;
        public $face;


        function __construct($etat, $dos, $face) {
            $this->etat=$etat;
            $this->dos=$dos;
            $this->face=$face;
        }
    }
?>