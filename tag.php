<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 2.0
 */

get_header(); ?>

<section class="torso tag-torso--sidebar">
    <div class="tag-torso__inner">
        <div class="tag-torso__posts">
		    <h1><?php echo 'Tag Archives: ' . single_tag_title('', false); ?></h1>
		    <?php
                while (have_posts()) : the_post();
                    get_template_part('template/parts/blog', 'excerpt');
                endwhile;
		    ?>
		</div> <!-- //__posts -->
		<aside class="tag-torso__sidebar">
		    <?php get_sidebar(); ?>
		</aside>
	</div> <!-- //__inner -->
</section>

<?php get_footer(); ?>