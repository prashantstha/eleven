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

$choose_banner_media = get_field('choose_banner_media');
if( $choose_banner_media == 'image') {
    $banner_image = get_field('banner_image');
    if( $banner_image ) {
        $banner_style = 'style="background-image:url(' . $banner_image['url'] . ')"';
    }
}
if( $choose_banner_media == 'video') {
    $banner_video = get_field('banner_video');
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" <?php echo $banner_style; ?>>
    <?php if( $banner_video ) { ?>
    <div class="video-container">
        <video loop autoplay playsinline muted id="bannerVideo" src="<?php echo $banner_video['url']; ?>"></video>

    </div>
    <?php } ?>
    <div class="container">
        <div class="banner-content">
            <h2><?php echo $title; ?></h2>
            <p><?php echo $description; ?></p>
            <div class="btn-wrap">
                <?php if( have_rows('buttons') ) :
                    while( have_rows('buttons') ): the_row();
                        $button = get_sub_field('button');
                ?>
                <a href="<?php echo $button['url']; ?>" <?php if( $button['target'] ) { ?> target="_blank"
                    <?php } ?>><?php echo $button['title']; ?></a>
                <?php endwhile;
            endif; ?>
            </div>
        </div>
    </div>
</div>