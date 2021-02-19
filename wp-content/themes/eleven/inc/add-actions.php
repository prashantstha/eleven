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
        <ul class="slides owl-carousel owl-theme">
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
// header left wrapper open
add_action( 'storefront_header', 'eleven_header_left_wrap_open', 19);
if ( ! function_exists( 'eleven_header_left_wrap_open' ) ) {
	function eleven_header_left_wrap_open() {
		echo '<div class="container">';
	}

}
// header left wrapper close
add_action( 'storefront_header', 'eleven_header_left_wrap_close', 21);
if ( ! function_exists( 'eleven_header_left_wrap_close' ) ) {
	function eleven_header_left_wrap_close() {
        ?>
<div class="header-left">
    <nav id="site-navigation" class="main-navigation" role="navigation"
        aria-label="<?php esc_html_e( 'Primary Navigation', 'storefront' ); ?>">
        <button class="menu-toggle" aria-controls="site-navigation"
            aria-expanded="false"><span><?php echo esc_attr( apply_filters( 'storefront_menu_toggle_text', __( 'Menu', 'storefront' ) ) ); ?></span></button>
        <?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'primary-navigation',
				)
			);

			wp_nav_menu(
				array(
					'theme_location'  => 'handheld',
					'container_class' => 'handheld-navigation',
				)
			);
			?>
    </nav><!-- #site-navigation -->
    <?php 
        echo '</div>';
        echo '<div class="header-right">'; 
        
	}

}


// header right menu
// add_action( 'storefront_header', 'eleven_header_right_menu', 22);
if ( ! function_exists( 'eleven_header_right_menu' ) ) {
	function eleven_header_right_menu() {
		 wp_nav_menu( array(
			'theme_location' => 'header-right-menu',
			'menu_id'        => 'header-right-menu',
		) );
	}

}

// header right wrapper close
add_action( 'storefront_header', 'eleven_header_right_wrap_close', 70);
if ( ! function_exists( 'eleven_header_right_wrap_close' ) ) {
	function eleven_header_right_wrap_close() {
        echo '</div></div>';
       
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
            <ul class="service-process d-flex flex-wrap align-items-center justify-content-around">
                <?php while( have_rows('feature_list', 'option') ): the_row(); 
        $icon = get_sub_field('icon');
        $title = get_sub_field('title');
        ?>
                <li>
                    <?php if( $icon ) { ?>
                    <div class="icon-wrap">
                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['title']; ?>">
                    </div>
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