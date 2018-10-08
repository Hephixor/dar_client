<?php   
if(isset($_SESSION['id'])){
//include('./messenger2.php');
}
?>
</main>
<br/>
<footer class="footer">
  <!--  <div id="footer-top" class="footer-top">
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
  <div id="footer-bottom" class="footer-bottom text-center">
    <div class="container" style="padding-top:10px">
      <div id="copyright" class="copyright">
        &copy; <a href="http://beta-trip-hop.net">Trip-Hop.net</a>  2017 - Developed by <a href="http://google.com">William Sergeant</a>
      </div><!-- /#copyright -->
    </div>
  </div><!-- /#footer-bottom -->
</footer>


</div>
</body>
<div id="scroll-to-top" class="scroll-to-top">
  <span>
    <i class="fa fa-chevron-up" style="top:50%"></i>    
  </span>
</div><!-- /#scroll-to-top -->



<!-- Include modernizr-2.8.3.min.js -->
<script src="assets/js/modernizr-2.8.3.min.js"></script>

<!-- Include jquery.min.js plugin -->
<script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Include magnific-popup.min.js -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>

<!-- Google Maps Script -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>

<!-- Gmap3.js For Static Maps -->
<script src="assets/js/gmap3.js"></script>

<!-- Javascript Plugins  -->
<script src="assets/js/plugins.js"></script>

<!-- Custom Functions  -->
<script src="assets/js/functions.js"></script>

<script src="assets/js/wow.min.js"></script>

<script type="text/javascript" src="assets/js/jquery.ajaxchimp.min.js"></script>




<script>

 $(document).ready(function() {

  /* -------- One page Navigation ----------*/
  $('#main-menu #menu').onePageNav({
    currentClass: 'active',
    changeHash: false,
    scrollSpeed: 1500,
    scrollThreshold: 0.5,
    scrollOffset: 95,
    filter: ':not(.sub-menu a, .not-in-home)',
    easing: 'swing'
  }); 
}

  /*----------- Google Map - with support of gmaps.js ----------------*/

/*  function isMobile() { 
   return ('ontouchstart' in document.documentElement);
 }
*/
/* function init_gmap() {
   if ( typeof google == 'undefined' ) return;
   var options = {
    center: [-37.817331, 144.955652],
    zoom: 15,
    mapTypeControl: true,
    mapTypeControlOptions: {
     style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
   },
   navigationControl: true,
   scrollwheel: false,
   streetViewControl: true
 }

 if (isMobile()) {
  options.draggable = true;
}

$('#googleMaps').gmap3({
  map: {
   options: options
 },
 marker: {
   latLng: [-37.817331, 144.955652],
   options: { icon: 'images/mapicon.png' }
 }
});
}

init_gmap();
});*/

/*$(document).bind("contextmenu",function()
{return false;}); */
)
</script>
  <!-- JS -->
 <!-- <script type="text/javascript" src="./js/jquery.min.js"></script>--><!-- jQuery -->
 <!--  <script type="text/javascript" src="./js/scripts.js"></script> --><!-- Scripts -->



</html>
