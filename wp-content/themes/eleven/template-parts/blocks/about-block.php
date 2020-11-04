<?php

/**
 * About Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'eo-about';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description') ?: 'Description';

$image = get_field('image');
$icon = get_field('icon');
$button = get_field('button');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center">
            <div class="about-image" style="background-image: url('<?php echo $image['url']; ?>');"></div>
            <div class="about-intro align-self-baseline">
                <?php if( $icon ) {?>
                <div class="about-icon">
                    <img src="<?php echo $icon['url']; ?>" alt="<?php image_alt_tag($icon); ?>">
                </div>
                <?php } ?>
                <?php if( $title ) {?>
                <h3><?php echo $title; ?></h3>
                <?php } ?>
                <?php if( $description ) { echo $description; } ?>
                <?php if( $button ) {?>
                <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"
                    class="btn btn-border"><?php echo $button['title']; ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>