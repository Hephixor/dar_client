<!DOCTYPE html>
<html dir="ltr" lang="en-gb">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1" />

<title>ForumUS - Login</title>

	<link rel="alternate" type="application/atom+xml" title="Feed - ForumUS" href="/forumus/app.php/feed?style=6">			<link rel="alternate" type="application/atom+xml" title="Feed - New Topics" href="/forumus/app.php/feed?style=6?mode=topics">				

<!--
	phpBB style name: prosilver
	Based on style:   prosilver (this is the default phpBB3 style)
	Original author:  Tom Beddard ( http://www.subBlue.com/ )
	Modified by: ThemeLooks ( http://themelooks.com/ )
-->

<link href="./styles/forumus-transparent-version/theme/stylesheet.css?assets_version=3" rel="stylesheet">
<link href="./styles/forumus-transparent-version/theme/en/stylesheet.css?assets_version=3" rel="stylesheet">
<link href="./styles/forumus-transparent-version/theme/responsive.css?assets_version=3" rel="stylesheet" media="all and (max-width: 700px)">



<!--[if lte IE 9]>
	<link href="./styles/forumus-transparent-version/theme/tweaks.css?assets_version=3" rel="stylesheet">
<![endif]-->





    <!-- ====Google Font Stylesheet==== -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>
	
    <!-- ====Bootstrap Stylesheet==== -->
    <link href="./styles/forumus-transparent-version/theme/bootstrap.min.css" rel="stylesheet">

    <!-- ====Font Awesome Stylesheet==== -->
    <link href="./styles/forumus-transparent-version/theme/font-awesome.min.css" rel="stylesheet">
	
    <!-- ====ForumX Stylesheet==== -->
	<link href="./styles/forumus-transparent-version/theme/forumus-style.css" rel="stylesheet">
	
    <!-- ====Color Scheme Stylesheet==== -->
	<link href="./styles/forumus-transparent-version/theme/colors/style-1-color-3.css" rel="stylesheet" id="mainColorScheme">
    
    <!-- ====Custom Stylesheet==== -->
    <link href="./styles/forumus-transparent-version/theme/custom.css" rel="stylesheet">

</head>
<body id="phpbb" class="nojs notouch section-memberlist ltr " data-theme-path="./styles/forumus-transparent-version/theme">
    
<!-- Preloader Start -->
<div id="preloader">
    <div class="preloader--bounce">
        <div class="preloader-bouncer--1"></div>
        <div class="preloader-bouncer--2"></div>
    </div>
</div>
<!-- Preloader End -->


	<!-- Wrapper Start -->
	<div class="wrapper">
	
        <!-- Header Area Start -->
        <div id="header" class="header-transparent">
            <!-- Header Topbar Start -->
            <div class="header--topbar">
								            </div>
            <!-- Header Topbar End -->
            <!-- Primary Header Start -->
            <div class="header--primary">
                <div class="container">
                    <!-- Header Logo Start -->
                    <div class="header--logo">
						<div class="vc-parent">
							<div class="vc-child">
								<h1>
									<a href="./index.php?style=6">
                                         <!-- Image Logo (Optional) -->
										 <!-- <img src="./styles/forumus-transparent-version/theme/images/logo/logo.png" alt="ForumUS"> -->
										 
										 <!-- Text Logo (Site Name) -->
										 ForumUS
									</a>
								</h1>
							</div>
						</div>
                    </div>
                    <!-- Header Logo End -->
                    <!-- Header Social Links Start -->
                    <div class="header--social">
                        <ul class="nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <!-- Header Social Links End -->
                    <!-- Header Login Start -->
                    <div class="header--login">
												
							<p><a href="#" data-toggle="modal" data-target="#LoginForm"><i class="fa fm fa-user"></i>login</a></p>
							
						                    </div>
                    <!-- Header Login End -->
                </div>
            </div>
            <!-- Primary Header End -->
			
							            <!-- Header Slider Start -->
            <div class="header--slider" data-bg-img="./styles/forumus-transparent-version/theme/images/header-bg/header-bg.jpg">
                <div class="header-slider--content">
                    <div class="container">
                        <h2>Hello World !</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <!-- Header Slider End -->						
			
						
			<!-- Header Navbar Start -->
<div class="header--nav bg-bluewood">
	<div class="container">
				
				<div class="header--search-bar logged-out">
			<form action="./search.php?style=6" method="get">
				<div class="input-group">
					<input type="text" name="keywords" class="form-control" placeholder="Search…">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						<a href="./search.php?style=6" class="btn btn-default"><i class="fa fa-gear"></i></a>
					</span>
				</div>
			</form>
		</div>
				
		<ul class="header-nav--primary nav logged-out">
			<li>
				<a href="#tab1" data-toggle="tab"><i class="fa fm fa-navicon"></i>Quick Links</a>
			</li>
			
						
            <li class="hidden-sm hidden-xs">
                <a href="/forumus/app.php/help/faq?style=6" title="Frequently Asked Questions"><i class="fa fm fa-question-circle"></i>FAQ</a>
            </li>
			
						
								</ul>
	</div>
	
	<div class="header-nav--tab">
		<div class="container">
			<div class="tab-content">
				<div class="header-nav--tabpane tab-pane" id="tab1">
					<ul class="nav">
												
																																		<li><a href="./search.php?style=6&amp;search_id=unanswered"><i class="fa fm fa-comment-o"></i>Unanswered topics</a></li>
							<li><a href="./search.php?style=6&amp;search_id=active_topics"><i class="fa fm fa-comments-o"></i>Active topics</a></li>
							<li><a href="./search.php?style=6"><i class="fa fm fa-search"></i>Search</a></li>
									
                        <li class="hidden-md hidden-lg">
                            <a href="/forumus/app.php/help/faq?style=6" title="Frequently Asked Questions"><i class="fa fm fa-question-circle"></i>FAQ</a>
                        </li>

													<li><a href="./memberlist.php?style=6&amp;mode=team"><i class="fa fm fa-users"></i>The team</a></li>
												
											</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Header Navbar End -->        </div>
        <!-- Header Area End -->
		
		
<div id="topic">
	<div class="container">
		<div class="topic--body">
			<div class="topic--list">
				<div class="topic-list--header clearfix mb-10">
					<span class="topic-list-header--title">
														The board requires you to be registered and logged in to view the team listing.
												</span>
				</div>
				<div class="topic-list--content">
					<div class="panel login-panel">
						<form action="./ucp.php?style=6&amp;mode=login" method="post" id="login" data-focus="username">
						<div class="panel">
							<div class="inner">

							<div class="content">
								<fieldset class="fields1">
																<dl>
									<dt><label for="username">Username:</label></dt>
									<dd><input type="text" tabindex="1" name="username" id="username" size="25" value="" class="inputbox autowidth" /></dd>
								</dl>
								<dl class="mb-10">
									<dt><label for="password">Password:</label></dt>
									<dd><input type="password" tabindex="2" id="password" name="password" size="25" class="inputbox autowidth mb-10" autocomplete="off" /></dd>
																			<dd><a href="./ucp.php?style=6&amp;mode=sendpassword">I forgot my password</a></dd>																											</dl>
																								<dl class="mb-10">
									<dd><label for="autologin"><input type="checkbox" name="autologin" id="autologin" tabindex="4" /> Remember me</label></dd>									<dd><label for="viewonline"><input type="checkbox" name="viewonline" id="viewonline" tabindex="5" /> Hide my online status this session</label></dd>
								</dl>
								
								<input type="hidden" name="redirect" value="./memberlist.php?mode=team&amp;style=6&amp;style=6" />

								<dl>
									<dt>&nbsp;</dt>
									<dd><input type="hidden" name="sid" value="0faf51944892915d9c3ea62028625a77" />
<input type="submit" name="login" tabindex="6" value="Login" class="button1" /></dd>
								</dl>
								</fieldset>
							</div>

														</div>
						</div>


						
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

        		
		<!-- Footer Area Start -->
        <div id="footer">
        	<div class="container">
        		<div class="row">
					<!-- Footer About Widget Start -->
					<div class="col-md-6 footer-widget">
					    <div class="footer-about">
	                        <h4>About Us</h4>
	                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum quod mollitia quisquam. Architecto quam in atque sint voluptatem, consequatur consectetur ab ipsum maxime quod consequuntur excepturi illum dolorem ex modi.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
							<div class="social">
								<ul>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- Footer About Widget End -->
	                <!-- Footer Subscribe Widget Start -->
	                <div class="col-md-3 col-sm-6 footer-widget">
	                	<div class="footer-subscribe">
		                    <h4>Newsletter</h4>
		                    <!-- Mailchimp From Start -->
		                    <form action="https://themelooks.us12.list-manage.com/subscribe/post?u=50e1e21235cbd751ab4c1ebaa&amp;id=ac81d988e4" method="post" name="mc-embedded-subscribe-form" target="_blank" id="footerSubscribeForm" novalidate="novalidate">
		                        <input type="text" name="EMAIL" id="footerSubscribeFormInput" placeholder="Your E-mail Address ..." />
		                        <button type="submit" class="btn">Subscribe</button>
		                    </form>
		                    <!-- Mailchimp From End -->
	                	</div>
	                </div>
	                <!-- Footer Subscribe Widget End -->
	                <!-- Footer Useful Links Widget Start -->
	                <div class="col-md-3 col-sm-6 footer-widget">
	                	<div class="footer-useful-links">
		                    <h4>Useful Links</h4>
		                    <ul>
																	<li><a href="./memberlist.php?style=6&amp;mode=contactadmin">Contact us</a></li>
																									<li><a href="./memberlist.php?style=6&amp;mode=team">The team</a></li>
																									<li><a href="./ucp.php?style=6&amp;mode=delete_cookies" data-ajax="true" data-refresh="true">Delete all board cookies</a></li>
																			                    </ul>
	                    </div>
	                </div>
	                <!-- Footer Useful Links Widget End -->
        		</div>
        	</div>
        </div>
        <!-- Footer Area End -->
		
        <!-- Copyright Start -->
        <div id="copyright">
            <div class="container">
                <p>Copyright 2016 &copy; <a href="./index.php?style=6">ForumUS</a>. All Rights Reserved. Powered by <a href="https://www.phpbb.com/">phpBB</a>&reg; Forum Software &copy; phpBB Limited.</p>
            </div>
        </div>
        <!-- Copyright End -->

		<!-- Page Footer Area Start -->
		<div id="page-footer" role="contentinfo">
			<div id="darkenwrapper" data-ajax-error-title="AJAX error" data-ajax-error-text="Something went wrong when processing your request." data-ajax-error-text-abort="User aborted request." data-ajax-error-text-timeout="Your request timed out; please try again." data-ajax-error-text-parsererror="Something went wrong with the request and the server returned an invalid reply.">
				<div id="darken">&nbsp;</div>
			</div>

			<div id="phpbb_alert" class="phpbb_alert" data-l-err="Error" data-l-timeout-processing-req="Request timed out.">
				<a href="#" class="alert_close"></a>
				<h3 class="alert_title">&nbsp;</h3><p class="alert_text"></p>
			</div>
			<div id="phpbb_confirm" class="phpbb_alert">
				<a href="#" class="alert_close"></a>
				<div class="alert_text"></div>
			</div>
		</div>
		<!-- Page Footer Area End -->
		
		<!-- Back To Top Button Start -->
		<div class="back-to-top">
		    <button><i class="fa fa-angle-up"></i></button>
		</div>
		<!-- Back To Top Button End -->
		
					<!-- Login Form Modal Start -->
			<div id="LoginForm" class="modal fade">
				<div class="vc-parent">
					<div class="vc-child">
						<div class="modal-overlay" data-dismiss="modal"></div>
						<div class="modal-dialog">
							<div class="modal-content">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<div class="modal-header">
									<i class="fa fa-user"></i>Login
								</div>
								<div class="modal-body">
																		<form action="./ucp.php?style=6&amp;mode=login" method="post">
										<input type="text" name="username" placeholder="Username" class="form-control" />
										<input type="password" name="password" placeholder="Password" class="form-control" />
										<input type="submit" name="login" value="Login" class="submit-btn" />
										<input type="hidden" name="redirect" value="./memberlist.php?mode=team&amp;style=6&amp;style=6" />

									</form>
																	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Login Form Modal End -->
			</div>
	<!-- Wrapper End -->

	<script type="text/javascript" src="./assets/javascript/jquery.min.js?assets_version=3"></script>
		<script type="text/javascript" src="./assets/javascript/core.js?assets_version=3"></script>
								
	
		<script type="text/javascript" src="./styles/forumus-transparent-version/template/forum_fn.js?assets_version=3"></script>
<script type="text/javascript" src="./styles/forumus-transparent-version/template/ajax.js?assets_version=3"></script>
<script type="text/javascript" src="./styles/forumus-transparent-version/template/bootstrap.min.js?assets_version=3"></script>
<script type="text/javascript" src="./styles/forumus-transparent-version/template/jquery.validate.min.js?assets_version=3"></script>
<script type="text/javascript" src="./styles/forumus-transparent-version/template/jparticle.jquery.min.js?assets_version=3"></script>
<script type="text/javascript" src="./styles/forumus-transparent-version/template/jquery.sticky.min.js?assets_version=3"></script>
<script type="text/javascript" src="./styles/forumus-transparent-version/template/custom-color-switcher.js?assets_version=3"></script>
<script type="text/javascript" src="./styles/forumus-transparent-version/template/main.js?assets_version=3"></script>


	
</body>
</html>
