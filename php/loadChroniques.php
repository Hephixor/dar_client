<?php
      include ("./php/connection.php");
$req2 = "select contenu, idAlbum, dateParution
FROM chroniques
Where 1
ORDER BY dateParution DESC";

$req = "SELECT DISTINCT c.idChronique,a.titreAlbum, ar.nomArtiste, c.dateParution, u.Pseudo, l.nomLabel, a.dateSortie, a.idImage, c.contenu
FROM chroniques c, albums a, artistes ar, images i, labels l, users u
WHERE a.idAlbum = c.idAlbum
AND ar.idArtiste = a.idArtiste
AND u.IdUser = c.idRedacteur
AND l.idLabel = a.idLabel
AND i.idImage = a.idImage
ORDER BY c.dateParution DESC";


        $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
        while ( $col = mysqli_fetch_row ($ret) )
         {          
          $html=  "<div class=\"container\" style=\"width:60%;padding-top:15px\">
              <div class=\"jumbotron\">
               <center>
                 <h1 class=\"text-center\" style=\"font-size:2.18em;margin-top:-25px;\">".$col[2]." - ".$col[1]."</h1>
        <h2 style=\"font-size:1.10em;padding-top:5px;\"><em>".$col[6]."</em></h2></center>
        <div class=\"row\" align=\"center\" style=\"padding-top: 10px;\">
        <p><a class=\"btn btn-lg btn-chronique\" href=\"./chronique.php?idChronique=".$col[0]."\" role=\"button\">Chronique</a>
            <a class=\"btn btn-lg btn-success\" href=\"https://tormusic.bandcamp.com/album/blue-book\" role=\"button\">Ecouter en ligne</a>
            <a class=\"btn btn-lg btn-primary\" href=\"#\" role=\"button\">Acheter l'album</a> </p> </div>
          ";
          echo $html;

          $req2 = "SELECT idImage, typeImage, imageData FROM images WHERE idImage = " . $col[7];
        $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
        $col2 = mysqli_fetch_row ($ret2);

        if (!$col2[0] ){
            echo "Id d'image inconnu";
        } 
        else {
          echo '<center><img src="data:image/jpeg;base64,'.base64_encode( $col2[2] ).'" style="width="450px" height="300px" "/></center>';
          $html="<br/><center><p><em>".$col[8]."</em></p></center></div></div><br/>";
          echo $html;
          
          
            }


      
         }

//echo $html;
        ?>
