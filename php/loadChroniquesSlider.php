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
ORDER BY c.dateParution DESC LIMIT 15";

echo " <section id=\"portfolio\" class=\"portfolio text-center\">
 <div class=\"container\">
  <div class=\"portfolio-area\">
    <div class=\"portfolio-top\">
      <h2 class=\"portfolio-title\">chroniques</h2>
      <p class=\"title-description\"><a href=\"./chroniques.php\">Plus de chroniques</a></p>
      <div class=\"slide-nav-container\">
        <a class=\"slide-nav left slide-left post-prev\" data-slide=\"post-prev\"><i class=\"fa fa-angle-double-left\" style=\"padding-top: 0.25em;padding-right: 0.10em;\"></i></a>
        <a class=\"slide-nav right slide-right post-next\" data-slide=\"post-next\"><i class=\"fa fa-angle-double-right\" style=\"padding-top: 0.25em;padding-left: 0.10em;\"></i></a>
      </div>
    </div><!-- /.portfolio-top -->

    <div id=\"portfolio-slider\" class=\"portfolio-slider owl-carousel owl-theme\">";

        $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
        while ( $col = mysqli_fetch_row ($ret) )
         {

          $artiste=$col[2];
          $album=$col[1];
          $idChronique=$col[0];

          $req2 = "SELECT idImage, typeImage, imageData FROM images WHERE idImage = " . $col[7];
          $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
          $col2 = mysqli_fetch_row ($ret2);

          if (!$col2[0] ){
              echo "Id d'image inconnu";
          } 
          else {
          echo "<div class=\"item\" style=\"width:90%\">";
          echo "<div class=\"item-image\">";
          echo "<a href=\"chronique.php?idChronique=".$idChronique."\">";
          echo '<center><img src="data:image/jpeg;base64,'.base64_encode( $col2[2] ).'" style="width="370" height="170" "/></center>';
          echo "</a>";
          echo "</div>" ;
          echo "<span class=\"item-title\">".$artiste." - ".$album."</span>";
          echo "</div>";
          }
         }
echo "</section>";
?>

