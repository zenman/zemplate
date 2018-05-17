<?php
get_header();
?>
	<main class="site-main" role="main">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article class="content-width">
			<h1><?php the_title(); ?></h1>

			<section class="post-content">
				<?php the_content(); ?>
			</section>

			<section class="post-meta">
				<p><?php echo get_the_date();?></p>
				<?php
					if (has_tag()){
						the_tags();
					}
				?>
			</section>

			<?php comments_template( '', true ); ?>
		</article>

	<?php endwhile;

	get_sidebar(); ?>

	</main><?php

get_footer(); ?>
