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
       if ( isset($_POST['login']) ){
         if ( isset($_POST['password']) ){
          
             $pwd=md5($_POST['password']);
             $req = "select count(1) FROM users Where Pseudo='".$_POST['login']."' AND Password='".$pwd."'";
         
            $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
           while ( $col = mysqli_fetch_row ($ret) )
           {
            if($col[0]<>1){
              echo "Problème d'authentificaton";
              header('location:../index.php');
          }
            else{
               $req2 = "select Pseudo, idUser, isAdmin FROM users Where Pseudo='".$_POST['login']."' AND Password='".$pwd."'";
            $ret2 = mysqli_query ($cnx,$req2) or die (mysql_error ());
           while ( $col2 = mysqli_fetch_row ($ret2) )
           {
              session_start();
              $_SESSION['logged_in'] = true ;
              $_SESSION["pseudo"] = $col2[0];
              $_SESSION['id'] = $col2[1];
              $_SESSION['isAdmin'] = $col2[2];
              echo "<script>sessionStorage.setItem('username', ".$col[2].");</script>";

            redirect('../index.php');
            }
            
          }
        }
      }
    }
      else {echo "Veuillez renseigner les champs Login et Password.";}
        ?>