<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	

	<?php wp_head(); //HOOK. required for plugins and admin bar to work ?>

	
</head>
<body <?php body_class(); ?>>
	<?php 
	//custom header background style
	$style_attribute = '';
	if( has_custom_header() ){
		$style_attribute = 'style="background-image:url(' . get_header_image() . ');"';
	} ?>

	<header class="header" <?php echo $style_attribute; ?>>
		<div class="header-bar">

			<div class="branding">
				<?php if(is_front_page()){
					the_custom_logo();
					} ?>

				<h1 class="site-title"><a href="<?php echo home_url('/'); ?>">
					<?php bloginfo('name'); ?>
						
					</a></h1>
				<h2><?php bloginfo('description'); ?></h2>
			</div>
			
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

		<?php mmc_cart_contents(); ?>

		</div>
	</header>
	<div class="wrapper">