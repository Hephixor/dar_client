<?php
include ("connection.php");
function truncate($string, $limit, $break=' ', $pad='') {

  if (mb_strlen($string) <= $limit + mb_strlen($pad))
    return $string;
  
  $string = mb_substr($string, 0, $limit);

  if (false !== ($breakpoint = mb_strrpos($string, $break)))
    $string = mb_substr($string, 0, $breakpoint);

  return trim($string, "\t\n\r\0\x0B ':;,!?.«’").$pad;
}

$messagesParPage=8; //Nous allons afficher 20 messages par page.

//Une connexion SQL doit être ouverte avant cette ligne...
$retour_total=mysqli_query($cnx, 'SELECT COUNT(*) AS total FROM news'); //Nous récupérons le contenu de la requête dans $retour_total
$donnees_total=mysqli_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.

//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($total/$messagesParPage);



if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
 $pageActuelle=intval($_GET['page']);

     if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
      $pageActuelle=$nombreDePages;
    }
    else if($pageActuelle<0){
      $pageActuelle=1;
    }
  }
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1    
   }

   $pPage = $pageActuelle-1;
   $fPage = $pageActuelle+1;

$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire

// La requête sql pour récupérer les messages de la page actuelle.

$req = "SELECT DISTINCT idNews, titre, contenu, dateParution, idImage, lien FROM news WHERE 1 ORDER BY dateParution DESC LIMIT ".$messagesParPage." OFFSET ".$premiereEntree;
$bool=true;

echo " <section id=\"pricing\" style=\"margin-top:-150px;\">
<div class=\"container\" style=\"width:100%\">
<div class=\"row\" style=\"width:100%\">
<div class=\"col-md-12\">
</div>
</div>
</div>
<div class=\"container\" style=\"width:100%\">";
$count=0;

$ret = mysqli_query ($cnx,$req) or die (mysql_error ());
while ( $col = mysqli_fetch_row ($ret) )
{

 $count = $count + 1;
 $bImage='false';
 $imageDataUserPicture='';

 if($col[4]){
   $reqI = "SELECT i.imageData
   FROM imagesnews i
   WHERE i.idImage=".$col[4];
   $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
   $colI = mysqli_fetch_row ($retI);

   if ($colI[0]){
    $bImage='true';
    $imageDataNews = $colI[0];
  } 
}
echo "
<div class=\"col-sm-6 col-md-3 \">
<div class=\"thumbnail news\">";
if($bImage=='false'){
if($col[5]==''){
 echo "<img src=\"images/favicon.png\" alt=\"menu Logo\" style=\"max-height: 200px; max-width: 242px; display: block; data-holder-rendered=\"true\"\">";
  }
  else{
    echo "<div class=\"embed-responsive embed-responsive-16by9\">
  <iframe class=\"embed-responsive-item\" src=\"".$col[5]."\" allowfullscreen></iframe>
  </div>";
  }
}
else{
 if($col[5]!=''){
  echo "<div class=\"embed-responsive embed-responsive-16by9\">
  <iframe class=\"embed-responsive-item\" src=\"".$col[5]."\" allowfullscreen></iframe>
  </div>";
}
else{
  echo '<img src="data:image/jpeg;base64,'.base64_encode( $imageDataNews ).'" style="height: 200px; width: 242px; display: block; data-holder-rendered="true"">';
}
}
echo "<div class=\"st-border\" style=\"width:100%;background-color:#ccc\"></div>
<div class=\"caption\">
<h6>".$col[1]."</h6>
<p>".$col[3]."</p>
<p></p>
".truncate($col[2],250,'','...')."
<p><center><a style=\"color:#7DA4FF; border-color:#7DA4FF\" class=\"btn btn-lg btn-chronique\" href=\"./new.php?idNew=".$col[0]."\" role=\"button\">Lire</a></center></p>
</div>
</div>
</div>";
}
echo "</div></div></section>";
echo "<center><nav aria-label=\"Page navigation\">
<ul class=\"pagination\">";
if($pageActuelle!=1){
  echo "<li>";
  echo'<a href="news.php?page='.$pPage.'" aria-label="Précedente">
  <span aria-hidden=\"true\">&laquo;</span>
  </a>
  </li>';
}
    for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
    {
     //On va faire notre condition
     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
     {
      echo ' <li class="active disabled">
      <span style="z-index:0">
      <span aria-hidden="true">'.$i.'</span>
      </span>'; 
    }  
     else //Sinon...
     {
      echo ' 
      <li>
      <a href="news.php?page='.$i.'">
      <span aria-hidden=\"true\">'.$i.'</span>
      </a>
      </li>';
    }
  }
  if($pageActuelle<$nombreDePages){
    echo"  <li>";
    echo '<a href="news.php?page='.$fPage.'" aria-label="Suivante">';echo"
    <span aria-hidden=\"true\">&raquo;</span>
    </a>
    </li>";
  }
  echo"
  </ul>
  </nav></center>";


  ?>

