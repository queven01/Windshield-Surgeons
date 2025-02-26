<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package windshield_surgeons_theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php
			get_template_part("components/banners/banner-inner");
			get_template_part('template-parts/content-flexiable-display'); 
		?> 
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
