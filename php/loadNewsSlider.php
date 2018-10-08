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

 

$req = "SELECT DISTINCT idNews, titre, contenu, dateParution FROM news WHERE 1 ORDER BY dateParution DESC LIMIT 3";


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
        <div class=\"latest-posts\" style=\"margin-top:-60px;\">


";
        $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
        while ( $col = mysqli_fetch_row ($ret) )
         {

echo " 
                
            <div class=\"col-sm-4\">
            <div class=\"st-pricing text-center\"style=\"border-radius: 3px\">
            <h6>".$col[3]."</h6>
            <h3>".$col[1]."</h3>
            

            <div class=\"st-border\"></div>
             <p style=\"word-wrap:break-word\">".truncate($col[2],250,'','...')."</p>
            <a style=\"color:#7DA4FF\" class=\"btn btn-lg btn-chronique\" href=\"./new.php?idNew=".$col[0]."\" role=\"button\">Lire</a>
          </div></div>";
      
       
}

  echo "</div></div>";
echo '</p>

</div>
      </div><!-- /.latest-posts -->
    </div><!-- /.row -->
  </div><!-- /.post-area -->
</div><!-- /.container -->
</section><!-- /#latest-post -->  

';

?>

