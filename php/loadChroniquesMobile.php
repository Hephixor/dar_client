<?php
include ("./php/connection.php");


// La requête sql pour récupérer les messages de la page actuelle.
$req = "SELECT DISTINCT c.idChronique,a.titreAlbum, ar.nomArtiste, c.dateParution, u.Pseudo, l.nomLabel, a.dateSortie, a.idImage, c.contenu, i.imageData, ar.idArtiste
FROM chroniques c, albums a, artistes ar, images i, labels l, users u
WHERE a.idAlbum = c.idAlbum
AND ar.idArtiste = a.idArtiste
AND u.IdUser = c.idRedacteur
AND l.idLabel = a.idLabel
AND i.idImage = a.idImage
ORDER BY c.dateParution DESC LIMIT 4";

$retour_messages=mysqli_query($cnx,$req);

echo " <section id=\"latest-post\" class=\"latest-post\" style=\"padding-top:40px;\">
<div class=\"container\">
<div class=\"post-area\">
<div class=\"post-area-top text-center\">
<h2 class=\"portfolio-title\">Chroniques</h2>
<p class=\"title-description\"><a href=\"./chroniques.php\">Plus de chroniques</a></p>
</div><!-- /.post-area-top -->
<br/><br/>
<div class=\"row\">
";
$count=0;

while($col=mysqli_fetch_row($retour_messages)) // On lit les entrées une à une grâce à une boucle
{
  $imageData = $col[9];   
  $artiste=$col[2];
  $album=$col[1];
  $idChronique=$col[0];
  $idArtiste=$col[10];

  $req2 = "SELECT idImage, typeImage, imageData FROM images WHERE idImage = " . $col[7];
  $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
  $col2 = mysqli_fetch_row ($ret2);

  if (!$col2[0] ){
    echo "Id d'image inconnu";
  } 
  else {

    $count = $count + 1;            
    if($count%4==1){

      echo " </div>
      <div class=\"container\">";
      echo "<div class=\"col-md-3 col-sm-6\">
      <div class=\"team-member\">
      <div class=\"member-image\">";
      echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode( $col2[2] ).'"/>';
      echo "<div class=\"member-social\">
      <a class=\"btn btn-lg btn-chronique\" href=\"./chronique.php?idChronique=".$col[0]."\" role=\"button\">Lire</a>
      </div>
      </div>
      <div class=\"member-info\">
      <h4>".$album."</h4>

      <a href=\"artiste.php?idArtiste=".$idArtiste."\"><span class=\"author-name\">".$artiste."</span></a>
      </div>
      </div>
      </div>";
    }
    else {

            //fonctionne sans les images
         /*  echo ' <div class="col-md-3 col-sm-6">
          <div class="team-member">
            <div class="member-image">
              <img class="img-responsive" src="images/members/team1.jpg" alt="">
              <div class="member-social">
                <a class="btn btn-lg btn-chronique" href="./chronique.php?idChronique='.$col[0].'"role="button">Lire</a>
              </div>
            </div>
            <div class="member-info">
             <h4>'.$album.'</h4>
              <a href=\"artiste.php?idArtiste='.$idArtiste.'\"><span class=\"author-name\">'.$artiste.'</span></a>
            </div>
          </div>
          </div>'; */

        //organisé avec les images
          echo "<div class=\"col-md-3 col-sm-6\">
          <div class=\"team-member\">
          <div class=\"member-image\">";
          echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode( $col2[2] ).'"/>';
          echo "<div class=\"member-social\">
          <a class=\"btn btn-lg btn-chronique\" href=\"./chronique.php?idChronique=".$col[0]."\" role=\"button\">Lire</a>
          </div>
          </div>
          <div class=\"member-info\">
          <h4>".$album."</h4>
          <a href=\"artiste.php?idArtiste=".$idArtiste."\"><span class=\"author-name\">".$artiste."</span></a>
          </div>
          </div>
          </div>";
        }
        

      }
    }
    echo "
</div></p>
</div>
</div><!-- /.latest-posts -->
</div><!-- /.row -->
</div><!-- /.post-area -->
</div><!-- /.container -->
</section><!-- /#latest-post --> ";

 
  ?>


