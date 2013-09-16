<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 2.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <section class="main page-main">
        <div class="content__inner">
            <article class="page-main__content">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </article><!-- //content -->
        </div> <!-- //__inner -->
    </section><!-- //page-main -->
<?php endwhile; ?>

<?php get_footer(); ?>