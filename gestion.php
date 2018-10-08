<?php
require_once("header_html.php");
?>

    <?php 
    $connected = false;
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
    echo
"<script  type=\"text/javascript\">
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
    <h2 class=\"about-title\">".$pseudo."</h2>
    <p class=\"title-description\">Modification du profil<br/></p>
  </div><!-- /.title-area -->
  <div class=\"about-items\" style=\"width: 100%;\">
    <div class=\"col-sm-4\">
     <div class=\"item\">
     <div class=\"team-member\">
            <div class=\"member-image\">";
              echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode( $imageData ).'"/></center>';
              echo "<div class=\"member-social\" style=\"position:relative\">
                <button class=\"btn btn-lg btn-chronique\" id=\"pp\" href=\"#\" role=\"button\" style=\"background-color:transparent\" onclick=\"masquer_div('uploadPicture')\";>Modifier </button>
            </div>
     </div>
     </div>

     <div id=\"uploadPicture\" style=\"display:none\">
        <form enctype=\"multipart/form-data\" action=\".\php\modifyPicture.php\" method=\"post\">
         <input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"2500000\" />
         <input type=\"hidden\" name=\"idMembre\" value=\"".$id."\" />
         <input type=\"file\" name=\"fic\"/>
         <br/>
         <center><button class=\"buttonFancy\" \"type=\"submit\" name=\"submit\" style=\"padding: 0;margin: 0;padding-top: 3px;border-radius:3px; font-size:12px;\" ><span>    MODIFIER    </span></button></center>
        </form>
     </div>

    </div>
 </div>
 <div class=\"col-sm-4\">
   <div class=\"item\">
    <div class=\"item-top\"  style=\"border-bottom: 0px solid #d7dee0;\">
     <h3 class=\"item-title\"></h3>
     <h4 class=\"sub-title\">Informations</h4>
   </div><!-- /.item-top -->
   <p class=\"item-description\" style=\"margin-top:-25px\">
 <center>
<form class=\"formulaire\" action=\"./php/modifyProfil.php\" method=\"post\">
    <input type=\"hidden\" name=\"idMembre\" value=\"".$id."\" />
    <p class=\"field\"><input name=\"prenom\" placeholder=\"Prénom : ".$prenom."\" type=\"text\" /><i class=\"icon-user icon-large\"></i></p>
    <p class=\"field\"><input name=\"nom\" placeholder=\"Nom : ".$nom."\" type=\"text\" /><i class=\"icon-user icon-large\"></i></p>
    <p class=\"field\"><input name=\"mail\" placeholder=\"Mail : ".$mail."\" type=\"text\" /><i class=\"icon-user icon-large\"></i></p>
    <p class=\"field\"><input name=\"pwd\" placeholder=\"Nouveau mot de passe\" type=\"password\" /><i class=\"icon-lock icon-large\"></i></p>
    <p class=\"field\"><input name=\"pwd2\" placeholder=\"Confirmation\" type=\"password\" /><i class=\"icon-lock icon-large\"></i></p>
   <button class=\"buttonFancy\" \"type=\"submit\" name=\"submit\" style=\"padding: 0;margin: 0;padding-top: 3px;border-radius:3px; font-size:12px;\" ><span>    Enregistrer    </span></button>
</form>
</center>   
 </div>
</div>

<div class=\"col-sm-4\">
   <div class=\"item\">
    <div class=\"item-top\">
           <h4 class=\"sub-title\">Playlist Favoris</h4>
     </div><!-- /.item-top -->
     <p class=\"item-description\">";
$reqP="SELECT idAlbum FROM userplaylists p WHERE p.idUser=".$_GET['idMembre'];
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

    echo $i.". <a href=\"./artiste.php?idArtiste=".$colAA[1]."\">".$colAAR[0]."</a> - <a href=\"./album.php?idAlbum=".$colP[0]."\">".$colAA[0]."</a> <a href=\"./php/removeUserPlaylist.php?idAlbum=".$colP[0]."\" style=\"color:red;\">supprimer</a><br />";
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
echo"
 </div><!-- /.item -->
</div>

</div><!-- /.about-items -->
</div><!-- /.about-area -->
</div><!-- /.container -->
</section><!-- /#about -->
<br/><br/>"; 
}
else{

}

 include("footer_html.php"); ?>








