<?php
include ("./php/connection.php");
$req2 = "select contenu, idAlbum, dateParution
FROM chroniques
Where 1
ORDER BY dateParution DESC";

$req = "SELECT DISTINCT c.idChronique,a.titreAlbum, ar.nomArtiste, c.dateParution, u.Pseudo, l.nomLabel, a.dateSortie, a.idImage, c.contenu, c.idRedacteur
FROM chroniques c, albums a, artistes ar, images i, labels l, users u
WHERE a.idAlbum = c.idAlbum
AND ar.idArtiste = a.idArtiste
AND u.IdUser = c.idRedacteur
AND l.idLabel = a.idLabel
AND i.idImage = a.idImage
AND c.big=1
ORDER BY c.dateParution DESC LIMIT 2";

echo " <section id=\"main-slider\" class=\"main-slider carousel slide\" data-ride=\"carousel\">
                    <div class=\"carousel-inner\" role=\"listbox\">";
       $cpt=0;

        $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
        while ( $col = mysqli_fetch_row ($ret) )
         {

          $artiste=$col[2];
          $album=$col[1];
          $idChronique=$col[0];
          $dateParution=$col[3];
          $redacteur=$col[4];
         $idRedacteur=$col[9];

          $req2 = "SELECT idImage, typeImage, imageData FROM images WHERE idImage = " . $col[7];
          $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
          $col2 = mysqli_fetch_row ($ret2);

          if (!$col2[0] ){
              echo "Id d'image inconnu";
          } 
          else {
            $cpt = $cpt + 1 ;
          echo " <!-- Wrapper for slides -->

          <div class=\"item item-".$cpt." active\">
          <center><img src=\"images/logo2.jpg\" alt=\"Site Logo\"></center>
          <div class=\"carousel-caption\">
          <div class=\"slider-icon\">
          <i class=\"fa fa-desktop\"></i>
          </div><!-- /.slider-icon -->
          <h3 class=\"carousel-title\">Let's Join With <span>HEERA</span></h3>
          <a class=\"btn text-btn\" href=\"#\">More Info</a>
          <!-- /.carousel-caption -->
";
          }
         }
echo "
</div></div><!-- Controls -->
<a class=\"left carousel-control\" href=\"#main-slider\" role=\"button\" data-slide=\"prev\">
  <i class=\"fa fa-angle-left\"></i>
</a>
<a class=\"right carousel-control\" href=\"#main-slider\" role=\"button\" data-slide=\"next\">
  <i class=\"fa fa-angle-right\"></i>
</a>

</section><!-- /#main-slider -->
";
?>

