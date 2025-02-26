<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package windshield_surgeons_theme
 */

get_header();

$error_page = get_field('404_error_page', 'option');
$title = $error_page['title'];
$description = $error_page['description'];
$buttons = $error_page['buttons'];

?>
	<main id="primary" class="site-main">
		<section class="banner banner-inner">
			<div class="container content">
				<h1 class="title"><?php if($title){ echo $title; } else {echo "Opps! That page can't be found."; } ?></h1>
				<div><?php echo $description; ?></div>
				<div class="buttons-container">
					<?php 
						if($buttons):
							foreach($buttons as $button):
								$btn_title = $button['button']['title'];
								$btn_url = $button['button']['url'];
								echo '<a class="btn" href="'. $btn_url.'">';
								echo $btn_title .'</a>'; 
							endforeach;
						endif;
					?>
				</div>
			</div>
		</section>
	</main><!-- #main -->
<?php
get_footer();
