<?php
/**
 * @package 	WordPress
 * @subpackage 	EcoNature
 * @version		1.4.3
 * 
 * Main Theme Functions File
 * Created by CMSMasters
 * 
 */


// Current Theme Constants
define('CMSMS_SHORTNAME', 'econature');
define('CMSMS_FULLNAME', 'EcoNature');


// CMSMasters Importer Compatibility
define('CMSMASTERS_IMPORTER', true);

// Change FS Method
if (!defined('FS_METHOD')) {
	define('FS_METHOD', 'direct');
}



/*** START EDIT THEME PARAMETERS HERE ***/

// Theme Settings System Fonts List
function cmsms_system_fonts_list() {
	$fonts = array( 
		"Arial, Helvetica, 'Nimbus Sans L', sans-serif" => 'Arial', 
		"Calibri, 'AppleGothic', 'MgOpen Modata', sans-serif" => 'Calibri', 
		"'Trebuchet MS', Helvetica, Garuda, sans-serif" => 'Trebuchet MS', 
		"'Comic Sans MS', Monaco, 'TSCu_Comic', cursive" => 'Comic Sans MS', 
		"Georgia, Times, 'Century Schoolbook L', serif" => 'Georgia', 
		"Verdana, Geneva, 'DejaVu Sans', sans-serif" => 'Verdana', 
		"Tahoma, Geneva, Kalimati, sans-serif" => 'Tahoma', 
		"'Lucida Sans Unicode', 'Lucida Grande', Garuda, sans-serif" => 'Lucida Sans', 
		"'Times New Roman', Times, 'Nimbus Roman No9 L', serif" => 'Times New Roman', 
		"'Courier New', Courier, 'Nimbus Mono L', monospace" => 'Courier New', 
	);
	
	
	return $fonts;
}



// Theme Settings Google Fonts List
function cmsms_google_fonts_list() {
	$fonts = array( 
		'' => __('None', 'econature'), 
		'Roboto:300,300italic,400,400italic,500,500italic,700,700italic' => 'Roboto', 
		'Roboto+Condensed:400,400italic,700,700italic' => 'Roboto Condensed', 
		'Roboto+Slab:300,400,700' => 'Roboto Slab', 
		'Open+Sans:300,300italic,400,400italic,700,700italic' => 'Open Sans', 
		'Open+Sans+Condensed:300,300italic,700' => 'Open Sans Condensed', 
		'Droid+Sans:400,700' => 'Droid Sans', 
		'Droid+Serif:400,400italic,700,700italic' => 'Droid Serif', 
		'PT+Sans:400,400italic,700,700italic' => 'PT Sans', 
		'PT+Sans+Caption:400,700' => 'PT Sans Caption', 
		'PT+Sans+Narrow:400,700' => 'PT Sans Narrow', 
		'PT+Serif:400,400italic,700,700italic' => 'PT Serif', 
		'Ubuntu:400,400italic,700,700italic' => 'Ubuntu', 
		'Ubuntu+Condensed' => 'Ubuntu Condensed', 
		'Headland+One' => 'Headland One', 
		'Source+Sans+Pro:300,300italic,400,400italic,700,700italic' => 'Source Sans Pro', 
		'Lato:400,400italic,700,700italic' => 'Lato', 
		'Cuprum:400,400italic,700,700italic' => 'Cuprum', 
		'Oswald:300,400,700' => 'Oswald', 
		'Yanone+Kaffeesatz:300,400,700' => 'Yanone Kaffeesatz', 
		'Lobster' => 'Lobster', 
		'Lobster+Two:400,400italic,700,700italic' => 'Lobster Two', 
		'Questrial' => 'Questrial', 
		'Raleway:300,400,500,600,700' => 'Raleway', 
		'Dosis:300,400,500,700' => 'Dosis', 
		'Cutive+Mono' => 'Cutive Mono', 
		'Quicksand:300,400,700' => 'Quicksand', 
		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic' => 'Titillium Web', 
		'Montserrat:400,700' => 'Montserrat', 
		'Cookie' => 'Cookie', 
		'Oxygen:300,400,700' => 'Oxygen', 
	);
	
	
	return $fonts;
}



