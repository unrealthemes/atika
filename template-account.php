<?php
/**
 * Template name: Аккаунт
 */

get_header();
?>

	<div class="main-section reviews">
		<div class="container">
			<main class="main">

				<?php do_action( 'echo_kama_breadcrumbs' ); ?>

				<?php
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile; // End of the loop.
				?>

			</main>
		</div>
	</div>

<?php
get_footer();