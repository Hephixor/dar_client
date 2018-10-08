<?php
    $hote = 'mysql55-65.perso';
    $base = 'betatripuw320084';
    $user = 'betatripuw320084';
    $pass = '3200849U56r';
    $cnx = mysqli_connect($hote, $user, $pass,$base);

if(!$cnx){
die('Erreur connexion('.mysqli_connect_errno().') '.mysqli_connect_error());
}

 $ret = mysqli_select_db($cnx,$base) or die('Erreur connexion('.mysqli_error().') '.mysqli_error());
?>
