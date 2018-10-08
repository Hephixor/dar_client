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
        $res        = false;
        $imageData   = '';
        $tailleImage = 0;
        $typeImage   = '';
        $nomImage    = '';
        $taille_max = 25000000;
        $res        = is_uploaded_file($_FILES['fic']['tmp_name']);
        $idUser = $_POST['idMembre'];

        //echo $_FILES['fic']['size'];
            
       if (!$res) {
            echo "Problème de transfert";
            return false;
        } 
        else {
            // Le fichier a bien été reçu
            $tailleImage = $_FILES['fic']['size'];
            
            if ($tailleImage > $taille_max) {
                echo "Trop gros !";
                return false;
            }
            include ("connection.php");
            $idImageRand=rand();
            $typeImage = $_FILES['fic']['type'];
            $nomImage  = $_FILES['fic']['name'];
            $imageData = file_get_contents ($_FILES['fic']['tmp_name']);
            $req = "REPLACE INTO profilepictures (idUser,descImage, nomImage, tailleImage, typeImage, imageData) VALUES (".$idUser.",'',".
                                "'" . $nomImage . "', " .
                                "'" . $tailleImage . "', " .
                                "'" . $typeImage . "', " .
                                "'" . addslashes($imageData)."') ";

        
        $ret = mysqli_query ($cnx,$req) or die (mysql_error ());


        if (mysqli_query($cnx, $req)) {
         redirect('..\membre.php?idMembre='.$idUser);
     }
        
         else {
                echo "Error: " . $req2 . "<br>" . mysqli_error($cnx);
                }       
       }

?>