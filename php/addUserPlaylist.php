<?php
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
    }
    else
    {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
require_once("./connection.php");
session_start();
var_dump($_SESSION['id']);
var_dump($_GET['idAlbum']);
if(isset($_SESSION['id']) && isset($_GET['idAlbum'])){
    $req="INSERT INTO `userplaylists` (`idUser`, `idAlbum`) VALUES ('".$_SESSION['id']."', '".$_GET['idAlbum']."')";
    $ret=mysqli_query($cnx,$req)or die (mysql_error ());
    redirect($_SERVER['HTTP_REFERER']);
}
else{
	echo "Merci d'écrire quelque chose";
}
?>
