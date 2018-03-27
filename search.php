<?php
get_header(); ?>

<main class="site-main" role="main">
	<h1 class="page-title"><?php
		if ( have_posts() ){
			printf( __( 'Results for: %s', 'zemplate' ), '<span>' . get_search_query() . '</span>' );
		} else {
			_e( 'Nothing Found', 'zemplate' );
		}
	?></h1>

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			get_template_part( 'templates/search', 'results' );
		endwhile;

		get_template_part( 'templates/pagination' );
		?>

		<h2>Not what you're looking for? Search again:</h2>
		<?php get_search_form();

	else : ?>

		<p><?php _e( 'We couldn\'t find anything to show you for that search. Please try again with some different keywords.', 'zemplate' ); ?></p>
		<?php
			get_search_form();

	endif; ?>
</main>

<?php get_footer(); ?>
