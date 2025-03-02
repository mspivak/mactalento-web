<?php
/**
 * OceanWP Child Theme Functions
 *
 * When running a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions will be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {

	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme).
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );

	// Load the stylesheet.
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	
}

add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );

// Disable page title on single posts
function disable_title( $return ) {
 
    if ( is_singular( 'cursos') ) {
        $return = false;
    }
 
    // Return
    return $return;
    
}
add_filter( 'ocean_display_page_header', 'disable_title' );

/**
 * Class Elementor_Form_Email_Attachments
 *
 * Send Elementor Form upload field as attachments to email
 */
class Elementor_Form_Email_Attachments {
   public $attachments_array = [];
   public function __construct() {
      add_action( 'elementor_pro/forms/process', [ $this, 'init_form_email_attachments' ], 11, 2 );
   }
   /**
    * @param \ElementorPro\Modules\Forms\Classes\Form_Record $record
    * @param \ElementorPro\Modules\Forms\Classes\Ajax_Handler $ajax_handler
    */
   public function init_form_email_attachments( $record, $ajax_handler ) {
      // check if we have attachments
      $files = $record->get( 'files' );
      if ( empty( $files ) ) {
         return;
      }
      // Store attachment in local var
      foreach ( $files as $id => $files_array ) {
         $this->attachments_array[] = $files_array['path'][0];
      }
      // if local var has attachments setup filter hook
      if ( 0 < count( $this->attachments_array ) ) {
         add_filter( 'wp_mail', [ $this, 'wp_mail' ] );
         add_action( 'elementor_pro/forms/new_record', [ $this, 'remove_wp_mail_filter' ], 5 );
      }
   }
   public function remove_wp_mail_filter() {
      $this->attachments_array = [];
      remove_filter( 'wp_mail', [ $this, 'wp_mail' ] );
   }
   public function wp_mail( $args ) {
      $args['attachments'] = $this->attachments_array;
      return $args;
   }
}
new Elementor_Form_Email_Attachments();

/*
 * Add WooCommerce Price Suffix
 */

add_filter( 'woocommerce_get_price_html', 'njengah_text_after_price' );

function njengah_text_after_price($price){

    $text_to_add_after_price  = ' + IVA '; //change text in bracket to your preferred text 
		  
	return $price .   $text_to_add_after_price;
		  
} 
