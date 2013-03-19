<?php
function my_scripts_method() {
	wp_enqueue_script(
		'custom-script', '/wp-content/themes/SITENAME/media/js/custom.js',
		array('jquery')
	);
}
add_action('wp_enqueue_scripts', 'my_scripts_method');

function font_scripts_method() {
	wp_enqueue_script(
		'font-script', 'http://fast.fonts.com/jsapi/2e2fe9c7-203a-4b2b-9068-d6265cc3458c.js',
		array('jquery')
	);
}
add_action('wp_enqueue_scripts', 'font_scripts_method');
function form_scripts_method() {
	wp_enqueue_script(
		'form-script', '/wp-content/themes/SITENAME/media/js/jquery.gravity-placeholders.js',
		array('jquery')
	);
}
add_action('wp_enqueue_scripts', 'form_scripts_method');



 function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 35 );

/**
 * Add a widget area - functions.php
 *
 */

function home_widgets_init() {

	register_sidebar( array(
		'name' => 'Home Widgets',
		'id' => 'home-widgets',
		'before_widget' => '<div class="newsletter-form">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'home_widgets_init' );