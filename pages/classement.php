<link rel='stylesheet' href='./style/classement.css'>

<?php

include_once('../liens/config.php');
include_once('../pages/header.php');


$db = new PDO('mysql:host=localhost;dbname=memory', 'root', '');
$query=$db->prepare("SELECT `score`, user.login FROM `score` INNER JOIN `user` ON user.id=score.id_utilisateur ORDER BY `score` DESC");
$query->execute();
$leaderboard=$query->fetchAll();
echo "<main>
        <h1>Classement</h1>
        <div class='tablecontainer'>
            <table class='tableleaderboard'>
                <th class='thleaderboard'>Score:</th>
                <th class='thleaderboard'>Joueur:</th>";
for($i=0;isset($leaderboard[$i]) && $i<10;$i++){
    if($i%2==0){
    echo "<tr class='table-primary'>";
        echo "<td>".$leaderboard[$i][0];
        echo "</td><td>".$leaderboard[$i][1]."</td>";
    }else{
        echo "<tr class='table-secondary'>";
        echo "<td>".$leaderboard[$i][0];
        echo "</td><td>".$leaderboard[$i][1]."</td>";
    }
    }
    echo "</tr>";

echo "</table></div></main>";
include_once('../src/component/footer.php');

?>