<?php 
$slides = get_field('slider_h');
$slides_t = get_field('slider_top_h');
$slides_b = get_field('slider_bottom_h');

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

        <?php if ($slides_t && count($slides_t) > 1) : ?>

            <div class="delivery-block swiper swiper-delivery">
                <div class="swiper-wrapper swiper-wrapper-delivery">

                    <?php 
                    foreach ($slides_t as $slide_t) : 
                        $img_url_slide = wp_get_attachment_url( $slide_t['img_id_slider_top_h'] ); 
                    ?>
                        <div class="swiper-slide swiper-slide-delivery">
                            
                            <?php if ($img_url_slide) : ?>
                                <a href="<?php echo esc_url($slide_t['link_slider_top_h']); ?>">
                                    <img src="<?php echo esc_attr($img_url_slide); ?>" alt="Slide image">
                                </a>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="swiper-pagination swiper-pagination-delivery"></div>
            </div>

        <?php elseif ($slides_t && count($slides_t) == 1) : ?>

            <div class="delivery-block">

                <?php 
                foreach ($slides_t as $slide_t) : 
                    $img_url_slide = wp_get_attachment_url( $slide_t['img_id_slider_top_h'] ); 
                ?>
                    <div class="swiper-slide swiper-slide-delivery">
                        
                        <?php if ($img_url_slide) : ?>
                            <a href="<?php echo esc_url($slide_t['link_slider_top_h']); ?>">
                                <img src="<?php echo esc_attr($img_url_slide); ?>" alt="Slide image">
                            </a>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>

            </div>

        <?php endif; ?>




        <?php if ($slides_b && count($slides_b) > 1) : ?>

            <div class="delivery-block swiper swiper-delivery">
                <div class="swiper-wrapper swiper-wrapper-delivery">

                    <?php 
                    foreach ($slides_b as $slide_b) : 
                        $img_url_slide = wp_get_attachment_url( $slide_b['img_id_slider_bottom_h'] ); 
                    ?>
                        <div class="swiper-slide swiper-slide-delivery">
                            
                            <?php if ($img_url_slide) : ?>
                                <a href="<?php echo esc_url($slide_b['link_slider_bottom_h']); ?>">
                                    <img src="<?php echo esc_attr($img_url_slide); ?>" alt="Slide image">
                                </a>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="swiper-pagination swiper-pagination-delivery"></div>
            </div>

        <?php elseif ($slides_b && count($slides_b) == 1) : ?>

            <div class="new-block">

                <?php 
                foreach ($slides_b as $slide_b) : 
                    $img_url_slide = wp_get_attachment_url( $slide_b['img_id_slider_bottom_h'] ); 
                ?>
                    <div class="swiper-slide swiper-slide-delivery">
                        
                        <?php if ($img_url_slide) : ?>
                            <a href="<?php echo esc_url($slide_b['link_slider_bottom_h']); ?>">
                                <img src="<?php echo esc_attr($img_url_slide); ?>" alt="Slide image">
                            </a>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>
</div>