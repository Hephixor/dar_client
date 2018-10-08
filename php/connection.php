<?php
    $hote = 'localhost';
    $base = 'thn';
    $user = 'root';
    $pass = '';
    $cnx = mysqli_connect($hote, $user, $pass,$base);

if(!$cnx){
die('Erreur connexion('.mysqli_connect_errno().') '.mysqli_connect_error());
}

 $ret = mysqli_select_db($cnx,$base) or die('Erreur connexion('.mysqli_error().') '.mysqli_error());
?>
