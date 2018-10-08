<?php require_once("header_html.php"); ?>
<script type="text/javascript">
function contactHeader(id){
  location = "./membre.php?idMembre=" + id;
}
</script>
<?php  
  if(isset($_SESSION['id'])){
  $reqD ="SELECT COUNT(idUserB) FROM demandescontact WHERE idUserB=".$_SESSION['id']." AND status!=2";
  $retD = mysqli_query ($cnx,$reqD) or die (mysql_error ());
  $colD = mysqli_fetch_row ($retD);     
  if($colD[0]!=0){
    include("./php/loadContactRequests.php");
  }
}
include("./php/loadContacts.php");
require_once("footer_html.php");
?>

