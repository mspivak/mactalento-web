<?php
/**
 * WooCommerce Page Builder For Elementor Widget.
 *
 * @package WooCommerce-Builder-Elementor
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class DTWCBE_Single_Product_Price_Unit_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'single-product-price-unit';
	}

	public function get_title() {
		return esc_html__( 'Woo Germanized Price Unit', 'woocommerce-builder-elementor' );
	}

	public function get_icon() {
		return 'eicon-woocommerce';
	}

	public function get_categories() {
		return [ 'dtwcbe-woo-single-product' ];
	}
	
	public function get_keywords() {
		return [ 'woocommerce', 'price unit' , 'product' , 'single product' ];
	}

	protected function _register_controls(){

	}

	protected function render() {
		if( function_exists('woocommerce_gzd_template_single_price_unit') ){
			woocommerce_gzd_template_single_price_unit();
		}
	}
	

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new DTWCBE_Single_Product_Price_Unit_Widget());