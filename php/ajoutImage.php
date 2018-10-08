<?php
    function ajoutImage(){
        $ret        = false;
        $imageData   = '';
        $tailleImage = 0;
        $typeImage   = '';
        $nomImage    = '';
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['fic']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $tailleImage = $_FILES['fic']['size'];
            
            if ($tailleImage > $taille_max) {
                echo "Trop gros !";
                return false;
            }
            include ("connection.php");

            $typeImage = $_FILES['fic']['type'];
            $nomImage  = $_FILES['fic']['name'];
            $imageData = file_get_contents ($_FILES['fic']['tmp_name']);
            $req = "INSERT INTO images (descImage, nomImage, tailleImage, typeImage, imageData) VALUES ('',".
                                "'" . $nomImage . "', " .
                                "'" . $tailleImage . "', " .
                                "'" . $typeImage . "', " .
                                "'" . addslashes($imageData)."') ";
        $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
        return true;
        
        }
    }
?>
