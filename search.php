<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 3.0
 */

get_header(); ?>

<section class="main-torso search-torso">
    <div class="search-torso__inner">
        <article class="search-torso__content">
            <?php if (have_posts()) : ?>
                <h3>Not what you're looking for? Search again</h3>
                <?php get_search_form(); ?>
                <h1><?php echo 'Search Results for: ' . get_search_query(); ?></h1>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('templates/parts/search', 'results'); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <h1><?php echo 'Nothing Found'; ?></h1>
                <p><?php echo 'We couldn\'t find anything that matched your search criteria. Please try again with some different keywords.'; ?></p>
                <?php get_search_form(); ?>
            <?php endif; ?>
        </article><!-- //search-torso__content -->
    </div><!-- //search-torso__inner -->
</section><!-- //search-torso -->

<?php get_footer(); ?>
