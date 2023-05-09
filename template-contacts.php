<?php
/**
 * Template name: Контакты
 */

get_header(); 

if (have_posts()) : 

    while (have_posts()) : the_post(); 

    //get_template_part('template-parts/home/slider'); 
    $title_m = get_field('title_m');
    $map = get_field('map_m');
    $title_c = get_field('title_c');
    $items = get_field('items_c');
    $title_r = get_field('title_requisites');
    $requisites = get_field('requisites');
    $title_f = get_field('title_form_c');
    $form = get_field('form_c');
    ?>

		<div class="main-section">
			<div class="container">
				<main class="main">

                    <?php do_action( 'echo_kama_breadcrumbs' ); ?>

					<div class="contact-flex">

						<div class="contact-flex-wrapper-1">

                            <?php if ($title_c) : ?>
                                <div class="contact-title-map">
                                    <?php echo esc_html($title_c); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($map) : ?>
                                <div class="contact-map">
                                    <?php echo $map; ?>
                                    <!-- <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/10765/shelkovo/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Щелково</a><a href="https://yandex.ru/maps/10765/shelkovo/house/fruktovy_proyezd_2/Z04YfwJhS0AFQFtvfXVzcHlgZQ==/?ll=37.959209%2C55.921005&mode=search&sctx=ZAAAAAgAEAAaKAoSCSdLrfcbVTxAEegyNQne6ExAEhIJTl5kAn6N3z8Rp7Io7KLowz8iBgABAgMEBSgKOABAGUgAYjJjb2xsZWN0aW9uc19yYW5raW5nX21vZGVsPWNvbGxlY3Rpb25zX3JlbGV2X3dfZHNzbWIlY29sbGVjdGlvbnNfcmVsZXZfdGhyZXNob2xkPTEwMDcwMDAwMGIgY29sbGVjdGlvbnNfcmV0dXJuX2J5X2dlb2lkPXRydWViOXJlYXJyPXNjaGVtZV9Mb2NhbC9HZW8vQ29sbGVjdGlvbnMvTWl4RWFjaE5Qb3NpdGlvbj0xMDAwMGI3cmVhcnI9c2NoZW1lX0xvY2FsL0dlby9Db2xsZWN0aW9ucy9GaXJzdFBvc2l0aW9uVG9NaXg9M2IycmVhcnI9c2NoZW1lX0xvY2FsL0dlby9Db2xsZWN0aW9ucy9FbmFibGVkTWl4PXRydWVqAnJ1nQHNzEw9oAEAqAEAvQErTnhAwgEZAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOoBAPIBAPgBAIICIdGE0YDRg9C60YLQvtCy0YvQuSDQv9GA0L7QtdC30LQgMooCAJICAJoCDGRlc2t0b3AtbWFwcw%3D%3D&sll=37.951252%2C55.921531&sspn=0.013885%2C0.004610&text=ahernjdsq%20ghjtpl%202&utm_medium=mapframe&utm_source=maps&z=14.33" style="color:#eee;font-size:12px;position:absolute;top:14px;">Фруктовый проезд, 2 — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=37.959209%2C55.921005&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgo0MDI4MDczOTIwEmXQoNC-0YHRgdC40Y8sINCc0L7RgdC60L7QstGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCDQqdGR0LvQutC-0LLQviwg0KTRgNGD0LrRgtC-0LLRi9C5INC_0YDQvtC10LfQtCwgMiIKDRbOF0IVpa9fQg%2C%2C&sctx=ZAAAAAgAEAAaKAoSCSdLrfcbVTxAEegyNQne6ExAEhIJTl5kAn6N3z8Rp7Io7KLowz8iBgABAgMEBSgKOABAGUgAYjJjb2xsZWN0aW9uc19yYW5raW5nX21vZGVsPWNvbGxlY3Rpb25zX3JlbGV2X3dfZHNzbWIlY29sbGVjdGlvbnNfcmVsZXZfdGhyZXNob2xkPTEwMDcwMDAwMGIgY29sbGVjdGlvbnNfcmV0dXJuX2J5X2dlb2lkPXRydWViOXJlYXJyPXNjaGVtZV9Mb2NhbC9HZW8vQ29sbGVjdGlvbnMvTWl4RWFjaE5Qb3NpdGlvbj0xMDAwMGI3cmVhcnI9c2NoZW1lX0xvY2FsL0dlby9Db2xsZWN0aW9ucy9GaXJzdFBvc2l0aW9uVG9NaXg9M2IycmVhcnI9c2NoZW1lX0xvY2FsL0dlby9Db2xsZWN0aW9ucy9FbmFibGVkTWl4PXRydWVqAnJ1nQHNzEw9oAEAqAEAvQErTnhAwgEZAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOoBAPIBAPgBAIICIdGE0YDRg9C60YLQvtCy0YvQuSDQv9GA0L7QtdC30LQgMooCAJICAJoCDGRlc2t0b3AtbWFwcw%3D%3D&sll=37.951252%2C55.921531&sspn=0.013885%2C0.004610&text=ahernjdsq%20ghjtpl%202&z=14.33" width="100%" height="700" frameborder="0" allowfullscreen="true" style="position:relative;"></iframe></div> -->
                                </div>
                            <?php endif; ?>

						</div>

						<div class="contact-flex-wrapper-2">

                            <?php if ($title_c) : ?>
                                <div class="contact-title">
                                    <?php echo esc_html($title_c); ?>
                                </div>
                            <?php endif; ?>
                                
                            <?php if ($items) : ?>
                                <div class="contact-group-1">
                                    <?php 
                                    foreach ($items as $item) : 
                                        $val = str_replace(['<p>', '</p>'], '', $item['val_items_c']);
                                        $soc_networks = $item['social_network_items_c'];
                                    ?>
                                        <div class="c-line contact-mail">

                                            <?php if ($item['txt_items_c']) : ?>
                                                <span><?php echo esc_html($item['txt_items_c']); ?></span> 
                                            <?php endif; ?>

                                            <?php echo $val; ?>

                                            <?php if ( $soc_networks ) : ?>
                                 
                                                <?php 
                                                foreach ( $soc_networks as $key => $soc_network ) : 
                                                    $soc_class = ($key == 0) ? 'soc-whatsapp' : 'soc-telegram';
                                                    $icon_url = wp_get_attachment_url( $soc_network['img_social_network_items_c'], 'full' );
                                                ?>
                                                    <div class="soc-link <?php echo $soc_class; ?>">
                                                        <a href="<?php echo esc_url($soc_network['link_social_network_items_c']); ?>" target="_blank">

                                                            <?php if ($icon_url) : ?>
                                                                <img src="<?php echo esc_attr($icon_url); ?>">
                                                            <?php endif; ?>

                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            
                                            <?php endif; ?>

                                        </div>

                                    <?php endforeach; ?>

                                    <!-- <div class="soc-link soc-whatsapp">
                                        <a href="#" >
                                            <img src="img/icons8-whatsapp-48.png">
                                        </a>
                                    </div>
                                    <div class="soc-link soc-telegram">
                                        <a href="#" >
                                            <img src="img/icons8-telegramma-app-48.png">
                                        </a>
                                    </div> -->
                                </div>
                            <?php endif; ?>

                            <?php if ($title_r) : ?>
                                <div class="contact-title-rek">
                                    <?php echo esc_html($title_r); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($requisites) : ?>
                                <div class="contact-group-2">
                                    <?php foreach ($requisites as $requisite) : ?>
                                        <div class="c-line">

                                            <?php if ($requisite['txt_requisites']) : ?>
                                                <span><?php echo esc_html($requisite['txt_requisites']); ?></span> 
                                            <?php endif; ?>

                                            <?php echo esc_html($requisite['val_requisites']); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($title_f) : ?>
                                <div class="contact-title-obr">
                                    <?php echo esc_html($title_f); ?>
                                </div>
                            <?php endif; ?>

							<?php 
                            if ($form) :
                                $contact_form = WPCF7_ContactForm::get_instance( $form->ID );
                                echo do_shortcode( $contact_form->shortcode() );
                            endif;
                            ?>

						</div>

					</div>


				</main>
			</div>
		</div>

    <?php
    endwhile; 

endif; 

get_footer();