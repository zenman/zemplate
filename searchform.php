<form role="search" method="get" class="search-form horiz centered margins-off" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<?php echo _x( 'Search for:', 'label', 'zemplate' ); ?>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'zemplate' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><?php echo _x( 'Search', 'submit button', 'zemplate' ); ?></button>
</form>
