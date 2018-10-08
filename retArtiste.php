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
       $nomArtiste=str_replace("'","''",$_POST['nomArtiste']);
       $infos=str_replace("'","''",$_POST['informations']);
       $req2 = "INSERT INTO artistes (nomArtiste,site,style,informations) VALUES ('".$nomArtiste."','".$_POST['site']."','".$_POST['style']."','".$infos."')";
       
     if (mysqli_query($cnx, $req2)) {
        
     redirect('./administration.php');}
         else {
    echo "Error: " . $req2 . "<br>" . mysqli_error($cnx);
}

     

?>