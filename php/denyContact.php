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
if(isset($_GET['idUser']) && isset($_SESSION['id'])){
	$req="UPDATE `demandescontact` SET status=2 WHERE idUserB=".$_SESSION['id']." AND idUserA=".$_GET['idUser'];
	var_dump($req);
	$ret=mysqli_query($cnx,$req)or die (mysql_error ());
	if($ret){
		redirect($_SERVER['HTTP_REFERER']);
	}
	else{
		echo "erreur suppression demande";
	}
}
else{
	echo "erreur id";
}
?>