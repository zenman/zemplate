<?php
get_header(); ?>

<main class="site-main" role="main">
	<?php
		if (have_posts()){
			the_archive_title( '<h1>', '</h1>' );
			while (have_posts()) : the_post();
				get_template_part('templates/blog', 'excerpt');
			endwhile;
			get_template_part( 'templates/pagination' );
		}
		get_sidebar();
	?>
</main>

<?php get_footer(); ?>
