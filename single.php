<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 3.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <section class="main-torso single-torso--sidebar">
        <div class="single-torso__inner">
            <article class="single-torso__content">
                <h1><?php the_title(); ?></h1>

                <div class="post__posted">
                    Posted on <?php echo get_the_date();?>
                    by <?php the_author(); ?>.
                    <?php if(has_tag()) : ?>
                        <?php the_tags('Tagged: ');?>
                    <?php endif;?>
                </div> <!-- // post__posted -->

                <div class="post__text">
                    <?php the_content(); ?>
                </div> <!-- // post__text -->

                <div class="post__comments">
                    <?php if(!is_attachment()): ?>
                        <?php comments_template( '', true ); ?>
                    <?php endif; ?>
                </div>  <!-- //post__comments -->
            </article> <!-- //single-torso__content -->

            <aside class="single-torso__sidebar">
                <?php get_sidebar(); ?>
            </aside><!-- //single-torso__sidebar -->

        </div> <!-- //single-torso__inner -->
    </section><!-- // single-torso -->
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>