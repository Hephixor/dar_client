 <?php
 require_once("header_html.php");
 ?>

 <?php 

 if ( isset($_GET['idNew']) ){
  $id = intval ($_GET['idNew']);
  include ("./php/connection.php");
  $req = "SELECT DISTINCT idNews, titre, contenu, dateParution, idImage, lien FROM news WHERE idNews=".$id;
  $ret = mysqli_query ($cnx,$req) or die (mysql_error ());
  $col = mysqli_fetch_row ($ret);

  if ( !$col[0] ){

    echo "Id de news inconnu";
  } 
  else {               
   $titre=$col[1];
   $contenu=$col[2];
   $date=$col[3];
   $idImage=$col[4];
   $lien=$col[5];
 }

    $bImage='false';
   $imageDataUserPicture='';

   if($idImage){
   $reqI = "SELECT i.imageData
   FROM imagesnews i
   WHERE i.idImage=".$col[4];
   $retI = mysqli_query ($cnx,$reqI) or die (mysql_error ());
   $colI = mysqli_fetch_row ($retI);

   if ($colI[0]){
    $bImage='true';
    $imageDataNews = $colI[0];
  }
  } 


} 
else {
  echo "Mauvais id de news";
}
?>
<section id="main-content" class="main-content blog-post-singgle-page">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <div id="blog-post-content" class="blog-post-content">
          <article class="post type-post">
            <div class="post-top">
              <div class="post-thumbnail">
               <?php 
                  if($bImage=='false'){
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
                    echo '<center><img src="data:image/jpeg;base64,'.base64_encode($imageDataNews).'" style=""/></center>';
                  }
                  else{
                  echo "<div class=\"embed-responsive embed-responsive-16by9\">
                  <iframe class=\"embed-responsive-item\" src=\"".$lien."\" allowfullscreen></iframe>
                  </div>";
                  }
                  } ?>
             </div><!-- /.post-thumbnail -->  

           </div><!-- /.post-top -->
           <div class="post-content">
            <h2 class="entry-title"><a href="#"><?php echo $titre ?></a></h2>
            <br/>
            <blockquote>
              <br/>
              <?php echo $contenu ;
              if($lien!=''){
                if($bImage!='false'){
                  echo '<center><img src="data:image/jpeg;base64,'.base64_encode($imageDataNews).'" style=""/></center>';
                }
              }
              ?>
            </blockquote>   
          </div><!-- /.post-content -->
          <?php require_once("./php/loadCommentairesNew.php");?>
          <div class="col-sm-4">
            <div id="blog-sidebar" class="blog-sidebar widget-area" role="complementary">
              <div class="sidebar-content">

                <aside class="widget widget_categories">
                 <!--   <h3 class="widget-title">
                    Notes
                  </h3>

                 <ul class="category-list">
                    <?php include("./php/loadStars.php"); ?>
                  </ul>

                  <h3 class="widget-title">
                   <br/>
                   Label
                 </h3>
                 <ul>
                   <li><a href="label.php?idLabel=<?php echo $idLabel?>"><?php echo $label ?></a></li></ul> -->
                      <!-- <li><a href="#" >e-Commerce</a></li>
                      <li><a href="#" >Flash Animation</a></li>
                      <li><a href="#" >Wordpress Theme</a></li>
                      <li><a href="#" >HTML5/CSS3</a></li>
                      <li><a href="#" >Coding</a></li>
                    </ul>
                  </aside>

                  <aside class="widget widget_recent_entries">
                    <h3 class="widget-title">
                      Popular Posts
                    </h3>
                    <ul class="recent-post">
                      <li>
                        <div class="recent-post-details">
                          <a class="post-title" href="#">Standard Blog Post Title</a><br>
                          <div class="post-meta">
                            <time datetime="2014-03-29">29 March</time> 
                            <a href="#">Anthony Doe</a>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="recent-post-details">
                          <a class="post-title" href="#">Standard Blog Post Title</a><br>
                          <div class="post-meta">
                            <time datetime="2014-03-29">29 March</time> 
                            <a href="#">Anthony Doe</a>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="recent-post-details">
                          <a class="post-title" href="#">Standard Blog Post Title</a><br>
                          <div class="post-meta">
                            <time datetime="2014-03-29">29 March</time> 
                            <a href="#">Anthony Doe</a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </aside>

                  <aside class="widget widget wp_widget_tag_cloud clearfix">
                    <h3 class="widget-title">
                      Tag Clouds
                    </h3>
                    <div class="tag-cloud-wrapper">
                      <a href="#">design</a>
                      <a href="#">html5</a>
                      <a href="#">css3</a>
                      <a href="#">web-design</a>
                      <a href="#">illustrator</a>
                      <a href="#">Photoshop</a>
                      <a href="#">ui/ux</a>
                      <a href="#">js</a>
                      <a href="#">icons</a>
                      <a href="#">article</a>
                      <a href="#">web</a>
                      <a href="#">inDesign</a>
                    </div>
                  </aside>

                  <aside class="widget widget_archive">
                    <h3 class="widget-title">
                      Archives
                    </h3>
                    <ul class="archive-list">
                      <li><a href="#">April 2015 <span class="count">05</span></a> </li>
                      <li><a href="#">March 2015 <span class="count">35</span></a> </li>
                      <li><a href="#">February 2015 <span class="count">15</span></a> </li>
                    </ul>
                  </aside>

                  <aside class="widget widget_calendar">
                    <h3 class="widget-title">Calendar</h3>
                    <div id="calendar_wrap" class="calendar_wrap">
                      <table id="wp-calendar" class="wp-calenda">
                        <caption>March 2015</caption>
                        <thead>
                          <tr>
                            <th scope="col" title="Monday">M</th>
                            <th scope="col" title="Tuesday">T</th>
                            <th scope="col" title="Wednesday">W</th>
                            <th scope="col" title="Thursday">T</th>
                            <th scope="col" title="Friday">F</th>
                            <th scope="col" title="Saturday">S</th>
                            <th scope="col" title="Sunday">S</th>
                          </tr>
                        </thead>

                        <tfoot>
                          <tr>
                            <td colspan="3" id="prev"><a href="#">« Feb</a></td>
                            <td class="pad">&nbsp;</td>
                            <td colspan="3" id="next"><a href="#">Apr »</a></td>
                          </tr>
                        </tfoot>

                        <tbody>
                          <tr>
                            <td colspan="3" class="pad">&nbsp;</td><td>1</td><td>2</td><td>3</td><td>4</td>
                          </tr>
                          <tr>
                            <td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td>
                          </tr>
                          <tr>
                            <td>12</td><td>13</td><td><a href="#">14</a></td><td>15</td><td>16</td><td>17</td><td>18</td>
                          </tr>
                          <tr>
                            <td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td>
                          </tr>
                          <tr>
                            <td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                            <td class="pad" colspan="1">&nbsp;</td>
                          </tr>
                        </tbody>
                      </table></div></aside>

                      <aside class="widget widget_rss">
                        <h3 class="widget-title"><a class="rsswidget" href="#" title="Syndicate this content"><i class="rss-icon fa fa-rss"></i>Rss</a>
                        </h3>
                        <ul>
                          <li>
                            <a class="rsswidget" href="#">Australia Post Codes</a>
                          </li>
                          <li>
                            <a class="rsswidget" href="#">Canada Post Codes</a>
                          </li>
                          <li>
                            <a class="rsswidget" href="#">China Zip Codes</a>
                          </li>
                        </ul>
                      </aside>
                    </div>
                  </div> --> 
                </div>
              </div>
            </div><!-- /.container -->
          </section><!-- /#main-content -->





         <!--  <footer>
            <div id="footer-top" class="footer-top">
              <div class="container">
                <div class="row">
                  <div id="tweet" class="tweet text-left">
                    <div class="col-xs-4 about-tweet">
                      <span class="tweet-icon"><i class="fa fa-twitter"></i></span>
                      <span class="tweet-author">John Doe</span>
                      <p class="tweet-details">
                        Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis eupulvinar nuncint
                      </p>
                      <time datetime="PT2H">2 Hours Ago</time>
                    </div>
                    <div class="col-xs-4 about-tweet">
                      <span class="tweet-icon"><i class="fa fa-twitter"></i></span>
                      <span class="tweet-author">John Doe</span>
                      <p class="tweet-details">
                        Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis eupulvinar nuncint
                      </p>
                      <time datetime="PT2H">2 Hours Ago</time>
                    </div>
                    <div class="col-xs-4 about-tweet">
                      <span class="tweet-icon"><i class="fa fa-twitter"></i></span>
                      <span class="tweet-author">John Doe</span>
                      <p class="tweet-details">
                        Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis eupulvinar nuncint
                      </p>
                      <time datetime="PT2H">2 Hours Ago</time>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          -->





          <?php
          require_once("footer_html.php");
          ?>
