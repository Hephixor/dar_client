<?php include ("./php/connection.php");
$s=str_replace("'","''",$_GET['s']);
$resultAr = false;
$resultAl = false;
$resultM = false;


	//Recherche et affichage des artistes
$reqAr = "SELECT idArtiste, nomArtiste FROM artistes WHERE nomArtiste LIKE '%".$s."%' ORDER BY nomArtiste ASC";
$retAr = mysqli_query ($cnx,$reqAr) or die (mysql_error ());
echo"
    <section id=\"latest-post\" class=\"latest-post\" style=\"padding-top: 40px;\">
    <div class=\"container\"  style=\"width:80%\">
    <div class=\"post-area\" style=\"width:100%\">
    <div class=\"post-area-top text-center\">
    <h2 class=\"post-area-title\">Artistes</h2>
    <p class=\"title-description\"></p>
    </div><!-- /.post-area-top -->
    <div class=\"latest-posts text-center\" style=\"padding-top:0;padding-bottom:0;display:block\">
    <center><div class=\"artistList\">
    <ul class=\"artistList\">";

if($retAr->num_rows!=0){
	$resultAr = true;
	
        while($colAr = mysqli_fetch_row ($retAr)) // On lit les entrées une à une grâce à une boucle
        { 
        	echo "<p style=\"margin-top:0\" ><li class=\"artistList\" style=\"width:100%\"><a href=\"artiste.php?idArtiste=".$colAr[0]."\">".$colAr[1]."</a><p></p></li> <p>";
        }
    }
    else{
    	echo "Aucun resulat Artiste pour les termes ".$s." :(<br/>";
}
    echo"
	</ul>
	</div> </center>
	
	</div><!-- /.latest-posts -->
	</div><!-- /.row -->
	</div><!-- /.post-area -->
	<!-- </div> /.container -->
	</section><!-- /#latest-post -->  ";



	//Recharche et affichage des albums
    $reqAl = "SELECT idAlbum, titreAlbum FROM albums WHERE titreAlbum LIKE '%".$s."%' ORDER BY titreAlbum ASC";
    $retAl = mysqli_query ($cnx,$reqAl) or die (mysql_error ());
    echo"
    <section id=\"latest-post\" class=\"latest-post\" style=\"padding-top: 40px;\">
    <div class=\"container\"  style=\"width:80%\">
    <div class=\"post-area\" style=\"width:100%\">
    <div class=\"post-area-top text-center\">
    <h2 class=\"post-area-title\">Albums</h2>
    <p class=\"title-description\"></p>
    </div><!-- /.post-area-top -->
    <div class=\"latest-posts text-center\" style=\"padding-top:0;padding-bottom:0;display:block\">
    <center><div class=\"artistList\">
    <ul class=\"artistList\">";

    if($retAl->num_rows!=0){
    	$resultAl = true;
    	
		while($colAl = mysqli_fetch_row ($retAl)) // On lit les entrées une à une grâce à une boucle
		{ 
			echo "<p style=\"margin-top:0\" ><li class=\"artistList\" style=\"width:100%\"><a href=\"album.php?idAlbum=".$colAl[0]."\">".$colAl[1]."</a><p></p></li> <p>";
		}
	}
	else{
		echo "Aucun resulat Album pour les termes ".$s." :(<br/>";
	}

	echo"
	</ul>
	</div> </center>
	
	</div><!-- /.latest-posts -->
	</div><!-- /.row -->
	</div><!-- /.post-area -->
	<!-- </div> /.container -->
	</section><!-- /#latest-post -->  ";



	//Recharche et affichage des membres
	$reqM = "SELECT idUser, Pseudo FROM users WHERE Pseudo LIKE '%".$s."%' ORDER BY Pseudo ASC";
	$retM = mysqli_query ($cnx,$reqM) or die (mysql_error ());
	echo"
    <section id=\"latest-post\" class=\"latest-post\" style=\"padding-top: 40px;\">
    <div class=\"container\"  style=\"width:80%\">
    <div class=\"post-area\" style=\"width:100%\">
    <div class=\"post-area-top text-center\">
    <h2 class=\"post-area-title\">Membres</h2>
    <p class=\"title-description\"></p>
    </div><!-- /.post-area-top -->
    <div class=\"latest-posts text-center\" style=\"padding-top:0;padding-bottom:0;display:block\">
    <center><div class=\"artistList\" >
    <ul class=\"artistList\">";
	if($retM->num_rows!=0){
		$resultM = true;

        while($colM = mysqli_fetch_row ($retM)) // On lit les entrées une à une grâce à une boucle
        { 
        	echo "<p style=\"margin-top:0\" ><li class=\"artistList\" style=\"width:100%\"><a href=\"membre.php?idMembre=".$colM[0]."\">".$colM[1]."</a><p></p></li> <p>";
        }
    }
    else{
    	echo "Aucun resulat Membre pour les termes ".$s." :(<br/>";
    }
    echo"
	</ul>
	</div> </center>
	
	</div><!-- /.latest-posts -->
	</div><!-- /.row -->
	</div><!-- /.post-area -->
	<!-- </div> /.container -->
	</section><!-- /#latest-post -->  ";


    ?>