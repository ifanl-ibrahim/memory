<?php

class Score {
  private $_link;
  private $_id;
  public $_score;


 ////////////////////////////////////////////////////////////////////// Fonction connexion à la BDD



 public function __construct() {
  $conn = new PDO("mysql:host=localhost; dbname=memory", 'root', '');
  $this->_link = $conn;
}



  /////////////////////// getAllInfos



  public function getAllInfos() {
     $link = $this->_link;
    $SQL = $link->prepare("SELECT * FROM score INNER JOIN user ON user.id= score.id_user");
    $SQL->execute();
    echo "<table>";
    echo '<tr>' . '<th>' . 'Joueur' . '</th>';
    echo '<th>' . 'Nombre de faute en jeu' . '</th>';
    foreach($SQL as $key){
     echo '<tr>' . '<td>' . $key['login'] . '</td>';
     echo '<td>' . $key['score'] . '</td>';
    }
    echo '</table>';
  }



  ///////////////////////////addscore



  public function addscore($id_user, $score) {
    $link = $this->_link;
    $query = $link->prepare( "INSERT INTO `score` ( `id_user`,`score`) VALUES ($id_user, $score)");
    $query->execute();
  }



  /////////////////////// getInfos

  public function getInfos($_id) {
    $link = $this->_link;
    $SQL = $link->prepare("SELECT * FROM score WHERE id_user = $_id"); 
    $SQL->execute();  
    echo "<table>";
    echo '<tr>' . '<th>' . 'Nombre de faute:' . '</th>';
    foreach($SQL as $key){
     echo '<tr>' . '<td>' . $key['score'] . '</td>';
    }
    echo '</table>';
  }
}