<?php 
$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<div class="swiper-slide stat-col">
    <a class="stat__link" href="<?php the_permalink(); ?>">

        <?php the_title('<div class="stat-col-name">', '</div>'); ?>

        <div class="stat-col-desc">
            <?php the_excerpt(); ?>
        </div>

        <?php if ( has_post_thumbnail() ) : ?>
            <img class="stat-col-img" src="<?php echo esc_attr($thumbnail_url); ?>" alt="Image">
        <?php endif; ?>

    </a>
</div>