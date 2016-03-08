<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/utils.php',                 // Utility functions
  'lib/init.php',                  // Initial theme setup and constants
  'lib/wrapper.php',               // Theme wrapper class
  'lib/conditional-tag-check.php', // ConditionalTagCheck class
  'lib/config.php',                // Configuration
  'lib/assets.php',                // Scripts and stylesheets
  'lib/titles.php',                // Page titles
  'lib/extras.php',                // Custom functions
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


$dir = get_stylesheet_directory() . '/vc_templates';
vc_set_shortcodes_templates_dir( $dir );


// Enable WooCommerce Support

  add_action( 'after_setup_theme', 'woocommerce_support' );
    function woocommerce_support() {
        add_theme_support( 'woocommerce' );
  }
  
  
// Visual Composer Custom Functions


// Register WooCommerce
vc_map( array(
    "name" => __("WooCommerce", "afm"),
    "base" => "woocommerce",
    "content_element" => true,
    "show_settings_on_create" => true,
    "category" => __( "AFM", "afm"),
    "is_container" => false,
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "afm"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "afm")
        )
    ),
) );


// Must extend with every new shortcode added
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_woocommerce extends WPBakeryShortCode {
    }
}







