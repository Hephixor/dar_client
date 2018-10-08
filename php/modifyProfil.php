<?php

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
include ("connection.php");
$id = $_POST['idMembre'];
$req2 = "Update users set";

      /*  if ( isset($_POST['pseudo']) && $_POST['pseudo']!='' ){
          $req2.=" Pseudo='".$_POST['pseudo']."',";
        }*/
        if ( isset($_POST['prenom']) && $_POST['prenom']!=''){
          $req2.="  Prenom='".$_POST['prenom']."',";
        }
        if ( isset($_POST['nom']) && $_POST['nom']!=''){
          $req2.=" Nom='".$_POST['nom']."',";
        }
        if ( isset($_POST['adresse']) && $_POST['adresse']!=''){
         $req2.=" Adresse='".$_POST['adresse']."',";
       } 
       if ( isset($_POST['mail']) && $_POST['mail']!=''){
        $req2.=" Mail='".$_POST['mail']."',";
      }

      if ( isset($_POST['pwd'])&& $_POST['pwd']!=''){
       if ( isset($_POST['pwd2'])&& $_POST['pwd2']!=''){
         if ( $_POST['pwd']==$_POST['pwd2']){
          var_dump($_POST['pwd']);
          var_dump($_POST['pwd2']);
          $pwd=md5($_POST['pwd']); 
          $req2.=" Password='".$_POST['Password']."',";
        }
        else {
          echo "Les deux mots de passe renseignés sont différents.";
          redirect('../gestion.php?idMembre='.$id);
        }
      }
    }

    $req2.=" idUser = ".$id;
    $req2.=" where idUser =".$id;


    var_dump($req2);
    if (mysqli_query($cnx, $req2)) { 
      echo "New record created successfully";
      redirect('../membre.php?idMembre='.$id);
    } 
    else {
      echo "Error: " . $req2 . "<br>" . mysqli_error($cnx);
    }
    
    
    ?>    