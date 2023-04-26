<?php 
$slides = get_field('slider_h');
$img_id_top = get_field('img_id_top_h');
$img_url_top = wp_get_attachment_url( $img_id_top ); 
$link_top = get_field('link_top_h');
$img_id_bottom = get_field('img_id_bottom_h');
$img_url_bottom = wp_get_attachment_url( $img_id_bottom ); 
$link_bottom = get_field('link_bottom_h');
?>

<div class="home-section-1 swiper-delivery-group">

    <?php if ($slides) : ?>
        <div class="swiper-1-block">
            <div class="swiper swiper-1">
                <div class="swiper-wrapper">

                    <?php 
                    foreach ($slides as $slide) : 
                        $img_url_slide = wp_get_attachment_url( $slide['img_id_slider_h'] ); 
                    ?>
                        <div class="swiper-slide swiper-1-slide">

                            <?php if ($img_url_slide) : ?>
                                <a href="<?php echo esc_url($slide['link_slider_h']); ?>">
                                    <img src="<?php echo esc_attr($img_url_slide); ?>" alt="Slide image">
                                </a>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <div class="swiper-button-prev swiper-1-pn swiper-1-p"></div>
            <div class="swiper-button-next swiper-1-pn swiper-1-n"></div>

            <!-- <div class="swiper-pagination swiper-pagination-1"></div> -->

        </div>
    <?php endif; ?>

    <div class="delivery-new-group">

        <?php if ($img_id_top) : ?>
            <div class="delivery-block">
                <a href="<?php echo esc_url($link_top); ?>">
                    <img src="<?php echo esc_attr($img_url_top); ?>" alt="Slide image">
                </a>
            </div>
        <?php endif; ?>

        <?php if ($img_id_bottom) : ?>
            <div class="new-block">
                <a href="<?php echo esc_url($link_bottom); ?>">
                    <img src="<?php echo $img_url_bottom; ?>" alt="Slide image">
                </a>
            </div>
        <?php endif; ?>

    </div>

</div>