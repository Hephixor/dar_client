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

if($_REQUEST['first_name'] == '' || $_REQUEST['contact_email'] == '' ||  $_REQUEST['message'] == ''):
  return "error";
endif;
if (filter_var($_REQUEST['contact_email'], FILTER_VALIDATE_EMAIL)):
  $subject = 'Email from Trip-Hop.Net'; // Subject of your email

  // Receiver email address
  $to = 'theminitrash@gmail.com';  //Change the email address by yours
 

  // prepare header
  $header = 'From: '. $_REQUEST['first_name'] . " " .$_REQUEST['first_name'] . ' <'. $_REQUEST['contact_email'] .'>'. "\r\n";
  $header .= 'Reply-To:  '. $_REQUEST['first_name'] . " " .$_REQUEST['first_name'] . ' <'. $_REQUEST['contact_email'] .'>'. "\r\n";
  // $header .= 'Cc:  ' . 'example@domain.com' . "\r\n";
  // $header .= 'Bcc:  ' . 'example@domain.com' . "\r\n";
  $header .= 'X-Mailer: PHP/' . phpversion();


  $message = 'Name: ' . $_REQUEST['first_name'] . "\n";
  $message .= 'Email: ' . $_REQUEST['contact_email'] . "\n";
  $message .= 'Subject: ' . $_REQUEST['subject'] . "\n";
  $message .= 'Message: '. $_REQUEST['message'];

  // Send contact information
  $mail = mail( $to, $subject , $message, $header );

  redirect($_SERVER['HTTP_REFERER']);
  else:
    return "error";
  endif; 

?>