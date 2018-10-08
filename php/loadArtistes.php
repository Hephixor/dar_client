<?php
include ("./php/connection.php");
if(!isset($_GET['letter'])){
  $req = "select nomArtiste,idArtiste
  FROM artistes
  ORDER BY nomArtiste ASC";


  $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
  echo "<div class=\"col-sm-4\" ></div>
          <center>  <div class=\"col-sm-4\" >
  <div class=\"artistList\" >
  <h2 class=\"artistList\">Artistes</h2>
  <a href=\".\artistes.php?letter=a\">A </a>
  <a href=\".\artistes.php?letter=b\">B </a>
  <a href=\".\artistes.php?letter=c\">C </a>
  <a href=\".\artistes.php?letter=d\">D </a>
  <a href=\".\artistes.php?letter=e\">E </a>
  <a href=\".\artistes.php?letter=f\">F </a>
  <a href=\".\artistes.php?letter=g\">G </a>
  <a href=\".\artistes.php?letter=h\">H </a>
  <a href=\".\artistes.php?letter=i\">I </a>
  <a href=\".\artistes.php?letter=j\">J </a>
  <a href=\".\artistes.php?letter=k\">K </a>
  <a href=\".\artistes.php?letter=l\">L </a>
  <a href=\".\artistes.php?letter=m\">M </a>
  <a href=\".\artistes.php?letter=n\">N </a>
  <a href=\".\artistes.php?letter=o\">O </a>
  <a href=\".\artistes.php?letter=p\">P </a>
  <a href=\".\artistes.php?letter=q\">Q </a>
  <a href=\".\artistes.php?letter=r\">R </a>
  <a href=\".\artistes.php?letter=s\">S </a>
  <a href=\".\artistes.php?letter=t\">T </a>
  <a href=\".\artistes.php?letter=u\">U </a>
  <a href=\".\artistes.php?letter=v\">V </a>
  <a href=\".\artistes.php?letter=w\">W </a>
  <a href=\".\artistes.php?letter=x\">X </a>
  <a href=\".\artistes.php?letter=y\">Y </a>
  <a href=\".\artistes.php?letter=z\">Z </a>
  <a href=\".\artistes.php?letter=xxx\">0-9!# </a>
  <ul class=\"artistList\">";
  while ( $col = mysqli_fetch_row ($ret) )
  {        

    echo "
    <p style=\"margin-top:0\" ><li class=\"artistList\" style=\"width:100%;\"><a href=\"artiste.php?idArtiste=".$col[1]."\">".$col[0]."</a><p></p></li> <p>

    "; 

  }
  echo "</ul>
 </div></div></center> </div></div>
  </section>";
}
else{
  $letter = $_GET['letter'];
  $req = "SELECT nomArtiste,idArtiste
  FROM artistes
  WHERE nomArtiste LIKE '".$letter."%'
  ORDER BY nomArtiste ASC ;";
  $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
  echo "<div class=\"col-sm-4\" ></div>
          <center>  <div class=\"col-sm-4\" >
  <div class=\"artistList\" >
  <h2 class=\"artistList\">Artistes - ".strtoupper($letter)."</h2>
  <a href=\".\artistes.php?letter=a\">A </a>
  <a href=\".\artistes.php?letter=b\">B </a>
  <a href=\".\artistes.php?letter=c\">C </a>
  <a href=\".\artistes.php?letter=d\">D </a>
  <a href=\".\artistes.php?letter=e\">E </a>
  <a href=\".\artistes.php?letter=f\">F </a>
  <a href=\".\artistes.php?letter=g\">G </a>
  <a href=\".\artistes.php?letter=h\">H </a>
  <a href=\".\artistes.php?letter=i\">I </a>
  <a href=\".\artistes.php?letter=j\">J </a>
  <a href=\".\artistes.php?letter=k\">K </a>
  <a href=\".\artistes.php?letter=l\">L </a>
  <a href=\".\artistes.php?letter=m\">M </a>
  <a href=\".\artistes.php?letter=n\">N </a>
  <a href=\".\artistes.php?letter=o\">O </a>
  <a href=\".\artistes.php?letter=p\">P </a>
  <a href=\".\artistes.php?letter=q\">Q </a>
  <a href=\".\artistes.php?letter=r\">R </a>
  <a href=\".\artistes.php?letter=s\">S </a>
  <a href=\".\artistes.php?letter=t\">T </a>
  <a href=\".\artistes.php?letter=u\">U </a>
  <a href=\".\artistes.php?letter=v\">V </a>
  <a href=\".\artistes.php?letter=w\">W </a>
  <a href=\".\artistes.php?letter=x\">X </a>
  <a href=\".\artistes.php?letter=y\">Y </a>
  <a href=\".\artistes.php?letter=z\">Z </a>
  <a href=\".\artistes.php?letter=xxx\">0-9!# </a>
  <ul class=\"artistList\">";

  if($ret->num_rows==0){
    echo "<br/>
     <h4 class=\"sub-title\">Aucun artiste commencant par ".strtoupper($letter)."</h4>
";
  }
  else{
  while ( $col = mysqli_fetch_row ($ret) )
  {        
    echo "<p style=\"margin-top:0\" ><li class=\"artistList\" style=\"width:100%;\"><a href=\"artiste.php?idArtiste=".$col[1]."\">".$col[0]."</a><p></p></li> <p>    "; 

  }
  }
  echo "</ul>
 </div></div></center> </div></div>
  </section>";

}
?>
