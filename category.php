<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 1.0
 */

get_header(); ?>

<section class="main cat-main--sidebar">
    <div class="cat-main__inner">
        <div class="cat-main__posts">
            <h1><?php echo single_cat_title('', false); ?></h1>
            <?php
                while (have_posts()) : the_post();
                    get_template_part('template/parts/blog', 'excerpt');
                endwhile;
            ?>
        </div>
        <aside class="cat-main__sidebar">
            <?php get_sidebar(); ?>
        </aside><!-- //sidebar -->
    </div> <!-- //__inner -->
</section><!-- //cat-main -->

<?php get_footer(); ?>