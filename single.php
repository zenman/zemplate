<?php
get_header();
?>
	<main class="site-main" role="main">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article class="content-width">
			<h1><?php the_title(); ?></h1>

			<section class="post-content cf">
				<?php the_content(); ?>
			</section>

			<section class="post-meta">
				<p><?php echo get_the_date();?></p>
				<?php
					if (has_category()){
						$categories = get_the_category();
						$cat_links = array();
						foreach ($categories as $category){
							$cat_links[] = '<a href="'.get_category_link($category).'" title="'.__('View all posts in this category', 'zemplate').'">'.trim(esc_html($category->name)).'</a>';
						}
						if ($cat_links){
							echo '<p class="blog-cats">'.implode(', ', $cat_links).'</p>';
						}
					}
					if (has_tag()){
						$tags = get_the_tags();
						$tag_links = array();
						foreach ($tags as $tag){
							$tag_links[] = '<a href="'.get_tag_link($tag).'" title="'.__('View all posts with this tag', 'zemplate').'">'.trim(esc_html($tag->name)).'</a>';
						}
						if ($tag_links){
							echo '<p class="blog-tags">'.implode(', ', $tag_links).'</p>';
						}
					}
				?>
			</section>

			<?php comments_template( '', true ); ?>
		</article>

	<?php endwhile;

	get_sidebar(); ?>

	</main><?php

get_footer(); ?>
