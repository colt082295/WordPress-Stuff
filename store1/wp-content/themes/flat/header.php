<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!-- Links to google fonts -->
		<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
		
		
		<!-- Icons & Favicons -->
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<link href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png" rel="apple-touch-icon" />
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
		 <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<!-- Drop Google Analytics here -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>
		<div class="off-canvas-wrap" data-offcanvas>
			<div class="inner-wrap">
				<div id="container">
					<header class="header" role="banner">
						<div class="top_bar_top">
							<div class="top-social-wrapper">
								<div class="top-social-in-wrapper">
								<a class="top-top-social-link" id="facebook-link" href="#"><svg class="top-top-social-svg" version="1.1" id="facebook-top-top-bar" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 96.124 96.123" style="enable-background:new 0 0 96.124 96.123;"
	 xml:space="preserve">
<g>
	<path d="M72.089,0.02L59.624,0C45.62,0,36.57,9.285,36.57,23.656v10.907H24.037c-1.083,0-1.96,0.878-1.96,1.961v15.803
		c0,1.083,0.878,1.96,1.96,1.96h12.533v39.876c0,1.083,0.877,1.96,1.96,1.96h16.352c1.083,0,1.96-0.878,1.96-1.96V54.287h14.654
		c1.083,0,1.96-0.877,1.96-1.96l0.006-15.803c0-0.52-0.207-1.018-0.574-1.386c-0.367-0.368-0.867-0.575-1.387-0.575H56.842v-9.246
		c0-4.444,1.059-6.7,6.848-6.7l8.397-0.003c1.082,0,1.959-0.878,1.959-1.96V1.98C74.046,0.899,73.17,0.022,72.089,0.02z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
</a><a class="top-top-social-link" id="linkedin-link" href="#"><svg class="top-top-social-svg" version="1.1" id="linkedin-top-top-bar" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 430.117 430.117" style="enable-background:new 0 0 430.117 430.117;"
	 xml:space="preserve">
<g><path id="LinkedIn" d="M430.117,261.543V420.56h-92.188V272.193c0-37.271-13.334-62.707-46.703-62.707
		c-25.473,0-40.632,17.142-47.301,33.724c-2.432,5.928-3.058,14.179-3.058,22.477V420.56h-92.219c0,0,1.242-251.285,0-277.32h92.21
		v39.309c-0.187,0.294-0.43,0.611-0.606,0.896h0.606v-0.896c12.251-18.869,34.13-45.824,83.102-45.824
		C384.633,136.724,430.117,176.361,430.117,261.543z M52.183,9.558C20.635,9.558,0,30.251,0,57.463
		c0,26.619,20.038,47.94,50.959,47.94h0.616c32.159,0,52.159-21.317,52.159-47.94C103.128,30.251,83.734,9.558,52.183,9.558z
		 M5.477,420.56h92.184v-277.32H5.477V420.56z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></a>
						<a class="top-top-social-link" id="twitter-link" href="#">
							<svg class="top-top-social-svg" version="1.1" id="twitter-top-top-bar" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 16.003 16.003" style="enable-background:new 0 0 16.003 16.003;" xml:space="preserve">
<g>
	<g>
		<path d="M16.003,3.04c-0.589,0.261-1.221,0.438-1.885,0.517c0.678-0.406,1.197-1.05,1.443-1.815
			c-0.636,0.376-1.338,0.649-2.086,0.797c-0.599-0.639-1.451-1.037-2.396-1.037c-1.813,0-3.283,1.47-3.283,3.282
			c0,0.257,0.029,0.508,0.085,0.748c-2.728-0.137-5.147-1.444-6.766-3.43C0.832,2.586,0.671,3.15,0.671,3.752
			c0,1.139,0.58,2.144,1.46,2.732C1.593,6.466,1.087,6.318,0.644,6.072v0.041c0,1.59,1.132,2.917,2.633,3.219
			C3.002,9.406,2.712,9.447,2.412,9.447c-0.212,0-0.417-0.021-0.618-0.061c0.418,1.305,1.63,2.254,3.066,2.28
			c-1.123,0.88-2.539,1.403-4.077,1.403c-0.265,0-0.526-0.016-0.783-0.045c1.453,0.933,3.178,1.477,5.032,1.477
			c6.039,0,9.34-5.002,9.34-9.34l-0.011-0.425C15.006,4.276,15.564,3.698,16.003,3.04z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>

						</a>
							</div>
						</div>	
						</div>
						 <!-- This navs will be applied to the topbar, above all content 
							  To see additional nav styles, visit the /partials directory -->
						 <?php get_template_part( 'partials/nav', 'top-offcanvas' ); ?>
						 						<div class="top_bar_bottom">
							<div class="breadcrumbs-wrapper"><div class="breadcrumbs"><?php if(function_exists('the_breadcrumb')) the_breadcrumb(); ?></div></div>
						</div>
								 
						<div id="inner-header" class="row">
							
							 <!-- This navs will be applied to the main, under the logo 
								  To see additional nav styles, visit the /partials directory -->
								  
							 <?php // get_template_part( 'partials/nav', 'main-offcanvas' ); ?>
	
						</div> <!-- end #inner-header -->
					</header> <!-- end .header -->
