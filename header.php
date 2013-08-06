<html>
<head>
	<title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width" />
	<?php wp_head(); ?>

	<link rel="shortcut icon" href="<?php echo THEME_DIR; ?>/path/favicon.ico" /> 
	<link href='http://fonts.googleapis.com/css?family=Roboto:300, 300italic,400,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
	<?php if(is_front_page()) { ?><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/lib/css/flexslider.css" type="text/css" media="screen" /> <?php } ?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/lib/css/magnific.css">
	<link href='<?php bloginfo('stylesheet_directory'); ?>/lib/css/style.css' rel='stylesheet' type='text/css'>
	<link href='<?php bloginfo('stylesheet_directory'); ?>/lib/css/responsive.css' rel='stylesheet' type='text/css'>

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="<?php bloginfo('stylesheet_directory'); ?>/lib/js/magnific.js"></script>
	<script defer src="<?php bloginfo('stylesheet_directory'); ?>/lib/js/jquery.flexslider.js"></script>
</head>
<body class="loading">
	<div class="wrapper">
		<div class="header">
			<div class="w-container">
				<div class="logo"><a href="<?php echo home_url(); ?>" title="Go to the Home Page"><img src="<?php bloginfo('template_directory'); ?>/lib/img/logo.png" alt="Go the Home Page" /></a></div>
				<?php wp_nav_menu(array( 'menu' => 'Primary', 'menu_class' => 'nav', 'menu_id' => '', 'container' => false, 'theme_location' => 'primary', 'show_home' => '1')); ?>  

				<!-- Mobile Navigation -->
				<ul class="nav mobile-nav">
					<li><a class="menu-modal" href="#menu-modal"><i class="icon-menu"></i> Menu</a>
				</ul>
				<?php wp_nav_menu(array( 'menu' => 'Primary', 'menu_class' => '', 'menu_id' => '', 'container' => 'div', 'container_id' => 'menu-modal', 'container_class' => 'white-popup-block mfp-hide', 'theme_location' => 'primary-menu', 'show_home' => '1')); ?>  
			</div>
		</div>