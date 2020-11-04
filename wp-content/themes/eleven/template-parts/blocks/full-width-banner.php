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

<div class="eo-about">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center">
            <div class="about-image" style="background-image: url('http://localhost/eleven/wp-content/uploads/2020/08/vneck-tee-2.jpg');">
                
            </div>
            <div class="about-intro align-self-baseline">
                <div class="about-icon">
                    <img src="http://localhost/eleven/wp-content/uploads/2020/08/about-icon.png">
                </div>
                <h3>Drinking Straws Made From Plant</h3>
                <p>It’s simple, really. Nature makes lots of things which are functional and beautiful, but they were forgotten with the invention of synthetic materials. We're just bringing back natures original straws, which are hand harvested by our farmers. No pesticides, no processing, no nasties. Simple, the way nature intended.</p>
                <a href="#" class="btn btn-border">Learn More</a>
            </div>
        </div>
    </div>
</div>


<!-- <div class="switch-to-eo">
    <div class="container">
        <div clas="switch-desc">
            <h2>SWITCH TO <b>PLANT</b> BASED <b>STRAWS</b></h2>
            <p>Your new favorite t-shirts for sunny skies from organic cotton to wicking performance</p>
            <a href="#" class="btn btn-white">Shop Now</a>
        </div>
        <div class="switch-image">
            <img src="http://localhost/eleven/wp-content/uploads/2020/08/switch-image.jpg">
        </div>
    </div>
</div> -->