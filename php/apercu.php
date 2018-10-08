<?php
    
    if ( isset($_GET['idImage']) ){
        $id = intval ($_GET['idImage']);
        include ("connection.php");
        $req = "SELECT idImage, typeImage, imageData " . 
               "FROM images WHERE idImage = " . $id;
        $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
        $col = mysqli_fetch_row ($ret);

        if (!$col[0] ){
            echo "Id d'image inconnu";
        } 
        else {
           echo '<img src="data:image/jpeg;base64,'.base64_encode( $col[2] ).'" style="width="450" height="300"/>';
        }

    } 
    else {
        echo "Erreur Id image";
    }

?>
