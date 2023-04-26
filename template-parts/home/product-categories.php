<?php 
$title = get_field('title_cats_h');
$cats = get_field('cats_h');
?>

<div class="home-section-2 tool">

    <?php if ($title) : ?>
        <div class="tool-title">
            <?php echo esc_html($title); ?>
        </div>
    <?php endif; ?>

    <div class="tool-group-1">

        <?php if ($cats) : ?>

            <?php foreach ( $cats as $cat ) : ?>

                <?php get_template_part('template-parts/category', 'item', ['category' => $cat]); ?>

            <?php endforeach; ?>

        <?php else : ?>

            <?php 
            $categories = get_terms( 
                'product_cat', [
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'parent' => 0,
                    'hide_empty' => 0,
                ] 
            ); 
            ?>

            <?php foreach ( $categories as $category ) : ?>

                <?php get_template_part('template-parts/category', 'item', ['category' => $category]); ?>

            <?php endforeach; ?>

        <?php endif; ?>

    </div>
</div>