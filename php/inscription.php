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
         if ( $_POST['password']==$_POST['password2']){
             $pseudo=$_POST['pseudo'];
             $pwd=md5($_POST['password']);
             $prenom=$_POST['prenom'];
             $nom=$_POST['nom'];
             $adresse=$_POST['adresse'];
             $mail=$_POST['mail'];

              $req2 = "INSERT INTO users (idUser, Pseudo, Prenom, Nom, Adresse, Password, Mail) 
              VALUES (NULL,'".$pseudo."','".$prenom."','".$nom."','".$adresse."','".$pwd."','".$mail."');";

              if (mysqli_query($cnx, $req2)) { 
                  echo "New record created successfully";
                  redirect('../index.php');
                  } else {
                  echo "Error: " . $req2 . "<br>" . mysqli_error($cnx);
              }
        }
      else {echo "Les deux mots de passe renseignés sont différents.";}
        ?>