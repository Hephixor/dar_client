<?php
require_once("header_html.php");
?>

<section id="latest-post" class="latest-post" style="padding-top: 40px;">
    <div class="container"  style="width:100%">
    <div class="post-area" style="width:100%">
      <div class="post-area-top text-center">
        <h2 class="post-area-title">News</h2>
        <p class="title-description">Les nouvelles du Trip-Hop</p>
      </div><!-- /.post-area-top -->

      <div class="row">
        <div class="latest-posts">

      </div>
      </div><!-- /.latest-posts -->
    </div><!-- /.row -->
  </div><!-- /.post-area -->
<!-- </div> /.container -->
</section><!-- /#latest-post -->  

   <?php include("./php/loadNews.php");
  ?>
      <!-- end .content --></div> 
    </div>
</div>
</div>

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



<br/>



<?php
require_once("footer_html.php");
?>

