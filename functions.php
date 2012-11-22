<?php

/**
 * AIT WordPress Theme
 *
 * Copyright (c) 2011, Affinity Information Technology, s.r.o. (http://ait-themes.com)
 */

define('THEME_SHORT_NAME', 'Freestyle');
define('THEME_LONG_NAME', 'Freestyle Wordpress Theme');
define('THEME_CODE_NAME', 'freestyle');

if(file_exists(dirname(__FILE__) . '/.dev')){
	define('AIT_DEVELOPMENT', true); // is this development mode?
}

$aitThemeCustomTypes = array(
	'portfolio' => 31,
	'slider-creator' => 32,
	'product' => 33,
	//'icon-menu' => 35,
);

$aitThemeWidgets = array(
	'post',
	'flickr',
	'submenu',
	'twitter'
);

$aitEditorShortcodes = array(
	'custom',
	'columns',
	'images',
	'posts',
	'buttons',
	'boxesFrames',
	'lists',
	'notifications',
	'modal',
	'social',
	'video',
	'gMaps',
	'gChart',
	'portfolio',
	'language',
	'tabs'
);

$aitThemeShortcodes = array(
	'boxesFrames' => 2,
	'buttons' => 1,
	'columns'=> 1,
	'custom'=> 1,
	'images'=> 1,
	'lists'=> 1,
	'modal'=> 1,
	'notifications'=> 1,
	'portfolio'=> 1,
	'posts'=> 1,
	'sitemap'=> 1,
	'social'=> 1,
	'video'=> 1,
	'language'=> 1,
	'gMaps'=> 1,
	'gChart'=> 1,
	'tabs'=> 1
);

require dirname(__FILE__) . '/AIT/ait-bootstrap.php';

$pageOptions = array(
	'featured-image' => new WPAlchemy_MetaBox(array(
		'id' => '_ait_featured_images_options',
		'title' => __('Featured Image'),
		'types' => array('post'),
		'context' => 'normal',
		'priority' => 'core',
		'config' => dirname(__FILE__) . '/conf/post-featured.neon'
	)),
	'slider' => new WPAlchemy_MetaBox(array(
		'id' => '_ait_slider_options',
		'title' => __('Header Page Settings'),
		'types' => array('post', 'page'),
		'context' => 'normal',
		'priority' => 'core',
		'config' => dirname(__FILE__) . '/conf/page-slider-meta.neon',
		'js' => dirname(__FILE__) . '/conf/page-slider-meta.js',
	)),
	/*'service-boxes' => new WPAlchemy_MetaBox(array(
		'id' => '_ait_service_boxes_options',
		'title' => __('Service Boxes Page Settings'),
		'types' => array('post', 'page'),
		'context' => 'normal',
		'priority' => 'core',
		'config' => dirname(__FILE__) . '/conf/page-service-boxes-meta.neon'
	)),*/
	'products' => new WPAlchemy_MetaBox(array(
		'id' => '_ait_products_options',
		'title' => __('Products Page Settings'),
		'types' => array('post', 'page'),
		'context' => 'normal',
		'priority' => 'core',
		'config' => dirname(__FILE__) . '/conf/page-products-meta.neon'
	)),/*
	'partners' => new WPAlchemy_MetaBox(array(
		'id' => '_ait_partners_options',
		'title' => __('Partners Page Settings'),
		'types' => array('post', 'page'),
		'context' => 'normal',
		'priority' => 'core',
		'config' => dirname(__FILE__) . '/conf/page-partners-meta.neon'
	)),
	'icon-menu' => new WPAlchemy_MetaBox(array(
		'id' => '_ait_icon_menu_options',
		'title' => __('Icon Menu Page Settings'),
		'types' => array('post', 'page'),
		'context' => 'normal',
		'priority' => 'core',
		'config' => dirname(__FILE__) . '/conf/page-icon-menu-meta.neon'
	)),*/
	'testimonials' => new WPAlchemy_MetaBox(array(
		'id' => '_ait_testimonials_options',
		'title' => __('Testimonials Page Settings'),
		'types' => array('post', 'page'),
		'context' => 'normal',
		'priority' => 'core',
		'config' => dirname(__FILE__) . '/conf/page-testimonials-meta.neon'
	)),
	'sections-order' => new WPAlchemy_MetaBox(array(
		'id' => '_ait_sections_order',
		'title' => __('Sections order for this page'),
		'types' => array('page'),
		'context' => 'normal',
		'priority' => 'core',
		'config' => dirname(__FILE__) . '/conf/sections-order.neon'
	)),
);



