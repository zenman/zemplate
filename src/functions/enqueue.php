<?php

function zen_enqueues(){
	$ver = '1.0'; // bump this number as necessary for cache busting
	if ($_SERVER['HTTP_HOST'] === 'localhost'){$ver = NULL;}

	//======================================================================
	// Fonts
	//======================================================================
	wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Muli:400,700');

	//======================================================================
	// CSS
	//======================================================================
	// wp_enqueue_style( string $handle, string $src = '', array $deps = array(), string|bool|null $ver = false, string $media = 'all' )
	wp_enqueue_style( 'zemplate', get_template_directory_uri() . '/lib/style.css', array(), $ver);

	//======================================================================
	// JS
	//======================================================================
	// wp_enqueue_script( string $handle, string $src = '', array $deps = array(), string|bool|null $ver = false, bool $in_footer = false )
	if(!is_admin()){
		// wp_deregister_script( 'jquery' ); // new game +
		wp_enqueue_script( 'zemplate', get_template_directory_uri() . '/lib/js/scripts.min.js', array(), $ver, true);
	}

	//======================================================================
	// Conditional Includes
	//======================================================================
	// put this in template files as necessary (WP takes care of not adding it to the page more than once):
	//     wp_enqueue_script( 'whatever' );
	wp_register_script( 'sliders', get_template_directory_uri() . '/lib/js/sliders.min.js', array('zemplate'), $ver, true);
}
add_action('wp_enqueue_scripts', 'zen_enqueues');
