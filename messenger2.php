  <?php

if (!function_exists('redirect')) {

function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}
}
  //session_start();
  include ("./php/connection.php");
  if (isset($_SESSION['id'])){
 
    $req = "select Pseudo from users where idUser=".$_SESSION['id'];
    $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
    $col = mysqli_fetch_row ($ret);
    if(!$col[0]){
      //redirect('./404.php');
    }
    else{
      $userName = $col[0];

      $bImage = false;
      $reqIm = "SELECT i.imageData FROM profilepictures i WHERE idUser=".$_SESSION['id'];
      $retIm = mysqli_query ($cnx,$reqIm) or die (mysql_error ());
      $colIm = mysqli_fetch_row ($retIm);
      if($colIm[0]){
        $bImage=true;
        $pp = $colIm[0];
      }

      $req2 = "select idUserB, pseudoUserB from contacts where idUserA=".$_SESSION['id'];
      $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
      $cpt = 0;
      $contactsIds[0]='init';
      while($col2 = mysqli_fetch_row ($ret2))
      {
        $contactsIds[$cpt] = $col2[0];
        $pseudoUsersB[$cpt] = $col2[1];
        $cpt = $cpt + 1;
      } 
      echo "<script>
      sessionStorage.setItem('username', '".$userName."');
      </script>

      <link rel='stylesheet prefetch' href='http://cdn.materialdesignicons.com/1.1.70/css/materialdesignicons.min.css'>
      <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:300'>
      
      <link rel=\"stylesheet\" href=\"./assets/css/testmessenger.css\">


      <style id=\"dynamic-styles\"></style>
      <div id=\"hangout\" class=\"collapsed\">  
      <div id=\"head\" class=\"style-bg\"> <i class=\"mdi mdi-arrow-left\"></i> <i class=\"mdi mdi-fullscreen-exit\"></i> <i class=\"mdi mdi-menu\"></i> 
      <h1>".$userName."</h1><i class=\"mdi mdi-chevron-up\"></i></div>  
      <div id=\"content\">
      <div class=\"overlay\"></div>

      <div id=\"floater-position\">
      <div id=\"add-contact-floater\" class=\"floater control style-bg hidden\"><i class=\"mdi mdi-plus\"></i></div>          
      <div id=\"chat-floater\" class=\"floater control style-bg hidden\"><i class=\"mdi mdi-comment-text-outline\"></i></div>   
      </div>


      <div class=\"card menu\">
      <div class=\"header\">";
      if($bImage == true){
       echo '<center><img class=img-responsive src="data:image/jpeg;base64,'.base64_encode($pp).'"/></center>';
     }
     else{
      echo "<center><img src=\"./images/members/unknown.png\" /></center>";
    }
    echo"
    <h3></h3>
    </div>
    <div class=\"content\">

    <div class=\"i-group\">
    <input type=\"text\" id=\"username\"><span class=\"bar\"></span>
    <label>Nom</label>
    </div>        
    <div class=\"center\"><canvas id=\"colorpick\" width=\"250\" height=\"220\" ></canvas></div>                        
    </div>
    </div> 
    <div class=\"list-account\">
    <div class=\"meta-bar\"><input class=\"nostyle search-filter\" type=\"text\" placeholder=\"Recherche\" /></div>
    <ul class=\"list mat-ripple hangouts\">";

    if($cpt == 0){
      echo "<br/><center>Aucun contact.</center>";
    }
    else {
     $i=0;  
     foreach($contactsIds as $idCc)
     {
       $req3 = "SELECT Pseudo from users where idUser=".$idCc;
       $ret3 = mysqli_query ($cnx,$req3) or die (mysql_error ());
       $col3 = mysqli_fetch_row ($ret3);
       $pseudoContacts[$i]=$col3[0];

       $reqI = "SELECT i.imageData
       FROM profilepictures i
       WHERE i.idUser=".$idCc;
       $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
       $colI = mysqli_fetch_row ($retI);

       if ($colI[0] ){
        $profilepictures[$i] = $colI[0];
      }
      else{
        $profilepictures[$i]='';
      }

      $i++;
    }
    $j=0;
    while($j<$i){
      echo "<li class=\"hangouts\" ><span class=\"idUserB\" style=\"display:none\">".$contactsIds[$j]."</span>";
      if($profilepictures[$j]==''){
       echo"<img src=\"./images/members/unknown.png\">";
     }
     else{
      echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode( $profilepictures[$j]).'"/>';
    }
    if($pseudoUsersB[$j]==''){
      echo "<span class=\"name\">".$pseudoContacts[$j]."</span><i class=\"mdi mdi-menu-down\"></i> </li>";
    }
    else{
     echo "<span class=\"name\">".$pseudoUsersB[$j]."</span><i class=\"mdi mdi-menu-down\"></i> </li>";
   }
   $j++;
 }
}

     //echo "<li><img src=\"#\"><span class=\"name\">Angie</span><i class=\"mdi mdi-menu-down\"></i> </li>";

echo "
</ul> 
</div>
<div class=\"list-text\">
<ul class=\"list mat-ripple hangouts\">";


$query= "SELECT u.idUser,c.c_id,u.Pseudo,u.mail
 FROM conversation c, users u
 WHERE CASE 
 WHEN c.user_one =".$_SESSION['id']."
 THEN c.user_two = u.idUser
 WHEN c.user_two =".$_SESSION['id']."
 THEN c.user_one= u.idUser
 END 
 AND (
 c.user_one =".$_SESSION['id']."
 OR c.user_two =".$_SESSION['id']."
 )
 Order by c.c_id DESC Limit 20";
//var_dump($query);
$ret = mysqli_query ($cnx,$query) or die (mysql_error ());

while($row=mysqli_fetch_array($ret,MYSQLI_ASSOC))
{
$c_id=$row['c_id'];
$user_id=$row['idUser'];
$username=$row['Pseudo'];
$email=$row['mail'];
$cquery= "SELECT R.cr_id,R.time,R.reply FROM conversation_reply R WHERE R.c_id_fk=".$c_id." ORDER BY R.cr_id DESC LIMIT 1";

$cret = mysqli_query ($cnx,$cquery) or die (mysql_error ());
$crow=mysqli_fetch_array($cret,MYSQLI_ASSOC);
$cr_id=$crow['cr_id'];
$reply=$crow['reply'];
$time=$crow['time'];

 $reqIM = "SELECT i.imageData
       FROM profilepictures i
       WHERE i.idUser=".$user_id;
       $retIM = mysqli_query ($cnx,$reqIM) or die (mysql_error ());
       $colIM = mysqli_fetch_row ($retIM);

     if(!$colIM[0]){
    $bprofilepicture = false;
  }
  else{
    $profilepicturedata = $colIM[0];
    $bprofilepicture= true;
  }


echo "<li class=\"hangouts\">";
 if($bprofilepicture==false){
       echo"<img src=\"./images/members/unknown.png\">";
     }
     else{
      echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode($profilepicturedata).'"/>';
    }
echo"
<div class=\"content-container\">
<span class=\"name\">".$username."</span>
<span class=\"txt\">".$reply."</span>
</div>
<span class=\"time\">".$time."</span>
</li> ";   

}

//var_dump($crow);

/* $req = "SELECT cr_id,time,reply
FROM conversation_reply R
WHERE R.c_id_fk=1
ORDER BY cr_id DESC LIMIT 1";
$ret1 = mysqli_query ($cnx,$req) or die (mysql_error ());
$row1=mysqli_fetch_array($ret1,MYSQLI_ASSOC);
var_dump($row1);
*/

echo "
</ul> 
</div>";

/*
<div class=\"list-phone\">
<div class=\"meta-bar\"><input class=\"nostyle search-filter\" type=\"text\" placeholder=\"Name, phone number\" /></div>
<ul class=\"list mat-ripple\">      
<li><img src=\"#\">
<div class=\"content-container\">
<span class=\"name\">Angie</span>
<span class=\"phone\">000-555-28175</span>
<span class=\"meta\">Mobile</span>
</div>
<span class=\"time\">
2015-01-01 03:35
</span>
</li>      
<li><img src=\"#\">
<div class=\"content-container\">
<span class=\"name\">Bert</span>
<span class=\"phone\">666-222-11433</span>
<span class=\"meta\">Main</span>
</div>
<span class=\"time\">
2015-01-01 03:35
</span>
</li>   
</ul> 
</div>
*/
echo"
<div class=\"list-chat\">
<ul class=\"chat hangouts\">

<!-- one chat -->
<li class=\"hangouts\">
<img src=\"./images/members/unknown.png\">
<div class=\"message\">ERf</div>
</li>

<li class=\"hangouts\">
<img src=\"#\">
<div class=\"message\"></div>
</li>
<li class=\"hangouts\">
<img src=\"./images/members/unknown.png\">
<div class=\"message current\">...</div>
</li>
</ul>
<div class=\"meta-bar chat\"><input class=\"nostyle chat-input\" type=\"text\" placeholder=\"Message...\" /> <i class=\"mdi mdi-send\"></i></div>
</div>
<ul class=\"nav control mat-ripple tiny hangouts\">

<li class=\"hangouts\" data-route=\".list-account\"><i class=\"mdi mdi-account-multiple\"></i></li><li class=\"hangouts\" data-route=\".list-text\"><i class=\"mdi mdi-comment-text\"></i></li><li class=\"hangouts\" data-route=\".list-phone\"><i class=\"mdi mdi-phone\"></i></li></ul>
</div>  

<div id=\"contact-modal\" data-mode=\"add\" class=\"card dialog\">
<h3>Add Contact</h3>
<div class=\"i-group\">
<input type=\"text\" id=\"new-user\"><span class=\"bar\"></span>
<label>Name</label>
</div>
<div class=\"btn-container\" >
<span class=\"btn cancel\" style=\"margin-top:-15px;\">Cancel</span>
<span class=\"btn save\" style=\"margin-top:-15px;\">Save</span>  
</div>

</div>

</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script  src=\"js/testindex.js\"></script>";
}
}
else {
 //header('location:./404.php');
}
?>


<?php
 //  include("footer_html.php"); 
?>
