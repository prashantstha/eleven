<?php 

// header promotion bar
add_action( 'storefront_before_header', 'eleven_promotion_bar', 0 );
if ( ! function_exists( 'eleven_promotion_bar' ) ) {
	/**
	 * The header container
	 */
	function eleven_promotion_bar() {

		?>
<div class="promotion-bar">
    <div class="container">
        <?php if( have_rows('promotion_contents', 'option') ): ?>
        <ul class="slides">
            <?php while( have_rows('promotion_contents', 'option') ): the_row(); 
        ?>
            <li>
                <?php the_sub_field('promotion_text'); ?>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>
<?php
	}
}

// footer features
add_action( 'storefront_before_footer', 'footer_feature', 10);
if ( ! function_exists( 'footer_feature' ) ) {
    function footer_feature() {
        $section_background = get_field('section_background', 'option');
        if( $section_background ) {
            $section_bg = 'style="background-image:url(' . $section_background['url'] . ')"';
        }
        ?>
<div class="footer-features" <?php echo ' ' . $section_bg; ?>>
    <div class="container">
        <?php if( have_rows('feature_list', 'option') ): ?>
        <ul class="slides">
            <?php while( have_rows('feature_list', 'option') ): the_row(); 
        $icon = get_sub_field('icon');
        $title = get_sub_field('title');
        ?>
            <li>
                <?php if( $icon ) { ?>
                <div class="icon-wrap">
                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['title']; ?>"></div>
                <?php } ?>
                <?php if( $title ) { ?>
                <h3><?php echo $title; ?></h3>
                <?php } ?>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>
<?php 
    }
}