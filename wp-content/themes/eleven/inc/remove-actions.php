<?php 
add_action( 'init', 'remove_eleven_action');
function remove_eleven_action() {
    remove_action( 'storefront_homepage', 'storefront_homepage_header', 10 );
    remove_action( 'storefront_header', 'storefront_header_container', 0 );
    remove_action( 'storefront_header', 'storefront_header_container_close', 41 );
    remove_action( 'homepage', 'storefront_product_categories', 20 );
    remove_action( 'homepage', 'storefront_recent_products', 30 );
    remove_action( 'homepage', 'storefront_featured_products', 40 );
    remove_action( 'homepage', 'storefront_popular_products', 50 );
    remove_action( 'homepage', 'storefront_on_sale_products', 60 );
}