<?php
require_once("header_html.php");

if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1){
                    echo "<section class=\"about\">
 <div class=\"container\">
  <div class=\"about-area\">
   <div class=\"title-area text-center\">
    <h2 class=\"about-title\">Administration</h2>
    <p class=\"title-description\">trip-hop.net</p>
  </div><!-- /.title-area -->
  <div class=\"about-items\" style=\"width: 100%;\">
    <div class=\"col-sm-4\">
     <div class=\"item\">
      <div class=\"item-top\">
       <h3 class=\"item-title\">Ajouter un artiste</h3>
       <h4 class=\"sub-title\">référencer un nouvel artiste</h4>
     </div><!-- /.item-top -->
     <p class=\"item-description\">
       Module d'ajout d'artiste dans la base.
     </p>
     <a class=\"btn\" href=\"./ajoutArtiste.php\">
       <span class=\"btn-icon\"><i class=\"fa fa-arrow-circle-right\"></i></span>
       Go !
     </a>
   </div><!-- /.item -->
 </div>
 <div class=\"col-sm-4\">
   <div class=\"item\">
    <div class=\"item-top\">
     <h3 class=\"item-title\">Ajouter un album</h3>
     <h4 class=\"sub-title\">référencer un nouvel album</h4>
   </div><!-- /.item-top -->
   <p class=\"item-description\">
     Module d'ajout d'album dans la base.
   </p>
   <a class=\"btn\" href=\"./ajoutAlbum.php\">
     <span class=\"btn-icon\"><i class=\"fa fa-arrow-circle-right\"></i></span>
     Go !
   </a>
 </div><!-- /.item -->
</div>
<div class=\"col-sm-4\">
 <div class=\"item\">
  <div class=\"item-top\">
   <h3 class=\"item-title\">Ajouter une chronique</h3>
   <h4 class=\"sub-title\">publier une chronique</h4>
 </div><!-- /.item-top -->
 <p class=\"item-description\">
   Module de rédaction et d'ajout de chroniques (publication automatique
 </p>
 <a class=\"btn\" href=\"./ajoutChronique.php\">
   <span class=\"btn-icon\"><i class=\"fa fa-arrow-circle-right\"></i></span>
   Go !
 </a>
</div><!-- /.item -->
</div>
</div><!-- /.about-items -->
  <div class=\"about-items\" style=\"margin-top: -120px;width: 100%;\">
    <div class=\"col-sm-4\">
     <div class=\"item\">
      <div class=\"item-top\">
       <h3 class=\"item-title\">Ajouter une news</h3>
       <h4 class=\"sub-title\">publier une news</h4>
     </div><!-- /.item-top -->
     <p class=\"item-description\">
      Module de rédaction et d'ajout de news dans la base.
     </p>
     <a class=\"btn\" href=\"./ajoutNews.php\">
       <span class=\"btn-icon\"><i class=\"fa fa-arrow-circle-right\"></i></span>
       Go !
     </a>
   </div><!-- /.item -->
 </div>
 <div class=\"col-sm-4\">
   <div class=\"item\">
    <div class=\"item-top\">
     <h3 class=\"item-title\">Ajouter un label</h3>
     <h4 class=\"sub-title\">référencer un nouveau label</h4>
   </div><!--/.item-top -->
   <p class=\"item-description\">
     Module d'ajout de label dans la base.
   </p>
   <a class=\"btn\" href=\"./ajoutLabel.php\">
     <span class=\"btn-icon\"><i class=\"fa fa-arrow-circle-right\"></i></span>
     Go !
   </a>
 </div><!-- /.item -->
</div>
<div class=\"col-sm-4\">
 <div class=\"item\">
  <div class=\"item-top\">
   <h3 class=\"item-title\">Ajouter plus tard</h3>
   <h4 class=\"sub-title\">publier un truc</h4>
 </div><!-- /.item-top -->
 <p class=\"item-description\">
  Besoin à venir </p>
 <a class=\"btn\" href=\"./ajoutChronique.php\">
   <span class=\"btn-icon\"><i class=\"fa fa-arrow-circle-right\"></i></span>
   Go !
 </a>
</div><!-- /.item -->
</div>
</div><!-- /.about-items -->
</div><!-- /.about-area -->
</div><!-- /.container -->


</section><!-- /#about -->

<br/>
<br/>



";
                  }
                  else
                    {
                      echo "Bien essayé petit scarabée.";}




require_once("footer_html.php");
?>


