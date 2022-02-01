<?php

class User {
  private $_link;
  private $_id;
  public $_login;
  public $_password;



  ////////////////////////////////////////////////////////////////////// Fonction connexion à la BDD



  public function __construct() {
    $conn = new PDO("mysql:host=localhost; dbname=memory", 'root', '');
    $this->_link = $conn;
  }



  /////////////////////////////////////////////////////////////////// Fonction pour créer l'utilisateur en BDD



  public function register($_login, $_password, $_confirm_password) {

    $link = $this->_link;
    $_login = htmlspecialchars($_login);
    $_password = htmlspecialchars($_password);

    $login = trim($_login);
    $password = trim($_password);
    $confirm = trim($_confirm_password);
    $crypt = password_hash($password, PASSWORD_BCRYPT);
    $verif = "SELECT login FROM user WHERE login = '$login'";
    $query = $link->query($verif);

    if (!empty($login) && !empty($password) && !empty($confirm)) {
      if ($query->fetch(PDO::FETCH_ASSOC) == 0) {
        if ($password == $confirm) {
          $query = "INSERT INTO user (login, password) VALUES ('$login', '$crypt')";
          $link->query($query);
          header("Location:connexion.php");
        } 
        else echo '<br>Les mots de passe ne sont pas identiques.<br>';
      } 
      else echo '<br>Ce login existe déja<br>';
    } 
    else echo '<br>Veuillez remplir le formulaire s\'il vous plait ! <br>';
  }



  ////////////////////////////////////// Fonction qui vérifie les informations en BDD pour se connecter avec le bon utilisteur 



  public function connect($_login, $_password) {

    $_login = htmlspecialchars($_login);
    $_password = htmlspecialchars($_password);

    $this->_login = $_login;
    $this->_password = $_password;

    $link = $this->_link;

    $SQL = "SELECT * FROM user WHERE login = '$_login'";
    $query = $link->query($SQL);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($_password == null) {
      echo 'remplissez tout les champs';
    } 
    else {
      if (password_verify($_password, $user['password'])) {
        $_SESSION['user'] = $user;
        header("location: index.php");
      } 
      else {
        echo "<br>Le login ou le mot de passe n'est pas correct ! <br>";
        }
      }
  }



  ///////////////////////////////////////////////////// Fonction pour déconnecter l'utilisateur



  public function disconnect()
  {
    $this->_login = '';
    $this->_password = '';
    session_destroy();
    header("refresh: 0.1; url=index.php");
  }



  //////////////////////////////////// Fonction pour Blocker les pages qui ne doivent pas etre vu 
  
  
  
  public function block() {

  if (isset($_SESSION['user'])) {
    $_SESSION['user'];
    header ("location:index.php");}
  }



  /////////////////////// update



  public function update ($_login) {
    $sql = "UPDATE user set login = :login WHERE id= :id";
    $result = $this->_link->prepare($sql);
    $result->bindValue(':login',$_login);
    $result->bindValue(':id',$_SESSION['user']['id']);

    $result->execute();
      echo"<p style= 'color: green'>vous modifié '$_login'<br></p>";
      header("Refresh:1");
  }

  public function updatepass ($_password) {
    $crypt = password_hash($_password, PASSWORD_BCRYPT);
    $sql = "UPDATE user set password = :password WHERE id= :id";
    $result = $this->_link->prepare($sql);
    $result->bindValue(':password',$crypt);
    $result->bindValue(':id',$_SESSION['user']['id']);

    $result->execute();
      echo"<p style= 'color: green'>Le mot de passe a bien été changé<br></p>";
      header("Refresh:1");
  }
}

?>