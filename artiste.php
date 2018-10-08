<?php
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
require_once("header_html.php");
if ( isset($_GET['idArtiste']) ){
  $id = intval ($_GET['idArtiste']);
  include ("./php/connection.php");
  $bAdmin = false;

  $req = "SELECT  a.nomArtiste, a.site, a.style, a.informations
  FROM artistes a
  WHERE a.idArtiste=".$id;
  $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
  $col = mysqli_fetch_row ($ret);
  if ( !$col[0] ){
    redirect('./404.php');
  } 
  else { 
   $nom = $col[0];
   $site = $col[1];
   $style = $col[2];
   $infos = $col[3];
   $bImage = false;

   $reqI = "SELECT i.imageData
   FROM profileartistspictures i
   WHERE i.idArtiste=".$id;
   $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
   $colI = mysqli_fetch_row ($retI);  

   if ($colI[0] ){
    $bImage=true;
    $imageData = $colI[0];
  }

  $req2 = "SELECT count(1) FROM albums a WHERE a.idArtiste=".$id;
  $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
  $col2 = mysqli_fetch_row ($ret2);
  if ( !$col2[0] ){
    $nbAlbums = -1;
  }
    else {
    $nbAlbums = 0;
    $req2 = "SELECT a.idAlbum FROM albums a WHERE a.idArtiste=".$id;
    $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
    $nbAlbumsArtiste = $ret2->num_rows;
    $cpt = 0;

    while($col2 = mysqli_fetch_row ($ret2))
    {
      $albumsArtiste[$cpt] = $col2[0];
      $cpt = $cpt + 1;
    }
  } 

  if(isset($_SESSION['isAdmin'])){
    if($_SESSION['isAdmin']==1){
      $bAdmin=true;
    }
  }
}
}
else{
  echo "id d'artiste inconnu.";
}

echo "<script  type=\"text/javascript\">
function masquer_div(id)
{
  if (document.getElementById(id).style.display == 'none')
  {
   document.getElementById(id).style.display = 'block';
 }
 else
 {
   document.getElementById(id).style.display = 'none';
 }
}
</script>
<section class=\"about\">
<div class=\"container\">
<div class=\"about-area\">
<div class=\"title-area text-center\">
<h2 class=\"about-title\">".$nom."</h2>";

echo "</div><!-- /.title-area -->
<div class=\"about-items\" style=\"width: 100%;\">
<div class=\"row\" style=\"margin-left:25px; margin-right:25px;\">
<div class=\"col-sm-4\">
<div class=\"item\">";

