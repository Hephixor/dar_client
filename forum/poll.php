<!DOCTYPE html>
<html dir="ltr" lang="en-gb">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title>Basic Poll - ForumUS</title>

	<link rel="alternate" type="application/atom+xml" title="Feed - ForumUS" href="/forumus/app.php/feed">			<link rel="alternate" type="application/atom+xml" title="Feed - New Topics" href="/forumus/app.php/feed?mode=topics">		<link rel="alternate" type="application/atom+xml" title="Feed - Forum - General Examples" href="/forumus/app.php/feed?f=3">	<link rel="alternate" type="application/atom+xml" title="Feed - Topic - Basic Poll" href="/forumus/app.php/feed?f=3&amp;t=7">	
	<link rel="canonical" href="http://forumstyle.us/forumus/viewtopic.php?t=7">

<!--
	phpBB style name: prosilver
	Based on style:   prosilver (this is the default phpBB3 style)
	Original author:  Tom Beddard ( http://www.subBlue.com/ )
	Modified by: ThemeLooks ( http://themelooks.com/ )
-->

<link href="./styles/forumus-default-version/theme/stylesheet.css?assets_version=3" rel="stylesheet">
<link href="./styles/forumus-default-version/theme/en/stylesheet.css?assets_version=3" rel="stylesheet">
<link href="./styles/forumus-default-version/theme/responsive.css?assets_version=3" rel="stylesheet" media="all and (max-width: 700px)">



<!--[if lte IE 9]>
	<link href="./styles/forumus-default-version/theme/tweaks.css?assets_version=3" rel="stylesheet">
	<![endif]-->





	<!-- ====Google Font Stylesheet==== -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>
	
	<!-- ====Bootstrap Stylesheet==== -->
	<link href="./styles/forumus-default-version/theme/bootstrap.min.css" rel="stylesheet">

	<!-- ====Font Awesome Stylesheet==== -->
	<link href="./styles/forumus-default-version/theme/font-awesome.min.css" rel="stylesheet">
	
	<!-- ====ForumX Stylesheet==== -->
	<link href="./styles/forumus-default-version/theme/forumus-style.css" rel="stylesheet">
	
	<!-- ====Color Scheme Stylesheet==== -->
	<link href="./styles/forumus-default-version/theme/colors/style-1-color-3.css" rel="stylesheet" id="mainColorScheme">
	
	<!-- ====Custom Stylesheet==== -->
	<link href="./styles/forumus-default-version/theme/custom.css" rel="stylesheet">

</head>
<body id="phpbb" class="nojs notouch section-viewtopic ltr " data-theme-path="./styles/forumus-default-version/theme">
	
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
		<div id="header">
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
									<a href="./index.php">
										<!-- Image Logo (Optional) -->
										<!-- <img src="./styles/forumus-default-version/theme/images/logo/logo.png" alt="ForumUS"> -->
										
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
			<div class="header--slider" data-bg-img="./styles/forumus-default-version/theme/images/header-bg/header-bg.jpg">
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
						<form action="./search.php" method="get">
							<div class="input-group">
								<input type="text" name="keywords" class="form-control" placeholder="Search…">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
									<a href="./search.php" class="btn btn-default"><i class="fa fa-gear"></i></a>
								</span>
							</div>
						</form>
					</div>
					
					<ul class="header-nav--primary nav logged-out">
						<li>
							<a href="#tab1" data-toggle="tab"><i class="fa fm fa-navicon"></i>Quick Links</a>
						</li>
						
						
						<li class="hidden-sm hidden-xs">
							<a href="/forumus/app.php/help/faq" title="Frequently Asked Questions"><i class="fa fm fa-question-circle"></i>FAQ</a>
						</li>
						
						
					</ul>
				</div>
				
				<div class="header-nav--tab">
					<div class="container">
						<div class="tab-content">
							<div class="header-nav--tabpane tab-pane" id="tab1">
								<ul class="nav">
									
									<li><a href="./search.php?search_id=unanswered"><i class="fa fm fa-comment-o"></i>Unanswered topics</a></li>
									<li><a href="./search.php?search_id=active_topics"><i class="fa fm fa-comments-o"></i>Active topics</a></li>
									<li><a href="./search.php"><i class="fa fm fa-search"></i>Search</a></li>
									
									<li class="hidden-md hidden-lg">
										<a href="/forumus/app.php/help/faq" title="Frequently Asked Questions"><i class="fa fm fa-question-circle"></i>FAQ</a>
									</li>

									<li><a href="./memberlist.php?mode=team"><i class="fa fm fa-users"></i>The team</a></li>
									
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
						<!-- Topic Breadcrumb Start -->
						<div class="topic--breadcrumb clearfix">
							<ol class="breadcrumb">
								<li><i class="fa fa-home"></i></li>
								
								<li><a href="./index.php">ForumUS</a></li>
								
								
								<li><a href="./viewforum.php?f=1">Main</a></li>
								
								
								<li><a href="./viewforum.php?f=3">General Examples</a></li>
								
								
								<li class="active">Basic Poll</li>
							</ol>
						</div>
						<!-- Topic Breadcrumb End -->

						<div class="action-bar">
							<div class="action-bar--pagination clearfix">
								
								<a href="./posting.php?mode=reply&amp;f=3&amp;t=7" class="action-bar-pagination--new post-icon">
									<i class="fa fm fa-mail-reply"></i>Post Reply
								</a>
								
								
								<div class="dropdown topic-tools">
									<a href="#" data-toggle="dropdown">Topic tools <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="./viewtopic.php?f=3&amp;t=7&amp;view=print">Print view</a></li>																	</ul>
									</div>
									
									
									<span class="action-bar-pagination--topics view-topic">1 post</span>

									<span class="action-bar-pagination--page-num view-topic">
										Page <strong>1</strong> of <strong>1</strong>
									</span>
								</div>
							</div>
							
							<div class="topic--list">
								<div class="topic-list--header clearfix">
									<span class="topic-list-header--title">
										Basic Poll
									</span>
								</div>
								<div class="topic-list--content">
									<ul>
										<li>
											<div class="topic-content--poll">
												<form method="post" action="./viewtopic.php?f=3&amp;t=7" data-ajax="vote_poll" class="topic_poll">
													<div class="panel">
														<div class="inner">

															<div class="content">
																<h2 class="poll-title">Sample Poll Question</h2>
																<p class="author"></p>

																<fieldset class="polls">
																	<dl class="" data-alt-text="You voted for this option" data-poll-option-id="1">
																		<dt>Answer #1</dt>
																		<dd class="resultbar"><div class="pollbar1" style="width:0%;">0</div></dd>
																		<dd class="poll_option_percent">No votes</dd>
																	</dl>
																	<dl class="" data-alt-text="You voted for this option" data-poll-option-id="2">
																		<dt>Answer #2</dt>
																		<dd class="resultbar"><div class="pollbar1" style="width:0%;">0</div></dd>
																		<dd class="poll_option_percent">No votes</dd>
																	</dl>
																	<dl class=" most-votes" data-alt-text="You voted for this option" data-poll-option-id="3">
																		<dt>Answer #3</dt>
																		<dd class="resultbar"><div class="pollbar5" style="width:100%;">1</div></dd>
																		<dd class="poll_option_percent">100%</dd>
																	</dl>
																	
																	<dl class="poll_total_votes">
																		<dt>&nbsp;</dt>
																		<dd class="resultbar">Total votes: <span class="poll_total_vote_cnt">1</span></dd>
																	</dl>

																	
																</fieldset>
																<div class="vote-submitted hidden">Your vote has been cast.</div>
															</div>

														</div>
														
														
													</div>
												</form>
											</div>
										</li>
										<li>
											
											<div id="p7" class="topic--post post has-profile">
												<dl class="postprofile" id="profile7">
													<dt class="has-profile-rank no-avatar">
														<div class="avatar-container">
														</div>
														<a href="./memberlist.php?mode=viewprofile&amp;u=2" style="color: #AA0000;" class="username-coloured">admin</a>																					</dt>

														<dd class="profile-rank">Site Admin</dd>										
														<dd class="profile-posts"><strong>Posts:</strong> <a href="./search.php?author_id=2&amp;sr=posts">6</a></dd>									<dd class="profile-joined"><strong>Joined:</strong> Thu Jun 22, 2017 8:16 am</dd>									
														
														
														
													</dl>

													<div class="postbody">
														<div id="post_content7">

															<h3 class="first"><a href="#post_content7">Basic Poll</a></h3>

															<ul class="post-buttons">
																<li>
																	<a href="./posting.php?mode=quote&amp;f=3&amp;p=7" title="Reply with quote" class="button icon-button quote-icon"><i class="fa fa-quote-left"></i></a>
																</li>
															</ul>
															
															<p class="author"><span class="responsive-hide">by <strong><a href="./memberlist.php?mode=viewprofile&amp;u=2" style="color: #AA0000;" class="username-coloured">admin</a></strong> &raquo; </span>Thu Jun 22, 2017 10:17 am </p>
															
															
															
															<div class="content">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</div>

															
															
															
														</div>

													</div>

													<div class="back2top"><a href="#top" title="Top"><i class="fa fa-angle-double-up"></i></a></div>
												</div>
											</li>
										</ul>
									</div>
								</div>
								
								<!-- Quick Reply Start -->
								<div class="quick--reply">
								</div>
								<!-- Quick Reply End -->

								
								<div class="action-bar">
									<div class="action-bar--pagination clearfix">
										
										<a href="./posting.php?mode=reply&amp;f=3&amp;t=7" class="action-bar-pagination--new post-icon">
											<i class="fa fm fa-mail-reply"></i>Post Reply
										</a>
										
										
										<div class="dropup topic-tools">
											<a href="#" data-toggle="dropdown">Topic tools <span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="./viewtopic.php?f=3&amp;t=7&amp;view=print">Print view</a></li>																	</ul>
											</div>
											
											
											<span class="action-bar-pagination--topics view-topic">1 post</span>

											<span class="action-bar-pagination--page-num view-topic">Page <strong>1</strong> of <strong>1</strong></span>
										</div>
									</div>
									
									<!-- Topic Stats Start -->
									<div class="topic--stats">
										<div class="stat-block online-list">
											<h3>Who is online</h3>
											<p>Users browsing this forum: No registered users and 1 guest</p>
										</div>
									</div>
									<!-- Topic Stats End -->

									<!-- Topic Breadcrumb Start -->
									<div class="topic--breadcrumb clearfix">
										<ol class="breadcrumb">
											<li><i class="fa fa-home"></i></li>
											
											<li><a href="./index.php">ForumUS</a></li>
											
											
											<li><a href="./viewforum.php?f=1">Main</a></li>
											
											
											<li><a href="./viewforum.php?f=3">General Examples</a></li>
											
											
											<li class="active">Basic Poll</li>
										</ol>
										
										<div class="topiclist-jumpbox--dropup dropup">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												Jump to
												<span class="caret"></span>
											</a>
											
											<div class="topiclist-jumpbox-dropup--menu dropdown-menu">
												<ul>
													<li><a href="./viewforum.php?f=1">Main</a></li>
													<li><a href="./viewforum.php?f=2"><span></span>Informations</a></li>
													<li><a href="./viewforum.php?f=3"><span></span>General Examples</a></li>
													<li><a href="./viewforum.php?f=4"><span></span>ThemeLooks on ThemeForest</a></li>
													<li><a href="./viewforum.php?f=8">Themes</a></li>
													<li><a href="./viewforum.php?f=9"><span></span>BizLinks</a></li>
													<li><a href="./viewforum.php?f=10"><span></span>MatRoz</a></li>
													<li><a href="./viewforum.php?f=11"><span></span>ComeLooks</a></li>
												</ul>
											</div>
										</div>
									</div>
									<!-- Topic Breadcrumb End -->
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
												<li><a href="./memberlist.php?mode=contactadmin">Contact us</a></li>
												<li><a href="./memberlist.php?mode=team">The team</a></li>
												<li><a href="./ucp.php?mode=delete_cookies" data-ajax="true" data-refresh="true">Delete all board cookies</a></li>
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
								<p>Copyright 2016 &copy; <a href="./index.php">ForumUS</a>. All Rights Reserved. Powered by <a href="https://www.phpbb.com/">phpBB</a>&reg; Forum Software &copy; phpBB Limited.</p>
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
												<form action="./ucp.php?mode=login" method="post">
													<input type="text" name="username" placeholder="Username" class="form-control" />
													<input type="password" name="password" placeholder="Password" class="form-control" />
													<input type="submit" name="login" value="Login" class="submit-btn" />
													<input type="hidden" name="redirect" value="./viewtopic.php?f=3&amp;t=7" />

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
					
					
					<script type="text/javascript" src="./styles/forumus-default-version/template/forum_fn.js?assets_version=3"></script>
					<script type="text/javascript" src="./styles/forumus-default-version/template/ajax.js?assets_version=3"></script>
					<script type="text/javascript" src="./styles/forumus-default-version/template/bootstrap.min.js?assets_version=3"></script>
					<script type="text/javascript" src="./styles/forumus-default-version/template/jquery.validate.min.js?assets_version=3"></script>
					<script type="text/javascript" src="./styles/forumus-default-version/template/jparticle.jquery.min.js?assets_version=3"></script>
					<script type="text/javascript" src="./styles/forumus-default-version/template/jquery.sticky.min.js?assets_version=3"></script>
					<script type="text/javascript" src="./styles/forumus-default-version/template/custom-color-switcher.js?assets_version=3"></script>
					<script type="text/javascript" src="./styles/forumus-default-version/template/main.js?assets_version=3"></script>


					
				</body>
				</html>
