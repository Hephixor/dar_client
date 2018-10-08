<?php
include ("./php/connection.php");

if(isset($_GET['idArtiste'])){
  $id = intval($_GET['idArtiste']);
}
else{
  echo "ID d'artiste inconnu";
}

$messagesParPage=10; //Nous allons afficher 20 messages par page.

//Une connexion SQL doit être ouverte avant cette ligne...
$retour_total=mysqli_query($cnx, 'SELECT COUNT(*) AS total FROM albums where idArtiste='.$id); //Nous récupérons le contenu de la requête dans $retour_total
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

$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire

// La requête sql pour récupérer les messages de la page actuelle.
$req = "SELECT a.idAlbum, a.titreAlbum, a.idLabel, a.dateSortie, a.dateParution, ar.nomArtiste, a.idImage
FROM albums a, artistes ar
WHERE ar.idArtiste = a.idArtiste AND a.idArtiste=".$id."
ORDER BY a.dateSortie DESC LIMIT ".$messagesParPage." OFFSET ".$premiereEntree;

$retour_messages=mysqli_query($cnx,$req);
echo " 
<section id=\"our-team\" style=\"margin-top:-150px;width:100%;\">
    <div class=\"container\">
      <!-- <div class=\"row\">
        <div class=\"col-md-12\">
          <div class=\"section-title\">
            <h1>Chroniques</h1>
            <span class=\"st-border\"></span>
          </div>
        </div>
        </div>-->
";
  $count=0;

while($col=mysqli_fetch_row($retour_messages)) // On lit les entrées une à une grâce à une boucle
{  
          $artiste=$col[2];
          $album=$col[1];

          $req2 = "SELECT idImage, typeImage, imageData FROM images WHERE idImage = " . $col[6];
          $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
          $col2 = mysqli_fetch_row ($ret2);

          if (!$col2[0] ){
              echo "Id d'image inconnu";
          } 
          else {

$count = $count + 1;            
        if($count%4==1){

              echo " </div>
              <div class=\"container\">";
              echo "<div class=\"col-md-3 col-sm-6\">
          <div class=\"team-member\">
            <div class=\"member-image\">";
              echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode( $col2[2] ).'"/>';
              echo "<div class=\"member-social\">
                <a class=\"btn btn-lg btn-chronique\" href=\"./album.php?idAlbum=".$col[0]."\" role=\"button\">Voir</a>
              </div>
            </div>
            <div class=\"member-info\">
              <h4>".$album."</h4>
            </div>
          </div>
        </div>";
            }
            else {

            //fonctionne sans les images
         /*  echo ' <div class="col-md-3 col-sm-6">
          <div class="team-member">
            <div class="member-image">
              <img class="img-responsive" src="images/members/team1.jpg" alt="">
              <div class="member-social">
                <a class="btn btn-lg btn-chronique" href="./chronique.php?idChronique='.$col[0].'"role="button">Lire</a>
              </div>
            </div>
            <div class="member-info">
             <h4>'.$album.'</h4>
              <a href=\"artiste.php?idArtiste='.$idArtiste.'\"><span class=\"author-name\">'.$artiste.'</span></a>
            </div>
          </div>
        </div>'; */

        //organisé avec les images
          echo "<div class=\"col-md-3 col-sm-6\">
          <div class=\"team-member\">
            <div class=\"member-image\">";
              echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode( $col2[2] ).'"/>';
              echo "<div class=\"member-social\">
               <a class=\"btn btn-lg btn-chronique\" href=\"./album.php?idAlbum=".$col[0]."\" role=\"button\">Voir</a>
              </div>
            </div>
            <div class=\"member-info\">
              <h4>".$album."</h4>
            </div>
          </div>
        </div>";
}
        
         
          }
         }
echo "
        
    </div>
  </section>";

echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
     {
       echo ' [ '.$i.' ] '; 
     }  
     else //Sinon...
     {
      echo ' <a href="albumsdelartiste.php?idArtiste='.$id.'&page='.$i.'">'.$i.'</a> ';
    }
  }
  echo '</p>';

  ?>


