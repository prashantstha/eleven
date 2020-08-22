<?php

/**
 * Full Width Banner Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'full-width-banner-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'full-width-banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description') ?: 'Description';
$banner_image = get_field('banner_image');


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>"
    style="background-image:url(<?php echo $banner_image['url']; ?>)">
    <div class="container">
        <div class="banner-content">
            <h2><?php echo $title; ?></h2>
            <p><?php echo $description; ?></p>
            <div class="btn-wrap">
                <?php if( have_rows('buttons') ) : ?>
                <?php while( have_rows('buttons') ): the_row();
                        $button = get_sub_field('button');
                        ?>
                <a href="<?php echo $button['url']; ?>"
                    <?php if( $button['target'] ) { echo ' target="_blank"'; } ?>><?php echo $button['title']; ?></a>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>