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
$id=$_SESSION['id'];
       include ("./php/connection.php");
        $req2 = "INSERT INTO labels (nomLabel,site,informations) VALUES ('".$_POST['nomLabel']."','".$_POST['site']."','".$_POST['contenu']."')";

     if (mysqli_query($cnx, $req2)) {
        
    redirect('./administration.php');}
        else {
    echo "Error: " . $req2 . "<br>" . mysqli_error($cnx);
}

     

?>