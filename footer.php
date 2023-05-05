<?php 
$logo_id = get_field('logo_id_f', 'option');
$logo_url = wp_get_attachment_url( $logo_id, 'full' );
$txt_logo = get_field('txt_logo_f', 'option');
$phone = get_field('phone_f', 'option');
$shedules = get_field('shedules_f', 'option');
$mail = get_field('mail_f', 'option');
$address = get_field('address_f', 'option');
$soc_networks = get_field('social_network_f', 'option');
?>

		<?php get_template_part('template-parts/modals/contact-form'); ?>

		<?php get_template_part('template-parts/modals/login-form'); ?>

		<footer class="footer">
			<div class="footer-wrapper">
				<div class="container">

					<div class="footer-group">

						<div class="footer-group-l">

							<div class="logo-group">
								
								<?php if ($logo_url) : ?>
									<div class="logo">
										<a href="<?php echo home_url('/'); ?>">
											<img src="<?php echo esc_attr($logo_url); ?>" alt="Logo">
										</a>
									</div>
								<?php endif; ?>

								<?php if ($txt_logo) : ?>
									<div class="logo-desc-footer">
										<?php echo esc_html($txt_logo); ?>
									</div>
								<?php endif; ?>

								<div class="copy-block">
									© <?php the_date('Y'); ?>, «Атика». Все права защищены. 
									<span>Использование любых материалов, размещённых на сайте, разрешается при условии ссылки на «Атика».</span>
								</div>
							</div>

							<div class="footer-nav-group">

								<?php
								if ( has_nav_menu('menu_2') ) {
									wp_nav_menu( [
										'theme_location' => 'menu_2',
										'container'      => false,
										'menu_class'     => 'footer-nav-list-1',
										// 'walker'         => new UT_Mega_Menu(),
										'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									] );
								}
								?>

								<?php
								// if ( has_nav_menu('menu_3') ) {
								// 	wp_nav_menu( [
								// 		'theme_location' => 'menu_3',
								// 		'container'      => false,
								// 		'menu_class'     => 'footer-nav-list-2',
								// 		// 'walker'         => new UT_Mega_Menu(),
								// 		'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								// 	] );
								// }
								?>

							</div>

						</div>

						<div class="footer-phone-copy-group">

							<div class="footer-phone-group">

								<div class="footer-phone-group-1">

									<?php if ($phone) : ?>
										<div class="footer-phone">
											<img src="<?php echo THEME_URI; ?>/img/phone_icon_red_kopiya_2.png" alt="">
											<div class="footer-phone-content">
												<a href="tel:<?php echo esc_html($phone); ?>">
													<?php echo esc_html($phone); ?>
												</a>
											</div>
										</div>
									<?php endif; ?>

									<?php if ($shedules) : ?>
										<div class="footer-day">
											<img src="<?php echo THEME_URI; ?>/img/watch_icon_red_kopiya_2.png" alt="">
											<div class="footer-day-content">
												<?php echo esc_html($shedules); ?>
											</div>
										</div>
									<?php endif; ?>

									<?php if ($phone) : ?>
										<div class="footer-mail">
											<img src="<?php echo THEME_URI; ?>/img/email_icon_red_kopiya.png" alt="">
											<div class="footer-mail-content">
												<a href="mailto:<?php echo esc_html($mail); ?>">
													<?php echo esc_html($mail); ?>
												</a>
											</div>
										</div>
									<?php endif; ?>

									<?php if ($address) : ?>
										<div class="footer-address">
											<img src="<?php echo THEME_URI; ?>/img/geo_icon_kopiya_orenge_ko_2.png" alt="">
											<div class="footer-address-content">
												<?php echo esc_html($address); ?>
											</div>
										</div>
									<?php endif; ?>

								</div>

								<?php if ( $soc_networks ) : ?>
									<div class="soc-link-row">
										<?php 
										foreach ( $soc_networks as $soc_network ) : 
											$icon_url = wp_get_attachment_url( $soc_network['img_social_network_f'], 'full' );
										?>
											<div class="soc-link f-soc-whatsapp">
												<a href="<?php echo esc_url($soc_network['link_social_network_f']); ?>" target="_blank">

													<?php if ($icon_url) : ?>
														<img src="<?php echo esc_attr($icon_url); ?>">
													<?php endif; ?>

												</a>
											</div>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>

							</div>

							<div class="copy-author">
								<a href="https://lighthouse.ru/" target="_blank">Разработано в Lighthouse</a>
							</div>

						</div>

					</div>

				</div>
			</div>
		</footer>
	</div>

	<?php wp_footer(); ?>
</body>
</html>