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
$blog_section_title = get_field('blog_section_title', $id);
$blog_section_description = get_field('blog_section_description', $id);
$content_after_posts = get_field('content_after_posts', $id);

$current_page = max(1, get_query_var('paged'));
?>

	<main id="primary" class="site-main">
		<?php
			get_template_part("components/banners/banner-inner");
		?> 
		<div class="container with-padding blog-page">
			<div class="blog-posts featured">
				<?php 
					foreach($featured_posts as $featured_post):
						get_template_part( 'template-parts/content', get_post_type(), array(
							'data' => $featured_post,
						) );
					endforeach;
				?>
			</div>
			<div class="blog-intro">
				<?php if($blog_section_title){echo '<h2 class="title">'.$blog_section_title.'</h2>';} else {echo '<h2 class="title">Lastest Posts</h2>';} ?>
				<?php if($blog_section_description){echo '<div class="blog-description">'.$blog_section_description.'</div>';}?>
			</div>
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
								
								echo '<div class="pagination-navigation">';
								//Working one is below
								echo paginate_links(array(
									'base' => get_pagenum_link(1) . '%_%',
									'format' => 'page/%#%/?',
									'current' => $current_page,
									'total' => 2,
									// 'add_args' => $query_params,
									'prev_next' => true,
									'prev_text' => __('« Previous'),
									'next_text' => __('Next »'),
								));
								echo '</div>';
								

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
						?>
					</div>
					<?php if($content_after_posts){echo '<div class="blog-content">'.$content_after_posts.'</div>';}?>
				</div>
			</div>
		</div>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
