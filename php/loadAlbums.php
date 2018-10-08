<?php echo "<!--" ?><script type="text/javascript">


function afficher_div(date,titre,lienArtiste){
 document.getElementById('titre').style.visibility = 'visible';
 document.getElementById('date').style.visibility = 'visible';
 document.getElementById('artiste').style.visibility = 'visible';
 document.getElementById('titre').innerHTML = titre;
 document.getElementById('date').innerHTML = date.substring(0, 4);
 document.getElementById('artiste').innerHTML = lienArtiste;
}
function masquer_div()
{
       document.getElementById('titre').style.visibility = 'hidden';
       document.getElementById('date').style.visibility = 'hidden';
       document.getElementById('artiste').style.visibility = 'hidden';
}
   
   </script>

   <section id="pricing">
    <div class="container" style="width:100%">
      <div class="row" style="width:80%">
        <div class="col-md-12">

        </div>
        </div>
        </div>
        <div class="container" style="width:80%">
       </div></div></div>
            <div class="container" style="width:80%">    
            <div class="col-sm-4" style="margin-left:-100px" >
            <div class="st-pricing text-center"style="border-radius: 3px; background-color:#fff">
            <h3 id="titre" style="visibility:hidden;">xxx</h3>
            <h4 id="artiste" style="visibility:hidden;">xxx</h4>
            <h6 id="date" style="visibility:hidden;">xxx</h6>
            <div class="st-border"></div>            
              <p id="test" style="word-wrap:break-word; visibility:hidden;"></p>
             
              <img id="cover" style="display:none;" src="data:image/jpeg;base64,'.base64_encode()" height="200" width="200"/>
   

          </div></div> 
 
