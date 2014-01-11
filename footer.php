<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the wrap div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Zemplate
 * @since Zemplate 1.0
 */
?>

    <footer class="page-foot">
        <div class="page-foot__nav">
            <div class="nav__inner">
                <?php wp_nav_menu(); ?>
            </div>
        </div>
    </footer><!-- // main-foot -->
<!-- sticky footer will fail if anything goes between the closing footer and .wrap -->
</div><!-- // wrap -->

<?php wp_footer(); //mandatory ?>

</body>
</html>