function aitThemeInit()
{

	if (is_admin()) {

	} elseif (!is_admin()) {

		aitLoadJQuery('1.7');

		// HTML 5
		wp_enqueue_script( 'JS_html5', THEME_JS_URL . '/libs/html5.js',  array('jquery') );

		// jQuery UI
		wp_enqueue_style( 'CSS_jquery_ui', THEME_CSS_URL . '/jquery-ui-1.8.16.custom.css');
		wp_enqueue_script( 'JS_jquery_ui', THEME_JS_URL . '/libs/jquery-ui-1.8.16.custom.min.js',  array('jquery') );

		// Anything slider
		wp_enqueue_style( 'CSS_anything', THEME_CSS_URL . '/anythingslider.css');
		wp_enqueue_script( 'JS_anythingFx', THEME_JS_URL . '/libs/jquery.anythingslider.fx.min.js', array('jquery') );
		wp_enqueue_script( 'JS_anything', THEME_JS_URL . '/libs/jquery.anythingslider.min.js',  array('jquery') );

		//wp_enqueue_script( 'JS_anythingVideo', THEME_JS_URL . '/libs/jquery.anythingslider.video.min.js', array('jquery') );
		wp_enqueue_script( 'JS_easy', THEME_JS_URL . '/libs/jquery.easing.1.3.js',  array('jquery') );

		wp_enqueue_script( 'JS_slider_script', THEME_JS_URL . '/sliders.js',  array('jquery') );

		// Colorbox
		wp_enqueue_style( 'CSS_colorbox', THEME_CSS_URL . '/colorbox.css');
		wp_enqueue_script( 'JS_colorbox', THEME_JS_URL . '/libs/jquery.colorbox-min.js',  array('jquery') );

		// Product JCarousel
		wp_enqueue_script( 'JS_jcarousel', THEME_JS_URL . '/libs/jquery.jcarousel.min.js',  array('jquery') );

		// fancybox
		wp_enqueue_style( 'CSS_fancybox', THEME_CSS_URL . '/fancybox/jquery.fancybox-1.3.4.css');
		wp_enqueue_script( 'JS_fancybox', THEME_JS_URL . '/libs/jquery.fancybox-1.3.4.js',  array('jquery') );

		// infield labels
		wp_enqueue_script( 'JS_infieldlabel', THEME_JS_URL . '/libs/jquery.infieldlabel.js',  array('jquery') );
		// comments
		wp_enqueue_style( 'CSS_comments', THEME_CSS_URL . '/comments.css');
		// contact
		wp_enqueue_style( 'CSS_contact', THEME_CSS_URL . '/contact.css');
		// scroll to
		wp_enqueue_script( 'JS_scrollto', THEME_JS_URL . '/libs/jquery.scroll-to.js',  array('jquery') );

		// hoverZoom
		wp_enqueue_style( 'CSS_hover_zoom', THEME_CSS_URL . '/hoverZoom.css');
		wp_enqueue_script( 'JS_hover_zoom', THEME_JS_URL . '/libs/hover.zoom.js',  array('jquery') );

		// pretty Sociable
		wp_enqueue_style( 'CSS_prettySociable', THEME_CSS_URL . '/prettySociable.css');
		wp_enqueue_script( 'JS_prettySociable', THEME_JS_URL . '/libs/jquery.prettySociable.js',  array('jquery') );

		//icon menu
		wp_enqueue_style( 'CSS_iconMenu', THEME_CSS_URL . '/icon-menu.css');
		wp_enqueue_script( 'JS_iconMenu', THEME_JS_URL . '/libs/jquery.iconmenu.js',  array('jquery') );
		wp_enqueue_script( 'JS_iconMenu', THEME_JS_URL . '/libs/jquery-ui.min.js',  array('jquery') );
		wp_enqueue_script( 'JS_iconMenu', THEME_JS_URL . '/libs/jquery.min.js.js',  array('jquery') );

		// General script
		wp_enqueue_script( 'JS_general_script', THEME_JS_URL . '/script.js',  array('jquery') );
	}
}
add_action('init', 'aitThemeInit');



function aitThemeSetup()
{

	load_theme_textdomain('freestyle', TEMPLATEPATH . '/languages');

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if(is_readable($locale_file))
		require_once($locale_file);

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support('automatic-feed-links');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu('primary-menu', __('Primary Menu', THEME_CODE_NAME));
	register_nav_menu('footer-menu', __('Footer Menu', THEME_CODE_NAME));

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support('post-thumbnails');

	// The height and width of your custom header.
	// Add a filter to ait_header_image_width and ait_header_image_height to change these values.
	define('HEADER_IMAGE_WIDTH', apply_filters('ait_header_image_width', 1000));
	define('HEADER_IMAGE_HEIGHT', apply_filters('ait_header_image_height', 288));

	add_image_size('large-feature', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true); // Used for large feature (header) images
	add_image_size('small-feature', 500, 300); // Used for featured posts if a large-feature doesn't exist

}



/**
 * Register our sidebars and widgetized areas.
 */
