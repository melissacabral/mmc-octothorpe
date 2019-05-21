<?php
//activate sleeping features of WP

//post formats allow different styles on different kinds of posts. make sure to use post_class() on your post container. Only activate the post-formats you want to use
add_theme_support( 'post-formats', array( 'image', 'link', 'gallery', 'audio', 'video', 'aside', 'chat', 'quote' , 'status' ) );

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

//no close php