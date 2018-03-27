<?php
// we're going to generate a list of categories and link off to them
// but to be extra useful, you can also prepend and append whatever else you want (if you want)
$nav = $prenav = $postnav = array();

// the format for adding links is:
// $array['Clickable Slug'] = 'url to archive page';

// seems useful
$prenav['View All'] = get_permalink( get_option( 'page_for_posts' ) );

// want to include a custom post type at the end?
/*
if (wp_count_posts('cpt-name')) {
	$postnav['Some Custom Post Type'] = get_post_type_archive_link( 'cpt-name' );
}
*/

// this will build the main categories
$categories = get_categories();
foreach ($categories as $category){
	$nav[ $category->name ] = get_category_link( $category );
}

// put them all together (in this order)
$nav = array_merge($prenav, $nav, $postnav);

// build output
$nav_lis = '';
foreach ($nav as $name => $link){
	$class = '';
	// check whether we're currently looking at this page for "active" link classes
	$this_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . '://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
	if ($link === $this_url) {$class = ' class="current-menu-item"';}

	$nav_lis .= '<li'.$class.'><a href="'. $link .'">'. $name .'</a></li>';
}
?>
<nav class="blog-nav"><ul class="uppercase"><?php echo $nav_lis; ?></ul></nav>
