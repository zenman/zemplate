<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 3.0
 */


get_header(); ?>

    <section class="main-torso index-torso">
        <div class="index-torso__inner">
            <article class="index-torso__content">
                <?php the_content(); ?>
                <?php if(isset($_GET['s']) && $_GET['s']==''): ?>
                    <h1>Search:</h1>
                    <?php get_search_form(); ?>
                <?php endif; ?>
            </article><!-- //index-torso__content -->
        </div><!-- //index-torso__inner -->
    </section><!-- //index-torso -->

<?php get_footer(); ?>