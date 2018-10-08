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
include ("connection.php");
if($_GET['update']=='false'){
	$req="INSERT INTO ratingschroniques (idChronique,idUser,note) VALUES ('".$_GET['idChronique']."','".$_GET['id']."','".$_GET['stars']."')";
	$ret = mysqli_query ($cnx,$req) or die (mysql_error ());
	if ( !$ret ){    
	echo "erreur";
	} 
	else { 
		redirect($_SERVER['HTTP_REFERER']);
	}
}
else{
	$req="UPDATE ratingschroniques SET note =".$_GET['stars']." where idChronique = ".$_GET['idChronique']." and idUser= ".$_GET['id'];
	$ret = mysqli_query ($cnx,$req) or die (mysql_error ());
	if ( !$ret ){  
		echo "erreur"; 
	} 
	else { 
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>