// Theme Settings Font Weights List
function cmsms_font_weight_list() {
	$list = array( 
		'normal' => 	'normal', 
		'100' => 		'100', 
		'200' => 		'200', 
		'300' => 		'300', 
		'400' => 		'400', 
		'500' => 		'500', 
		'600' => 		'600', 
		'700' => 		'700', 
		'800' => 		'800', 
		'900' => 		'900', 
		'bold' => 		'bold', 
		'bolder' => 	'bolder', 
		'lighter' => 	'lighter', 
	);
	
	
	return $list;
}



// Theme Settings Font Styles List
function cmsms_font_style_list() {
	$list = array( 
		'normal' => 	'normal', 
		'italic' => 	'italic', 
		'oblique' => 	'oblique', 
		'inherit' => 	'inherit', 
	);
	
	
	return $list;
}



// Theme Settings Text Transforms List
function cmsms_text_transform_list() {
	$list = array( 
		'none' => 'none', 
		'uppercase' => 'uppercase', 
		'lowercase' => 'lowercase', 
		'capitalize' => 'capitalize', 
	);
	
	
	return $list;
}



// Theme Settings Text Decorations List
function cmsms_text_decoration_list() {
	$list = array( 
		'none' => 'none', 
		'underline' => 'underline', 
		'overline' => 'overline', 
		'line-through' => 'line-through', 
	);
	
	
	return $list;
}



// Theme Settings Custom Color Schemes
function cmsms_custom_color_schemes_list() {
	$list = array( 
		'first' => __('Custom 1', 'econature'), 
		'second' => __('Custom 2', 'econature'), 
		'third' => __('Custom 3', 'econature'), 
		'fourth' => __('Custom 4', 'econature'), 
		'fifth' => __('Custom 5', 'econature'), 
	);
	
	
	return $list;
}

/*** STOP EDIT THEME PARAMETERS HERE ***/



// Theme Image Thumbnails Size
function cmsms_image_thumbnail_list() {
	$list = array( 
		'small-thumb' => array( 
			'width' => 		55, 
			'height' => 	55, 
			'crop' => 		true 
		), 
		'square-thumb' => array( 
			'width' => 		250, 
			'height' => 	250, 
			'crop' => 		true, 
			'title' => 		__('Square', 'econature') 
		), 
		'blog-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	390, 
			'crop' => 		true, 
			'title' => 		__('Masonry Blog', 'econature') 
		), 
		'project-thumb' => array( 
			'width' => 		580, 
			'height' => 	460, 
			'crop' => 		true, 
			'title' => 		__('Project', 'econature') 
		), 
		'project-masonry-thumb' => array( 
			'width' => 		580, 
			'height' => 	9999, 
			'title' => 		__('Masonry Project', 'econature') 
		), 
		'post-thumbnail' => array( 
			'width' => 		820, 
			'height' => 	490, 
			'crop' => 		true, 
			'title' => 		__('Featured', 'econature') 
		), 
		'masonry-thumb' => array( 
			'width' => 		820, 
			'height' => 	9999, 
			'title' => 		__('Masonry', 'econature') 
		), 
		'full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	700, 
			'crop' => 		true, 
			'title' => 		__('Full', 'econature') 
		), 
		'project-full-thumb' => array( 
			'width' => 		1160, 
			'height' => 	920, 
			'crop' => 		true, 
			'title' => 		__('Project Full', 'econature') 
		), 
		'full-masonry-thumb' => array( 
			'width' => 		1160, 
			'height' => 	9999, 
			'title' => 		__('Masonry Full', 'econature') 
		) 
	);
	
	
	return $list;
}



