<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package unreal-themes
 */

get_header();
?> 

	<div class="main-section s404">
		<div class="container">
			<main class="main">

				<div class="s404-block">
					<div class="s404-num">404</div>
					<div class="s404-not-found">Страница не найдена</div>

					<div class="s404-desc-1">Этой страница не существует.</div>
					<div class="s404-desc-2">Вы можете воспользоваться строкой поиска или перейти на <a href="<?php echo home_url('/'); ?>">главную страницу</a> магазина.</div>
				</div>

			</main>
		</div>
	</div>

<?php
get_footer();
