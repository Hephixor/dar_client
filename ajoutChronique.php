<?php
require_once("header_html.php");
?>
<link href="assets/css/picker.css" rel="stylesheet">
<script src="./ckeditor/ckeditor.js"></script>


<section id="main-content" class="main-content blog-post-singgle-page">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
       <center> <h1>Ajouter une chronique</h1> </center>
       <br/><br/>

       <form enctype="multipart/form-data" action="retChronique.php" method="post">
        <br/>
        <p class="field"><label>Nom album</label></p>
        <?php
        include ("./php/connection.php");
        
        $req2 = "select idAlbum,titreAlbum from albums order by titreAlbum ASC";
        $ret = mysqli_query($cnx, $req2);
        if ($ret) {

         echo "<select name=\"nomAlbum\">";
         echo "<option value=\"\" selected=\"selected\">";
         while ( $options = mysqli_fetch_row ($ret) )
         { 
          echo "<option value=".$options[0].">"; 
          echo $options[1];
          echo "</option>";
        }
        echo "</select>";
      } else {
        echo "Error: " . $req2 . "<br>" . mysqli_error($cnx);
      }
      echo " Note de l'album  ";
      echo "<select name=\"note\">";
      echo "<option value=\"0\" select=\"selected\"></option>";
      echo "<option value=\"1\" style=\"color:orange\">&#9733</option>";
      echo "<option value=\"2\" style=\"color:orange\">&#9733&#9733</option>";
      echo "<option value=\"3\" style=\"color:orange\">&#9733&#9733&#9733</option>";
      echo "<option value=\"4\" style=\"color:orange\">&#9733&#9733&#9733&#9733</option>";
      echo "<option value=\"5\" style=\"color:orange\">&#9733&#9733&#9733&#9733&#9733</option>";
      echo "</select>";

      echo "  Grosse sortie  ";
      echo "<select name=\"big\">";
      echo "<option value=\"0\" selected=\"selected\">NON</option>";
      echo "<option value=\"1\">OUI</option>";
      echo "</select>";
      echo "<br/><br/>";
      ?>
      

      <p class="field"><label>Date de sortie</label>
        <div class="form-group">
          <div class='input-group date'>

            <input class="input-group date" id="date" type="hidden"  min="2017-01-01" max="2024-01-01">
            <input class="input-group date" id="alt" type="text" name="date" placeholder="Selectionner la date">
            <div id="picker" hidden></div></div>
          </div>
        </p>




        <p class="field"><label> Chronique  </label>  </p>
        <textarea name="chronique" value="" required="required" placeholder="Chronique" rows="10" cols="80">
          Bienvenue dans l'éditeur de chronique, soyez poétiques !
        </textarea>
        <script>



        CKEDITOR.replace( 'chronique' ,{

          on: {
            instanceReady: function( ev ) {
              this.dataProcessor.writer.setRules( '', {
                indent: false,
                breakBeforeOpen: false,
                breakAfterOpen: false,
                breakBeforeClose: false,
                breakAfterClose: false
              });
            }
          }
        });
        </script>


        <br/>
        <center> 
      <!--     <a href="#" class="buttonNice"><span><input name="submit" type="submit" value="AJOUTER" style="background: transparent none ; border: none; margin-bottom:5px"/></span></a>
          <a href="#" class="buttonFancy"><span><input name="reset" type="reset"  value="ANNULER" style="background: transparent none ; border: none; margin-bottom:5px"  /></span></a>
          <a href="administration.php" class="buttonFancy"><span>Retour</span></a>
        -->
        <button class="buttonFancy" type="submit" name="submit" style="padding: 0;margin: 0;margin-bottom:5px;padding-top: 3px;border-radius:3px; font-size:12px;"><span>    Enregistrer    </span></button>
        <button class="buttonFancy" type="reset" name="reset" style="padding: 0;margin: 0;margin-bottom:5px;padding-top: 3px;border-radius:3px; font-size:12px;"><span>    Reset    </span></button>
        <button class="buttonFancy" type="button" name="retour" style="padding: 0;margin: 0;margin-bottom:5px;padding-top: 3px;border-radius:3px; font-size:12px;" onclick="self.location.href='ajout.php'"><span>    Retour    </span></button>
      </center>
    </form>
    <br/><br/>
    <center>
      <img src="images/logo2.jpg" alt="header_logo" width="50%" height="80" id="header_logo" style="background-color: #8090AB; display:block;" />
    </center>
  </div>


  <div class="col-sm-4">
    <div id="blog-sidebar" class="blog-sidebar widget-area" role="complementary">
      <div class="sidebar-content">

        <aside class="widget widget_categories">
          <h3 class="widget-title">
            Blog Categories
          </h3><!-- /.widget-title -->

          <ul class="category-list">
            <li><a href="#" >Web Design</a></li>
            <li><a href="#" >Graphic Design</a></li>
            <li><a href="#" >e-Commerce</a></li>
            <li><a href="#" >Flash Animation</a></li>
            <li><a href="#" >Wordpress Theme</a></li>
            <li><a href="#" >HTML5/CSS3</a></li>
            <li><a href="#" >Coding</a></li>
          </ul>
        </aside><!-- /.widget -->

        <aside class="widget widget_recent_entries">
          <h3 class="widget-title">
            Popular Posts
          </h3><!-- /.widget-title -->
          <ul class="recent-post">
            <li>
              <div class="recent-post-details">
                <a class="post-title" href="#">Standard Blog Post Title</a><br>
                <div class="post-meta">
                  <time datetime="2014-03-29">29 March</time> 
                  <a href="#">Anthony Doe</a>
                </div><!-- /.post-meta -->
              </div><!-- /.recent-post-details -->
            </li>
            <li>
              <div class="recent-post-details">
                <a class="post-title" href="#">Standard Blog Post Title</a><br>
                <div class="post-meta">
                  <time datetime="2014-03-29">29 March</time> 
                  <a href="#">Anthony Doe</a>
                </div><!-- /.post-meta -->
              </div><!-- /.recent-post-details -->
            </li>
            <li>
              <div class="recent-post-details">
                <a class="post-title" href="#">Standard Blog Post Title</a><br>
                <div class="post-meta">
                  <time datetime="2014-03-29">29 March</time> 
                  <a href="#">Anthony Doe</a>
                </div><!-- /.post-meta -->
              </div><!-- /.recent-post-details -->
            </li>
          </ul><!-- /.recent-post -->
        </aside><!-- /.widget -->

        <aside class="widget widget wp_widget_tag_cloud clearfix">
          <h3 class="widget-title">
            Tag Clouds
          </h3><!-- /.widget-title -->
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
          </div><!-- /.tag-cloud-wrapper -->
        </aside><!-- /.widget -->

        <aside class="widget widget_archive">
          <h3 class="widget-title">
            Archives
          </h3><!-- /.widget-title -->
          <ul class="archive-list">
            <li><a href="#">April 2015 <span class="count">05</span></a> </li>
            <li><a href="#">March 2015 <span class="count">35</span></a> </li>
            <li><a href="#">February 2015 <span class="count">15</span></a> </li>
          </ul>
        </aside><!-- /.widget -->

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
          </div><!-- /.sidebar-content -->
        </div><!-- /#sidebar -->
      </div>
    </div>
  </div><!-- /.container -->
</section><!-- /#main-content -->


<script src="assets/js/picker.js"></script>
<script src="assets/js/example.js"></script>


<?php
require_once("footer_html.php");
?>
