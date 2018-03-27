<?php
if ( post_password_required() ) {return;}
?>

<section class="comments">

	<?php
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				__( 'One Reply', 'zemplate' );
			} else {
				printf(
					_nx( '%1$s Reply', '%1$s Replies', $comments_number, 'zemplate' ),
					number_format_i18n( $comments_number )
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ul',
					'type'        => 'comment',
					'reply_text'  => __( 'Reply', 'zemplate' ),
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => __( 'Previous', 'zemplate' ),
			'next_text' => __( 'Next', 'zemplate' ),
		) );

	endif; // Check for have_comments().

	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'zemplate' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</section>
