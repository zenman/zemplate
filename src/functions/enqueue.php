<?php

function zen_enqueues(){
	$ver = '1.0'; // bump this number as necessary for cache busting
	if ($_SERVER['HTTP_HOST'] === 'localhost'){$ver = NULL;}

	//======================================================================
	// Fonts
	//======================================================================
	wp_enqueue_style('googleFonts1', '//fonts.googleapis.com/css?family=Muli:400,700');
	// wp_enqueue_style('googleFonts2', '//fonts.googleapis.com/css?family=Exo:600');

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
	// We use ACF a lot, but you can also do some checks for is_front_page() or template names or whatever you like...
	// Here are some examples that won't do anything but can serve as a template if you'd like
	if ( function_exists('have_rows') && have_rows( 'modules' ) ){
		while(have_rows('modules')){
			the_row();

			switch (get_row_layout()) {
				case 'caret_slider':
				case 'some_other_slider':
					wp_enqueue_style( 'flickity-css', get_template_directory_uri() . '/lib/js/flickity/flickity.min.css', array(), '2.0.10');
					wp_enqueue_script( 'flickity-js', get_template_directory_uri() . '/lib/js/flickity/flickity.pkgd.min.js', array(), '2.0.10', true );
					wp_enqueue_script( 'zemplate-sliders', get_template_directory_uri() . '/lib/js/sliders.min.js', array('flickity-js'), $ver, true);
					break;
				case 'animated_stats':
					wp_enqueue_script( 'zemplate-inview', get_template_directory_uri() . '/lib/js/inview.min.js', array('zemplate'), $ver, true);
					break;
			}
		}
	}
}
add_action('wp_enqueue_scripts', 'zen_enqueues');
