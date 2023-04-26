<?php
/**
 * Template name: Главная
 */

get_header(); 

if (have_posts()) : 

    while (have_posts()) : the_post(); 
    ?>

        <div class="main-section page-home-section">
			<div class="container">
				<main class="main">

                    <?php get_template_part('template-parts/home/slider'); ?>

                    <?php get_template_part('template-parts/home/product', 'categories'); ?>

                    <?php get_template_part('template-parts/home/products'); ?>

                    <?php get_template_part('template-parts/home/posts'); ?>
					
				</main>
			</div>
		</div>

    <?php
    endwhile; 

endif; 

get_footer();