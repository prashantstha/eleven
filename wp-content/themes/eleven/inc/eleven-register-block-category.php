<?php
function eleven_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'eleven-blocks',
				'title' => __( 'Eleven Blocks', 'eelevenb-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'eleven_block_category', 10, 2);