<?php
//required stuff!
//max width of youtube and other embeds
if ( ! isset( $content_width ) ) $content_width = 700;

//activate sleeping features of WP

//post formats allow different styles on different kinds of posts. make sure to use post_class() on your post container. Only activate the post-formats you want to use
//add_theme_support( 'post-formats', array( 'image', 'link', 'gallery', 'audio', 'video', 'aside', 'chat', 'quote' , 'status' ) );

//featured images
add_theme_support( 'post-thumbnails' );
			  //name, width, height, crop?
add_image_size( 'teeny', 20, 20, true );

//custom background on body tag
add_theme_support( 'custom-background' );

//custom header
$header_args = array(
	'width' 	=> 1000,
	'height'	=> 300,
);

add_theme_support( 'custom-header', $header_args );

//custom logo
$logo_args = array(
	'width' 		=> 300,
	'height'		=> 300,
	'flex-width'	=> true,
	'flex-height' 	=> true,
);
add_theme_support( 'custom-logo', $logo_args );


//improve RSS and JSON feeds
add_theme_support( 'automatic-feed-links' );

//use modern markup on wordpress HTML output
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 
									'gallery', 'caption' ) );


//make sure to remove the <title> HTML from header.php. WordPress will automagically add it
add_theme_support( 'title-tag' );


//customize the length of all excerpts (wp default is 55 words)
function mmc_excerpt_length(){
	return 10;
}
add_filter( 'excerpt_length', 'mmc_excerpt_length' );

//change the [...]
function mmc_dotdotdot(){
	return '&hellip; <a href="' . get_permalink() . '" class="read-more">Read More</a>' ;
}
add_filter( 'excerpt_more', 'mmc_dotdotdot' );


//action hook experiment
function mmc_whatever(){
	echo 'The loop started!!!';
}
//add_action( 'loop_start', 'mmc_whatever', 1 );


/**
 * All Menu Locations for this theme
 */
function mmc_menu_areas(){
	register_nav_menus( array(
		//code-friendly => human-friendly
		'main_menu' 	=> 'Main Menu',
		'social_menu' 	=> 'Social Media Menu',
	) );
}
add_action( 'init', 'mmc_menu_areas' );

//HTML output for Social Media Menu. Call this in header.php
function mmc_fancy_social_menu(){
	//Social Media Links
		 wp_nav_menu( array(
		 	'theme_location' 	=> 'social_menu',
		 	'container' 		=> false, //no container
		 	'menu_class'		=> 'social-navigation',
		 	'fallback_cb'		=> false, //do nothing if no menu in this location
		 	'link_before'		=> '<span class="screen-reader-text">',
		 	'link_after'		=> '</span>',
		 ) );
}

/**
 * Load all CSS and JS this theme needs
 */
add_action( 'wp_enqueue_scripts', 'mmc_stylesheets' );
function mmc_stylesheets(){
	//do this instead of a <link> in your header to style.css
	wp_enqueue_style( 'theme-style', get_stylesheet_uri()  );
	wp_enqueue_style( 'genericons', get_stylesheet_directory_uri() . '/genericons/genericons.css' );

	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}


/**
 * Pagination for archives and singular things
 */
function mmc_pagination(){
	//if we are looking at a single post, show the single pagination
	if( is_singular() ){
		previous_post_link();
		next_post_link();
	}
	//otherwise show the numbered pagination (archive view)
	else{
		//numbered pagination
		the_posts_pagination();

		//next/previous buttons
		//next_posts_link();
		//previous_posts_link();
	}
}

/**
 * Widget Areas (Dynamic Sidebars)
 */
function mmc_widget_areas(){
	//register one widget area
	register_sidebar( array(
		'name'          => 'Blog Sidebar',
		'id'            => 'blog-sidebar',   
		'description'   => 'Appears next to blog posts and archives',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Page Sidebar',
		'id'            => 'page-sidebar',   
		'description'   => 'Appears next to static pages',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Footer Widgets',
		'id'            => 'footer-widgets',   
		'description'   => 'Appears at the bottom of every screen',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => 'Shop Widgets',
		'id'            => 'shop-widgets',   
		'description'   => 'Appears on WooCommerce shop screens',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'mmc_widget_areas' );

/**
 * Count the Comments and trackbacks separately
 */
add_filter( 'get_comments_number', 'mmc_comment_count' );
function mmc_comment_count(){
	//post id
	global $id;
	$comments = get_approved_comments($id);

	$count = 0;
	foreach( $comments as $comment ){
		//if it's a real comment, increase the count
		if( $comment->comment_type == '' ){
			$count ++;
		}
	}
	return $count;
}

//count trackbacks and pingbacks
function mmc_pings_count(){
	//post id
	global $id;
	$comments = get_approved_comments($id);

	$count = 0;
	foreach( $comments as $comment ){
		//if it's not real comment, increase the count
		if( $comment->comment_type != '' ){
			$count ++;
		}
	}
	return $count;
}

/**
 * WooCommerce Additions
 */
add_theme_support('woocommerce');
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');


//fix the <main> container on woo templates

function mmc_container_start(){
	echo '<main class="content">';
}

function mmc_container_end(){
	echo '</main>';
}

//remove existing <main>
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'woocommerce_before_main_content', 'mmc_container_start', 10 );
add_action( 'woocommerce_after_main_content', 'mmc_container_end', 10 );



//Show the current cart contents (for the header)
function mmc_cart_contents(){
?>
	<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
<?php 
}


/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}


//no close php