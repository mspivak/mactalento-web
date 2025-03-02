<?php
/**
 * WooCommerce Page Builder For Elementor Widget.
 *
 * @package WooCommerce-Builder-Elementor
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class DTWCBE_Cart_Table_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'cart-table';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Cart Table', 'woocommerce-builder-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-woocommerce';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'dtwcbe-woo-cart' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		$this->start_controls_section(
			'section_heading_style',
			array(
				'label' => esc_html__( 'Cart Headings', 'woocommerce-builder-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'heading_typography',
				'label'     => esc_html__( 'Typography', 'elementor' ),
				'selector'  => '{{WRAPPER}} .shop_table.cart th',
			)
		);
		$this->add_control(
			'cart_heading_bgcolor',
			[
				'label' => esc_html__( 'Background Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} table.shop_table th ' => 'background-color: {{VALUE}} !important',
				],
			]
		);
		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Color', 'elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart th' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .shop_table.cart th',
				'exclude' => [ 'color' ],
			]
		);
		
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart th' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_responsive_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'text_align',
			[
				'label'        => esc_html__( 'Alignment', 'elementor' ),
				'type'         => \Elementor\Controls_Manager::CHOOSE,
				'options'      => [
					'left'   => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default'      => '',
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart thead th' => 'text-align: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_content_style',
			array(
				'label' => esc_html__( 'Cart Table', 'woocommerce-builder-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'cart_table_bgcolor',
			[
				'label' => esc_html__( 'Background Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} table.shop_table td ' => 'background-color: {{VALUE}} !important',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'td_border',
				'selector' => '{{WRAPPER}} .shop_table.cart tr.cart_item td',
				'exclude' => [ 'color' ],
			]
		);
		
		$this->add_control(
			'td_border_color',
			[
				'label' => esc_html__( 'Border Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart tr.cart_item td' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'td_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart tr.cart_item td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'td_text_align',
			[
				'label'        => esc_html__( 'Alignment', 'elementor' ),
				'type'         => \Elementor\Controls_Manager::CHOOSE,
				'options'      => [
					'left'   => [
						'title' => esc_html__( 'Left', 'elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'elementor' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default'      => '',
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart tr.cart_item td' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'product_thumbnail_style',
			[
				'label' => esc_html__( 'Product Thumbnail', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'product_thumbnail',
				'selector' => '{{WRAPPER}} table.shop_table.cart img',
			]
		);

		$this->add_responsive_control(
			'product_thumbnail_radius',
			[
				'label' => esc_html__( 'Border Radius', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} table.shop_table.cart img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'product_thumbnail_size',
			[
				'label' => esc_html__( 'Thumbnail size', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 32,
				],
				'tablet_default' => [
					'size' => 32,
				],
				'mobile_default' => [
					'size' => 32,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} table.shop_table.cart img' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->start_controls_tabs( 'cart_item_style_tabs' );
		
		$this->start_controls_tab( 'product_name',
			[
				'label' => esc_html__( 'Product', 'woocommerce-builder-elementor' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'product_name_typography',
				'label'     => esc_html__( 'Typography', 'elementor' ),
				'selector'  => '{{WRAPPER}} .shop_table.cart tr.cart_item td.product-name',
			)
		);
		$this->add_control(
			'product_name_color',
			[
				'label' => esc_html__( 'Product Name Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart tr.cart_item td.product-name a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		
		$this->start_controls_tab( 'product_price',
			[
				'label' => esc_html__( 'Price', 'woocommerce' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'product_price_typography',
				'label'     => esc_html__( 'Typography', 'elementor' ),
				'selector'  => '{{WRAPPER}} .shop_table.cart tr.cart_item td.product-price',
			)
		);
		$this->add_control(
			'product_price_color',
			[
				'label' => esc_html__( 'Product Price Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart tr.cart_item td.product-price' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab( 'product_quantity',
			[
				'label' => esc_html__( 'Quantity', 'woocommerce' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'product_quantity_typography',
				'label'     => esc_html__( 'Typography', 'elementor' ),
				'selector'  => '{{WRAPPER}} .shop_table.cart tr.cart_item td.product-quantity input',
			)
		);
		$this->add_control(
			'product_quantity_color',
			[
				'label' => esc_html__( 'Product Quantity Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart tr.cart_item td.product-quantity input' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		
		$this->start_controls_tab( 'product_subtotal',
			[
				'label' => esc_html__( 'Total', 'woocommerce-builder-elementor' ),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'product_subtotal_typography',
				'label'     => esc_html__( 'Typography', 'elementor' ),
				'selector'  => '{{WRAPPER}} .shop_table.cart tr.cart_item td.product-subtotal',
			)
		);
		$this->add_control(
			'product_subtotal_color',
			[
				'label' => esc_html__( 'Total Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart tr.cart_item td.product-subtotal' => 'color: {{VALUE}}',
				],
			]
		);
		$this->end_controls_tab();
		
		
		$this->end_controls_tabs();
		
		$this->end_controls_section();
		
		// Apply coupon
		$this->start_controls_section(
			'section_coupon_style',
			array(
				'label' => esc_html__( 'Apply coupon', 'woocommerce-builder-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'coupon_field_style',
			[
				'label' => esc_html__( 'Coupon Field', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'coupon_field_typography',
				'label'     => esc_html__( 'Typography', 'elementor' ),
				'selector'  => '{{WRAPPER}} table.cart td.actions .coupon .input-text',
			)
		);

		$this->add_control(
			'coupon_field_text_color',
			[
				'label' => esc_html__( 'Text Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon input.input-text' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'coupon_field_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon input.input-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'coupon_field_border',
				'selector' => '{{WRAPPER}} .shop_table.cart td.actions .coupon input.input-text',
				'exclude' => [ 'color' ],
			]
		);
		
		$this->add_control(
			'coupon_field_border_color',
			[
				'label' => esc_html__( 'Border Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon input.input-text' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'coupon_field_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon input.input-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'coupon_field_box_shadow',
				'selector' => '{{WRAPPER}} .shop_table.cart td.actions .coupon input.input-text',
			]
		);



		$this->add_responsive_control(
			'coupon_field_width',
			[
				'label' => esc_html__( 'Width (auto)', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} table.cart td.actions .coupon .input-text' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'coupon_button_style',
			[
				'label' => esc_html__( 'Coupon Button', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'coupon_typography',
				'label'     => esc_html__( 'Typography', 'elementor' ),
				'selector'  => '{{WRAPPER}} .shop_table.cart td.actions .coupon .button',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'coupon_border',
				'selector' => '{{WRAPPER}} .shop_table.cart td.actions .coupon .button',
				'exclude' => [ 'color' ],
			]
		);
		$this->add_responsive_control(
			'coupon_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		/////
		$this->start_controls_tabs( 'coupon_style_tabs' );
		
		$this->start_controls_tab( 'coupon_style_normal',
			[
				'label' => esc_html__( 'Normal', 'woocommerce-builder-elementor' ),
			]
		);
		
		$this->add_control(
			'coupon_text_color',
			[
				'label' => esc_html__( 'Text Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon .button' => 'color: {{VALUE}} !important',
				],
			]
		);
		
		$this->add_control(
			'coupon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon .button' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'coupon_border_color',
			[
				'label' => esc_html__( 'Border Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon .button' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'coupon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'coupon_box_shadow',
				'selector' => '{{WRAPPER}} .shop_table.cart td.actions .coupon .button',
			]
		);
		$this->end_controls_tab();
		
		$this->start_controls_tab( 'coupon_style_hover',
			[
				'label' => esc_html__( 'Hover', 'woocommerce-builder-elementor' ),
			]
		);

		$this->add_control(
			'coupon_text_color_hover',
			[
				'label' => esc_html__( 'Text Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon .button:hover' => 'color: {{VALUE}}  !important',
				],
			]
		);

		$this->add_control(
			'coupon_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon .button:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'coupon_border_color_hover',
			[
				'label' => esc_html__( 'Border Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon .button:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'coupon_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon .button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'coupon_box_shadow_hover',
				'selector' => '{{WRAPPER}} .shop_table.cart td.actions .coupon .button:hover',
			]
		);
		$this->add_control(
			'coupon_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.2,
				],
				'range' => [
					'px' => [
						'max' => 2,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions .coupon .button' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		////
		$this->end_controls_section();
		
		// Update cart
		$this->start_controls_section(
			'section_update_cart_style',
			array(
				'label' => esc_html__( 'Update cart', 'woocommerce-builder-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'      => 'update_cart_typography',
				'label'     => esc_html__( 'Typography', 'elementor' ),
				'selector'  => '{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]',
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'update_cart_border',
				'selector' => '{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]',
				'exclude' => [ 'color' ],
			]
		);
		$this->add_responsive_control(
			'update_cart_padding',
			[
				'label' => esc_html__( 'Padding', 'elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		/////
		$this->start_controls_tabs( 'update_cart_style_tabs' );
		
		$this->start_controls_tab( 'update_cart_style_normal',
			[
				'label' => esc_html__( 'Normal', 'woocommerce-builder-elementor' ),
			]
		);
		
		$this->add_control(
			'update_cart_text_color',
			[
				'label' => esc_html__( 'Text Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]' => 'color: {{VALUE}}  !important',
				],
			]
		);
		
		$this->add_control(
			'update_cart_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'update_cart_border_color',
			[
				'label' => esc_html__( 'Border Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]' => 'border-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'update_cart_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'update_cart_box_shadow',
				'selector' => '{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]',
			]
		);
		$this->end_controls_tab();
		
		$this->start_controls_tab( 'update_cart_style_hover',
			[
				'label' => esc_html__( 'Hover', 'woocommerce-builder-elementor' ),
			]
		);

		$this->add_control(
			'update_cart_text_color_hover',
			[
				'label' => esc_html__( 'Text Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]:hover' => 'color: {{VALUE}}  !important',
				],
			]
		);

		$this->add_control(
			'update_cart_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'update_cart_border_color_hover',
			[
				'label' => esc_html__( 'Border Color', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]:hover' => 'border-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'update_cart_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'update_cart_box_shadow_hover',
				'selector' => '{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]:hover',
			]
		);
		$this->add_control(
			'update_cart_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'woocommerce-builder-elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.2,
				],
				'range' => [
					'px' => [
						'max' => 2,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .shop_table.cart td.actions button[name=update_cart]' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		
		$this->end_controls_section();

	}

	/**
	 * Render widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		DTWCBE_Shortcode_Cart::output( $atts = array() );
	}

}

\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new DTWCBE_Cart_Table_Widget());

/**
 * Cart Shortcode
 * DTWCBE_Shortcode_Cart
 * Used on the cart page, the cart shortcode displays the cart contents and interface for coupon codes and other cart bits and pieces.
 *
 * @author 		WooThemes
 * @category 	Shortcodes
 * @package 	WooCommerce/Shortcodes/Cart
 * @version     2.3.0
 */
