  <?php
  require_once("header_html.php"); 
  if ( isset($_GET['idMembre']) ){
    $id = intval ($_GET['idMembre']);
    include ("./php/connection.php");
    $req = "SELECT distinct u.Pseudo, u.Prenom, u.Nom, u.Mail
    FROM users u
    WHERE u.idUser=".$id;
    $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
    $col = mysqli_fetch_row ($ret);
    $html="";
    if ( !$col[0] ){
      echo "Id de membre inconnu";
    } 
    else { 
     $pseudo = $col[0];
     $prenom = $col[1];
     $nom = $col[2];
     $mail = $col[3];
     $connected = true;
     $bImage = false;
     $reqI = "SELECT i.imageData
     FROM profilepictures i
     WHERE i.idUser=".$id;
     $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
     $colI = mysqli_fetch_row ($retI);
     if ($colI[0] ){
      $bImage=true;
      $imageData = $colI[0];
    } 
    else { 
    }
    $req2 = "SELECT count(1) FROM ratingschroniques r WHERE r.idUser=".$id;
    $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
    $col2 = mysqli_fetch_row ($ret2);
    if ( !$col2[0] ){
      $rated = -1;
    }
    else {
      $rated = 0;
      $req2 = "SELECT r.idChronique FROM ratingschroniques r WHERE r.idUser=".$id;
      $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
      $nbChroniquesNotees = $ret2->num_rows;

      $cpt = 0;
      while($col2 = mysqli_fetch_row ($ret2))
      {
        $ratedChroniques[$cpt] = $col2[0];
        $cpt = $cpt + 1;
      }  
    }
  }
}

else {
  echo "Mauvais id de membre";
}

