<article class="blog-excerpt less-wide">
	<h3><?php echo zen_friendlier_post_type(get_post_type_object(get_post_type())->labels->singular_name); ?> &mdash; <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	<section class="post-content">
		<?php the_excerpt(); ?>
	</section>
</article>