// Theme Settings All Color Schemes List
function cmsms_all_color_schemes_list() {
	$list = array( 
		'default' => 		__('Default', 'econature'), 
		'header' => 		__('Header', 'econature'), 
		'header_top' => 	__('Header Top', 'econature'), 
		'footer' => 		__('Footer', 'econature') 
	);
	
	
	$out = array_merge($list, cmsms_custom_color_schemes_list());
	
	
	return $out;
}



// Theme Settings Color Schemes List
function cmsms_color_schemes_list() {
	$list = cmsms_all_color_schemes_list();
	
	
	unset($list['header']);
	
	unset($list['header_top']);
	
	
	$out = array_merge($list, cmsms_custom_color_schemes_list());
	
	
	return $out;
}



// WP Color Picker Palettes
if (!function_exists('cmsms_color_picker_palettes')) {

function cmsms_color_picker_palettes() {
	$palettes = array( 
		'#000000', 
		'#ffffff', 
		'#979ca4', 
		'#58cf90', 
		'#c8ccce', 
		'#4c5562', 
		'#ffffff', 
		'#ffffff', 
		'#e5e8ec' 
	);
	
	
	return apply_filters('cmsms_color_picker_palettes_filter', $palettes);
}

}



// Theme Settings Color Schemes Default Colors
function cmsms_color_schemes_defaults() {
	$list = array( 
		'default' => array( // content default color scheme
			'color' => 		'#979ca4|100', 
			'link' => 		'#58cf90|100', 
			'hover' => 		'#c8ccce|100', 
			'heading' => 	'#4c5562|100', 
			'bg' => 		'#ffffff|100', 
			'alternate' => 	'#ffffff|100', 
			'border' => 	'#e5e8ec|100' 
		), 
		'header' => array( // Header color scheme
			'color' => 				'#979ca4|100', 
			'link' => 				'#323943|100', 
			'hover' => 				'#58cf90|100', 
			'bg' => 				'#ffffff|95', 
			'hover_bg' => 			'#3d3d3d|0', 
			'border' => 			'#ebebeb|100', 
			'dropdown_link' => 		'#9e9e9e|100', 
			'dropdown_hover' => 	'#3d3d3d|100', 
			'dropdown_bg' => 		'#ffffff|100', 
			'dropdown_hover_bg' => 	'#fbfbfb|100', 
			'dropdown_border' => 	'#ebebeb|100' 
		), 
		'header_top' => array( // Header Top color scheme
			'color' => 				'#979ca4|100', 
			'link' => 				'#58cf90|100', 
			'hover' => 				'#c8ccce|100', 
			'bg' => 				'#ffffff|100', 
			'border' => 			'#eaedf0|100', 
			'dropdown_link' => 		'#979ca4|100', 
			'dropdown_hover' => 	'#58cf90|100', 
			'dropdown_bg' => 		'#ffffff|100', 
			'dropdown_border' => 	'#e5e8ec|100' 
		), 
		'footer' => array( // Footer color scheme
			'color' => 		'#979ca4|100', 
			'link' => 		'#c8ccce|100', 
			'hover' => 		'#58cf90|100', 
			'heading' => 	'#4c5562|100', 
			'bg' => 		'#ffffff|100', 
			'alternate' => 	'#f2f2f2|100', 
			'border' => 	'#e5e8ec|100' 
		), 
		'first' => array( // custom color scheme 1
			'color' => 		'#ffffff|100', 
			'link' => 		'#ffffff|100', 
			'hover' => 		'#ffffff|100', 
			'heading' => 	'#ffffff|100', 
			'bg' => 		'#3d3d3d|100', 
			'alternate' => 	'#414141|100', 
			'border' => 	'#5a5a5a|100' 
		), 
		'second' => array( // custom color scheme 2
			'color' => 		'#3d3d3d|100', 
			'link' => 		'#9e9e9e|100', 
			'hover' => 		'#3d3d3d|100', 
			'heading' => 	'#3d3d3d|100', 
			'bg' => 		'#ffffff|100', 
			'alternate' => 	'#fbfbfb|100', 
			'border' => 	'#ebebeb|100' 
		), 
		'third' => array( // custom color scheme 3
			'color' => 		'#9c9c9c|100', 
			'link' => 		'#838383|100', 
			'hover' => 		'#ffffff|100', 
			'heading' => 	'#838383|100', 
			'bg' => 		'#ffffff|100', 
			'alternate' => 	'#ffffff|100', 
			'border' => 	'#eaedf0|100' 
		), 
		'fourth' => array( // custom color scheme 4
			'color' => 		'#707070|100', 
			'link' => 		'#94e95d|100', 
			'hover' => 		'#3d3d3d|100', 
			'heading' => 	'#979ca4|100', 
			'bg' => 		'#ffffff|100', 
			'alternate' => 	'#fdfdfd|100', 
			'border' => 	'#c8ccce|100' 
		), 
		'fifth' => array( // custom color scheme 5
			'color' => 		'#ffffff|100', 
			'link' => 		'#58cf90|100', 
			'hover' => 		'#d0f275|100', 
			'heading' => 	'#fcfcfc|100', 
			'bg' => 		'#5b5b5b|100', 
			'alternate' => 	'#fdfdfd|100', 
			'border' => 	'#b5b5b5|100' 
		) 
	);
	
	
	return $list;
}



