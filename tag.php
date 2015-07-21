<?php
/**
 * The template for displaying tag archive pages.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 3.0
 */

get_header(); ?>

<section class="main-torso tag-torso--sidebar">
    <div class="tag-torso__inner">
        <article class="tag-torso__content">
            <h1><?php echo 'Tag Archives: ' . single_tag_title('', false); ?></h1>
            <?php
                while (have_posts()) : the_post();
                    get_template_part('templates/parts/blog', 'excerpt');
                endwhile;
            ?>
        </article><!-- //tag-torso__content -->
        <aside class="tag-torso__sidebar">
            <?php get_sidebar(); ?>
        </aside><!-- //tag-torso__sidebar -->
    </div><!-- //tag-torso__inner -->
</section><!-- //tag-torso -->

<?php get_footer(); ?>