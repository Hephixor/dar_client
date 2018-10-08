<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php session_start(); ?>
  <!-- <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Trip-Hop.net</title>

  <meta name="description" content="Trip-Hop.net" >
  <meta name="keywords" content="trip,hop,net,triphop,triphopnet,trip-hop,portishead,morcheeba,alpha,hooverphonic,album,mp3,lyrics,paroles,musique,massive attack,concert,concerts,morcheeba,triphop,paroles,magazine,webzine,angers,gratuit,pages,page,electrotrip,electro,trip,electro-trip,cd,cds,dossier,labels,extraits,audio,titres,pochettes,images,photos,fichiers,fichier,real,concours,gagner,disques,vinyle,pochette" />
  <meta name="author" content="Trip-Hop.net">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

  <!-- Bootstrap  -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- icon fonts font Awesome -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">

  <!-- Import Magnific Pop Up Styles -->
  <link rel="stylesheet" href="assets/css/magnific-popup.css">

  <!-- Import Custom Styles -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Import Animate Styles -->
  <link href="assets/css/animate.min.css" rel="stylesheet">

  <!-- Import owl.carousel Styles -->
  <link href="assets/css/owl.carousel.css" rel="stylesheet">

  <!-- Import Custom Responsive Styles -->
  <link href="assets/css/responsive.css" rel="stylesheet">
  <link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="assets/css/loader.css">
  <script src="js/vendor/modernizr-2.6.2.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
  <script src="js/main.js"></script>

  
  <!--[if IE]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->

    </head>
    
    <body class="header-fixed-top">

      <div id="loader-wrapper">
    <!-- <img src="images/logo2.jpg" alt="Site Logo"> -->
        <div id="loader"></div>
        <div class="loader-section section-left"><!-- <img src="images/logo2.jpg" alt="Site Logo"> --></div>      
        <div class="loader-section section-right"></div>
      </div>


      <!-- scripts -->


      <div id="page-top" class="page-top"></div><!-- /.page-top -->
      <section id="site-banner" class="site-banner text-center">

        <div class="container">
          <div id="particles-js"></div>
          <script src="js/particles.js"></script>
          <script src="js/app.js"></script>
          <div class="site-logo">

            <!--  <a href="./"><img src="images/logo2.jpg" alt="Site Logo"></a>  -->
          </div><!-- /.site-logo -->
        </div><!-- /.container -->
      </section><!-- /#site-banner -->
      <header id="main-menu" class="main-menu">
        <div class="container">
          <div class="row">
            <div class="col-sm-7" style="padding-top:5px;">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                  <i class="fa fa-bars"></i>
                </button>
                <div class="menu-logo">
                  <a href="./"><img src="images/logo_jp.png" alt="menu Logo"></a>
                </div><!-- /.menu-logo -->
              </div>
              <nav id="menu" class="menu collapse navbar-collapse">
               <ul id="headernavigation" class="menu-list nav navbar-nav">
                <!-- <li> <span class="square">
                  <a class="tenth before after" href="#">Cool Square Simultaneous</a>
                </span>
              </li> -->
                <li class="square"><a href="./index.php" class="not-in-home tenth before after">Accueil</a></li>
                <li class="square"><a href="./chroniques.php" class="not-in-home tenth before after ">Chroniques</a></li>
                <li class="square"><a href="./news.php" class="not-in-home tenth before after">News</a></li>   
                <!-- <li><a href="#services">Contribuer</a></li> -->
                
                <li ><a>Plus &darr;</a>
                  <div class="dropdown-content"><center>
                    <a href="artistes.php" class="not-in-home">Artistes</a><br/>
                    <div style="width: 90%; border-bottom: 1px solid #d7dee0"></div>
                    <a href="albums.php" class="not-in-home">Albums</a><br/>
                    <div style="width: 90%; border-bottom: 1px solid #d7dee0"></div>
                    <a href="labels.php" class="not-in-home">Labels</a><br/>
                    <div style="width: 90%; border-bottom: 1px solid #d7dee0"></div>
                    <a href="#latest-post">Interviews</a>
                    <div style="width: 90%; border-bottom: 1px solid #d7dee0"></div>
                    <a href="#latest-post">Vidéos</a>
                    <div style="width: 90%; border-bottom: 1px solid #d7dee0"></div>
                    <a href="#latest-post">MP3s</a>
                    <div style="width: 90%; border-bottom: 1px solid #d7dee0"></div>
                    <a href="#latest-post">Concours</a>
                    <div style="width: 90%; border-bottom: 1px solid #d7dee0"></div>
                    <a href="#latest-post">Newsletter</a>
                    <div style="width: 90%; border-bottom: 1px solid #d7dee0"></div>
                    <a class="not-in-home" href="http://127.0.0.1/triphopnet/v2/forum/index.php">Forum</a>
                    <div style="width: 90%; border-bottom: 1px solid #d7dee0"></div>
                  



                  </center>
                </div></li>
                
                <?php 
                include('./php/connection.php');

                if(isset($_SESSION['id'])){
                  $reqD ="SELECT COUNT(idUserB) FROM demandescontact WHERE idUserB=".$_SESSION['id']." AND status!=2";
                  $retD = mysqli_query ($cnx,$reqD) or die (mysql_error ());
                  $colD = mysqli_fetch_row ($retD);
                  $demandes=0;
                  if($colD[0]!=0){
                    $demandes=$colD[0];
                  }
                }
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                echo" <li><a>".$_SESSION["pseudo"]."&darr;";
                 if($demandes!=0){
                  echo "<span class=\"badge\">".$demandes."</span>";
                }

                echo "</a>
                <div class=\"dropdown-content\"><center>
                <a href=\"./membre.php?idMembre=".$_SESSION['id']."\" class=\"not-in-home\">Profil</a><br/>
                <div style=\"width: 90%; border-bottom: 1px solid #d7dee0\"></div>
                <a href=\"./gestion.php?idMembre=".$_SESSION['id']."\" class=\"not-in-home\">Gestion</a><br/>
                <div style=\"width: 90%; border-bottom: 1px solid #d7dee0\"></div>
                <a href=\"./contacts.php\" class=\"not-in-home\">Contacts";
                $reqD ="SELECT COUNT(idUserB) FROM demandescontact WHERE idUserB=".$_SESSION['id'];
                $retD = mysqli_query ($cnx,$reqD) or die (mysql_error ());
                $colD = mysqli_fetch_row ($retD);
                if($demandes!=0){
                  echo "<span class=\"badge\">".$demandes."</span>";
                }
                echo"</a><br/>
                <div style=\"width: 90%; border-bottom: 1px solid #d7dee0\"></div>
                <a href=\"./messenger.php\" class=\"not-in-home\" onclick=\"window.open(this.href);return false\">Messagerie</a><br/>
                <div style=\"width: 90%; border-bottom: 1px solid #d7dee0\"></div>
                <a href=\"./php/deco.php\" class=\"not-in-home\">Se deconnecter</a><br/>
                <div style=\"width: 90%; border-bottom: 1px solid #d7dee0\"></div>

                </center>
                </div></li>";

                if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1){
                  echo "<li class=\"square\"><a href=\"./administration.php\" class=\"not-in-home\">Zone admin</a></li>";
                }else{

                }
              }
              else {
               echo "<li class=\"square\"><a class=\"not-in-home\" href=\"./signup.php\">S'inscrire</a></li>";
               echo "<li class=\"square\"><a class=\"not-in-home\" href=\"./accueil.php\">Login</a></li>";
             } ?>

           </ul><!-- /.menu-list -->
         </nav><!-- /.menu-list -->
       </div>

       <div class="col-sm-5" style="padding-top 10px;">
        <div class="menu-search pull-right" style="margin-top: -5px;">
         <form role="search" class="search-form" action="searchResults.php" method="get">
          <input class="search-field" type="text" name="s" id="s" placeholder="Rechercher" required>
          <button class="btn search-btn" type="submit"><i class="fa fa-search"></i></button>
        </form><!-- /.search-form -->
      </div><!-- /.menu-search -->
    </div>
  </div><!-- /.row -->
</div><!-- /.container -->
  </header><!-- /#main-menu -->