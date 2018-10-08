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
if ( isset($_GET['idUser']) ){
	session_start();
    $id = intval ($_GET['idUser']);
    include ("./connection.php");
    $req="INSERT INTO demandescontact (idUserA,idUserB) VALUES (".$_SESSION['id'].",".$id.");";
    $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
    redirect($_SERVER['HTTP_REFERER']);
}
else{
	echo "wrong user id";
}


?>