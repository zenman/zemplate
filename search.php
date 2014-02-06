<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 2.0
 */

get_header(); ?>

<section class="torso search-torso">
    <div class="search-torso__inner">
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
    </div>
</section>

<?php get_footer(); ?>
