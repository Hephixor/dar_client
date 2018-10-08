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
if(isset($_SESSION['id']) && isset($_GET['idAlbum'])){
    $req="DELETE FROM `userplaylists` WHERE idUser=".$_SESSION['id']." AND idAlbum=".$_GET['idAlbum'];
    $ret=mysqli_query($cnx,$req)or die (mysql_error ());
    redirect($_SERVER['HTTP_REFERER']);
}
else{
	echo "Erreur";
}
?>
