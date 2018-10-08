<?php
require_once("header_html.php");

if ( isset($_GET['idLabel']) ){
  $id = intval ($_GET['idLabel']);
  include ("./php/connection.php");

  $bAdmin = false;
  $req = "SELECT  a.titreAlbum, a.dateSortie, a.idArtiste, a.idImage, ar.nomArtiste, l.nomLabel, l.idLabel, a.lienEcoute
  FROM albums a, artistes ar, labels l
  WHERE a.idArtiste = ar.idArtiste AND a.idLabel = l.idLabel AND a.idLabel=".$id;

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
</script>

<section id=\"latest-post\" class=\"latest-post\" style=\"padding-top: 40px;\">
  <div class=\"container\"  style=\"width:80%\">
    <div class=\"post-area\" style=\"width:100%\">
      <div class=\"post-area-top text-center\">
        <h2 class=\"post-area-title\">Albums de ".$label."</h2>
        <p class=\"title-description\">Sorties</p>
      </div><!-- /.post-area-top -->

      <div class=\"row\">
        <div class=\"latest-posts\">

      </div>
      </div><!-- /.latest-posts -->
    </div><!-- /.row -->
  </div><!-- /.post-area -->
</div><!-- /.container -->
</section><!-- /#latest-post -->  ";
 



 require_once("./php/loadAlbumsLabel.php");


echo"<br/>
<br/>"; 

require_once("footer_html.php");
?>