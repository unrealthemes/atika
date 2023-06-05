<?php 
$logo_id = get_field('logo_id_h', 'option');
$logo_url = wp_get_attachment_url( $logo_id, 'full' );
$txt_logo = get_field('txt_logo_h', 'option');
$phone = get_field('phone_h', 'option');
$shedules = get_field('shedules_h', 'option');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo THEME_URI; ?>/img/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo THEME_URI; ?>/img/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEME_URI; ?>/img/favicons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo THEME_URI; ?>/img/favicons/site.webmanifest">
	<link rel="mask-icon" href="<?php echo THEME_URI; ?>/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<?php wp_body_open(); ?> 

	<div class="wrapper">
		<header class="header header-sticky">
			<div class="header-wrapper">

				<div class="header-top">
					<div class="container">

						<div class="mobile-group">

							<div class="header__burger"><span></span></div>

							<?php if ($logo_url) : ?>
								<div class="logo mobile">
									<a href="<?php echo home_url('/'); ?>">
										<img src="<?php echo esc_attr($logo_url); ?>" alt="Logo">
									</a>
								</div>
							<?php endif; ?>

							<div class="search-mobile">
								<div class="search-button">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
										<path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
									</svg>
								</div>
							</div>

						</div>

						<div class="m-search">
							<div class="container">
								<form action="<?php echo home_url('/'); ?>" class="searchform" method="get" role="search">
									<div class="search-m"> 
										<input type="text" placeholder="Что ищем?" name="s" value="" required> 
										<button class="searchsubmit" type="submit"> 
											<svg xmlns="http://www.w3.org/2000/svg" fill="#ffffff" viewBox="0 0 30 30" width="60px" height="60px" class="img-svg-search replaced-svg">
												<path d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z"></path>
											</svg> 
											<span class="screen-reader-text"> Поиск </span> 
										</button>
									</div>
								</form>
							</div>
						</div>

						<div class="header-top-group">

							<?php
							if ( has_nav_menu('menu_1') ) {
								wp_nav_menu( [
									'theme_location' => 'menu_1',
									'container'      => false,
									'menu_class'     => 'header-nav-list',
									// 'walker'         => new UT_Mega_Menu(),
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								] );
							}
							?>

							<div class="header-phone-group">

								<?php if ($phone) : ?>
									<div class="header-phone">
										<a href="tel:<?php echo esc_html($phone); ?>">
											<?php echo esc_html($phone); ?>
										</a>
									</div>
								<?php endif; ?>

								<?php if ($shedules) : ?>
									<div class="header-day">
										<?php echo esc_html($shedules); ?>
									</div>
								<?php endif; ?>

								<button class="header-button">
									<a href="#">Отправить заявку</a>
								</button>

							</div>

						</div>

					</div>
				</div>

				<div class="header-bottom">
					<div class="container">

						<div class="header-bottom-group">

							<div class="logo-group">

								<?php if ($logo_url) : ?>
									<div class="logo">
										<a href="<?php echo home_url('/'); ?>">
											<img src="<?php echo esc_attr($logo_url); ?>" alt="Logo">
										</a>
									</div>
								<?php endif; ?>

								<?php if ($txt_logo) : ?>
									<div class="logo-desc-header">
										<?php echo esc_html($txt_logo); ?>
									</div>
								<?php endif; ?>

							</div>

							<div class="catalog-group">
								<div class="catalog__burger">
									<img class="s-1" src="<?php echo THEME_URI; ?>/img/menu-catalog.png" alt="">
									<svg class="s-2" width="27" height="22" viewBox="9 8 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-4a9f6892="" data-v-a8bad76a=""><rect x="10.8203" y="21" width="16" height="2" rx="1" fill="white" data-v-4a9f6892="" data-v-a8bad76a="" transform="rotate(-45 10.8203 21)"></rect> <rect x="12.2344" y="9.68652" width="16" height="2" rx="1" fill="white" data-v-4a9f6892="" data-v-a8bad76a="" transform="rotate(45 12.2344 9.68652)"></rect></svg>
								</div>
								<div class="catalog-name">Каталог</div>
							</div>

							<div class="search">
								<form role="search" method="get" action="<?php echo home_url('/'); ?>">
									<input type="search" id="wp-block-search__input-2" class="wp-block-search__input wp-block-search__input " name="s" value="<?php echo get_search_query(); ?>" placeholder="Поиск по товарам" required> 
									<button type="submit" class="search-button">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
											<path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
										</svg>
									</button>
								</form>
							</div> 

							<div class="cart">
								<a class="cart__link" href="<?php echo esc_url( wc_get_checkout_url() ); ?>">
									<img src="<?php echo THEME_URI; ?>/img/busket_s.png" alt="">
									<span>Корзина</span>
									<?php wc_get_template_part( 'cart/cart-count' ); ?>
								</a>
								<?php wc_get_template_part( 'cart/mini-cart' ); ?>
							</div>

							<?php if ( ! is_user_logged_in() ) : ?>
								<div class="user-profile">
									<div class="user-profile__link">
										<img src="<?php echo THEME_URI; ?>/img/enter_s.png" alt="<?php _e('My Account',''); ?>">
										<span>Вход</span>
									</div>
								</div>
							<?php else : ?>
								<div class="user-profile">
									<a class="user-profile__link" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
										<img src="<?php echo THEME_URI; ?>/img/enter_s.png" alt="<?php _e('My Account',''); ?>">
										<span>Аккаунт</span>
									</a>
								</div>
							<?php endif; ?>

						</div>

					</div>
				</div>

			</div>
		</header>

		<div class="nav-mobile">
			<div class="container">

				<?php
				if ( has_nav_menu('menu_1') ) {
					wp_nav_menu( [
						'theme_location' => 'menu_1',
						'container'      => false,
						'menu_class'     => 'nav-list-mobile',
						// 'walker'         => new UT_Mega_Menu(),
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					] );
				}
				?>

				<div class="banner-block">
					<div class="banner-block-group">
						<img src="<?php echo THEME_URI; ?>/img/delivery-1.jpg" alt="">
						<img src="<?php echo THEME_URI; ?>/img/garwin.png" alt="">
					</div>
				</div>
			</div>
		</div>

		<div class="bottom-menu">
			<div class="container">
				<div class="bottom-menu-group">

					<div class="m-catalog">
						<svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg" data-v-16e277b1="" data-v-4043b38b="">
							<rect x="12.4443" y="7" width="15" height="2" rx="1" fill="currentColor" data-v-16e277b1="" data-v-4043b38b=""></rect> 
							<rect x="6.44434" y="6" width="4" height="4" rx="2" fill="currentColor" data-v-16e277b1="" data-v-4043b38b=""></rect> 
							<rect x="6.44434" y="14" width="4" height="4" rx="2" fill="currentColor" data-v-16e277b1="" data-v-4043b38b=""></rect> 
							<rect x="6.44434" y="22" width="4" height="4" rx="2" fill="currentColor" data-v-16e277b1="" data-v-4043b38b=""></rect> 
							<rect x="12.4443" y="15" width="19" height="2" rx="1" fill="currentColor" data-v-16e277b1="" data-v-4043b38b=""></rect> 
							<rect x="12.4443" y="23" width="15" height="2" rx="1" fill="currentColor" data-v-16e277b1="" data-v-4043b38b=""></rect>
						</svg>
					</div>

					<div class="m-filters home">
						<svg width="27" height="22" viewBox="0 0 27 22" fill="none" data-v-16e277b1="" data-v-4043b38b="">
							<path d="M3.33325 12C3.33325 11.4477 3.78097 11 4.33325 11C4.88554 11 5.33325 11.4477 5.33325 12V21C5.33325 21.5523 4.88554 22 4.33325 22C3.78097 22 3.33325 21.5523 3.33325 21V12Z" fill="white" data-v-16e277b1="" data-v-4043b38b=""></path> 
							<path d="M3.33325 1C3.33325 0.447715 3.78097 0 4.33325 0C4.88554 0 5.33325 0.447715 5.33325 1V4C5.33325 4.55228 4.88554 5 4.33325 5C3.78097 5 3.33325 4.55228 3.33325 4V1Z" fill="white" data-v-16e277b1="" data-v-4043b38b=""></path> 
							<path d="M12.3333 15C12.3333 14.4477 12.781 14 13.3333 14C13.8855 14 14.3333 14.4477 14.3333 15V21C14.3333 21.5523 13.8855 22 13.3333 22C12.781 22 12.3333 21.5523 12.3333 21V15Z" fill="white" data-v-16e277b1="" data-v-4043b38b=""></path> 
							<path d="M12.3333 1C12.3333 0.447715 12.781 0 13.3333 0C13.8855 0 14.3333 0.447715 14.3333 1V7C14.3333 7.55229 13.8855 8 13.3333 8C12.781 8 12.3333 7.55229 12.3333 7V1Z" fill="white" data-v-16e277b1="" data-v-4043b38b=""></path> 
							<path d="M21.3333 18C21.3333 17.4477 21.781 17 22.3333 17C22.8855 17 23.3333 17.4477 23.3333 18V21C23.3333 21.5523 22.8855 22 22.3333 22C21.781 22 21.3333 21.5523 21.3333 21V18Z" fill="white" data-v-16e277b1="" data-v-4043b38b=""></path> 
							<path d="M21.3333 1C21.3333 0.447716 21.781 0 22.3333 0C22.8855 0 23.3333 0.447715 23.3333 1V10C23.3333 10.5523 22.8855 11 22.3333 11C21.781 11 21.3333 10.5523 21.3333 10V1Z" fill="white" data-v-16e277b1="" data-v-4043b38b=""></path> 
							<path fill-rule="evenodd" clip-rule="evenodd" d="M4.33325 10C5.43782 10 6.33325 9.10457 6.33325 8C6.33325 6.89543 5.43782 6 4.33325 6C3.22868 6 2.33325 6.89543 2.33325 8C2.33325 9.10457 3.22868 10 4.33325 10ZM4.33325 12C6.54239 12 8.33325 10.2091 8.33325 8C8.33325 5.79086 6.54239 4 4.33325 4C2.12411 4 0.333252 5.79086 0.333252 8C0.333252 10.2091 2.12411 12 4.33325 12Z" fill="white" data-v-16e277b1="" data-v-4043b38b=""></path> 
							<path fill-rule="evenodd" clip-rule="evenodd" d="M13.3333 13C14.4378 13 15.3333 12.1046 15.3333 11C15.3333 9.89543 14.4378 9 13.3333 9C12.2287 9 11.3333 9.89543 11.3333 11C11.3333 12.1046 12.2287 13 13.3333 13ZM13.3333 15C15.5424 15 17.3333 13.2091 17.3333 11C17.3333 8.79086 15.5424 7 13.3333 7C11.1241 7 9.33325 8.79086 9.33325 11C9.33325 13.2091 11.1241 15 13.3333 15Z" fill="white" data-v-16e277b1="" data-v-4043b38b=""></path> 
							<path fill-rule="evenodd" clip-rule="evenodd" d="M22.3333 16C23.4378 16 24.3333 15.1046 24.3333 14C24.3333 12.8954 23.4378 12 22.3333 12C21.2287 12 20.3333 12.8954 20.3333 14C20.3333 15.1046 21.2287 16 22.3333 16ZM22.3333 18C24.5424 18 26.3333 16.2091 26.3333 14C26.3333 11.7909 24.5424 10 22.3333 10C20.1241 10 18.3333 11.7909 18.3333 14C18.3333 16.2091 20.1241 18 22.3333 18Z" fill="white" data-v-16e277b1="" data-v-4043b38b=""></path>
						</svg>
					</div>

					<div class="m-cart">
						<a class="cart__link" href="<?php echo esc_url( wc_get_checkout_url() ); ?>">
							<img src="<?php echo THEME_URI; ?>/img/busket.png" alt="Cart">
							<?php wc_get_template_part( 'cart/cart-count' ); ?>
						</a>
					</div>

					<?php if ( ! is_user_logged_in() ) : ?>
						<div class="user-profile m-user-profile">
							<div class="user-profile__link">
								<img src="<?php echo THEME_URI; ?>/img/enter.png" alt="<?php _e('My Account',''); ?>">
							</div>
						</div>
					<?php else : ?>
						<div class="m-user-profile">
							<a class="user-profile__link" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
								<img src="<?php echo THEME_URI; ?>/img/enter.png" alt="<?php _e('My Account',''); ?>">
							</a>
						</div>
					<?php endif; ?>

				</div>
			</div>
		</div>

		<?php get_template_part('template-parts/mega-menu'); ?>