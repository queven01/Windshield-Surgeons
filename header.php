<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package windshield_surgeons_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('loadin-html hidden'); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'windshield_surgeons_theme' ); ?></a>

	<header id="masthead" class="site-header animate__animated animate__fadeInDown">
		<div class="site-header-container">	
			<div class="left-container">
				<div class="site-branding">
					<?php
					 $social_media = get_field('social_media', 'option');
					 $facebook = $social_media['facebook'];
					 $instagram = $social_media['instagram'];
					 $twitter = $social_media['twitter'];
					 // $tik_tok = $social_media['tik_tok'];

					 $navigation_settings = get_field('navigation_settings', 'option');
					 $phone_text = $navigation_settings['phone_text'];
					 $phone_number = $navigation_settings['phone_number'];
					 $call_to_action_button = $navigation_settings['call_to_action_button'];
					
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
				</div><!-- .site-branding -->

				<nav id="site-navigation-desktop" class="main-navigation desktop">
					<?php
						wp_nav_menu(array(
							'theme_location' => 'primary',
							'menu_class'        => 'mega-menu',
							'walker' => new Mega_Menu_Navigation()
						));
					?>
				</nav><!-- #site-navigation -->

				<nav id="site-navigation" class="main-navigation mobile">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<span class="bar"></span>
						<span class="bar"></span>
						<span class="bar"></span>
					</button>
					<div class="mobile-container">
						<div class="menu-navigation">
							<div class="arrow-container">
								<?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/arrow-slider.svg' ); ?>
							</div>
						</div>
						<div class="menu-section">
							<?php
								wp_nav_menu(array(
									'theme_location' => 'primary',
									'menu_class'        => 'mega-menu',
									'walker' => new Mega_Menu_Navigation()
								));
							?>
						</div>
						<div class="menu-contact">
							<div class="header-contact">
								<?php if($facebook||$instagram||$twitter||$tik_tok): ?>
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
										// if($tik_tok){ 
										// 	echo '<a target="_blank" href="'.$tik_tok.'">'.file_get_contents( get_template_directory_uri() . '/assets/icons/tic-toc.svg' ).'</a>';
										// }
									?>
								</div>
								<?php endif; ?>
								<?php if($phone_number):?>
									<div class="header_phone">
										<div class="icon"><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/phone.svg' ); ?></div>
										<div>
											<p><?php echo $phone_text;?></p>
											<a href="tel:<?php echo $phone_number;?>"><?php echo $phone_number;?></a>
										</div>
									</div>
								<?php endif;?>
								<?php if($call_to_action_button){
									echo '<a class="btn primary" href="'.$call_to_action_button['url'].'">'.$call_to_action_button['title'].'</a>';
								};?>
							</div>
						</div>
					</div>

				</nav><!-- #site-navigation -->
			</div>
			<div class="header-contact">
				<?php if($facebook||$instagram||$twitter||$tik_tok): ?>
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
						// if($tik_tok){ 
						// 	echo '<a target="_blank" href="'.$tik_tok.'">'.file_get_contents( get_template_directory_uri() . '/assets/icons/tic-toc.svg' ).'</a>';
						// }
					?>
				</div>
				<?php endif; ?>
				<?php if($phone_number):?>
					<div class="header_phone">
						<div class="icon"><?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/phone.svg' ); ?></div>
						<div>
							<p><?php echo $phone_text;?></p>
							<a href="tel:<?php echo $phone_number;?>"><?php echo $phone_number;?></a>
						</div>
					</div>
				<?php endif;?>
				<?php if($call_to_action_button){
					echo '<a class="btn primary" href="'.$call_to_action_button['url'].'">'.$call_to_action_button['title'].'</a>';
				};?>
			</div>
		</div>
	</header><!-- #masthead -->
