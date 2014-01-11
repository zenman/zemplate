<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 1.0
 */

get_header(); ?>

<section class="torso cat-torso--sidebar">
    <div class="cat-torso__inner">
        <div class="cat-torso__posts">
            <h1><?php echo single_cat_title('', false); ?></h1>
            <?php
                while (have_posts()) : the_post();
                    get_template_part('template/parts/blog', 'excerpt');
                endwhile;
            ?>
        </div>
        <aside class="cat-torso__sidebar">
            <?php get_sidebar(); ?>
        </aside><!-- //sidebar -->
    </div> <!-- //__inner -->
</section><!-- //cat-torso -->

<?php get_footer(); ?>