<?php
require_once("header_html.php");
?>


<section id="latest-post" class="latest-post" style="padding-top: 40px;">
  <div class="container"  style="width:80%">
    <div class="post-area" style="width:100%">
      <div class="post-area-top text-center">
        <h2 class="post-area-title">Chroniques</h2>
        <p class="title-description">Sur les derniers albums</p>
      </div><!-- /.post-area-top -->

      <div class="row">
        <div class="latest-posts">

      </div>
      <div class="latest-posts">

      </div>

      </div>

        <div class="latest-posts">

      </div>

      <!-- /.latest-posts -->
   <!-- /.row -->
  </div><!-- /.post-area -->
</div><!-- /.container -->
</section><!-- /#latest-post -->  
 


<?php
   include('./php/loadChroniques2.php');
   ?>


<!-- Subscribe Section -->
<section id="subscribe-section" class="subscribe-section text-center">
  <div class="container">
    <form class="news-letter" method="post">
      <p class="alert-success"></p>
      <p class="alert-warning"></p>

      <div class="subscribe-hide">
      <h4 class="sub-title" style="color:#f6f6f6;margin-top: -10px;padding-bottom: 10px">S'inscrire à la newsletter</h3>
        <input class="form-control" type="email" id="subscribe-email" name="subscribe-email" placeholder="Adresse Email"  required>
        <button  type="submit" id="subscribe-submit" class="btn btn-md">S'inscrire</button>
        <div class="subscribe-error"></div>
      </div><!-- /.subscribe-hide -->
      <div class="subscribe-message"></div>
    </form><!-- /.news-letter -->
  </div><!-- /.container -->
</section><!-- /#subscribe-section -->
<!-- Subscribe Section End --> 




<section id="contact" class="contact">
  <div class="contact-area">
    <!-- Google Map Section 
    <div id="google-map" class="google-map">
      <div class="map-container">
        <div id="googleMaps" class="google-map-container">
        </div>
      </div> /.map-container 
    </div>--><!-- /#google-map-->
    <!-- Google Map Section End -->

    <div id="message-details" class="message-details">
      <div class="container">
        <form action="email.php" method="post" id="myForm" class="message-form">
          <div class="row">
            <div class="col-sm-6">
              <input id="author" class="form-control" name="author" type="text" value="" size="30" aria-required="true" placeholder="Name*" title="Name" required>
              <input id="email" class="form-control" name="email" type="email" value="" size="30" aria-required="true" placeholder="Email*" title="Email"  required>
              <input id="subject" class="form-control" name="subject" type="subject" value="" size="30" aria-required="true" placeholder="Subject*" title="Subject"  required>
            </div>
            <div class="col-sm-6">
              <textarea id="message" class="form-control" name="message" cols="45" rows="3" aria-required="true" placeholder="Message" title="Message"  required></textarea>
              <button name="submit" class="btn btn-lg full-width" type="submit" id="submit">Submit</button>
            </div>
          </div><!-- /.row -->
        </form><!-- /#commentform -->
      </div><!-- /.container -->
    </div><!-- /.message-details -->
  </div><!-- /.contact-area -->
</section><!-- /#contact -->


<?php
require_once("footer_html.php");
?>




