<?php include('./header_html.php');?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php 
include ("./php/connection.php");
$id = intval ($_SESSION['id']);
echo" 

<section id=\"latest-post\" class=\"latest-post\" style=\"padding-top: 40px;\">
<div class=\"container\"  style=\"width:80%\">
<div class=\"post-area\" style=\"width:100%\">
<div class=\"post-area-top text-center\">
<h2 class=\"post-area-title\">Contacts</h2>
<p class=\"title-description\">Vos contacts</p>
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
<br/>
<div class=\"container\">";

$idsContacts[0]='';
$picturesDataC='';
$i=0;

$reqC="SELECT idUserA FROM contacts where idUserB=".$_SESSION['id'];
$retC = mysqli_query ($cnx,$reqC) or die (mysql_error ());
while($colC = mysqli_fetch_row ($retC)){
  $idsContacts[$i]=$colC[0];
  $i = $i + 1;
}  

$reqC="SELECT idUserB FROM contacts where idUserA=".$_SESSION['id'];
$retC = mysqli_query ($cnx,$reqC) or die (mysql_error ());
while($colC = mysqli_fetch_row ($retC)){
  $idsContacts[$i]=$colC[0];
  $i = $i + 1;
}   

foreach($idsContacts as $idC)
{     
  $reqM="SELECT Pseudo, Prenom, Nom, mail FROM users where idUser=".$idC;
  $retM = mysqli_query ($cnx,$reqM) or die (mysql_error ());

  $reqI = "SELECT i.imageData
  FROM profilepictures i
  WHERE i.idUser=".$idC;
  $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
  $colI = mysqli_fetch_row ($retI);
  if ($colI[0]){
    $picturesDataC=$colI[0];
  }
  else{
    $picturesDataC=false;
  } 

  $reqD="SELECT date FROM contacts where idUserA=".$_SESSION['id']." AND idUserB=".$idC." OR idUserA=".$idC." AND idUserB=".$_SESSION['id'];
  $retD= mysqli_query ($cnx,$reqD) or die (mysql_error ());
  $colD = mysqli_fetch_row ($retD);

  echo"<div class=\"container\" style=\"width:80%\">
  <div class=\"row\">
  <div class=\"[ col-xs-12 col-sm-offset-2 col-sm-8 ]\">
  <ul class=\"event-list contact\">";
  while($colM = mysqli_fetch_row ($retM)){

    echo"<li onclick=\"contactHeader(".$idC.")\">";

    if($picturesDataC!=false){
     echo"<img class=img-responsive style=\"max-height:100%\" src=\"data:image/gif;base64,".base64_encode( $picturesDataC ).'"/>';
   }
   else{
    echo"<img class=img-responsive style=\"max-height:100%\" src=\"./images/members/unknown_g.png\"/>";
  }
  echo"
  <div class=\"info\">
  <h2 class=\"title\">".$colM[0]."</h2>
  <p class=\"desc\">".$colM[1]." - ".$colM[2]."</p>
  <p class=\"desc\">".$colM[3]."</p>
  <p class=\"desc\">En contact depuis le ".$colD[0]."</p>
  <p data-toggle=\"modal\" href=\"#myModal\" id=\"modellink\"> Modal</p>
  </div>
  </li>";
}

echo"
</ul>
</div>
</div>
</div>";
}
echo "</div></div></section>
<!-- end .content --></div> 
</div>
</div>
</div>
";

?>

<div class="container ">
<div class="jumbotron"><a class="btn btn-primary pull-right" data-toggle="modal" href="#myModal" id="modellink">Show Modal</a></div>
<div class="modal-container" ></div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    var url = "./php/modalbox.php";
    jQuery('#modellink').click(function(e) {
        $('.modal-container').load(url,function(result){
        $('#myModal').modal({show:true});
      });
    });
  });
</script>
<?php include('./footer_html.php');?>