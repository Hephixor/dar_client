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
session_start();
// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();
redirect('../index.php');
?>