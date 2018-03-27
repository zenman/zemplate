<?php

//======================================================================
// ACF + JSON = ZOMG
//======================================================================
add_filter('acf/settings/save_json', function($path) {
	return dirname(__DIR__) . '/acf-fields';
});
add_filter('acf/settings/load_json', function($paths) {
	unset($paths[0]);
	$paths[] = dirname(__DIR__) . '/acf-fields';
	return $paths;
});
