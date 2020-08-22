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