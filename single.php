<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 2.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <section class="torso single-torso--sidebar">
        <div class="single-torso__inner">
            <article class="single-torso__content--post">
                <h1><?php the_title(); ?></h1>

                <div class="post__posted">
                    Posted on <?php echo get_the_date();?>
                    by <?php the_author(); ?>.
                    <?php if(has_tag()) : ?>
                        <?php the_tags('Tagged: ');?>
                    <?php endif;?>
                </div> <!-- // posted -->

                <div class="post__content">
                    <?php the_content(); ?>
                </div> <!-- // contnet -->

                <div class="post__comments">
                    <?php if(!is_attachment()): ?>
                        <?php comments_template( '', true ); ?>
                    <?php endif; ?>
                </div>  <!-- //comments -->
            </article> <!-- //post -->

            <aside class="single-torso__sidebar">
                <?php get_sidebar(); ?>
            </aside><!-- //sidebar -->

        </div> <!-- //__inner -->
    </section><!-- // torso -->
<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>