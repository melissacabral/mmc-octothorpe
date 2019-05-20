<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">

	<?php wp_head(); //HOOK. required for plugins and admin bar to work ?>
</head>
<body <?php body_class(); ?>>

	<header class="header">
		<div class="header-bar">
			<h1 class="site-title"><a href="<?php echo home_url('/'); ?>">
				<?php bloginfo('name'); ?>
					
				</a></h1>
			<h2><?php bloginfo('description'); ?></h2>
			<nav>
				<ul class="nav">
					<?php wp_list_pages( array( 
						'title_li' => '', 
					) ); ?>
				</ul>
			</nav>

		<?php get_search_form(); //default search bar or optionally add searchform.php?>
		</div>
	</header>
	<div class="wrapper">