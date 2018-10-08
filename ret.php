<?php
        $ret        = false;
        $imageData   = '';
        $tailleImage = 0;
        $typeImage   = '';
        $nomImage    = '';
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['fic']['tmp_name']);
        
/*        if (!$ret) {
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


            $idImageRand=123123;
            $typeImage = $_FILES['fic']['type'];
            $nomImage  = $_FILES['fic']['name'];
            $imageData = file_get_contents ($_FILES['fic']['tmp_name']);
            $req = "INSERT INTO images (idImage,descImage, nomImage, tailleImage, typeImage, imageData) VALUES (".$idImageRand."'',".
                                "'" . $nomImage . "', " .
                                "'" . $tailleImage . "', " .
                                "'" . $typeImage . "', " .
                                "'" . addslashes($imageData)."') ";
        $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
        
 
       }*/

       include ("./php/connection.php");
        $req2 = "INSERT INTO chroniques (contenu,idAlbum,idRedacteur,valid,dateParution) VALUES ('".$_POST['chronique']."','".$_POST['nomAlbum']."','5',0,'".date("Y-m-d")."')";

     if (mysqli_query($cnx, $req2)) {
        
    echo "New record created successfully";
} else {
    echo "Error: " . $req2 . "<br>" . mysqli_error($cnx);
}

     

?>