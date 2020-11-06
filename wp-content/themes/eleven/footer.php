<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

</div><!-- .col-full -->
</div><!-- #content -->

<?php do_action( 'storefront_before_footer' ); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="col-full">
        <div class="container">
            <?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' );
			?>
        </div>
    </div><!-- .col-full -->
    <div class="footer-bottom">
        <div class="container">
            <div class="copy-right">
                © <?php the_date('Y'); echo ' ' . get_bloginfo('name'); ?>

            </div>
            <?php
			wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'menu_id'        => 'footer-menu',
			) );
			?>
            <?php if( have_rows('social_icon', 'option') ): ?>
            <div class="social-icon-wrap">
                <ul class="social-icon">
                    <?php while( have_rows('social_icon', 'option') ): the_row(); 
				$icon = get_sub_field('icon');
				$link = get_sub_field('link');
				?>
                    <li class="social-icon-item">
                        <?php if( $link ) { ?><a href="<?php echo $link; ?>" target="_blank"><?php } ?><img
                                src="<?php echo $icon['url']; ?>"
                                alt="<?php image_alt_tag($icon); ?>"><?php if( $link ) { ?></a><?php } ?>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
</footer><!-- #colophon -->

<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>