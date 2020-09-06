<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */
define( 'ELEVEN_THEME_URL', get_stylesheet_directory() );

add_action( 'wp_enqueue_scripts', 'menu_scripts' );
function menu_scripts() {
wp_enqueue_script(
    'enleven-bundle',
    get_bloginfo( 'stylesheet_directory' ) . '/assets/dist/js/enleven-bundle.js',
    array( 'jquery' )
);
        }
/**
 * Theme options
 */

require_once( ELEVEN_THEME_URL . '/inc/theme-option.php');
/**
* Implement the Custom Functions feature.
*/
require_once( ELEVEN_THEME_URL . '/inc/custom-functions.php');


/**
* Custom ACF Block
*/
require_once( ELEVEN_THEME_URL . '/inc/eleven-register-block-category.php');
require_once( ELEVEN_THEME_URL . '/inc/custom-block.php');

/**
* Remove actions
*/
require_once( ELEVEN_THEME_URL . '/inc/add-actions.php');
require_once( ELEVEN_THEME_URL . '/inc/remove-actions.php');