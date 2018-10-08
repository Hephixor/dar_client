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
if(isset($_POST['contenu'])){
$contenu=str_replace("'","''",$_POST['contenu']);
$contenu=htmlentities($contenu);
$req="INSERT INTO `commentaireschroniques` (`idCommentaire`, `idChronique`, `auteur`, `contenu`, `date`) VALUES (NULL, '".$_POST['idChronique']."', '".$_POST['auteur']."', '".$contenu."', CURRENT_TIMESTAMP)";
$ret=mysqli_query($cnx,$req)or die (mysql_error ());
redirect($_SERVER['HTTP_REFERER']);
}
else{
    echo "Merci d'écrire quelque chose";
}
?>

