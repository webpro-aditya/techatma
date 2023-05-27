<?php

/**
 * Techatma functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Techatma
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function techatma_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Techatma, use a find and replace
		* to change 'techatma' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('techatma', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'techatma'),
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
			'techatma_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'techatma_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function techatma_content_width()
{
	$GLOBALS['content_width'] = apply_filters('techatma_content_width', 640);
}
add_action('after_setup_theme', 'techatma_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function techatma_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'techatma'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'techatma'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'techatma_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function techatma_scripts()
{
	wp_enqueue_style('techatma-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_enqueue_style('xx__techatma-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION);
	wp_enqueue_style('xx__techatma-all-min', get_template_directory_uri() . '/css/all.min.css', array(), _S_VERSION);
	wp_enqueue_style('xx__techatma-slick', get_template_directory_uri() . '/css/slick.css', array(), _S_VERSION);
	wp_enqueue_style('xx__techatma-simple-line-icons', get_template_directory_uri() . '/css/simple-line-icons.css', array(), _S_VERSION);
	wp_enqueue_style('xx__techatma-style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION);
	wp_style_add_data('techatma-style', 'rtl', 'replace');

	wp_enqueue_script('techatma-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('xx__techatma-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('xx__techatma-navigation-popper', get_template_directory_uri() . '/js/popper.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('xx__techatma-navigation-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('xx__techatma-navigation-slick', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('xx__techatma-navigation-sticky-sidebar', get_template_directory_uri() . '/js/jquery.sticky-sidebar.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('xx__techatma-navigation-custom', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'techatma_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

function add_classes_on_li($classes, $item, $args)
{
	$classes[] = 'nav-item';
	return $classes;
}
add_filter('nav_menu_css_class', 'add_classes_on_li', 1, 3);

function add_menuclass($ulclass)
{
	return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu', 'add_menuclass');
