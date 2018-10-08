<?php
include ("./php/connection.php");
if(!isset($_GET['letter'])){
  $req = "select nomLabel,idLabel
  FROM labels
  ORDER BY nomLabel ASC";


  $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
  echo "<center><div class=\"artistList\" style=\"width:500px;\">
  <h2 class=\"artistList\">Labels</h2>
  <a href=\".\labels.php?letter=a\">A </a>
  <a href=\".\labels.php?letter=b\">B </a>
  <a href=\".\labels.php?letter=c\">C </a>
  <a href=\".\labels.php?letter=d\">D </a>
  <a href=\".\labels.php?letter=e\">E </a>
  <a href=\".\labels.php?letter=f\">F </a>
  <a href=\".\labels.php?letter=g\">G </a>
  <a href=\".\labels.php?letter=h\">H </a>
  <a href=\".\labels.php?letter=i\">I </a>
  <a href=\".\labels.php?letter=j\">J </a>
  <a href=\".\labels.php?letter=k\">K </a>
  <a href=\".\labels.php?letter=l\">L </a>
  <a href=\".\labels.php?letter=m\">M </a>
  <a href=\".\labels.php?letter=n\">N </a>
  <a href=\".\labels.php?letter=o\">O </a>
  <a href=\".\labels.php?letter=p\">P </a>
  <a href=\".\labels.php?letter=q\">Q </a>
  <a href=\".\labels.php?letter=r\">R </a>
  <a href=\".\labels.php?letter=s\">S </a>
  <a href=\".\labels.php?letter=t\">T </a>
  <a href=\".\labels.php?letter=u\">U </a>
  <a href=\".\labels.php?letter=v\">V </a>
  <a href=\".\labels.php?letter=w\">W </a>
  <a href=\".\labels.php?letter=x\">X </a>
  <a href=\".\labels.php?letter=y\">Y </a>
  <a href=\".\labels.php?letter=z\">Z </a>
  <a href=\".\labels.php?letter=xxx\">0-9!# </a>
  <ul class=\"artistList\">";
  while ( $col = mysqli_fetch_row ($ret) )
  {        

    echo "
    <p style=\"margin-top:0\" ><li class=\"artistList\"><a href=\"label.php?idLabel=".$col[1]."\">".$col[0]."</a><p></p></li> <p>

    "; 

  }
  echo " </ul>
  </div> </center>";
}
else{
  $letter = $_GET['letter'];
  $req = "SELECT nomLabel,idLabel
  FROM labels
  WHERE nomLabel LIKE '".$letter."%'
  ORDER BY nomLabel ASC ;";
  $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
  echo "<center><div class=\"artistList\" style=\"width:500px;\">
  <h2 class=\"artistList\">Labels - ".strtoupper($letter)."</h2>
  <a href=\".\labels.php?letter=a\">A </a>
  <a href=\".\labels.php?letter=b\">B </a>
  <a href=\".\labels.php?letter=c\">C </a>
  <a href=\".\labels.php?letter=d\">D </a>
  <a href=\".\labels.php?letter=e\">E </a>
  <a href=\".\labels.php?letter=f\">F </a>
  <a href=\".\labels.php?letter=g\">G </a>
  <a href=\".\labels.php?letter=h\">H </a>
  <a href=\".\labels.php?letter=i\">I </a>
  <a href=\".\labels.php?letter=j\">J </a>
  <a href=\".\labels.php?letter=k\">K </a>
  <a href=\".\labels.php?letter=l\">L </a>
  <a href=\".\labels.php?letter=m\">M </a>
  <a href=\".\labels.php?letter=n\">N </a>
  <a href=\".\labels.php?letter=o\">O </a>
  <a href=\".\labels.php?letter=p\">P </a>
  <a href=\".\labels.php?letter=q\">Q </a>
  <a href=\".\labels.php?letter=r\">R </a>
  <a href=\".\labels.php?letter=s\">S </a>
  <a href=\".\labels.php?letter=t\">T </a>
  <a href=\".\labels.php?letter=u\">U </a>
  <a href=\".\labels.php?letter=v\">V </a>
  <a href=\".\labels.php?letter=w\">W </a>
  <a href=\".\labels.php?letter=x\">X </a>
  <a href=\".\labels.php?letter=y\">Y </a>
  <a href=\".\labels.php?letter=z\">Z </a>
  <a href=\".\labels.php?letter=xxx\">0-9!# </a>
  <ul class=\"artistList\">";

  if($ret->num_rows==0){
    echo "<br/><h4 class=\"sub-title\">Aucun label commencant par ".strtoupper($letter)."</h4>";
  }
  else{
    while ( $col = mysqli_fetch_row ($ret) )
    {        
      echo "<p style=\"margin-top:0\" ><li class=\"artistList\"><a href=\"label.php?idLabel=".$col[1]."\">".$col[0]."</a><p></p></li> <p>    "; 
   }
 }
 echo "</ul> </div> </center>";

}
?>