function aitWidgetsInit()
{

	// Homepage widgets
	register_sidebar(array(
		'name' => __('Homepage Sidebar', 'freestyle'),
		'id' => 'homepage-widget-slider',
		'description' => __(''),
		'before_widget' => '<div id="%1$s" class="box widget-container %2$s"><div class="box-wrapper">',
		'after_widget' => "</div></div>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	// Subpages Sidebar
	register_sidebar(array(
		'name' => __('Subpages Sidebar', 'freestyle'),
		'id' => 'subpages-sidebar',
		'description' => __(''),
		'before_widget' => '<div id="%1$s" class="box widget-container %2$s"><div class="box-wrapper">',
		'after_widget' => "</div></div>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => __('Blog Category Sidebar', 'freestyle'),
		'id' => 'homepage-widgets-col-2',
		'description' => __(''),
		'before_widget' => '<div id="%1$s" class="box widget-container %2$s"><div class="box-wrapper">',
		'after_widget' => "</div></div>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => __('Post Sidebar', 'freestyle'),
		'id' => 'post-sidebar',
		'description' => __(''),
		'before_widget' => '<div id="%1$s" class="box widget-container %2$s"><div class="box-wrapper">',
		'after_widget' => "</div></div>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));


	// Footer widgets
	register_sidebar(array(
		'name' => __('Footer Widgets Area', 'freestyle'),
		'id' => 'footer-widgets-area',
		'description' => __(''),
		'before_widget' => '<div id="%1$s" class="box widget-container %2$s"><div class="box-wrapper">',
		'after_widget' => "</div></div>",
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'aitWidgetsInit');

add_action('after_setup_theme', 'aitThemeSetup');


function default_menu()
{
	wp_nav_menu(array('menu' => 'Main Menu', 'fallback_cb' => 'default_page_menu', 'container' => 'nav', 'container_class' => 'mainmenu', 'menu_class' => 'menu clear'));
}



function default_page_menu()
{
	echo '<nav class="mainmenu">';
	wp_page_menu(array('menu_class' => 'menu clear'));
	echo '</nav>';
}



function default_footer_menu()
{
	wp_nav_menu(array('menu' => 'Main Menu', 'container' => 'nav', 'container_class' => 'footer-menu', 'menu_class' => 'menu clear', 'depth' => 1));
}

remove_action('wp_head', 'wp_generator'); // do not show generator meta element

add_filter('widget_title', 'do_shortcode');
add_filter('widget_text', 'do_shortcode'); // do shortcode in text widget



// Jigoshop compatibility
if(is_plugin_active('jigoshop/jigoshop.php')){
	function aitJigoshopWrappers(){
		remove_action('jigoshop_before_main_content', 'jigoshop_output_content_wrapper', 10);

		add_action('jigoshop_before_main_content', create_function('', '?>
			<div id="sections">
			<div class="separator">
				<div class="slide-pattern-down"></div>
				<div class="hider"></div>
			</div>
			<div id="section-container" class="clearfix">
			<div id="container" class="subpage subpage-line clear clearfix <?php if(!is_active_sidebar("subpages-sidebar")): ?>onecolumn<?php endif; ?>">
			<!-- MAINBAR -->
				<div id="content" class="mainbar entry-content clearfix">
					<div id="content-wrapper"><?php '),
		10);

		add_action('jigoshop_sidebar', create_function('', '?></div><!-- end of container --></div></div><?php '), 100);
	}
	add_action('init', 'aitJigoshopWrappers');
}


/* AUTOINSTALL PLUGINS :: START */
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'AIT'.DIRECTORY_SEPARATOR.'Framework'.DIRECTORY_SEPARATOR.'Libs'.DIRECTORY_SEPARATOR.'class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'bandzone_register_required_plugins' );

function bandzone_register_required_plugins() {
    $plugins = array(
        // This is an example of how to include a plugin pre-packaged with a theme
        /*array(
            'name'                  => 'Revolution Slider',
            'slug'                  => 'revslider',
            'source'                => 'revslider-1.5.zip',
            'required'              => true,
            'version'               => '1.5',
            'force_activation'      => false,
            'force_deactivation'    => false,
            'external_url'          => '',
        ),*/

        // This is an example of how to include a plugin from the WordPress Plugin Repository
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
		array(
            'name'      => 'Really Simple CAPTCHA',
            'slug'      => 'really-simple-captcha',
            'required'  => false,
        ),
        array(
            'name'      => 'Widget Logic',
            'slug'      => 'widget-logic',
            'required'  => false,
        ),
    );

    $theme_text_domain = 'freestyle';
    $config = array(
        'domain'            => $theme_text_domain,
        'default_path'      => home_url('/') . "wp-content/themes/{$theme_text_domain}/plugins/",
        'parent_menu_slug'  => 'plugins.php',
        'parent_url_slug'   => 'plugins.php',
        'menu'              => 'install-required-plugins',
        'has_notices'       => true,
        'is_automatic'      => true,
        'message'           => '',
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Required Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ),
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ),
            'nag_type'                                  => 'updated'
        )
    );
    tgmpa( $plugins, $config );
}
/* AUTOINSTALL PLUGINS :: START */

/* ADD CUSTOM CSS TO ADMIN :: START */
function add_admin_theme_styles() {
	wp_enqueue_style( 'CSS_revSliderAdmin', THEME_URL . '/design/admin-plugins/revslider.css');
}
add_action('admin_print_styles', 'add_admin_theme_styles');

function add_admin_theme_scripts() {
	wp_enqueue_script( 'JS_revSliderAdmin', THEME_URL . '/design/admin-plugins/revslider.js');
}
add_action('admin_print_scripts', 'add_admin_theme_scripts');
/* ADD CUSTOM CSS TO ADMIN :: END */
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR.'ait-revslider.php';