class DTWCBE_Shortcode_Cart extends WC_Shortcode_Cart{
	/**
	 * Output the cart shortcode.
	 */
	public static function output( $atts = '' ) {
		// Constants.
		wc_maybe_define_constant( 'WOOCOMMERCE_CART', true );

		$atts        = shortcode_atts( array(), $atts, 'woocommerce_cart' );
		$nonce_value = wc_get_var( $_REQUEST['woocommerce-shipping-calculator-nonce'], wc_get_var( $_REQUEST['_wpnonce'], '' ) ); // @codingStandardsIgnoreLine.

		// Update Shipping. Nonce check uses new value and old value (woocommerce-cart). @todo remove in 4.0.
		if ( ! empty( $_POST['calc_shipping'] ) && ( wp_verify_nonce( $nonce_value, 'woocommerce-shipping-calculator' ) || wp_verify_nonce( $nonce_value, 'woocommerce-cart' ) ) ) { // WPCS: input var ok.
			self::calculate_shipping();

			// Also calc totals before we check items so subtotals etc are up to date.
			WC()->cart->calculate_totals();
		}

		// Check cart items are valid.
		do_action( 'woocommerce_check_cart_items' );

		// Calc totals.
		WC()->cart->calculate_totals();

		if ( WC()->cart->is_empty() ) {
			wc_get_template( 'cart/cart-empty.php',  array('woocommerce-builder-elementor-custom-templates' => 1), DTWCBE_PATH . 'woocommerce-builder-elementor-templates/', DTWCBE_PATH . 'woocommerce-builder-elementor-templates/'  );
		} else {
			$file = 'cart-table.php';
			$find[] = 'woocommerce-builder-elementor-templates/cart/' . $file;
			$template = locate_template($find);
			if ( $template && current_user_can('manage_options') ) {
				wc_get_template( 'cart/cart-table.php',  array('woocommerce-builder-elementor-custom-templates' => 1), get_template_directory() . 'woocommerce-builder-elementor-templates/', get_template_directory() . 'woocommerce-builder-elementor-templates/'  );
			}else{
				wc_get_template( 'cart/cart-table.php',  array('woocommerce-builder-elementor-custom-templates' => 1), DTWCBE_PATH . 'woocommerce-builder-elementor-templates/', DTWCBE_PATH . 'woocommerce-builder-elementor-templates/'  );
			}
			
		}
	}
}