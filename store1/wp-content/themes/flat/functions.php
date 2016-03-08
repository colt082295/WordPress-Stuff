<?php
 
add_action('after_setup_theme','jointswp_child_theme_start', 16);
function jointswp_child_theme_start() {
	add_action('wp_enqueue_scripts', 'jointswp_child_theme_scripts_and_styles', 1000);
}
/*********************
SCRIPTS & ENQUEUEING
 *********************/
function jointswp_child_theme_scripts_and_styles() {
	$var = get_stylesheet_directory_uri() . '/style.css';
	// register main stylesheet
	wp_register_style( 'jointswp-child-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
	wp_enqueue_style( 'jointswp-child-stylesheet' );
}

//* Do NOT include the opening php tag
//* Make Font Awesome available
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_font_awesome() {
    wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );
}