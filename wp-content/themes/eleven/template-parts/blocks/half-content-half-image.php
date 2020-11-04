<?php

/**
 * Half content half image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'half-content-half-image-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'half-content-half-image';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$background_image = get_field('background_image');
$block_type = get_field('block_type');
$icon = get_field('icon');
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description') ?: 'Description';
$button = get_field('button');
$image = get_field('image');
if( $block_type === 'type_one' ) {
    $section_bg = 'style="background-image:url(' . $background_image['url'] . ')"';
}
if( $block_type === 'type_two' ) {
    $half_content_bg = 'style="background-image:url(' . $background_image['url'] . ')"';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo esc_attr($block_type); ?>"
    <?php echo ' ' . $section_bg; ?>>
    <div class="container">
        <div class="d-flex flex-wrap align-items-center position-relative">
            <div class="half-content" <?php echo ' ' . $half_content_bg; ?>>
                <?php if( $icon ) { ?>
                <div class="icon">
                    <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['title']; ?>">
                </div>
                <?php } ?>
                <?php if( $title ) { ?>
                <h2>SWITCH TO <b>PLANT</b> BASED <b>STRAWS</b></h2>
                <?php } ?>
                <?php if( $description ) { ?>
                <p>Your new favorite t-shirts for sunny skies from organic cotton to wicking performance</p>
                <?php } ?>
                <?php if( $button ) { ?>
                <div class="btn-wrap">
                    <a class="btn btn-white" href="<?php echo $button['url']; ?>"
                        <?php if( $button['target'] ) { echo ' target="_blank"'; } ?>><?php echo $button['title']; ?></a>
                </div>
                <?php } ?>
            </div>
            <?php if( $image ) { ?>
            <div class="half-image">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<div class="organic-straws">
    <div class="container">
        <div class="organic-list">
            <h3>What makes our straws Sustainable?</h3>
            <ul>
                <li>Made from Natural Materials</li>
                <li>100% Biodegradable Material made from freshly chopped Bamboos</li>
                <li>Does not Dissolve</li>
                <li>Marine Edible and Easily Disposable</li>
                <li>Easily Decomposable on Natural Environment</li>
                <li>100% Compostable</li>
                <li>No Toxins Released after Incinerated</li>
            </ul>
        </div>
    </div>
</div>