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
  session_start();
  include ("./php/connection.php");
  if (isset($_SESSION['id'])){
 
    $req = "select Pseudo from users where idUser=".$_SESSION['id'];
    $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
    $col = mysqli_fetch_row ($ret);
    if(!$col[0]){
      redirect('./404.php');
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
      
      <link rel=\"stylesheet\" href=\"./assets/css/messenger.css\">


      <style id=\"dynamic-styles\"></style>
      <div id=\"hangout\">  
      <div id=\"head\" class=\"style-bg\"> <i class=\"mdi mdi-arrow-left\"></i> <i class=\"mdi mdi-fullscreen-exit\"></i> <i class=\"mdi mdi-menu\"></i> 
      <h1>".$userName."</h1><i class=\"mdi mdi-chevron-down\"></i></div>  
      <div id=\"content\">
      <div class=\"overlay\"></div>

      <div id=\"floater-position\">
      <div id=\"add-contact-floater\" class=\"floater control style-bg hidden\"><i class=\"mdi mdi-plus\"></i></div>          
      <div id=\"chat-floater\" class=\"floater control style-bg hidden\"><i class=\"mdi mdi-comment-text-outline\"></i></div>   
      </div>


      <div class=\"card menu\">
      <div class=\"header\">";
      if($bImage == true){
       echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode($pp).'"/>';
     }
     else{
      echo "<img src=\"https://s8.postimg.org/76bg2es2t/index.png\" />";
    }
    echo"
    <h3></h3>
    </div>
    <div class=\"content\">

    <div class=\"i-group\">
    <input type=\"text\" id=\"username\"><span class=\"bar\"></span>
    <label>Nom</label>
    </div>        
    <br />
    <div class=\"center\"><canvas id=\"colorpick\" width=\"250\" height=\"220\" ></canvas></div>                        
    </div>
    </div> 
    <div class=\"list-account\">
    <div class=\"meta-bar\"><input class=\"nostyle search-filter\" type=\"text\" placeholder=\"Search\" /></div>
    <ul class=\"list mat-ripple\">";

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
      echo "<li><span class=\"idUserB\" style=\"display:none\">".$contactsIds[$j]."</span>";
      if($profilepictures[$j]==''){
       echo"<img src=\"https://s8.postimg.org/76bg2es2t/index.png\">";
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
<ul class=\"list mat-ripple\">";


$reqM = "SELECT idUserA, idUserB, date, contenu from messages where idUserA=".$_SESSION['id']." or idUserB=".$_SESSION['id']." AND idUserA < idUserB ORDER BY date DESC LIMIT 1";
$retM = mysqli_query ($cnx,$reqM) or die (mysql_error ());
$colM = mysqli_fetch_row ($retM);

if($colM[0]==$_SESSION['id']){
  $reqPM = "SELECT Pseudo from users where idUser=".$colM[1];
  $retPM = mysqli_query ($cnx,$reqPM) or die (mysql_error ());
  $colPM = mysqli_fetch_row ($retPM);

  $reqI = "SELECT i.imageData
  FROM profilepictures i
  WHERE i.idUser=".$colM[1];
  $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
  $colI = mysqli_fetch_row ($retI);
  if(!$colI[0]){
    $bprofilepicture = false;
  }
  else{
    $profilepicturedata = $colI[0];
    $bprofilepicture= true;
  }
}
else{
  $reqPM = "SELECT Pseudo from users where idUser=".$colM[0];
  $retPM = mysqli_query ($cnx,$reqPM) or die (mysql_error ());
  $colPM = mysqli_fetch_row ($retPM);

  $reqI = "SELECT i.imageData
  FROM profilepictures i
  WHERE i.idUser=".$colM[0];
  $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
  $colI = mysqli_fetch_row ($retI);
  if(!$colI[0]){
    $bprofilepicture = false;
  }
  else{
    $profilepicturedata = $colI[0];
    $bprofilepicture= true;
  }

}


echo "<li>";
 if($bprofilepicture==false){
       echo"<img src=\"https://s8.postimg.org/76bg2es2t/index.png\">";
     }
     else{
      echo '<img class=img-responsive src="data:image/jpeg;base64,'.base64_encode($profilepicturedata).'"/>';
    }
echo"
<div class=\"content-container\">
<span class=\"name\">".$colPM[0]."</span>
<span class=\"txt\">".$colM[3]."</span>
</div>
<span class=\"time\">".date("m/d H:i",strtotime($colM[2]))."</span>
</li> ";   




echo "
</ul> 
</div>
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
<div class=\"list-chat\">
<ul class=\"chat\">
<li>
<img src=\"https://s8.postimg.org/76bg2es2t/index.png\">
<div class=\"message\">o hai!</div>
</li>
<li>
<img src=\"#\">
<div class=\"message\"></div>
</li>
<li>
<img src=\"https://s8.postimg.org/76bg2es2t/index.png\">
<div class=\"message current\">...</div>
</li>
</ul>
<div class=\"meta-bar chat\"><input class=\"nostyle chat-input\" type=\"text\" placeholder=\"Message...\" /> <i class=\"mdi mdi-send\"></i></div>
</div>
<ul class=\"nav control mat-ripple tiny\">

<li data-route=\".list-account\"><i class=\"mdi mdi-account-multiple\"></i></li><li data-route=\".list-text\"><i class=\"mdi mdi-comment-text\"></i></li><li data-route=\".list-phone\"><i class=\"mdi mdi-phone\"></i></li></ul>
</div>  

<div id=\"contact-modal\" data-mode=\"add\" class=\"card dialog\">
<h3>Add Contact</h3>
<div class=\"i-group\">
<input type=\"text\" id=\"new-user\"><span class=\"bar\"></span>
<label>Name</label>
</div>

<div class=\"btn-container\">
<span class=\"btn cancel\">Cancel</span>
<span class=\"btn save\">Save</span>      
</div>

</div>

</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script  src=\"js/index.js\"></script>";
}
}
else {
 redirect('./404.php');
}
?>


<?php
 //  include("footer_html.php"); 
?>
