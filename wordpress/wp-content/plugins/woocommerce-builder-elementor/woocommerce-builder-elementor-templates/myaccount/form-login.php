<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce-page-builder-templates/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 9.9.9.9
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="woocommerce dtwcbe-woocommerce-myaccount-login-page">
	<?php //do_action( 'woocommerce_before_customer_login_form' ); ?>
	<div id="customer_login-www">
	<?php 
	do_action( 'dtwcbe_woocommerce_account_content_form_login' );
	?>
	</div>
	<?php //do_action( 'woocommerce_after_customer_login_form' ); ?>
</div>
