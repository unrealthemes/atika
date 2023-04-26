<?php 
$category = $args['category'];
$link = get_term_link( (int)$category->term_id, $category->taxonomy );
$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true ); 
$image = wp_get_attachment_image_url( $thumbnail_id, 'medium' ); 
?>

<div class="tool-col">
    <a href="<?php echo esc_url($link); ?>">

        <?php if ( $image ) : ?>
            <img class="tool-col-img" src="<?php echo esc_attr($image); ?>" alt="<?php echo esc_attr($category->name); ?>">
        <?php endif; ?>

        <div class="tool-col-name">
            <?php echo esc_html($category->name); ?>
        </div>
    </a>
</div>