if($connected == true){
 echo "<section class=\"about\">
 <div class=\"container\">
 <div class=\"about-area\">
 <div class=\"title-area text-center\">
 <h2 class=\"about-title\">".$pseudo."</h2>";
 if(isset($_SESSION['id'])){
  if($_SESSION['id']==$id){
    echo "<p class=\"title-description\"><a href=\"./gestion.php?idMembre=".$_SESSION['id']."\" class=\"not-in-home\">Modifier le profil</a><br/></p>";
  }
  else{
    $reqD ="SELECT COUNT(1) FROM demandescontact WHERE idUserA=".$_SESSION['id']." AND idUserB=".$id.";";

    $retD = mysqli_query ($cnx,$reqD) or die (mysql_error ());
    $colD = mysqli_fetch_row ($retD);
    if($colD[0]!=0){
      echo "ajout en attente";
    }
    else{
      $reqA ="SELECT count(1) FROM contacts WHERE idUserA=".$_SESSION['id']." AND idUserB=".$id." OR idUserA=".$id." AND idUserB=".$_SESSION['id'];
      $retA =mysqli_query ($cnx,$reqA) or die (mysql_error ());
      $colA = mysqli_fetch_row ($retA);
      if($colA[0]==1){
        echo "Vous êtes déjà amis.";
      }
      else{
        echo "<a href=\"./php/addMember.php?idUser=".$id."\">Envoyer une demande de contact.</a>";
      }
    }
  }
}
echo "</div><!-- /.title-area -->
<div class=\"about-items\" style=\"width: 100%;\">
<div class=\"row\" style=\"margin-left:5px; margin-right:5px;\">
<div class=\"col-sm-4\">
<div class=\"item\">";
if($bImage==true){
  echo '<center><img src="data:image/jpeg;base64,'.base64_encode( $imageData ).'"/></center>';
}
else{
  echo"<div id=\"uploadPicture\">
  <center><h2 class=\"about-title\" style=\"border-top:0px; margin-top:-10px;\"> :( </h2></center><br/><br/> 
    <center><h4 class=\"sub-title\"> Pas encore d'image de profil ! </h4></center><br/>";
    if(isset($_SESSION['id']) && $_SESSION['id']==$_GET['idMembre']){
      echo "<form enctype=\"multipart/form-data\" action=\".\php\modifyPicture.php\" method=\"post\">
      <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"2500000\" />
      <input type=\"hidden\" name=\"idMembre\" value=\"".$id."\"/>
      <input type=\"file\" name=\"fic\"/>
      <br/>
      <center><button class=\"buttonFancy\" \"type=\"submit\" name=\"submit\" style=\"padding: 0;margin: 0;padding-top: 3px;border-radius:3px; font-size:12px;\" ><span>    AJOUTER    </span></button></center>
      </form>";
    }
    echo "</div>";
  }
  echo "</div><!-- /.item -->
  </div>
  <div class=\"col-sm-4\">
  <div class=\"item\">
  <div class=\"item-top\">
  <h3 class=\"item-title\"></h3>
  <h4 class=\"sub-title\">Informations</h4>
  </div><!-- /.item-top -->
  <p class=\"item-description\" style=\"margin-top:-25px\">
  <p>Prenom |".$prenom."<br />Nom |".$nom."<br />Mail |".$mail."
  <br />Date inscription | 2017-25-17<br />Gonades | Mâle</p>
  </div><!-- /.item -->
  </div>
  <div class=\"col-sm-4\">
  <div class=\"item\">
  <div class=\"item-top\">
  <h4 class=\"sub-title\">Albums notés</h4>
  </div><!-- /.item-top -->
  <p class=\"item-description\">";
  if($rated == -1){
    echo "Aucun album noté.";
  }
  elseif($rated==0){
   $i=0;  
   foreach($ratedChroniques as $idCh)
   {
     $req3 = "SELECT a.titreAlbum, a.idArtiste, a.idAlbum FROM albums a WHERE idAlbum in (SELECT c.idAlbum FROM chroniques c WHERE c.idChronique=".$idCh.")";
     $ret3 = mysqli_query ($cnx,$req3) or die (mysql_error ());
     $col3 = mysqli_fetch_row ($ret3);
     $idsArtistes[$i]=$col3[1];
     $titresAlbums[$i]=$col3[0];
     $idsAlbums[$i]=$col3[2];

     $req4 = "SELECT a.nomArtiste FROM artistes a WHERE idArtiste =".$col3[1];
     $ret4 = mysqli_query ($cnx,$req4) or die (mysql_error ());
     $col4 = mysqli_fetch_row ($ret4);
     $nomsArtistes[$i]=$col4[0];

     $req5 ="SELECT r.note FROM ratingschroniques r WHERE idChronique=".$idCh." AND idUser=".$id.";";
     $ret5 = mysqli_query ($cnx,$req5) or die (mysql_error ());
     $col5 = mysqli_fetch_row ($ret5);
     $notesAlbums[$i] = $col5[0];
     $i++;
   }
   $j=0;
   while($j<$i){
    echo "<a href=\"artiste.php?idArtiste=".$idsArtistes[$j]."\">".$nomsArtistes[$j]."</a> - <a href=\"album.php?idAlbum=".$idsAlbums[$j]."\">".$titresAlbums[$j]."</a> | ".$notesAlbums[$j]."/5";
    echo "<br />";
    $j++;
  }
  echo "</p>
  <a class=\"btn\" href=\"albumsnotes.php?idMembre=".$id."\">
  <span class=\"btn-icon\"><i class=\"fa fa-arrow-circle-right\"></i></span>
  Plus d'albums
  </a></div>";
}

echo"
</div><!-- /.about-items -->
</div>
<div class=\"row\" style=\"margin-left:5px; margin-right:5px;\">
<div class=\"col-sm-4\">
<div class=\"item\">
<div class=\"item-top\">
<h4 class=\"sub-title\">Playlist</h4>
</div><!-- /.item-top -->
<p class=\"item-description\">";

$reqP="SELECT idAlbum FROM userplaylists p WHERE p.idUser=".$_GET['idMembre']." LIMIT 6";
$retP=mysqli_query ($cnx,$reqP) or die (mysql_error ());
if($retP->num_rows!=0){
  $i=1;
  while($colP = mysqli_fetch_row($retP)){
    $reqAA="SELECT titreAlbum, idArtiste FROM albums WHERE idAlbum=".$colP[0];
    $retAA=mysqli_query ($cnx,$reqAA) or die (mysql_error ());
    $colAA = mysqli_fetch_row($retAA);

    $reqAAR="SELECT nomArtiste FROM artistes WHERE idArtiste=".$colAA[1];
    $retAAR=mysqli_query ($cnx,$reqAAR) or die (mysql_error ());
    $colAAR = mysqli_fetch_row($retAAR);

    echo $i.". <a href=\"./artiste.php?idArtiste=".$colAA[1]."\">".$colAAR[0]."</a> - <a href=\"./album.php?idAlbum=".$colP[0]."\">".$colAA[0]."</a> <br />";
    $i++;
  }
}

else{
 echo"Aucun album dans la playlist."; 
}

if($retP->num_rows>5){
echo"</p>
<a class=\"btn\" href=\"#\">
<span class=\"btn-icon\"><i class=\"fa fa-arrow-circle-right\"></i></span>
Plus de titres
</a>";
}
echo"</div><!-- /.item -->
</div>
</div>
<!-- 
</div><!-- /.about-items -->
</div><!-- /.about-area -->
</div><!-- /.container -->
</section><!-- /#about -->
<br/>
<br/>"; 
}
else{
}
include("footer_html.php"); 
?>