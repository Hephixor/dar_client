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
        $taille_max = 2500000;
        $res        = is_uploaded_file($_FILES['fic']['tmp_name']);
        
       if (!$res) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $tailleImage = $_FILES['fic']['size'];
            
            if ($tailleImage > $taille_max) {
                echo "Trop gros !";
                return false;
            }
            include ("./php/connection.php");
            $idImageRand=rand();
            $typeImage = $_FILES['fic']['type'];
            $nomImage  = $_FILES['fic']['name'];
            $imageData = file_get_contents ($_FILES['fic']['tmp_name']);
            $req = "INSERT INTO images (idImage,descImage, nomImage, tailleImage, typeImage, imageData) VALUES (".$idImageRand.",'',".
                                "'" . $nomImage . "', " .
                                "'" . $tailleImage . "', " .
                                "'" . $typeImage . "', " .
                                "'" . addslashes($imageData)."') ";
        $ret = mysqli_query ($cnx,$req) or die (mysql_error ());

        $req2 = "INSERT INTO albums (titreAlbum,idLabel,idArtiste,dateSortie,idImage,tracklist) 
        VALUES ('".htmlentities($_POST['nomAlbum'],ENT_QUOTES,"UTF-8")."','"
                  .htmlentities($_POST['label'],ENT_QUOTES,"UTF-8")."','"
                  .htmlentities($_POST['artiste'],ENT_QUOTES,"UTF-8")."','"
                  .$_POST['date']."',".$idImageRand.",'"
                  .htmlentities($_POST['tracks'],ENT_QUOTES,"UTF-8")."')";

        if (mysqli_query($cnx, $req2)) {
       redirect('./administration.php');}
        
         else {
                echo "Error: " . $req2 . "<br>" . mysqli_error($cnx);
                }       
       }

?>