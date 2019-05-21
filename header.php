<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">

	<?php wp_head(); //HOOK. required for plugins and admin bar to work ?>
</head>
<body <?php body_class(); ?>>

	<header class="header" style="background-image:url(<?php header_image(); ?>);">
		<div class="header-bar">

			<?php the_custom_logo(); ?>

			<h1 class="site-title"><a href="<?php echo home_url('/'); ?>">
				<?php bloginfo('name'); ?>
					
				</a></h1>
			<h2><?php bloginfo('description'); ?></h2>
			
		<?php 
		//Main Navigation
		wp_nav_menu( array(
			'theme_location' 	=> 'main_menu', //a registered menu area
			'container' 		=> 'nav', //div or nav
			'container-class'	=> 'main-menu-container', //nav class="main-menu-container"
			'menu_class'		=> 'main-menu', //ul class="main-menu"
		) ); ?>

		<?php mmc_fancy_social_menu(); ?>


		<?php get_search_form(); //default search bar or optionally add searchform.php?>
		</div>
	</header>
	<div class="wrapper">