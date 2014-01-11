<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 2.0
 */

get_header(); ?>

<section class="torso arch-torso--sidebar">
    <div class="arch-torso__inner">
        <div class="arch-torso__posts">
            <?php if (have_posts()): ?>
                <h1><?php
                    if (is_day()) :
                        echo 'Daily Archives: ' . get_the_date();
                    elseif (is_month()) :
                        echo 'Monthly Archives: ' . get_the_date('F Y', 'monthly archives date format');
                    elseif (is_year()) :
                        echo 'Yearly Archives: ' . get_the_date('Y', 'yearly archives date format');
                    else :
                        echo 'Archives';
                    endif;
                ?></h1>

            <?php
                while (have_posts()) : the_post();
                    get_template_part('template/parts/blog', 'excerpt');
                endwhile;
            ?>
        <?php endif; ?>
    </div> <!-- //posts -->
    <aside class="main-torso__sidebar">
        <?php get_sidebar(); ?>
    </aside><!-- //sidebar -->
</div>
</section><!-- //content -->


<?php get_footer(); ?>