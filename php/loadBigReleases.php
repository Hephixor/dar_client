<?php
/*
function truncate($string, $limit, $break=' ', $pad='') {
  
  if (mb_strlen($string) <= $limit + mb_strlen($pad))
    return $string;
  
  $string = mb_substr($string, 0, $limit);

  if (false !== ($breakpoint = mb_strrpos($string, $break)))
    $string = mb_substr($string, 0, $breakpoint);

  return trim($string, "\t\n\r\0\x0B ':;,!?.«’").$pad;
}*/


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

echo " <section id=\"latest-post\" class=\"latest-post\">
  <div class=\"container\">
    <div class=\"post-area\">
      <div class=\"post-area-top text-center\">
        <h2 class=\"post-area-title\">Grosses Sorties</h2>
        <p class=\"title-description\">Les sorties à ne pas manquer</p>
      </div><!-- /.post-area-top -->

      <div class=\"row\">
        <div class=\"latest-posts\">";
          
       

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
          echo "<div class=\"col-sm-6\">
            <div class=\"item\">
              <article class=\"post type-post\">
                <div class=\"post-top\">
                  <div class=\"post-thumbnail\">";
                  echo "<a href=\"chronique.php?idChronique=".$idChronique."\">";
                    echo '<center><img src="data:image/jpeg;base64,'.base64_encode( $col2[2] ).'" style="width="880" height="400" "/></center>';
                    echo "</a>";
                  echo "</div><!-- /.post-thumbnail -->  
                  <div class=\"post-meta\">
                    <div class=\"entry-meta\">
                      <span class=\"entry-date\">
                        <time datetime=\"".$dateParution."\">".$dateParution."</time>
                      </span>
                      <span class=\"author-name\">
                        <a href=\"membre.php?idMembre=".$idRedacteur."\">".$redacteur."</a>
                      </span>
                      <!-- <span class=\"post-tags\">
                        <ul class=\"tag-list\">
                          <li><a href=\"#\">web-design</a></li>
                          <li><a href=\"#\">html5</a></li>
                          <li><a href=\"#\">css3</a></li>
                        </ul>
                      </span> -->
                    </div><!-- /.entry-meta -->
                  </div><!-- /.post-meta -->
                </div><!-- /.post-top -->
                <div class=\"post-content\">
                  <h2 class=\"entry-title\"><a href=\"chronique.php?idChronique=".$idChronique."\"><em>".$col[2]." - ".$col[1]."</em></a></h2>
                  <p class=\"entry-text\">".truncate($col[8],250, ' ', '...')." </p> <br/>
                  <a class=\"btn\" href=\"chronique.php?idChronique=".$idChronique."\">
                    <span class=\"btn-icon\"><i class=\"fa fa-arrow-circle-right\"></i></span>
                    Lire
                  </a>
                </div><!-- /.post-content -->
              </article>
            </div><!-- /.item -->
          </div>";
          }
         }
echo " </div>
      </div><!-- /.latest-posts -->
    </div><!-- /.row -->
  </div><!-- /.post-area -->
</div><!-- /.container -->
</section><!-- /#latest-post -->   ";
?>


