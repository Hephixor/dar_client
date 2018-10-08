<?php
include ("./php/connection.php");



if(isset($_GET['idChronique'])) // Si la variable $_GET['idChronique'] existe...
{
  $req = "SELECT count(idChronique), SUM(note) from ratingschroniques where idChronique =".$_GET['idChronique'] ;
  echo " <div class=\"entry-meta-content\">";
  $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
  while ( $col = mysqli_fetch_row ($ret) )
  {
    $nbNotesLecteurs=$col[0];
    if($col[0]==0){
      $moyenne=0;
    }
    else{
      $moyenne=$col[1]/$col[0];
      $moyenne=ceil($moyenne);
    }
  }

  $reqC="SELECT noteRedac from chroniques where idChronique=".$_GET['idChronique'];
  $retC = mysqli_query ($cnx,$reqC) or die (mysql_error ());
  $colC = mysqli_fetch_row ($retC);
  $noteRedac=$colC[0];

  if(isset($_SESSION['id'])){
  $reqU="SELECT note from ratingschroniques where idUser=".$_SESSION['id']." and idChronique=".$_GET['idChronique'];
  
  $retU = mysqli_query ($cnx,$reqU) or die (mysql_error ());
  $colU = mysqli_fetch_row ($retU);

  if(!$colU[0]){
    $noted=false;
  }
  else{
    $noted=true;
    $noteU=$colU[0];
  }
}
  echo "<div class=\"row\">Note rédaction <br/><div class=\"ratingRedac\">";
  for($i=1;$i<=5;$i++){
    if($i<=$noteRedac){
      echo "<span title=\"\" style=\"color:orange\">&#9733</span>";
    }
    else {
      echo "<span href=\"\" title=\"\">&#9733</span>";
    }
  }
  echo "</div></div>";

  echo "<div class=\"row\">Note des lecteurs (".$nbNotesLecteurs.")<div class=\"ratingRedac\">";
  for($i=1;$i<=5;$i++){
    if($i<=$moyenne){
      echo "<span title=\"\" style=\"color:orange\">&#9733</span>";
    }
    else {
      echo "<span href=\"\" title=\"\">&#9733</span>";
    }
  }
  echo "</div>";
  echo"<div class=\"row\"  style=\"padding-left: 20px;\">Noter cet album <br/><div class=\"rating\" style=\"padding-left: 0px; margin-top: -15px;\">";



  if(isset($_SESSION['logged_in']) and $_SESSION['logged_in']==true and $noted==false){
    echo"<a href=\"./php/rating.php?stars=5&id=".$_SESSION['id']."&idChronique=".($_GET['idChronique'])."&update=false\">&#9733</a>
    <a href=\"./php/rating.php?stars=4&id=".$_SESSION['id']."&idChronique=".($_GET['idChronique'])."&update=false\">&#9733</a>
    <a href=\"./php/rating.php?stars=3&id=".$_SESSION['id']."&idChronique=".($_GET['idChronique'])."&update=false\">&#9733</a>
    <a href=\"./php/rating.php?stars=2&id=".$_SESSION['id']."&idChronique=".($_GET['idChronique'])."&update=false\">&#9733</a>
    <a href=\"./php/rating.php?stars=1&id=".$_SESSION['id']."&idChronique=".($_GET['idChronique'])."&update=false\">&#9733</a>";
  }
  else if(isset($_SESSION['logged_in']) and $_SESSION['logged_in']==true and $noted==true)
  {
    for($i=5;$i>=1;$i--){
      if($i>$noteU){
 echo"<a href=\"./php/rating.php?stars=".$i."&id=".$_SESSION['id']."&idChronique=".($_GET['idChronique'])."&update=true\">&#9733</a>";
      }
      else {
        echo"<a href=\"./php/rating.php?stars=".$i."&id=".$_SESSION['id']."&idChronique=".($_GET['idChronique'])."&update=true\" style=\"color:orange\" >&#9733</a>";
      
     }
   }
 }
 else
 {
  echo "<p style=\"float: left;font-size: 0.4em;font-weight: 300;font-style: italic;margin-top: 15px;\">Vous devez être connecté pour noter un album.</p>";
}
echo "</div></div>";  
}

else {
 echo "erreur"; 
}


?>