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
include ("./php/connection.php");
session_start();
$req = "INSERT INTO chroniques (contenu,idAlbum,idRedacteur,valid,dateParution,noteRedac,big) VALUES ('".htmlentities($_POST['chronique'],ENT_QUOTES,"UTF-8")."','".$_POST['nomAlbum']."','".$_SESSION['id']."','1','".date("Y-m-d")."',".$_POST['note'].",".$_POST['big'].")";
if (mysqli_query($cnx, $req)) {
   redirect('./administration.php');
}
else {
  echo "Error: " . $req . "<br>" . mysqli_error($cnx);
}
?>