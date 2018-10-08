<?php

echo "<div id=\"comments\" class=\"comments\" style=\"padding-bottom:0px;\">
	<div class=\"comments-area\">"; 

$reqnbc="SELECT COUNT(1) FROM commentaireschroniques WHERE idChronique=".$id;
$retnbc=mysqli_query($cnx,$reqnbc)or die (mysql_error ());
$colnbc = mysqli_fetch_row ($retnbc);


if(!$colnbc[0]){
	echo "Aucun commentaire.</div>
	</article>";
}
else{
	$nbc= $colnbc[0];
echo"
		<h3 class=\"comment-title\"><span class=\"title-icon\"><i class='fa fa-comments'></i></span>".$nbc." Commentaire"; if($nbc>1){echo's';}
		echo"</h3>
		<div class=\"comments-details\">
			<ul class=\"comment-list\">";
				$req = "SELECT cc.auteur, cc.contenu, cc.date, u.Pseudo FROM commentaireschroniques cc, users u WHERE u.idUser = cc.auteur AND cc.idChronique=".$_GET['idChronique']."
				ORDER BY cc.date DESC LIMIT 10";
				$ret=mysqli_query($cnx,$req);

while($col=mysqli_fetch_row($ret)) // On lit les entrées une à une grâce à une boucle
{  
   $bImage=false;
   $reqI = "SELECT i.imageData
   FROM profilepictures i
   WHERE i.idUser=".$col[0];
   $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
   $colI = mysqli_fetch_row ($retI);

   if ($colI[0] ){
    $bImage=true;
    $imageData = $colI[0];
  }


	echo"<li class=\"parent\">
	<article class=\"comment\">
	<div class=\"comment-author\">";
	if($bImage==false){
	echo "<img src=\"images/members/unknown-user.png\" alt=\"Comment Author\">";
	}
	else{
	echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode( $imageData ).'"/></center>';
	}
	echo "</div>
	<div class=\"comment-content\">
	<a href=\"./membre.php?idMembre=".$col[0]."\"><h4 class=\"author-name\">".$col[3]."</h4></a>
	<span class=\"comment-date\">
	<span class=\"entry-date\">
	<time datetime=\"".$col[2]."\">".$col[2]."</time> 
	</span>
	</span><!-- /.comment-date -->
	<p>".$col[1]." </p>
	<!-- <a class=\"btn\" href=\"#\"><span class=\"btn-icon\"><i class=\"fa fa-reply-all\"></i></span>Reply</a> -->
	</div>
	</article></li><br/><!-- /.comment -->";

}
 
  if($colnbc > 10){
 	/*echo "<a href=\"\">Voir tous les commentaires</a>";*/
 	echo"<a href=\"./commentairesChroniques.php?idChronique=".$id."\"><button name=\"submit\" class=\"submit-btn\" type=\"submit\" id=\"submit\"><span class=\"ti-shift-right\"></span>Voir plus</button></a>";
 }
 echo"</div></div></div>";

}
require_once("leaveCommentChroniques.php")
?>


</div><!-- /.comment-area -->
</div><!-- /#comment -->