<?php

//======================================================================
// EASY MODE
// Just edit these variables and most of the time things will be good
//======================================================================
$name = 'Example';
$plural = $name . 's';
$slug = sanitize_title_with_dashes($name);

// https://developer.wordpress.org/resource/dashicons/ or http://jpillora.com/base64-encoder/
$icon = 'dashicons-palmtree';

// 'title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'
$supports = array('title', 'editor', 'thumbnail');

//======================================================================
// EXPERT MODE
// Go nuts below
//======================================================================
$labels = array(
	'name'                  => _x( $plural, 'Post type general name', 'zemplate' ),
	'singular_name'         => _x( $name, 'Post type singular name', 'zemplate' ),
	'menu_name'             => _x( $plural, 'Admin Menu text', 'zemplate' ),
	'add_new'               => __( 'Add New', 'zemplate' ),
	'add_new_item'          => __( 'Add New '.$name, 'zemplate' ),
	'new_item'              => __( 'New '.$name, 'zemplate' ),
	'edit_item'             => __( 'Edit '.$name, 'zemplate' ),
	'view_item'             => __( 'View '.$name, 'zemplate' ),
	'all_items'             => __( $plural, 'zemplate' ),
	'search_items'          => __( 'Search '.$plural, 'zemplate' ),
	// 'parent_item_colon'     => __( 'Child of: ', 'zemplate' ),
	'not_found'             => __( 'No '.strtolower($plural).' found.', 'zemplate' ),
	'not_found_in_trash'    => __( 'No '.strtolower($plural).' found in Trash.', 'zemplate' ),
);

$args = array(
	// https://developer.wordpress.org/reference/functions/register_post_type/
	'labels'               => $labels,
	'public'               => true,
	'hierarchical'         => false,
	'exclude_from_search'  => false,
	'publicly_queryable'   => true,
	'show_ui'              => true,
	'show_in_menu'         => true,
	'show_in_nav_menus'    => false,
	'show_in_admin_bar'    => false,
	'show_in_rest'         => true,
	'menu_position'        => null,
	'menu_icon'            => $icon,
	'capability_type'      => 'post',
	'supports'             => $supports,
	'has_archive'          => true,
	'rewrite'              => true,
	// 'query_var'            => false,
	'can_export'           => true,
);

register_post_type($slug, $args);

// https://developer.wordpress.org/reference/functions/register_taxonomy/

?>
