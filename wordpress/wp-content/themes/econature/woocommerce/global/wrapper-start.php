<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 * 
 * @cmsms_package 	EcoNature
 * @cmsms_version 	1.3.8
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


list($cmsms_layout) = cmsms_theme_page_layout_scheme();


echo '<!--_________________________ Start Content _________________________ -->' . "\n";


if ($cmsms_layout == 'r_sidebar') {
	echo '<div class="content entry" role="main">' . "\n\t";
} elseif ($cmsms_layout == 'l_sidebar') {
	echo '<div class="content entry fr" role="main">' . "\n\t";
} else {
	echo '<div class="middle_content entry" role="main">';
}