<!doctype html>  
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!--=== META TAGS ===-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="keywords" content="Keywords">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="author" content="Name">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!--=== FACEBOOK TAGS ===-->
	<meta property="og:title" content="<?php bloginfo( 'name' ); ?>">
	<meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
	<meta property="og:image" content="<?php bloginfo( 'template_url' ); ?>/screenshot.png">
	<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
	<meta property="og:url" content="<?php echo home_url(); ?>">
	<meta property="og:type" content="website">

	<!--=== LINK TAGS ===-->
	<link rel="shortcut icon" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.ico">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">

	<!--=== TITLE ===-->
	<title><?php wp_title( '&raquo;', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>

	<!--=== WP_HEAD() ===-->
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	<div class="container">
		<div id="pres" class="fixed">
			<p>Styling the WEB, one site at the time, beautifully</P>
		</div>
		<header id="menu" class="row">
					<div class="navbar">
						<div class="navbar-inner">
							<?php

							$args = array(
								'theme_location' => 'primary',
								'container'      => false,
								'menu_id'        => '',
								'menu_class'     => 'nav'
							);

							wp_nav_menu( $args );

							?>
						</div>
					</div>
				<div class="span4 pull-right">
					<?php get_search_form(); ?>
				</div>
		</header>
