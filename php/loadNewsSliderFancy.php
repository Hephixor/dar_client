<?php
include ("./php/connection.php");
function truncate($string, $limit, $break=' ', $pad='') {

  if (mb_strlen($string) <= $limit + mb_strlen($pad))
    return $string;
  
  $string = mb_substr($string, 0, $limit);

  if (false !== ($breakpoint = mb_strrpos($string, $break)))
    $string = mb_substr($string, 0, $breakpoint);

  return trim($string, "\t\n\r\0\x0B ':;,!?.«’").$pad;
}



$req = "SELECT DISTINCT n.idNews, n.titre, n.contenu, n.dateParution, n.idImage, n.lien FROM news n WHERE 1 ORDER BY dateParution DESC LIMIT 4";


echo " 
<section id=\"latest-post\" class=\"latest-post\" >
<div class=\"container\">
<div class=\"post-area\">
<div class=\"post-area-top text-center\">
<h2 class=\"portfolio-title\">News</h2>
<p class=\"title-description\"><a href=\"./news.php\">Plus de news</a></p>
</div><!-- /.post-area-top -->
<br/><br/>
<div class=\"row\">
";
$ret = mysqli_query ($cnx,$req) or die (mysql_error ());

while ( $col = mysqli_fetch_row ($ret) )
{
   $bImage='false';
   $imageDataUserPicture='';

   if($col[4]){
   $reqI = "SELECT i.imageData
   FROM imagesnews i
   WHERE i.idImage=".$col[4];
   $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
   $colI = mysqli_fetch_row ($retI);

   if ($colI[0]){
    $bImage='true';
    $imageDataNews = $colI[0];
  } 
}

echo "
<div class=\"col-sm-6 col-md-3 \">
<div class=\"thumbnail news\">";
if($bImage=='false'){
if($col[5]==''){
 echo "<img src=\"images/favicon.png\" alt=\"menu Logo\" style=\"max-height: 200px; max-width: 242px; display: block; data-holder-rendered=\"true\"\">";
  }
  else{
    //lien video
  }
}
else{
 if($col[5]!=''){
  echo "<div class=\"embed-responsive embed-responsive-16by9\">
  <iframe class=\"embed-responsive-item\" src=\"".$col[5]."\" allowfullscreen></iframe>
  </div>";
}
else{
  echo '<img src="data:image/jpeg;base64,'.base64_encode( $imageDataNews ).'" style="height: 200px; width: 242px; display: block; data-holder-rendered="true"">';
}
}
      echo "<div class=\"st-border\" style=\"width:100%;background-color:#ccc\"></div>
      <div class=\"caption\">
        <h6>".$col[1]."</h6>
        <p>".$col[3]."</p>
        <p></p>
        ".truncate($col[2],250,'','...')."
        <p><center><a style=\"color:#7DA4FF; border-color:#7DA4FF\" class=\"btn btn-lg btn-chronique\" href=\"./new.php?idNew=".$col[0]."\" role=\"button\">Lire</a></center></p>
      </div>
    </div>
  </div>";
}


echo '</div></p>
</div>
</div><!-- /.latest-posts -->
</div><!-- /.row -->
</div><!-- /.post-area -->
</div><!-- /.container -->
</section><!-- /#latest-post --> ';

?>

