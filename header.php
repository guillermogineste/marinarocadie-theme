<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" rel="shortcut icon">
		<script src="<?php echo get_template_directory_uri(); ?>/assets/js/lazysizes.min.js" async=""></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/4.1.1/normalize.min.css" media="screen" title="no title" charset="utf-8">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" media="screen" title="no title" charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">
				<!-- nav -->
				<nav class="header-navigation" role="navigation">
					<div class="logo-menu">
						<!-- logo -->
						<div class="logo">
							<a href="<?php echo home_url(); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-marinarocadie@2x.png" alt="Marina Roca Die - Logo" width="189" height="30">
							</a>
						</div>
						<!-- /logo -->
						<!-- menu icon -->
						<div class="menu-icon">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/menu-icon.svg" alt="Menu">
						</div>
						<!-- /menu icon -->
					</div>
					<ul class="main-navigation">
						<?php header_nav(); ?>
					</ul>
				</nav>
				<!-- /nav -->

			</header>
			<!-- /header -->
			<div class="overlay"></div>
