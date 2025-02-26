<?php
/**
 * Windshield Surgeons Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package windshield_surgeons_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

//Set up Custom Fields specific to theme
require_once dirname( __FILE__ ) . '/inc/custom-content/post-types.php';
require_once dirname( __FILE__ ) . '/inc/custom-content/custom-fields.php';

// Allow SVG
function upload_svg_files( $allowed ) {
    if ( !current_user_can( 'manage_options' ) )
        return $allowed;
    $allowed['svg'] = 'image/svg+xml';
    return $allowed;
}
add_filter( 'upload_mimes', 'upload_svg_files');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function windshield_surgeons_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Windshield Surgeons Theme, use a find and replace
		* to change 'windshield_surgeons_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'windshield_surgeons_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			// 'menu-1' => esc_html__( 'Primary', 'windshield_surgeons_theme' ),
			'primary' => esc_html__( 'Primary', 'windshield_surgeons_theme' ),
			'footer-1' => esc_html__( 'Footer 1', 'windshield_surgeons_theme' ),
			'footer-2' => esc_html__( 'Footer 2', 'windshield_surgeons_theme' ),
			'footer-3' => esc_html__( 'Footer 3', 'windshield_surgeons_theme' ),
			'footer-4' => esc_html__( 'Footer 4', 'windshield_surgeons_theme' ),
			'lower-footer' => esc_html__( 'Lower Footer', 'windshield_surgeons_theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'windshield_surgeons_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'windshield_surgeons_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function windshield_surgeons_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'windshield_surgeons_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'windshield_surgeons_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function windshield_surgeons_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'windshield_surgeons_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'windshield_surgeons_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'windshield_surgeons_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function windshield_surgeons_theme_scripts() {

	// CSS Files
	//Main Theme Styles.CSS
	wp_enqueue_style( 'theme_styles', get_stylesheet_directory_uri() . '/css/style.css', array(), date('H:i') ); 
	// fonts from Folder
	wp_enqueue_style('custom-site-fonts', get_stylesheet_directory_uri() .'/assets/fonts/fonts.css', false); 
	//Animate Library
	wp_enqueue_style('animate-library', get_stylesheet_directory_uri() .'/css/animate.min.css', false); 
	//Swiper (slider) CSS file
	wp_enqueue_style( 'swiper-style', get_stylesheet_directory_uri() . '/css/swiper-bundle.min.css', array() );

	
	//Javascript Files
	//Swiper local JS file
	wp_enqueue_script( 'swiper-scripts', get_stylesheet_directory_uri() . '/js/swiper-bundle.min.js', array('jquery') );
	//Swiper local JS file
	wp_enqueue_script( 'wow-scripts', get_stylesheet_directory_uri() . '/js/wow.min.js', array('jquery') );
	//Bootstrap local JS file
	wp_enqueue_script( 'bootstrap-scripts', get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery') );
	//Masonry local JS file
	// wp_enqueue_script( 'masonry-scripts', get_stylesheet_directory_uri() . '/js/masonry-layout.min.js', array('jquery') ); 
	//GSAP CDN
	// wp_enqueue_script( 'gsap-scripts', 'https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js', array('jquery') );
	//Text Plugin CDN
	// wp_enqueue_script( 'text-plugin-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/TextPlugin.min.js', array('jquery') );
	//Navigation JS
	wp_enqueue_script( 'windshield_surgeons_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	//Main JS
	wp_enqueue_script( 'windshield_surgeons_theme-mainjs', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'windshield_surgeons_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



class Mega_Menu_Navigation extends Walker_Nav_Menu {
    // Start Level
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $classes = ($depth === 1) ? 'sub-menu second-level-menu' : 'sub-menu';
        $output .= "\n$indent<ul class=\"$classes\">\n";
    }

    // Start Element
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ($depth) ? str_repeat( "\t", $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // Ensure that $args is treated as an object
        $args = (object) $args;

        $item_output = $args->before;

        // Custom logic for adding icon and description only on the 3rd level
        if ($depth === 2) {

            $icon = get_field('menu_icon', $item->ID); // Assuming ACF for custom icon field
            $description = get_field('menu_description', $item->ID); // Assuming ACF for description field

			if (is_string($description) && !empty($description) && !empty($icon)) {
				$item_output .= '<a class="link-container" '. $attributes .'>';
				$item_output .= '<span class="menu-icon"><img src="' . esc_url($icon['sizes']['thumbnail']) . '" alt="icon"></span>';
				$item_output .= '<span class="menu-content">';
				$item_output .= '<h4 class="menu-title">'.$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after .'</h4>';

                $item_output .= '<span class="menu-description">' . esc_html($description) . '</span>';
				$item_output .= '</span>';
				$item_output .= '</a>';
            } else {
				$item_output .= '<a '. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= '</a>';
			}


            

        } else {
            // For other levels (first and second), just render as usual
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';
        }

        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

