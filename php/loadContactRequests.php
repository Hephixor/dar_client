<?php 
include ("connection.php");
$id = intval ($_SESSION['id']);
echo" 

<section id=\"latest-post\" class=\"latest-post\" style=\"padding-top: 40px;\">
    <div class=\"container\"  style=\"width:80%\">
    <div class=\"post-area\" style=\"width:100%\">
      <div class=\"post-area-top text-center\">
        <h2 class=\"post-area-title\">Demandes Contact</h2>
        <p class=\"title-description\">Demandes de contact</p>
      </div><!-- /.post-area-top -->
    
    </div><!-- /.row -->
  </div><!-- /.post-area -->
<!-- </div> /.container -->
</section><!-- /#latest-post -->  
<section id=\"pricing\" style=\"margin-top:-30px; padding-top:0px\">
<div class=\"container\" style=\"width:100%\">
<div class=\"row\" style=\"width:80%\">
<div class=\"col-md-12\">
</div>
</div>
</div>
<div class=\"container\" style=\"width:80%\">";
$count=0;
$req = "SELECT d.idUserA, d.idUserB 
FROM demandescontact d
WHERE d.idUserB=".$id." AND d.status!=2";
$ret = mysqli_query ($cnx,$req) or die (mysql_error ());

if($ret->num_rows!=0){
while(  $col = mysqli_fetch_row ($ret)){

  $count = $count + 1;

  if($count==4){
   $reqC = "SELECT u.idUser, u.Pseudo, u.Prenom, u.Nom, u.mail
   FROM users u
   WHERE u.idUser=".$col[0];
   $retC = mysqli_query ($cnx,$reqC) or die (mysql_error ());
   $colC = mysqli_fetch_row ($retC);
   echo "</div></div></div>
   <div class=\"container\" style=\"width:80%\">    
   <div class=\"col-sm-4\" >
   <div class=\"st-pricing text-center\"style=\"border-radius: 3px\">
   <h6>".$colC[2]." ".$colC[3]."</h6>
   <h3>".$colC[1]."</h3>
   <div class=\"st-border\"></div>
   <p style=\"word-wrap:break-word\">".$colC[4]."</p>
   <a  class=\"btn btn-lg btn-addC\" href=\"./php/acceptContact.php?idUser=".$colC[0]."\" role=\"button\">Accepter</a>
   <a class=\"btn btn-lg btn-denyC\" href=\"./php/denyContact.php?idUser=".$colC[0]."\" role=\"button\">Refuser</a>
   </div></div> ";
 }
 else {
   $reqC = "SELECT u.idUser, u.Pseudo, u.Prenom, u.Nom, u.mail
   FROM users u
   WHERE u.idUser=".$col[0];
   $retC = mysqli_query ($cnx,$reqC) or die (mysql_error ());
   $colC = mysqli_fetch_row ($retC);

   echo"<div class=\"col-sm-4\">
   <div class=\"st-pricing text-center\"style=\"border-radius: 3px\">
   <h6>".$colC[2]." ".$colC[3]."</h6>
   <h3>".$colC[1]."</h3>
   <div class=\"st-border\"></div>
   <p style=\"word-wrap:break-word\">".$colC[4]."</p>
   <a  class=\"btn btn-lg btn-chronique btn-addC\" href=\"./php/acceptContact.php?idUser=".$colC[0]."\" role=\"button\">Accepter</a>
   <a class=\"btn btn-lg btn-chronique btn-denyC\" href=\"./php/denyContact.php?idUser=".$colC[0]."\" role=\"button\">Refuser</a>
   </div></div>";


 }
} 
}
else{
echo "<center><p class=\"title-description\">Aucune demande de contact.</p></center>";

}
echo "</div></div></section>
  <!-- end .content --></div> 
    </div>
</div>
</div>
";

?>