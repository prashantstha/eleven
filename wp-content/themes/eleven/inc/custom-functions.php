<?php

/*SVG Image Uploader*/

function review_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'review_mime_types');



function vr($data){
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
}

function pr($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}


// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'header-right-menu' => esc_html__( 'Header right menu ', 'storefront' ),
) );

// header custom cart menu
if ( ! function_exists( 'storefront_cart_link' ) ) {
	
	/**
	 * Cart Link
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function storefront_cart_link() {
		if ( ! storefront_woo_cart_available() ) {
			return;
		}
		?>


<a class="cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>"
    title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
    <?php /* translators: %d: number of items in cart */ ?>
    <?php //echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?> <span
        class="count"><?php //echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) ); ?>
        <?php echo WC()->cart->get_cart_contents_count(); ?></span>
    <i class="fas fa-shopping-basket"></i>
</a>
<?php
	}
}