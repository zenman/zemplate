<?php
get_header();

if ( !post_password_required() ){
	if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<main class="site-main" role="main">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</main>

	<?php endwhile;
} else {
	echo get_the_password_form();
}

get_footer(); ?>