if($bImage==false){
  echo"<div id=\"uploadPicture\">
  <center><h2 class=\"about-title\" style=\"border-top:0px; margin-top:-10px;\"> :( </h2></center><br/><br/> 
    <center><h4 class=\"sub-title\"> Pas encore d'image d'artiste </h4></center><br/><br/>";
    if($bAdmin==true){
      echo "<div id=\"uploadPicture\">
      <form enctype=\"multipart/form-data\" action=\".\php\modifyArtistPicture.php\" method=\"post\">
      <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"2500000\" />
      <input type=\"hidden\" name=\"idArtiste\" value=\"".$id."\" />
      <input type=\"file\" name=\"fic\"/>
      <br/>
      <center><button class=\"buttonFancy\" \"type=\"submit\" name=\"submit\" style=\"padding: 0;margin: 0;padding-top: 3px;border-radius:3px; font-size:12px;\" ><span>    MODIFIER    </span></button></center>
      </form></div>";
    }
  }

  if($bImage==true){
   echo"<div class=\"item\">
   <div class=\"team-member\">
   <div class=\"member-image\">";
   echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode( $imageData ).'"/></center>';

   if($bAdmin==true){
    echo "<div class=\"member-social\" style=\"position:relative\">
    <button class=\"btn btn-lg btn-chronique\" id=\"pp\" href=\"#\" role=\"button\" style=\"background-color:transparent\" onclick=\"masquer_div('uploadPicture')\";>Modifier </button>
    </div>
    <div id=\"uploadPicture\" style=\"display:none\">
    <form enctype=\"multipart/form-data\" action=\".\php\modifyArtistPicture.php\" method=\"post\">
    <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"2500000\" />
    <input type=\"hidden\" name=\"idArtiste\" value=\"".$id."\" />
    <input type=\"file\" name=\"fic\"/>
    <br/>
    <center><button class=\"buttonFancy\" \"type=\"submit\" name=\"submit\" style=\"padding: 0;margin: 0;padding-top: 3px;border-radius:3px; font-size:12px;\" ><span>    MODIFIER    </span></button></center>
    </form></div>"; 
  }
  echo "</div></div>";
}
echo "</div></div><!-- /.item -->
</div>
<div class=\"col-sm-4\">
<div class=\"item\">
<div class=\"item-top\">
<h3 class=\"item-title\"></h3>
<h4 class=\"sub-title\">Informations</h4>
</div><!-- /.item-top -->";
if(!is_null($infos)){
  echo "<p class=\"item-description\" style=\"margin-top:-25px\">".$infos;
}
else{
 echo "<p class=\"item-description\" style=\"margin-top:-25px\"><br/>Aucune description.<br/>";
}
echo"</div><!-- /.item -->
</div>
<div class=\"col-sm-4\">
<div class=\"item\">
<div class=\"item-top\">
<h4 class=\"sub-title\">Albums</h4></div><br/>";
if($nbAlbums == -1){
  echo "Aucun album.";
}
elseif($nbAlbums==0){
 $i=0;  
 foreach($albumsArtiste as $idAl)
 {
   $req3 = "SELECT a.titreAlbum, a.idArtiste, a.idAlbum, i.imageData, a.dateSortie FROM albums a, images i WHERE a.idAlbum =".$idAl." AND i.idImage=a.idImage";
   $ret3 = mysqli_query ($cnx,$req3) or die (mysql_error ());
   $col3 = mysqli_fetch_row ($ret3);
   $idsArtistes[$i]=$col3[1];
   $titresAlbums[$i]=$col3[0];
   $idsAlbums[$i]=$col3[2];
   $imageDatas[$i]=$col3[3];
   $dateSorties[$i]=$col3[4];
   $i++;
 }

 $j=0;
 while($j<$i && $j<3){
  $height=90;
  $width=90;
  echo "<p><a href=\"album.php?idAlbum=".$idsAlbums[$j]."\">";
  echo '<img src="data:image/jpeg;base64,'.base64_encode( $imageDatas[$j] ).'" height="'.$height.'" width="'.$width.'"/>';
  echo "  ".$titresAlbums[$j]." | ".substr($dateSorties[$j],0,4)."</a></p>";
  $j++;
}
if($i>3 && $j<$i){
  echo "<br/><center><a class=\"btn\" href=\"albumsdelartiste.php?idArtiste=".$id."\">
  <span class=\"btn-icon\"><i class=\"fa fa-arrow-circle-right\"></i></span>
  Plus d'albums
  </a></center>";
}
}
echo"</div><!-- /.item-top -->
<p class=\"item-description\">";
echo"</div><!-- /.about-items -->
<div class=\"col-sm-4\" style=\"margin-top:-100px;\">
<div class=\"item\">
<div class=\"item-top\">
<h3 class=\"item-title\"></h3>
<h4 class=\"sub-title\">Liens</h4>
</div><!-- /.item-top -->
<p class=\"item-description\" style=\"margin-top:-25px;\">";
if ($site[0]=='w' && $site[1]=='w' && $site[2]=='w') {
  echo "<a href=\"".str_replace("www.", "http://", $site)."\">".str_replace("www.", "", $site)."</a><br/>";
}
else if($site[0]=='h' && $site[1]=='t' && $site[2]=='t' && $site[3]=='p' && $site[4]==':' && $site[5]=='/' && $site[6]=='/'){
  echo "<a href=\"".$site."\">".$site."</a><br/>";
}
else{
  echo "<a href=\"http://".$site."\">".$site."</a><br/>";
}
echo " </div><!-- /.item -->
</div>
</div>
</div>
</div><!-- /.about-items -->
</div><!-- /.about-area -->
</div><!-- /.container -->
</section><!-- /#about -->
<br/>
<br/>"; 

require_once("footer_html.php");
?>