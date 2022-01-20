<?php

class score {
  private $_link;
  private $_id;
  public $_score;



  /////////////////////// getAllInfos

  public function getAllInfos () {
    $link = $this->_link;
    $SQL = "SELECT `id_utilisateur`, `score` FROM score";
    $query = $link->query($SQL);
    $resultat = $query->fetch(PDO::FETCH_ASSOC);
    
    foreach($resultat as $key=>$value) {
      if($key==0){
          echo "<h5>joueur: ".$value."</h5>";
      }
      elseif($key==1){
          echo "<h4>à fait: ".$value."</h4>";
      }
    }
  }
}