<?php
require_once("header_html.php");

 echo
"<script  type=\"text/javascript\">
function masquer_div(id)
{
  if (document.getElementById(id).style.display == 'none')
  {
       document.getElementById(id).style.display = 'block';
  }
  else
  {
       document.getElementById(id).style.display = 'none';
  }
}
</script>

<section class=\"about\">
 <div class=\"container\">
  <div class=\"about-area\">
   <div class=\"title-area text-center\">
    <h2 class=\"about-title\">Inscription</h2>
    <p class=\"title-description\"><br/></p>
  </div><!-- /.title-area -->
  <div class=\"about-items\" style=\"width: 100%;\">
     
    <div class=\"col-sm-4\">
    </div>

 <div class=\"col-sm-4\">
   <div class=\"item\">
    <div class=\"item-top\"  style=\"border-bottom: 0px solid #d7dee0;\">
     <h3 class=\"item-title\"></h3>
     <h4 class=\"sub-title\">Informations</h4>
   </div><!-- /.item-top -->
   <p class=\"item-description\" style=\"margin-top:-25px\">
 <center>
<form class=\"formulaire\" action=\"./php/inscription.php\" method=\"post\">
    <p class=\"field\"><input name=\"pseudo\" placeholder=\"Pseudo\" type=\"text\" /><i class=\"icon-user icon-large\"></i></p>
    <p class=\"field\"><input name=\"prenom\" placeholder=\"Prénom\" type=\"text\" /><i class=\"icon-user icon-large\"></i></p>
    <p class=\"field\"><input name=\"nom\" placeholder=\"Nom\" type=\"text\" /><i class=\"icon-user icon-large\"></i></p>
    <p class=\"field\"><input name=\"mail\" placeholder=\"Mail\" type=\"text\" /><i class=\"icon-user icon-large\"></i></p>
    <p class=\"field\"><input name=\"adresse\" placeholder=\"Adresse\" type=\"text\" /><i class=\"icon-user icon-large\"></i></p>
    <p class=\"field\"><input name=\"password\" placeholder=\"Mot de passe\" type=\"password\" /><i class=\"icon-lock icon-large\"></i></p>
    <p class=\"field\"><input name=\"password2\" placeholder=\"Confirmation\" type=\"password\" /><i class=\"icon-lock icon-large\"></i></p>
   <button class=\"buttonFancy\" \"type=\"submit\" name=\"submit\" style=\"padding: 0;margin: 0;padding-top: 3px;border-radius:3px; font-size:12px;\" ><span>    S'inscrire    </span></button>
</form>
</center>   
 </div>
</div>
 </div>

</div>
 </div>
</div><!-- /.about-items -->
</div><!-- /.about-area -->
</div><!-- /.container -->
</section><!-- /#about -->
<br/><br/>"; 

 include("footer_html.php"); ?>