<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package windshield_surgeons_theme
 */

 $social_media = get_field('social_media', 'option');
 $facebook = $social_media['facebook'];
 $instagram = $social_media['instagram'];
 $twitter = $social_media['twitter'];

 $footer_settings = get_field('footer_settings', 'option');
 $image_below_logo = $footer_settings['image_below_logo'];
 $image_link = $footer_settings['image_link'];

 $call_to_action = $footer_settings['call_to_action'];
 $cta_title = $call_to_action['title'];
 $cta_btn_1 = $call_to_action['button_1'];
 $cta_btn_2 = $call_to_action['button_2'];

 $locations = get_nav_menu_locations();

?>

	<footer id="footer" class="site-footer">
		<div class="container">
			<div class="top-section">
				<div class="site-branding">
					<?php
					if ( has_custom_logo() ) : 
						the_custom_logo();
					else : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>					
					<?php endif;
					$windshield_surgeons_theme_description = get_bloginfo( 'description', 'display' );
					if ( $windshield_surgeons_theme_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $windshield_surgeons_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div>
				<div class="footer-columns">
					<div class="row">
						<?php if($cta_title): ?>
						<div class="col-lg-12 footer-cta">
							<h3><?php echo $cta_title; ?></h3>
							<?php 
								if($cta_btn_1){ echo '<a class="btn primary" href="'.$cta_btn_1['url'].'" target="'.$cta_btn_1['target'].'">'.$cta_btn_1['title'].'</a>'; };	
								if($cta_btn_2){ echo '<a class="btn secondary" href="'.$cta_btn_2['url'].'" target="'.$cta_btn_2['target'].'">'.$cta_btn_2['title'].'</a>'; };	
							?>
						</div>
						<?php endif; ?>
						<div class="col-lg-3 footer-menu">
							<?php
								if(has_nav_menu('footer-1')){
									if (isset($locations['footer-1'])) {
										$menu = wp_get_nav_menu_object($locations['footer-1']);
										if ($menu) {
											echo '<h4>'.$menu->name.'</h4>';
										}
									}
									wp_nav_menu(
										array(
											'theme_location' => 'footer-1',
											'depth' => 1
										)
									);
								}
							?>
						</div>
						<div class="col-lg-3 footer-menu">
							<?php
								if(has_nav_menu('footer-2')){
									if (isset($locations['footer-2'])) {
										$menu = wp_get_nav_menu_object($locations['footer-2']);
										if ($menu) {
											echo '<h4>'.$menu->name.'</h4>';
										}
									}
									wp_nav_menu(
										array(
											'theme_location' => 'footer-2',
											'depth' => 1
										)
									);
								}
							?>
						</div>
						<div class="col-lg-3 footer-menu">
							<?php
								if(has_nav_menu('footer-3')){
									if (isset($locations['footer-3'])) {
										$menu = wp_get_nav_menu_object($locations['footer-3']);
										if ($menu) {
											echo '<h4>'.$menu->name.'</h4>';
										}
									}
									wp_nav_menu(
										array(
											'theme_location' => 'footer-3',
											'depth' => 1
										)
									);
								}
							?>
						</div>
						<div class="col-lg-3 footer-menu">
							<?php
								if(has_nav_menu('footer-4')){
									if (isset($locations['footer-4'])) {
										$menu = wp_get_nav_menu_object($locations['footer-4']);
										if ($menu) {
											echo '<h4>'.$menu->name.'</h4>';
										}
									}
									wp_nav_menu(
										array(
											'theme_location' => 'footer-4',
											'depth' => 1
										)
									);
								}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom-section">
					<div class="bottom_footer_section">
						© <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved 

						<?php 
							if(has_nav_menu('lower-footer')){
								wp_nav_menu(
									array(
										'theme_location' => 'lower-footer',
										'depth' => 1
									)
								);
							}
						?>
					</div>
					<div class="social_media">
						<?php 
							if($facebook){ 
								echo '<a target="_blank" href="'.$facebook.'">'.file_get_contents( get_template_directory_uri() . '/assets/icons/facebook.svg' ).'</a>';
							}
							if($instagram){ 
								echo '<a target="_blank" href="'.$instagram.'">'.file_get_contents( get_template_directory_uri() . '/assets/icons/instagram.svg' ).'</a>';
							}
							if($twitter){ 
								echo '<a target="_blank" href="'.$twitter.'">'.file_get_contents( get_template_directory_uri() . '/assets/icons/twitter-x.svg' ).'</a>';
							}
						?>
					</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