// CMSMasters Framework Directories Constants
define('CMSMS_FRAMEWORK', get_template_directory() . '/framework');
define('CMSMS_ADMIN', CMSMS_FRAMEWORK . '/admin');
define('CMSMS_SETTINGS', CMSMS_ADMIN . '/settings');
define('CMSMS_OPTIONS', CMSMS_ADMIN . '/options');
define('CMSMS_ADMIN_INC', CMSMS_ADMIN . '/inc');
define('CMSMS_CLASS', CMSMS_FRAMEWORK . '/class');
define('CMSMS_FUNCTION', CMSMS_FRAMEWORK . '/function');


define('CMSMASTERS_DEMO_FILES_PATH', get_template_directory() . '/framework/admin/inc/demo-content/');



// Load Framework Parts
require_once(CMSMS_CLASS . '/Browser.php');

if (class_exists('Cmsmasters_Theme_Importer')) {
	require_once(CMSMS_ADMIN_INC . '/demo-content-importer.php');
}

require_once(CMSMS_SETTINGS . '/cmsms-theme-settings.php');

require_once(CMSMS_OPTIONS . '/cmsms-theme-options.php');

require_once(CMSMS_ADMIN_INC . '/admin-scripts.php');

require_once(CMSMS_ADMIN_INC . '/plugin-activator.php');

require_once(CMSMS_CLASS . '/widgets.php');

require_once(CMSMS_FUNCTION . '/breadcrumbs.php');

require_once(CMSMS_FUNCTION . '/likes.php');

require_once(CMSMS_FUNCTION . '/pagination.php');

require_once(CMSMS_FUNCTION . '/single-comment.php');

require_once(CMSMS_FUNCTION . '/theme-functions.php');

require_once(CMSMS_FUNCTION . '/theme-fonts.php');

require_once(CMSMS_FUNCTION . '/theme-colors-primary.php');

require_once(CMSMS_FUNCTION . '/theme-colors-secondary.php');

require_once(CMSMS_FUNCTION . '/template-functions.php');

require_once(CMSMS_FUNCTION . '/template-functions-post.php');

require_once(CMSMS_FUNCTION . '/template-functions-project.php');

require_once(CMSMS_FUNCTION . '/template-functions-profile.php');

require_once(CMSMS_FUNCTION . '/template-functions-shortcodes.php');

require_once(CMSMS_FUNCTION . '/template-functions-widgets.php');


$cmsms_wp_version = get_bloginfo('version');

