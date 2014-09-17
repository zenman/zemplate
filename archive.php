<?php
/**
 * The template for displaying archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 3.0
 */

get_header(); ?>

<section class="main-torso arch-torso--sidebar">
    <div class="arch-torso__inner">
        <article class="arch-torso__content">
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
                    get_template_part('templates/parts/blog', 'excerpt');
                endwhile;
            ?>
        <?php endif; ?>
        </article> <!-- //arch-torso__content -->
        <aside class="arch-torso__sidebar">
            <?php get_sidebar(); ?>
        </aside><!-- //arch-torso__sidebar -->
    </div><!-- //arch-torso__inner -->
</section><!-- //arch-torso -->

<?php get_footer(); ?>