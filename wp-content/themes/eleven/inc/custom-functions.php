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


function image_alt_tag( $image = null )
{
	if( $image == null )	return;
	echo $image['alt'] ? $image['alt'] : $image['title'] ? $image['title'] : 'No ALT-Tag';
}

if ( ! function_exists( 'storefront_cart_link' ) ) {
    function storefront_cart_link() {
        ?>
<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>"
    title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
    <?php /* translators: %d: number of items in cart */ ?>
    <?php echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?> <span
        class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
</a>
<?php
    }
}