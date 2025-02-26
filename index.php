<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package windshield_surgeons_theme
 */

get_header();

$id = get_queried_object_id();
$featured_posts = get_field('featured_posts', $id);
?>

	<main id="primary" class="site-main">
		<?php
			get_template_part("components/banners/banner-inner");
		?> 
		<div class="container with-padding">
			<div class="row">
				<div class="col-lg-3">
					<?php get_sidebar(); ?>
				</div>
				<div class="col-lg-9">
					<div class="blog-posts featured">
						<?php 
							foreach($featured_posts as $featured_post):
								get_template_part( 'template-parts/content', get_post_type(), array(
									'data' => $featured_post,
								) );
							endforeach;
						?>
					</div>
				</div>
			</div>
			<div>
				<h2>Lastest Posts</h2>
			</div>
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
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
