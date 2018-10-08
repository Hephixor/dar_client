<?php
include ("./php/connection.php");


$messagesParPage=20; //Nous allons afficher 20 messages par page.

//Une connexion SQL doit être ouverte avant cette ligne...
$retour_total=mysqli_query($cnx, 'SELECT COUNT(*) AS total FROM chroniques'); //Nous récupérons le contenu de la requête dans $retour_total
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
  }
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1   
}
$pPage = $pageActuelle-1;
 $fPage = $pageActuelle+1;
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire

// La requête sql pour récupérer les messages de la page actuelle.
$req = "SELECT DISTINCT c.idChronique,a.titreAlbum, ar.nomArtiste, c.dateParution, u.Pseudo, l.nomLabel, a.dateSortie, a.idImage, c.contenu, i.imageData, ar.idArtiste
FROM chroniques c, albums a, artistes ar, images i, labels l, users u
WHERE a.idAlbum = c.idAlbum
AND ar.idArtiste = a.idArtiste
AND u.IdUser = c.idRedacteur
AND l.idLabel = a.idLabel
AND i.idImage = a.idImage
ORDER BY c.dateParution DESC LIMIT ".$messagesParPage." OFFSET ".$premiereEntree;

$retour_messages=mysqli_query($cnx,$req);

echo " <section id=\"our-team\" style=\"margin-top:-150px;width:100%;\">";
$count=0;

echo"<div class=\"row\">";
while($col=mysqli_fetch_row($retour_messages)) // On lit les entrées une à une grâce à une boucle
{
  $imageData = $col[9];   
  $artiste=$col[2];
  $album=$col[1];
  $idChronique=$col[0];
  $idArtiste=$col[10];

  $req2 = "SELECT idImage, typeImage, imageData FROM images WHERE idImage = " . $col[7];
  $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
  $col2 = mysqli_fetch_row ($ret2);

  if (!$col2[0] ){
    echo "Id d'image inconnu";
  } 
  else {
    /*  echo "<div class=\"col-sm-4\" style=\"width:25%;\">
      <div class=\"team-member\">
      <div class=\"member-image\">";
      echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode( $col2[2] ).'"/>';
      echo "<div class=\"member-social\">
      <a class=\"btn btn-lg btn-chronique\" href=\"./chronique.php?idChronique=".$col[0]."\" role=\"button\">Lire</a>
      </div>
      </div>
      <div class=\"member-info\">
      <h4>".$album."</h4>

      <a href=\"artiste.php?idArtiste=".$idArtiste."\"><span class=\"author-name\">".$artiste."</span></a>
      </div>
      </div>
      </div>";*/

      echo "   <div class=\"row\">   <div class=\"container\">";
      echo"";
    $count = $count + 1;            
    if($count%4!=0 || $count = 4){

      echo "<div class=\"col-sm-4\" style=\"width:25%\">
      <div class=\"team-member\">
      <div class=\"member-image\">";
      echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode( $col2[2] ).'"/>';
      echo "<div class=\"member-social\">
      <a class=\"btn btn-lg btn-chronique\" href=\"./chronique.php?idChronique=".$col[0]."\" role=\"button\">Lire</a>
      </div>
      </div>
      <div class=\"member-info\">
      <h4>".$album."</h4>

      <a href=\"artiste.php?idArtiste=".$idArtiste."\"><span class=\"author-name\">".$artiste."</span></a>
      </div>
      </div>
      </div>";
    }
    else {
        //organisé avec les images
          echo "</div><div class=\"row\" style=\"width:25%\">";
          echo "<div class=\"col-sm-4\">
          <div class=\"team-member\">
          <div class=\"member-image\">";
          echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode( $col2[2] ).'"/>';
          echo "<div class=\"member-social\">
          <a class=\"btn btn-lg btn-chronique\" href=\"./chronique.php?idChronique=".$col[0]."\" role=\"button\">Lire</a>
          </div>
          </div>
          <div class=\"member-info\">
          <h4>".$album."</h4>
          <a href=\"artiste.php?idArtiste=".$idArtiste."\"><span class=\"author-name\">".$artiste."</span></a>
          </div>
          </div>
          </div>";
        } 

      }
        
    }
    echo "</div>
    </section>";

   echo "<center><nav aria-label=\"Page navigation\">
  <ul class=\"pagination\"> ";
   if($pageActuelle!=1){
    echo "<li>";
      echo'<a href="chroniques.php?page='.$pPage.'" aria-label="Précedente">
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
      <a href="chroniques.php?page='.$i.'">
      <span aria-hidden=\"true\">'.$i.'</span>
      </a>
      </li>';
     }
    }
    if($pageActuelle<$nombreDePages){
    echo"  <li>";
    echo '<a href="chroniques.php?page='.$fPage.'" aria-label="Suivante">';echo"
    <span aria-hidden=\"true\">&raquo;</span>
    </a>
    </li>";
  }
  echo"
    </ul>
    </nav></center>";

  ?>


