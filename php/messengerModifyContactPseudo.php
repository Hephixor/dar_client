<?php 
include ("./connection.php");
$req = "UPDATE contacts SET pseudoUserB = '".$_POST['pseudo']."' WHERE idUserB=".$_POST['idUserB'].";";
$ret = mysqli_query ($cnx,$req) or die (mysql_error ());
?>