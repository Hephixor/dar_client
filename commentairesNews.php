<?php
require_once("header_html.php");
$useragent=$_SERVER['HTTP_USER_AGENT'];
$mobile=false;
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
 $mobile=true;
}
if ( isset($_GET['idNew']) ){
  $id = intval ($_GET['idNew']);
  include ("./php/connection.php");

  $req = "SELECT n.idImage, n.lien, n.titre, n.dateParution FROM news n WHERE n.idNews=".$id;
  $ret = mysqli_query ($cnx,$req) or die (mysql_error ());

  $col = mysqli_fetch_row ($ret);

  if ( !$col[0] ){
   $bImage=false;
   $lien='';
 } else {  

   $idImage = $col[0];   
   $lien = $col[1];
   $titre = $col[2]; 
   $date = $col[3];

   $reqI = "SELECT i.imageData
   FROM imagesnews i
   WHERE i.idImage=".$idImage;
   $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
   $colI = mysqli_fetch_row ($retI);

   if ($colI[0] ){
    $bImage=true;
    $imageData = $colI[0];
  } 
  else { 

  }
}

} else {
  echo "Mauvais id de news";
}

?>

<?php 
if($mobile==true){
  echo "<section id=\"main-content\" class=\"main-content blog-post-singgle-page\">";
}
else{
  echo "<section id=\"main-content\" class=\"main-content blog-post-singgle-page\"  style=\"margin-left:25%;\">";
}
?>
<div class="container" style="width:100%">
  <div class="row">
    <div class="col-sm-8">
      <div id="blog-post-content" class="blog-post-content">
        <article class="post type-post">
          <div class="post-top">
            <div class="post-thumbnail">
              <?php 
              
              if($bImage!= true){
                if($lien==''){
                 echo "<center><img src=\"images/logo2.jpg\" alt=\"Author Image\"></center>";
               }
               else{
                echo "<div class=\"embed-responsive embed-responsive-16by9\">
                <iframe class=\"embed-responsive-item\" src=\"".$lien."\" allowfullscreen></iframe>
                </div>";
              }
            }
            else{
              if($lien==''){
                echo '<center><img src="data:image/jpeg;base64,'.base64_encode($imageData).'" style=""/></center>';
              }
              else{
                echo "<div class=\"embed-responsive embed-responsive-16by9\">
                <iframe class=\"embed-responsive-item\" src=\"".$lien."\" allowfullscreen></iframe>
                </div>";
              }
            } 

            ?>

          </div><!-- /.post-thumbnail --> 
        </div><!-- /.post-top -->
        <div class="post-content" style="border-bottom:0px;">
          <h2 class="entry-title"></h2>



          <?php 
          if($mobile==false){
           echo "<blockquote style=\"background-color:#f7f7f7\"><br/>
           <a>".$titre."</a>
           <time datetime=\"".$date."\">".$date."</time>";
           include("./php/allCommentsNews.php"); 
           echo"</blockquote>";
         }
         else{
           echo "<a>".$titre."</a>
           <time datetime=\"".$date."\">".$date."</time>";
           include("./php/allCommentsNews.php"); 
         }
         ?>
       </blockquote>
                   <!-- Lorem ipsum dolsit amet, consetetur sadipscing elitsed diam nonumy  eirmod tempor invidunt ut labore dolore magna aliquyam erat,  sed diam voluptua viero eos et accusam et juo dolores et ea rebum.
                    
                    <p>
                      Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                      At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sitamet, consetetur sadipscing elitr,  sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.  At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren.
                    </p> -->
                  </div><!-- /.post-content -->
                </div>
              </div>
            </div><!-- /.container -->
          </section><!-- /#main-content -->
        </div>



        <?php
        require_once("footer_html.php");
        ?>















