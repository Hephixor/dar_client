<?php include("header_html.php"); ?>

<section id="about" class="about">
	<div class="container">
		<div class="about-area">
			<div class="title-area text-center">
				<h2 class="about-title">Connection</h2>
				<p class="title-description">Mon compte trip-hop.net</p>
			</div><!-- /.title-area -->
			<center><form class="formulaire" action="./php/login.php" method="post" style="margin-top:60px;">
				<p class="field"><input name="login" placeholder="Login" type="text" /><i class="icon-user icon-large"></i></p>
				<p class="field"><input name="password" placeholder="Mot de passe" type="password" /><i class="icon-lock icon-large"></i></p>
				<center><button class="buttonFancy" type="submit" name="submit" style="padding: 0;margin: 0;padding-top: 3px;border-radius:3px; font-size:12px;" ><span>    Connexion    </span></button></center>
			</form></center>
		</div><!-- /.about-area -->
	</div><!-- /.container -->
</section><!-- /#about -->
<br/>
<br/>
<?php
require_once("footer_html.php");
?>