<?php
/**
 * WooCommerce Page Builder For Elementor Widget.
 *
 * @package WooCommerce-Builder-Elementor
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class DTWCBE_Single_Product_Additional_Information_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'single-product-additional-information';
	}

	public function get_title() {
		return esc_html__( 'Woo Product Additional Information', 'woocommerce-builder-elementor' );
	}

	public function get_icon() {
		return 'eicon-product-info';
	}

	public function get_categories() {
		return [ 'dtwcbe-woo-single-product' ];
	}
	
	public function get_keywords() {
		return [ 'woocommerce', 'additional information' , 'product' , 'single product' ];
	}

	protected function _register_controls() {

	}

	protected function render() {
		
		$settings = $this->get_settings_for_display();
		$post_type = get_post_type();
		
		if ( $post_type == 'product' || $post_type == DTWCBE_Post_Types::post_type() ){
			
			echo DTWCBE_Single_Product_Elementor::_render( $this->get_name() );
			
		}else{
			
			echo esc_html__('Product additional information', 'woocommerce' );
			
		}
	}
	

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new DTWCBE_Single_Product_Additional_Information_Widget());