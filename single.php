<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package unreal-themes
 */

get_header();
?>

	<div class="main-section reviews">
		<div class="container">
			<main class="main">

				<?php do_action( 'echo_kama_breadcrumbs' ); ?>

				<div class="container-post">

					<?php the_title('<div class="reviews-title-1">', '</div>'); ?>

					<?php
					while ( have_posts() ) :
						the_post();

						the_content();

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</div>

			</main>
		</div>
	</div>

<?php
get_footer();