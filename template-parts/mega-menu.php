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

<?php if ( $categories ) : ?>

    <div class="catalog_m-fixed">
        <div class="catalog_m-block">
            <div class="container">
                <div class="catalog_m-block-wrapper">

                    <?php 
                    foreach ( $categories as $key => $category ) : 
                        $link = get_term_link( (int)$category->term_id, $category->taxonomy );
                        $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true ); 
                        $image = wp_get_attachment_image_url( $thumbnail_id, 'medium' ); // megamenu
                        $child_categories = get_terms( 
                            [
                                'taxonomy' => $category->taxonomy, 
                                'hide_empty' => 0,
                                'child_of' => $category->term_id,
                            ]
                        );
                    ?>

                        <div class="catalog_m-col">
                            <div class="catalog_m-image">
                                
                                <?php if ( $image ) : ?>
                                    <img src="<?php echo esc_attr($image); ?>" alt="<?php echo esc_attr($category->name); ?>">
                                <?php endif; ?>

                            </div>
                            <div class="catalog_m-name">
                                <a href="<?php echo esc_url($link); ?>">
                                    <?php echo esc_html($category->name); ?>
                                </a>
                            </div>

                            <?php if ( $child_categories ) : ?>

                                <ul class="catalog_m-ul s1-part-1">

                                    <?php 
                                    foreach ( $child_categories as $key => $child_category ) : 
                                        $child_link = get_term_link( (int)$child_category->term_id, $child_category->taxonomy );
                                        if ($key == 5) break;
                                    ?>

                                        <li>
                                            <a href="<?php echo esc_url($child_link); ?>">
                                                <?php echo esc_html($child_category->name); ?>
                                            </a>
                                        </li>

                                    <?php endforeach; ?>

                                </ul>

                                <?php 
                                if ( count($child_categories) > 5 ) : 
                                    $more = count($child_categories) - 5;
                                ?>

                                    <div class="catalog_m-ul s1-part-2">
                                        
                                        <?php 
                                        foreach ( $child_categories as $key => $child_category ) : 
                                            $child_link = get_term_link( (int)$child_category->term_id, $child_category->taxonomy );
                                        ?>

                                            <?php if ($key > 4) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url($child_link); ?>">
                                                        <?php echo esc_html($child_category->name); ?>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                        <?php endforeach; ?>

                                    </div>

                                    <div class="see s1-catalog-see">
                                        Ещё <?php echo $more; ?>
                                        <svg data-v-41d14c6d="" width="7" height="8" viewBox="0 0 7 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="s1-catalog-see__svg">
                                            <path data-v-41d14c6d="" d="M0.5 2.5L3.5 5.5L6.5 2.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div class="see s1-catalog-hide">
                                        Свернуть
                                        <svg data-v-41d14c6d="" width="7" height="8" viewBox="0 0 7 8" fill="none" xmlns="http://www.w3.org/2000/svg" class="s1-catalog-see__svg-rotate">
                                            <path data-v-41d14c6d="" d="M0.5 2.5L3.5 5.5L6.5 2.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>

                                <?php endif; ?>

                            <?php endif; ?>

                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

<?php endif; ?>