<?php
global $wp_query;

$q = get_search_query();

get_header(); ?>

<main class="site-main" role="main">
	<?php if ( have_posts() ): ?>
		<section class="section content-width">
			<h1 class="text-center"><?php echo sprintf( _n( 'There is %1$s search result for:', 'There are %1$s search results for:', $wp_query->found_posts, 'zemplate' ), $wp_query->found_posts ); ?> <span class="search-query"><?php echo $q; ?></span></h1>
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'templates/search', 'results' );
			endwhile;

			get_template_part( 'templates/pagination' );
			?>
		</section>

		<section class="section bg-highlight text-center">
			<div class="content-width">
				<h2><?php _e( 'Not what you\'re looking for? Search again:', 'zemplate' ); ?></h2>
				<?php get_search_form(); ?>
			</div>
		</section>
	<?php else: ?>
		<section class="section content-width text-center">
			<?php if (!$q): ?>
				<h1><?php _e( 'What can we help you find?', 'zemplate' ); ?></h1>
			<?php else: ?>
				<h1><?php _e( 'Nothing found', 'zemplate' ); ?></h1>
				<p><?php _e( 'We couldn\'t find anything to show you for that search. Please try again with some different keywords.', 'zemplate' ); ?></p>
			<?php endif;

			get_search_form();
			?>
		</section>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
