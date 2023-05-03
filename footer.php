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

		<?php // get_template_part('template-parts/modals/..'); ?>

		<div class="myPopup-1" id="myPopup">
			<div class="popup-block">

				<div class="close-button">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"/></svg>
				</div>

				<div class="form-name">Оставьте заявку</div>

				<div class="popup-form">

					<span class="form-control-wrap" data-name="your-name">
						<input size="40" class="form-control text validates-as-required" autocomplete="name" aria-required="true" aria-invalid="false" placeholder="Имя" value="" type="text" name="your-name">
					</span>

					<span class="form-control-wrap" data-name="your-company">
						<input size="40" class="form-control text validates-as-required" autocomplete="company" aria-required="true" aria-invalid="false" placeholder="Компания" value="" type="text" name="your-company">
					</span>

					<span class="form-control-wrap" data-name="tel-669">
						<input size="40" class="form-control text tel validates-as-tel" aria-invalid="false" placeholder="+___ (__) ___-__-__" value="" type="tel" name="tel-669">
					</span>

					<span class="form-control-wrap" data-name="your-message">
						<textarea cols="40" rows="10" class="form-control textarea" aria-invalid="false" placeholder="Ваше сообщение" name="your-message"></textarea>
					</span>

					<div class="form-control-wrap file-social-group">
						<span data-name="your-file">
							<input type="file" name="f">
						</span>

						<div class="soc-link-row">
							<div class="soc-link f-soc-whatsapp">
								<a href="#">
									<img src="<?php echo THEME_URI; ?>/img/icons8-whatsapp-48.png">
								</a>
							</div>

							<div class="soc-link f-soc-telegram">
								<a href="#">
									<img src="<?php echo THEME_URI; ?>/img/icons8-telegramma-app-48.png">
								</a>
							</div>
						</div>
					</div>

					<div class="c-submit">
						<input class="form-control has-spinner submit" type="submit" value="Отправить заявку">
					</div>

				</div>

			</div>
		</div>

		<div class="myPopup-2" id="myPopup-2">
			<div class="popup-block">

				<div class="close-button">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L160 210.7 54.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L114.7 256 9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 301.3 265.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L205.3 256 310.6 150.6z"></path></svg>
				</div>

				<div class="form-name">Вход</div>

				<div class="popup-form">

					<span class="form-control-wrap" data-name="your-email">
						<input size="40" class="form-control text email validates-as-required validates-as-email" aria-required="true" aria-invalid="false" placeholder="E-mail" value="" type="email" name="your-email">
					</span>

					<span class="form-control-wrap" data-name="your-password">
						<input size="40" class="form-control text password validates-as-required validates-as-password" autocomplete="password" aria-required="true" aria-invalid="false" placeholder="Пароль" value="" type="password" name="your-password">
					</span>

					<div class="lost-pass">
						<a href="#">Забыли пароль?</a>
					</div>

					<div class="c-submit">
						<input class="form-control has-spinner submit" type="submit" value="Войти">
					</div>

					<div class="lost-reg">Нет аккаунта? <a href="#">Зарегистрируйтесь тут</a>.</div>

				</div>

			</div>
		</div>

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