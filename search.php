<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package windshield_surgeons_theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="banner banner-inner">
			<div class="container content">
				<h1 class="title"><?php printf( esc_html__( 'Search Results for: %s', 'windshield_surgeons_theme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</div>
		</section>
		<div class="container with-padding blog-page">
			<div class="row">
				<div class="col-lg-3">
					<?php get_sidebar(); ?>
				</div>
				<div class="col-lg-9">
					<div class="blog-posts listing">
						<?php
							if ( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
