<article class="blog-excerpt">
	<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="bookmark">
		<h2><?php the_title(); ?></h2>

		<section class="post-content">
			<?php the_excerpt(); ?>
		</section>
	</a>

	<section class="post-meta">
		<p><?php echo get_the_date();?></p>
		<?php
			if (has_tag()){
				the_tags();
			}
		?>
	</section>
</article>
