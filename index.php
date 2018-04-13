<?php
get_header(); ?>

<main class="site-main" role="main">
	<?php if (have_posts()) : ?>
		<div class="content-width">
		<?php
			while (have_posts()) : the_post();
				get_template_part('templates/blog', 'excerpt');
			endwhile;
			get_template_part( 'templates/pagination' );
			get_sidebar();
		?>
		</div>
	<?php
		endif;
	?>
</main>

<?php get_footer(); ?>