if (version_compare($cmsms_wp_version, '5', '>=') || function_exists('is_gutenberg_page')) {
	require_once(get_template_directory() . '/gutenberg/cmsms-module-functions.php');
}


// Woocommerce functions
if (class_exists('woocommerce')) {
	require_once(get_template_directory() . '/woocommerce/cmsms-woo-functions.php');
}



// Events functions
if (class_exists('Tribe__Events__Main')) {
	require_once(get_template_directory() . '/tribe-events/cmsms-events-functions.php');
}



// Load Theme Local File
if (!function_exists('cmsms_load_theme_textdomain')) {
	function cmsms_load_theme_textdomain() {
		$locale = get_locale();
		
		
		load_theme_textdomain('econature', CMSMS_FRAMEWORK . '/languages');
		
		
		$locale_file = CMSMS_FRAMEWORK . '/languages/' . $locale . '.php';
		
		
		if (is_readable($locale_file)) {
			require_once($locale_file);
		}
	}
}

// Load Theme Local File Action
if (!has_action('after_setup_theme', 'cmsms_load_theme_textdomain')) {
	add_action('after_setup_theme', 'cmsms_load_theme_textdomain');
}



// Framework Activation & Data Import
if (!function_exists('cmsms_theme_activation')) {
	function cmsms_theme_activation() {
		if (get_option('cmsms_active_theme') != CMSMS_SHORTNAME) {
			add_option('cmsms_active_theme', CMSMS_SHORTNAME, '', 'yes');
			
			
			cmsms_add_global_options();
			
			
			cmsms_add_global_icons();
			
			
			flush_rewrite_rules();
			
			
			wp_redirect(admin_url('admin.php?page=cmsms-settings&upgraded=true'));
		}
	}
}

add_action('after_switch_theme', 'cmsms_theme_activation');



// Framework Deactivation
if (!function_exists('cmsms_theme_deactivation')) {
	function cmsms_theme_deactivation() {
		delete_option('cmsms_active_theme');
	}
}

add_action('switch_theme', 'cmsms_theme_deactivation');



// Plugin Activation Regenerate Styles
if (!function_exists('cmsms_plugin_activation')) {
	function cmsms_plugin_activation($plugin, $network_activation) {
		update_option('cmsms_plugin_activation', 'true');
		
		
		if ($plugin == 'classic-editor/classic-editor.php') {
			update_option('classic-editor-replace', 'no-replace');
		}
	}
}

add_action('activated_plugin', 'cmsms_plugin_activation', 10, 2);


if (!function_exists('cmsms_plugin_activation_regenerate')) {
	function cmsms_plugin_activation_regenerate() {
		if (!get_option('cmsms_plugin_activation')) {
			add_option('cmsms_plugin_activation', 'false');
		}
		
		if (get_option('cmsms_plugin_activation') != 'false') {
			cmsms_regenerate_styles();
			
			update_option('cmsms_plugin_activation', 'false');
		}
	}
}

add_action('init', 'cmsms_plugin_activation_regenerate');


function cmsms_run_reinit_import_options($post_id, $key, $value) {
	if (!get_post_meta($post_id, 'cmsms_heading', true)) {
		$custom_post_meta_fields = get_custom_all_meta_fields();
		
		foreach ($custom_post_meta_fields as $field) {
			if ( 
				$field['type'] != 'tabs' && 
				$field['type'] != 'tab_start' && 
				$field['type'] != 'tab_finish' && 
				$field['type'] != 'content_start' && 
				$field['type'] != 'content_finish' 
			) {
				update_post_meta($post_id, $field['id'], $field['std']);
			}
		}
	}
	
	
	if ($key === 'cmsms_composer_show' && $value === 'true') {
		update_post_meta($post_id, 'cmsms_gutenberg_show', 'true');
	}
}

add_action('import_post_meta', 'cmsms_run_reinit_import_options', 10, 3);

