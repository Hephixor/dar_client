<?php
require_once("header_html.php");
if(isset($_GET['s']) && $_GET['s']!=''){
	include ("./php/search.php");
}
else{
	echo "<script type='text/javascript'>document.location.replace('404.php');</script>";
}
require_once("footer_html.php");
?>