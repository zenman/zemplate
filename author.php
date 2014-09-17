<?php
/**
 * The template for displaying author archive pages.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 3.0
 */

get_header(); ?>

<section class="main-torso author-torso--sidebar">
    <div class="author-torso__inner">
       <?php if ( have_posts() ) : ?>

            <article class="author-torso__content">

                <?php //Queue the first post, that way we know what author we're dealing with (if that is the case). We reset this later so we can run the loop properly with a call to rewind_posts().
                the_post(); ?>

                <header class="author__header">
                    <h1 class="author__title"><?php printf( __( 'Author Archives: %s' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
                </header><!-- author__header -->

                <?php //Since we called the_post() above, we need to rewind the loop back to the beginning that way we can run the loop properly, in full.
                rewind_posts(); ?>

                <?php // If a user has filled out their description, show a bio on their entries.
                if ( get_the_author_meta( 'description' ) ) : ?>
                    <div class="author__info">
                        <div class="author__avatar">
                            <?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
                        </div><!-- author__avatar -->
                        <div class="author__bio">
                            <h2><?php printf( __( 'About %s' ), get_the_author() ); ?></h2>
                            <p><?php the_author_meta( 'description' ); ?></p>
                        </div><!-- author__bio  -->
                    </div><!-- author__info -->
                <?php endif; ?>

                <div class="author-torso__posts">
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'templates/parts/blog', 'excerpt' ); ?>
                    <?php endwhile; ?>
                </div><!-- //author-torso__posts -->

            </article><!-- //author-torso__content -->

        <?php endif; ?>

        <aside class="author-torso__sidebar">
            <?php get_sidebar(); ?>
        </aside><!-- //author-torso__sidebar -->

    </div> <!-- //author-torso__inner -->
</section><!-- //author-torso -->

<?php get_footer(); ?>