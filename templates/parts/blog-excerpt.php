<article class="single-torso__post">

    <h1><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

    <div class="signle-torso__posted">
        Posted on <?php echo get_the_date();?> by <?php the_author(); ?>. <?php if(has_tag()):?> <?php the_tags('Tagged: ');?> <?php endif;?>
    </div> <!-- // posted -->

    <div class="signle-torso__content">
        <?php the_excerpt(); ?>
    </div> <!-- // post -->

</article> <!-- //single__post -->