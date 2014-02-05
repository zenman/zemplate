<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 1.0
 */
?>

</div><!-- // wrap -->
<footer class="main-foot">
    <div class="main-foot--nav">
    	<div class="nav__inner">
	        <?php wp_nav_menu(); ?>
	    </div>
    </div>
</footer><!-- // main-foot -->

<?php wp_footer(); //mandatory ?>

</body>
</html>