<?php echo "-->"; ?>
<?php
include ("./php/connection.php");
if(!isset($_GET['letter'])){
  $req = "select a.titreAlbum, a.idAlbum, a.idImage, a.idArtiste, a.dateSortie, ar.nomArtiste
  FROM albums a, artistes ar
  where ar.idArtiste = a.idArtiste
  ORDER BY titreAlbum ASC";
  $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
  echo "
<div class=\"col-sm-4\" ></div>
          <center>  <div class=\"col-sm-4\" >
  <div class=\"artistList\" >
  <h2 class=\"artistList\">Albums</h2>
  <a href=\".\albums.php?letter=a\">A </a>
  <a href=\".\albums.php?letter=b\">B </a>
  <a href=\".\albums.php?letter=c\">C </a>
  <a href=\".\albums.php?letter=d\">D </a>
  <a href=\".\albums.php?letter=e\">E </a>
  <a href=\".\albums.php?letter=f\">F </a>
  <a href=\".\albums.php?letter=g\">G </a>
  <a href=\".\albums.php?letter=h\">H </a>
  <a href=\".\albums.php?letter=i\">I </a>
  <a href=\".\albums.php?letter=j\">J </a>
  <a href=\".\albums.php?letter=k\">K </a>
  <a href=\".\albums.php?letter=l\">L </a>
  <a href=\".\albums.php?letter=m\">M </a>
  <a href=\".\albums.php?letter=n\">N </a>
  <a href=\".\albums.php?letter=o\">O </a>
  <a href=\".\albums.php?letter=p\">P </a>
  <a href=\".\albums.php?letter=q\">Q </a>
  <a href=\".\albums.php?letter=r\">R </a>
  <a href=\".\albums.php?letter=s\">S </a>
  <a href=\".\albums.php?letter=t\">T </a>
  <a href=\".\albums.php?letter=u\">U </a>
  <a href=\".\albums.php?letter=v\">V </a>
  <a href=\".\albums.php?letter=w\">W </a>
  <a href=\".\albums.php?letter=x\">X </a>
  <a href=\".\albums.php?letter=y\">Y </a>
  <a href=\".\albums.php?letter=z\">Z </a>
  <a href=\".\albums.php?letter=xxx\">0-9!# </a>
  <ul class=\"artistList\">";

  //$j=0;
  while ( $col = mysqli_fetch_row ($ret) )
  {        
  /* $reqI = "select imageData, idImage
   FROM images i
   where i.idImage=".$col[2];
   $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
   $colI = mysqli_fetch_row ($retI);
   $imageData[$j]=$colI[0];*/
   $height=90;
   $width=90;
   $lienArtiste = "<a href=\"artiste.php?idArtiste=".$col[3]."\">".$col[5]."</a>";
   $dateA=str_replace("'", " ", $col[4]);
   $titreA=str_replace("'", " ", $col[0]);
    echo "<p style=\"margin-top:0\" ><li class=\"artistList\" style=\"width:100%;\"><a href=\"album.php?idAlbum=".$col[1]."\" onmouseover=\"afficher_div('".str_replace("'", " ", $col[4])."','".str_replace("'", " ", $col[0])."','".str_replace("'", " ", $col[5])."')\" >".$col[0]."</a>";
   
  // echo "<p style=\"margin-top:0\" ><li class=\"artistList\"><a href=\"album.php?idAlbum=".$col[1]."\" onmouseover=\"afficher_div('".str_replace("'", " ", $col[4])."','".str_replace("'", " ", $col[0])."','".str_replace("\"", " ", $lienArtiste)."')\" >".$col[0]."</a>";
   //echo "<p style=\"margin-top:0\" ><li class=\"artistList\"><a href=\"album.php?idAlbum=".$col[1]."\" onmouseover=\"afficher_div('".$dateA.",".$titreA.",".str_replace("\"", " ",$lienArtiste)."')\" >".$titreA."</a>";
   //echo '<img id="artisteCover'.$j.'" style="display:none;" src="data:image/jpeg;base64,'.base64_encode($imageData[$j]).'" height="'.$height.'" width="'.$width.'"/>';
  //onmouseout=\"masquer_div('')\"
   echo "<p></p></li> <p>";
  // $j++;
 }
 echo " </ul>
 </div></div></center> </div></div>
  </section>";
}
else{
  $letter = $_GET['letter'];
  $req = "select a.titreAlbum, a.idAlbum, a.idImage, a.idArtiste, a.dateSortie, ar.nomArtiste
  FROM albums a, artistes ar
  where ar.idArtiste = a.idArtiste AND titreAlbum LIKE '".$letter."%'
  ORDER BY titreAlbum ASC ;";
  $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
  echo "<div class=\"col-sm-4\" ></div>
          <center>  <div class=\"col-sm-4\" >
  <div class=\"artistList\" >
  <h2 class=\"artistList\">Albums - ".strtoupper($letter)."</h2>
  <a href=\".\albums.php?letter=a\">A </a>
  <a href=\".\albums.php?letter=b\">B </a>
  <a href=\".\albums.php?letter=c\">C </a>
  <a href=\".\albums.php?letter=d\">D </a>
  <a href=\".\albums.php?letter=e\">E </a>
  <a href=\".\albums.php?letter=f\">F </a>
  <a href=\".\albums.php?letter=g\">G </a>
  <a href=\".\albums.php?letter=h\">H </a>
  <a href=\".\albums.php?letter=i\">I </a>
  <a href=\".\albums.php?letter=j\">J </a>
  <a href=\".\albums.php?letter=k\">K </a>
  <a href=\".\albums.php?letter=l\">L </a>
  <a href=\".\albums.php?letter=m\">M </a>
  <a href=\".\albums.php?letter=n\">N </a>
  <a href=\".\albums.php?letter=o\">O </a>
  <a href=\".\albums.php?letter=p\">P </a>
  <a href=\".\albums.php?letter=q\">Q </a>
  <a href=\".\albums.php?letter=r\">R </a>
  <a href=\".\albums.php?letter=s\">S </a>
  <a href=\".\albums.php?letter=t\">T </a>
  <a href=\".\albums.php?letter=u\">U </a>
  <a href=\".\albums.php?letter=v\">V </a>
  <a href=\".\albums.php?letter=w\">W </a>
  <a href=\".\albums.php?letter=x\">X </a>
  <a href=\".\albums.php?letter=y\">Y </a>
  <a href=\".\albums.php?letter=z\">Z </a>
  <a href=\".\albums.php?letter=xxx\">0-9!# </a>
  <ul class=\"artistList\">";

  if($ret->num_rows==0){
    echo "<br/>
    <h4 class=\"sub-title\">Aucun album commencant par ".strtoupper($letter)."</h4>
    ";
  }
  else{

    while ( $col = mysqli_fetch_row ($ret) )
    {         
   echo "<p style=\"margin-top:0\" ><li class=\"artistList\" style=\"width:100%;\"><a href=\"album.php?idAlbum=".$col[1]."\" onmouseover=\"afficher_div('".str_replace("'", " ", $col[4])."','".str_replace("'", " ", $col[0])."','".str_replace("'", " ", $col[5])."')\" >".$col[0]."</a>";
   echo "<p></p></li> <p>";
 }
 }
 echo " </ul>
 </div></div></center> </div></div>
  </section>";


}   
?>
