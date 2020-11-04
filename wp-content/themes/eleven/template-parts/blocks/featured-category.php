<?php

/**
 * Featured category Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'featured-category-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'featured-category';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="featured-category-lists">
            <?php if( have_rows('featured_category_lists') ) : ?>
            <?php while( have_rows('featured_category_lists') ): the_row();
                $title = get_sub_field('title') ?: 'Your category title here...';
                $description = get_sub_field('description') ?: 'Short description';
                $image = get_sub_field('image');
                $link = get_sub_field('link');
                $tag = get_sub_field('tag');
                ?>
            <div class="featured-category-lists-item">
                <?php if( $image ) { ?>
                <div class="image"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>"></div>
                <?php } ?>
                <?php if( $tag ) { ?>
                <div class="tag"><?php echo $tag; ?></div>
                <?php } ?>
                <div class="content">
                    <?php if( $title ) { ?>
                    <h3><?php echo $title; ?></h3>
                    <?php } ?>
                    <?php if( $description ) { ?>
                    <div class="description"><?php echo $description; ?></div>
                    <?php } ?>
                    <?php if( $link ) { ?>
                    <div class="btn-wrap">
                        <a class="btn btn-primary" href="<?php echo $link['url']; ?>"
                            <?php if( $link['target'] ) { echo ' target="_blank"'; } ?>><?php echo $link['title']; ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>