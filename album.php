

<?php
require_once("header_html.php");

if ( isset($_GET['idAlbum']) ){
  $id = intval ($_GET['idAlbum']);
  include ("./php/connection.php");

  $bAdmin = false;
  $req = "SELECT  a.titreAlbum, a.dateSortie, a.idArtiste, a.idImage, ar.nomArtiste, l.nomLabel, l.idLabel, a.lienEcoute, a.tracklist
  FROM albums a, artistes ar, labels l
  WHERE a.idArtiste = ar.idArtiste AND l.idLabel = a.idLabel AND a.idAlbum=".$id;

  $ret = mysqli_query ($cnx,$req) or die (mysql_error ());

  $col = mysqli_fetch_row ($ret);

  $html="";
  if ( !$col[0] ){

    echo "Id d'artiste inconnu";
  } 
  else { 

   $titre = $col[0];
   $dateSortie = $col[1];
   $idAr = $col[2];
   $bImage = false;
   $idImage = $col[3];
   $nomArtiste = $col[4];
   $label = $col[5];
   $idLabel = $col[6];
   $lienEcoute = $col[7];
   $tracklist =explode(PHP_EOL, $col[8]);

   $reqI = "SELECT i.imageData
   FROM images i
   WHERE i.idImage=".$idImage;
   $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
   $colI = mysqli_fetch_row ($retI);

   if ($colI[0] ){
    $bImage=true;
    $imageData = $colI[0];
  }

  $req2 = "SELECT count(1) FROM albums a WHERE a.idArtiste=".$idAr;

  $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
  $col2 = mysqli_fetch_row ($ret2);
  if ( !$col2[0] ){
    $nbAlbums = -1;
  }
  else {
    $nbAlbums = 0;
    $req2 = "SELECT a.idAlbum FROM albums a WHERE a.idArtiste=".$idAr;
    $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
    $nbAlbumsArtiste = $ret2->num_rows;
    $cpt = 0;
    if($col2){
      while($col2 = mysqli_fetch_row ($ret2))
      {
        $albumsArtiste[$cpt] = $col2[0];
        $cpt = $cpt + 1;
      }
    }
    else{
      $albumsArtistes=false;
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

echo "
<script  type=\"text/javascript\">
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

function chroniqueHeader(id){
location = \"./chronique.php?idChronique=\" + id;
}

</script>
<section class=\"about\">
<div class=\"container\">
<div class=\"about-area\">
<div class=\"title-area text-center\">
<h2 class=\"about-title\">".$titre."</h2>";
/*<p class=\"title-description\" style=\"padding-bottom:0px;\"><a href=\"./artiste.php?idArtiste=".$idAr."\" class=\"not-in-home\">".$nomArtiste."</a>";*/
if(isset($_SESSION['id'])){
  $reqP="SELECT count(1) FROM userplaylists p WHERE p.idUser=".$_SESSION['id']." AND p.idAlbum=".$id;
  $retP=mysqli_query ($cnx,$reqP) or die (mysql_error ());
  $colP = mysqli_fetch_row ($retP);
  if($colP[0]==0){
    echo "<p class=\"title-description\" style=\"padding-bottom:0px;\"><a href=\"./php/addUserPlaylist.php?idAlbum=".$id."\" class=\"not-in-home\">Ajouter à ma playlist</a><br/>";
   
  }
else{
 echo "<p class=\"title-description\" style=\"padding-bottom:0px;\"><a href=\"./php/removeUserPlaylist.php?idAlbum=".$id."\" class=\"not-in-home\" style=\"color:#D8000C \">Retirer de ma playlist</a><br/>";

}
}


$bChronique=false;
  $reqC="SELECT idChronique FROM chroniques c WHERE c.idAlbum=".$id;
  $retC=mysqli_query ($cnx,$reqC) or die (mysql_error ());
  $colC = mysqli_fetch_row ($retC);
  if($colC[0]){
    $bChronique=$colC[0];
  }
if($bChronique!=false){
  echo"<button class=\"buttonFancy\" \"type=\"submit\" name=\"submit\" style=\"padding: 0;margin-top: 3px;padding-top: 3px;border-radius:3px; font-size:12px;\" onclick=\"chroniqueHeader(".$bChronique.")\">
  <span>    La chronique    </span></button>";

  //echo"<p class=\"title-description\"><a href=\"./chronique.php?idChronique=".$bChronique."\" class=\"not-in-home\">Lire la chronique</a><br/></p>";
}

echo"<br/></p></div><!-- /.title-area -->
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
      <form enctype=\"multipart/form-data\" action=\".\php\insertAlbumPicture.php\" method=\"post\">
      <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"2500000\" />
      <input type=\"hidden\" name=\"idAlbum\" value=\"".$id."\" />
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
    <form enctype=\"multipart/form-data\" action=\".\php\modifyAlbumPicture.php\" method=\"post\">
    <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"2500000\" />
    <input type=\"hidden\" name=\"idAlbum\" value=\"".$id."\" />
    <input type=\"hidden\" name=\"idImage\" value=\"".$idImage."\" />
    <input type=\"file\" name=\"fic\"/>
    <br/>
    <center><button class=\"buttonFancy\" \"type=\"submit\" name=\"submit\" style=\"padding: 0;margin: 0;padding-top: 3px;border-radius:3px; font-size:12px;\" ><span>    MODIFIER    </span></button></center>
    </form></div>"; 
  }
  echo "</div></div>";

}
echo "
</div></div><!-- /.item -->
</div>
<div class=\"col-sm-4\">
<div class=\"item\">
<div class=\"item-top\">
<h3 class=\"item-title\"></h3>
<h4 class=\"sub-title\">Informations</h4>
</div><!-- /.item-top -->
<p class=\"item-description\" style=\"margin-top:-25px\">
<h6>Artiste : <a href=\"./artiste.php?idArtiste=".$idAr."\" class=\"not-in-home\">".$nomArtiste."</a></h6>
<h6>Sortie : ".$dateSortie."</h6>
<h6>Label : <a href=\"./label.php?idLabel=".$idLabel."\" class=\"not-in-home\">".$label."</a></h6>
<h6>Tracks : </h6>";

$cptTrack=1;
for($i = 0; $i < sizeof($tracklist);$i++)
{
  if($tracklist[$i]!=''){

echo "<span class=\"small\" style=\"margin-left:10px;\">".$cptTrack.". ".$tracklist[$i]."</span><br/>";
$cptTrack++;
}
}
echo "
<h6>Lien d'écoute : <a href=\"".str_replace("www.", "http://", $lienEcoute)."\">".str_replace("www.", "", $lienEcoute)."</a></h6>
</div><!-- /.item -->
</div>

<div class=\"col-sm-4\">
<div class=\"item\">
<div class=\"item-top\">
<h4 class=\"sub-title\">Du même artiste</h4></div><br/>";
if($nbAlbums == -1){
  echo "Aucun album.";
}
elseif($nbAlbums==0){
 $i=0;  

 foreach($albumsArtiste as $idAl)
 {
  if($idAl==$_GET['idAlbum']){

  }
  else{
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

 echo "<br/><center><a class=\"btn\" href=\"albumsdelartiste.php?idArtiste=".$idAr."\">
       <span class=\"btn-icon\"><i class=\"fa fa-arrow-circle-right\"></i></span>
       Plus d'albums
     </a></center>";
}
}
echo "

</div><!-- /.item-top -->
<p class=\"item-description\">";
echo"
</div><!-- /.about-items -->

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