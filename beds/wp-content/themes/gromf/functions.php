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






/**
 * Top Bar Walker
 *
 * @since 1.0.0
 */
class Top_Bar_Walker extends Walker_Nav_Menu {
  /**
    * @see Walker_Nav_Menu::start_lvl()
   * @since 1.0.0
   *
   * @param string $output Passed by reference. Used to append additional content.
   * @param int $depth Depth of page. Used for padding.
  */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class=\"sub-menu dropdown\">\n";
    }

    /**
     * @see Walker_Nav_Menu::start_el()
     * @since 1.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param object $args
     */

    function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
        $item_html = '';
        parent::start_el( $item_html, $object, $depth, $args );  

        $output .= ( $depth == 0 ) ? '' : '';

        $classes = empty( $object->classes ) ? array() : ( array ) $object->classes;  

        if ( in_array('label', $classes) ) {
            $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '<label>$1</label>', $item_html );
        }

    if ( in_array('divider', $classes) ) {
      $item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
    }

        $output .= $item_html;
    }

  /**
     * @see Walker::display_element()
     * @since 1.0.0
   * 
   * @param object $element Data object
   * @param array $children_elements List of elements to continue traversing.
   * @param int $max_depth Max depth to traverse.
   * @param int $depth Depth of current element.
   * @param array $args
   * @param string $output Passed by reference. Used to append additional content.
   * @return null Null on failure with no changes to parameters.
   */
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

}

add_filter('show_admin_bar', '__return_false'); // Hide Wordpress topbar

$dir = get_stylesheet_directory() . '/vc_templates';
vc_set_shortcodes_templates_dir( $dir );

// Create a mesurement param for selecting the size of the element (px, em, rem, vw, vh,)
add_shortcode_param( 'measurement', 'measurement_field' );
function measurement_field( $settings, $value ) {
		
		// Textbox
		$value = __( $value, "js_composer" );
	    $value = htmlspecialchars( $value );
	    
	    // Dropdown
	    
	    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
		$type = isset($settings['type']) ? $settings['type'] : '';
		$class = isset($settings['class']) ? $settings['class'] : '';
		$json = isset($settings['json']) ? $settings['json'] : '';
		$jsonIterator = json_decode($json,true);
		$selector = '<select name="'.$param_name.'" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '">';
	
		foreach ($jsonIterator as $key => $val) {
					if(is_array($val)) {
						$labels = str_replace('_',' ', $key);
						$selector .= '<optgroup label="'.ucwords($labels).'">';
						foreach($val as $label => $style){
							$label = str_replace('_',' ', $label);
							if($style == $value)
								$selector .= '<option selected value="'.$style.'">'.__($label,"ultimate_vc").'</option>';
							else
								$selector .= '<option value="'.$style.'">'.__($label,"ultimate_vc").'</option>';
						}
					} else {
						if($val == $value)
							$selector .= "<option selected value=".$val.">".__($key,"ultimate_vc")."</option>";
						else
							$selector .= "<option value=".$val.">".__($key,"ultimate_vc")."</option>";
					}
				}
				
			$selector .= '<select>';
			
			
			// Textbox
			
			$output = '';
			$output    .= '<input style="width: 74%; display: inline-block" name="' . $settings['param_name']
			           . '" class="wpb_vc_param_value wpb-textinput '
			           . $settings['param_name'] . ' ' . $settings['type']
			           . '" type="text" value="' . $value . '"/>';
			
			// Dropdown
			
			$output .= '<div class="select2_option" style="width: 25%; display: inline-block; padding: 6.5px 6px; float: right;">';
			$output .= $selector;
			$output .= '</div>';
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		$output = '';
		$output    .= '<input style="width: 74%; display: inline-block" name="' . $settings['param_name']
		           . '" class="wpb_vc_param_value wpb-textinput '
		           . $settings['param_name'] . ' ' . $settings['type']
		           . '" type="text" value="' . $value . '"/>';
		           
		           
		           
	
	return $output;
	
}

// Css Animation provided by Visual Composer. Figure out how to integrate.
global $vc_add_css_animation;
$vc_add_css_animation = array(
	'type' => 'dropdown',
	'heading' => __( 'CSS Animation', 'stctheme' ),
	'param_name' => 'css_animation',
	'admin_label' => true,
	'value' => array(
		__( 'No', 'stctheme' ) => '',
		__( 'Top to bottom', 'stctheme' ) => 'top-to-bottom',
		__( 'Bottom to top', 'stctheme' ) => 'bottom-to-top',
		__( 'Left to right', 'stctheme' ) => 'left-to-right',
		__( 'Right to left', 'stctheme' ) => 'right-to-left',
		__( 'Appear from center', 'stctheme' ) => "appear"
	),
	'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'stctheme' )
);

// Custom measurement object.
add_action( 'vc_before_init', 'measurement_test_shortcode_integrateWithVC' );
function measurement_test_shortcode_integrateWithVC() {
   vc_map( array(
      "name" => __( "Measurement Test", "stctheme" ),
      "base" => "measurement",
      "class" => "",
      "category" => __( "STC", "stctheme"),
      "params" => array(
      	array(
                "type" => "measurement",
                "holder" => "div",
                "class" => "",
                "heading" => __("Pick size", "js_composer"),
                "param_name" => "measurement_test",
                "value" => '',
                "description" => __( "Pick the size. The dropdown allows you to choose which measurement to use.", 'stc-plugin' ),
            ),
          )
   ) );

}

// SERVICES SHORTCODE
add_action( 'vc_before_init', 'services_shortcode_integrateWithVC' );
function services_shortcode_integrateWithVC() {
   vc_map( array(
      "name" => __( "Services", "stctheme" ),
      "base" => "services",
      "class" => "",
      "category" => __( "STC", "stctheme"),
      "params" => array(
      	array(
                "type" => "measurement",
                "holder" => "div",
                "class" => "",
                "heading" => __("Pick size", "js_composer"),
                "param_name" => "meaurement",
                "value" => '',
                "description" => __( "Pick the size. The dropdown allos you to choose which measurement to use.", 'my-text-domain' ),
            ),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style', 'stctheme' ),
			"class" => "",
			'param_name' => 'style', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Custom', 'stctheme' ) => '',
				__( 'Style 1', 'stctheme' ) => 'style_1',
				__( 'Style 2', 'stctheme' ) => 'style_2',
				__( 'Style 3', 'stctheme' ) => 'style_3',
				__( 'Style 4', 'stctheme' ) => 'style_4',
			),
			'description' => __( 'Select a preset style for the service.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Direction', 'stctheme' ),
			"class" => "",
			'param_name' => 'direction', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Vertical', 'stctheme' ) => 'vertical',
				__( 'Horizontal', 'stctheme' ) => 'horizontal',
			),
			"dependency" => Array("element" => "style", "value" => array ( '')),
			'description' => __( 'Select the alignment of the title.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'size', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Tiny', 'stctheme' ) => 'max-width: 14em',
				__( 'Small', 'stctheme' ) => 'max-width: 22em',
				__( 'Normal', 'stctheme' ) => 'max-width: 30em',
				__( 'Large', 'stctheme' ) => 'max-width: 37em',
				__( 'Huge', 'stctheme' ) => 'max-width: 44em',
				__( 'Custom', 'stctheme' ) => '',
			),
			'description' => __( 'Select the alignment of the title.', 'stctheme' ),
		),
         array(
            "type" => "textfield",
            "heading" => __( "Title", "stctheme" ),
            "param_name" => "title",
            "value" => __( "Default param value", "stctheme" ),
            "description" => __( "Enter the title of the service.", "stctheme" )
         ),
          array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'title_size', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Heading 1', 'stctheme' ) => 'h1',
				__( 'Heading 2', 'stctheme' ) => 'h2',
				__( 'Heading 3', 'stctheme' ) => 'h3',
				__( 'Heading 4', 'stctheme' ) => 'h4',
				__( 'Heading 5', 'stctheme' ) => 'h5',
			),
			'description' => __( 'Select the size of the service.', 'stctheme' ),
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Title Color", "stctheme" ),
            "param_name" => "title_color",
            "value" => '#000000', //Default Black color
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Choose text color", "stctheme" )
         ),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Align', 'stctheme' ),
			"class" => "",
			'param_name' => 'title_align', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Left', 'stctheme' ) => 'left',
				__( 'Center', 'stctheme' ) => 'center',
				__( 'Right', 'stctheme' ) => 'right',
			),
			"dependency" => Array("element" => "style", "value" => array ( '')),
			'description' => __( 'Select the alignment of the service.', 'stctheme' ),
		),
		array(
                "type" => "attach_image",
                "heading" => __("Image", "stctheme"),
                "param_name" => "image_url",
                "description" => __("Choose your image.", "stctheme")
            ),
            array(
			'type' => 'dropdown',
			'heading' => __( 'Image Style', 'stctheme' ),
			"class" => "",
			'param_name' => 'image_style', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'None', 'stctheme' ) => '',
				__( 'Circle', 'stctheme' ) => 'border-radius:50%',
				__( 'Square', 'stctheme' ) => 'right',
				__( 'Round Square', 'stctheme' ) => 'border-radius:5%',
			),
			"dependency" => Array("element" => "style", "value" => array ( '')),
			'description' => __( 'Select the style of the image.', 'stctheme' ),
		),
		array(
            "type" => "textfield",
            "heading" => __( "Image Border Width", "stctheme" ),
            "param_name" => "image_border_width",
            "value" => __( "1", "stctheme" ),
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Enter the image border width.", "stctheme" )
         ),
         array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Image Border Color", "stctheme" ),
            "param_name" => "image_border_color",
            "value" => '#000000', //Default Black color
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Choose the image border color.", "stctheme" )
         ),
		array(
            "type" => "textarea_html",
            "heading" => __( "Description", "stctheme" ),
            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
            "value" => __( "", "stctheme" ),
            "description" => __( "Enter your description.", "stctheme" )
         ),
         array(
            "type" => "textfield",
            "heading" => __( "Max Width", "stctheme" ),
            "param_name" => "max_width",
            "value" => __( "30", "stctheme" ),
            "description" => __( "Enter the maximum width you want.", "stctheme" )
         ),
         	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'stctheme' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'stctheme' ),
        )
      )
   ) );
}

// BUTTON SHORTCODE
add_action( 'vc_before_init', 'button_shortcode_integrateWithVC' );
function button_shortcode_integrateWithVC() {
   vc_map( array(
      "name" => __( "Button", "stctheme" ),
      "base" => "button",
      "class" => "",
      "category" => __( "STC", "stctheme"),
      "params" => array(
				array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Button Text", "stctheme" ),
            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
            "value" => __( "", "stctheme" ),
            "description" => __( "Enter your button text.", "stctheme" )
         ),
          array(
			'type' => 'dropdown',
			'heading' => __( 'Shape', 'stctheme' ),
			"class" => "",
			'param_name' => 'button_shape', // due to backward compatibility message_box_shape
			'std' => 'button-rounded',
			'value' => array(
				__( 'Custom', 'stctheme' ) => '',
				__( 'Circle', 'stctheme' ) => 'button-circle',
				__( 'Box', 'stctheme' ) => 'button-box',
				__( 'Square', 'stctheme' ) => 'button-square',
				__( 'Rounded', 'stctheme' ) => 'button-rounded',
				__( 'Pill', 'stctheme' ) => 'button-pill',
			),
			'description' => __( 'Select the shape of the button, or specify your own in the advanced tab.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'button_size', // due to backward compatibility message_box_shape
			'std' => 'button-normal',
			'value' => array(
				__( 'Custom', 'stctheme' ) => '',
				__( 'Giant', 'stctheme' ) => 'button-giant',
				__( 'Jumbo', 'stctheme' ) => 'button-jumbo',
				__( 'Large', 'stctheme' ) => 'button-large',
				__( 'Normal', 'stctheme' ) => 'button-normal',
				__( 'Small', 'stctheme' ) => 'button-small',
				__( 'Tiny', 'stctheme' ) => 'button-tiny',
			),
			'description' => __( 'Choose the size of the button, or choose custom to specify your own in the advanced tab.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Border', 'stctheme' ),
			"class" => "",
			'param_name' => 'button_border', // due to backward compatibility message_box_shape
			'std' => 'button-border-thin',
			'value' => array(
				__( 'Custom/None', 'stctheme' ) => '',
				__( 'Thin', 'stctheme' ) => 'button-border-thin',
				__( 'Thick', 'stctheme' ) => 'button-border-thick',
			),
			'description' => __( 'Choose a border thickness, or create your own in the design options tab.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Other Styles', 'stctheme' ),
			"class" => "",
			'param_name' => 'button_etc', // due to backward compatibility message_box_shape
			'std' => 'button-flat',
			'value' => array(
				__( 'None', 'stctheme' ) => '',
				__( 'Raised', 'stctheme' ) => 'button-raised',
				__( 'Inverse', 'stctheme' ) => 'button-inverse',
				__( 'Action', 'stctheme' ) => 'button-action',
				__( 'Highlight', 'stctheme' ) => 'button-highlight',
				__( 'Caution', 'stctheme' ) => 'button-caution',
				__( 'Royal', 'stctheme' ) => 'button-royal',
				__( '3D', 'stctheme' ) => 'button-3d',
				__( 'Glow', 'stctheme' ) => 'glow',
				__( 'Flat', 'stctheme' ) => 'button-flat',
			),
			'description' => __( 'Choose any of these extra styles if you want.', 'stctheme' ),
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Background Color", "stctheme" ),
            "param_name" => "background_color",
            "value" => '#1e73be', //Default Blue color
            "description" => __( "Choose background color", "stctheme" )
         ),
         array(
			'type' => 'checkbox',
			'heading' => __( 'Show icon?', 'stc_plugin' ),
			'param_name' => 'display_icon',
			'value' => array( __( 'Yes', 'stc_plugin' ) => 'yes' )
		),
	array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'stctheme' ),
			'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'fontawesome',
				'element' => 'display_icon',
				'value' => 'yes',
			),
			'description' => __( 'Select icon from library.', 'stctheme' ),
		),
         array(
            "type" => "textfield",
            "heading" => __( "Max Width", "stctheme" ),
            "param_name" => "max_width",
            "value" => __( "30", "stctheme" ),
            "group" => "Advanced",
            "description" => __( "Enter the maximum width you want.", "stctheme" )
         ),
         array(
            "type" => "textfield",
            "heading" => __( "Border Radius", "stctheme" ),
            "param_name" => "border_radius",
            "value" => __( "", "stctheme" ),
            "group" => "Advanced",
            "dependency" => Array("element" => "button_shape", "value" => array ( '')),
            "description" => __( "Enter a border radius.", "stctheme" )
         ),
         	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'stctheme' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'stctheme' ),
        )
      )
   ) );
}

// WORKER/EMPLOYEE SHORTCODE
add_action( 'vc_before_init', 'worker_shortcode_integrateWithVC' );
function worker_shortcode_integrateWithVC() {
   vc_map( array(
      "name" => __( "Employee", "stctheme" ),
      "base" => "worker",
      "class" => "",
      "category" => __( "STC", "stctheme"),
      "params" => array(
         array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'size', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Tiny', 'stctheme' ) => 'max-width: 14em',
				__( 'Small', 'stctheme' ) => 'max-width: 18em',
				__( 'Normal', 'stctheme' ) => 'max-width: 22em',
				__( 'Large', 'stctheme' ) => 'max-width: 26em',
				__( 'Huge', 'stctheme' ) => 'max-width: 31em',
				__( 'Custom', 'stctheme' ) => '',
			),
			'description' => __( 'Change the size of the alert. This sets the maximum width.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Pick a Style', 'stctheme' ),
			"class" => "",
			'param_name' => 'style', // due to backward compatibility message_box_shape
			'std' => 'style_1',
			'value' => array(
				__( 'Custom', 'stctheme' ) => '',
				__( 'Style 1', 'stctheme' ) => 'style_1',
				__( 'Style 2', 'stctheme' ) => 'style_2',
				__( 'Style 3', 'stctheme' ) => 'style_3',
			),
			'description' => __( 'Pick a style preset. Choose custom to customize your own.', 'stctheme' ),
		),
         array(
            "type" => "textfield",
            "heading" => __( "Text", "stctheme" ),
            "param_name" => "name",
            "value" => __( "Name Here.", "stctheme" ),
            "description" => __( "Enter name of worker.", "stctheme" )
         ),
         array(
            "type" => "colorpicker",
            "heading" => __( "Name Color", "stctheme" ),
            "param_name" => "name_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose the employee name color.", "stctheme" )
         ),
         array(
            "type" => "textfield",
            "heading" => __( "Image Maximum Width", "stctheme" ),
            "param_name" => "image_max_width",
            "value" => __( "", "stctheme" ),
            "group" => "Advanced",
            "description" => __( "Enter the maximum width for image, if wanted. Image will stay proportional.", "stctheme" )
         ),
         array(
            "type" => "textfield",
            "heading" => __( "Image Maximum Height", "stctheme" ),
            "param_name" => "image_max_height",
            "value" => __( "", "stctheme" ),
            "group" => "Advanced",
            "description" => __( "Enter the maximum height for image, if wanted. Setting this means the image will be cutoff, and no longer proportional.", "stctheme" )
         ),
         array(
			'type' => 'checkbox',
			'heading' => __( 'Enable Hover Effect', 'stctheme' ),
			'param_name' => 'hover', // due to backward compatibility message_box_shape
			'std' => 'hover',
			'value' => array(
				__( 'Yes', 'stc_plugin' ) => 'hover',
			),
			'description' => __( 'Enable the hover effect?', 'stctheme' ),
		),
          array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'name_size', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Heading 1', 'stctheme' ) => 'h1',
				__( 'Heading 2', 'stctheme' ) => 'h2',
				__( 'Heading 3', 'stctheme' ) => 'h3',
				__( 'Heading 4', 'stctheme' ) => 'h4',
				__( 'Heading 5', 'stctheme' ) => 'h5',
			),
			'description' => __( 'Select the size of the name.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Align', 'stctheme' ),
			"class" => "",
			'param_name' => 'name_align', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Left', 'stctheme' ) => 'text-align:left;',
				__( 'Center', 'stctheme' ) => 'text-align:center;',
				__( 'Right', 'stctheme' ) => 'text-align:right;',
			),
			"dependency" => Array("element" => "style", "value" => array ( '')),
			'description' => __( 'Select the alignment of the name.', 'stctheme' ),
		),
		array(
                "type" => "attach_image",
                "heading" => __("Image", "stctheme"),
                "param_name" => "image_url",
                "description" => __("Choose your image.", "stctheme")
            ),
            array(
			'type' => 'dropdown',
			'heading' => __( 'Image Style', 'stctheme' ),
			"class" => "",
			'param_name' => 'image_style', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'None', 'stctheme' ) => '',
				__( 'Circle', 'stctheme' ) => 'circle',
				__( 'Rounded', 'stctheme' ) => 'rounded',
			),
			"dependency" => Array("element" => "style", "value" => array ( '')),
			'description' => __( 'Select the style of the image.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Enable Equalizer', 'stctheme' ),
			"class" => "",
			'param_name' => 'equalizer', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Yes', 'stctheme' ) => 'yes',
				__( 'No', 'stctheme' ) => 'no',
			),
			"group" => "Advanced",
			'description' => __( 'Enabling equalizer will make each employee container the same height. The height will automatically be set the the container that is the largest.', 'stctheme' ),
		),
		array(
            "type" => "textfield",
            "group" => "Advanced",
            "heading" => __( "Image Border Width", "stctheme" ),
            "param_name" => "image_border_width",
            "value" => __( "1", "stctheme" ),
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Enter the image border width.", "stctheme" )
         ),
         array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Image Border Color", "stctheme" ),
            "param_name" => "image_border_color",
            "value" => '#000000', //Default Black color
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Choose the image border color.", "stctheme" )
         ),
		array(
            "type" => "textarea_html",
            "heading" => __( "Description", "stctheme" ),
            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
            "value" => __( "", "stctheme" ),
            "description" => __( "Enter your description.", "stctheme" )
         ),
         array(
            "type" => "textfield",
            "group" => "Advanced",
            "heading" => __( "Max Width", "stctheme" ),
            "param_name" => "max_width",
            "value" => __( "20", "stctheme" ),
            "description" => __( "Change the maximum width.", "stctheme" )
         ),
         	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'stctheme' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'stctheme' ),
        )
      )
   ) );
}

// TESTIMONIAL SHORTCODE
add_action( 'vc_before_init', 'testimonial_shortcode_integrateWithVC' );
function testimonial_shortcode_integrateWithVC() {
   vc_map( array(
      "name" => __( "Testimonial", "stctheme" ),
      "base" => "testimonial",
      "class" => "",
      "category" => __( "STC", "stctheme"),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Name", "stctheme" ),
            "param_name" => "name",
            "value" => __( "Testimonial Name", "stctheme" ),
            "description" => __( "Enter the name of the person.", "stctheme" )
         ),
          array(
			'type' => 'dropdown',
			'heading' => __( 'Name Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'name_size',
			'std' => 'h3',
			'value' => array(
				__( 'Heading 1', 'stctheme' ) => 'h1',
				__( 'Heading 2', 'stctheme' ) => 'h2',
				__( 'Heading 3', 'stctheme' ) => 'h3',
				__( 'Heading 4', 'stctheme' ) => 'h4',
				__( 'Heading 5', 'stctheme' ) => 'h5',
			),
			'description' => __( 'Select the size of the name.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Pick a Style', 'stctheme' ),
			"class" => "",
			'param_name' => 'style',
			'std' => 'style_1',
			'value' => array(
				__( 'Custom', 'stctheme' ) => "",
				__( 'Style 1', 'stctheme' ) => 'style_1',
				__( 'Style 2', 'stctheme' ) => 'style_2',
				__( 'Style 3', 'stctheme' ) => 'style_3',
				__( 'Style 4', 'stctheme' ) => 'style_4',
				__( 'Style 5', 'stctheme' ) => 'style_5',
				__( 'Style 6', 'stctheme' ) => 'style_6',
				__( 'Style 7', 'stctheme' ) => 'style_7',
				__( 'Style 8', 'stctheme' ) => 'style_8',
			),
			'description' => __( 'Pick a preset style, or use custom settings.', 'stctheme' ),
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Name Color", "stctheme" ),
            "param_name" => "name_color",
            "value" => '#000000', //Default Black color
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Choose text color", "stctheme" )
         ),
         array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Triangle Color", "stctheme" ),
            "param_name" => "triangle_color",
            "value" => '#000000', //Default Black color
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Choose traingle color", "stctheme" )
         ),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Align', 'stctheme' ),
			"class" => "",
			'param_name' => 'name_align', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Left', 'stctheme' ) => 'float: left',
				__( 'Center', 'stctheme' ) => '',
				__( 'Right', 'stctheme' ) => 'float: right',
			),
			"dependency" => Array("element" => "style", "value" => array ( '')),
			'description' => __( 'Select the alignment of the name.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'size', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Tiny', 'stctheme' ) => 'max-width: 25em; max-width: 25vw ',
				__( 'Small', 'stctheme' ) => 'max-width: 40em; max-width: 40vw',
				__( 'Normal', 'stctheme' ) => 'max-width: 55em; max-width: 55vw',
				__( 'Large', 'stctheme' ) => 'max-width: 70em; max-width: 70vw',
				__( 'Huge', 'stctheme' ) => 'max-width: 85em; max-width: 85vw',
				__( 'Full Width', 'stctheme' ) => 'width: 100%',
			),
			'description' => __( 'Select the size of the testimonial. This will set the maximum width.', 'stctheme' ),
		),
		array(
            "type" => "textfield",
            "group" => "Advanced",
            "heading" => __( "Border Radius", "stctheme" ),
            "param_name" => "border_radius",
            "value" => __( "0", "stctheme" ),
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Enter your border radius in px. Only enter number.", "stctheme" )
         ),
         array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Background Color", "stctheme" ),
            "param_name" => "background_color",
            "value" => '', 
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Choose background color for the entire element.", "stctheme" )
         ),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Quote Background Color", "stctheme" ),
            "param_name" => "quote_background_color",
            "value" => '', //Default Black color
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Choose background color for the quote section.", "stctheme" )
         ),
         array(
            "type" => "vc_link",
            "heading" => __( "Link", "stctheme" ),
            "param_name" => "link",
            "value" => __( "", "stctheme" ),
            "description" => __( "Choose your link.", "stctheme" )
         ),
         array(
            "type" => "textfield",
            "group" => "Advanced",
            "heading" => __( "Padding", "stctheme" ),
            "param_name" => "description_padding",
            "value" => __( "1", "stctheme" ),
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Enter the amount of padding wanted. This padding is for the quote/description. Use the design editor to use padding on entire element.", "stctheme" )
         ),
		array(
                "type" => "attach_image",
                "heading" => __("Image", "stctheme"),
                "param_name" => "image_url",
                "description" => __("Choose your image.", "stctheme")
            ),
		array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Description", "stctheme" ),
            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
            "value" => __( "", "stctheme" ),
            "description" => __( "Enter your description.", "stctheme" )
         ),
         array(
            "type" => "textfield",
            "group" => "Advanced",
            "heading" => __( "Max Width", "stctheme" ),
            "param_name" => "max_width",
            "value" => __( "", "stctheme" ),
            "description" => __( "Enter the maximum width you want.", "stctheme" )
         ),
         	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'stctheme' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'stctheme' ),
        )
      )
   ) );
   
}

// PRICING TABLE SHORTCODE
add_action( 'vc_before_init', 'pricing_table_integrateWithVC' );
function pricing_table_integrateWithVC() {
   vc_map( array(
      "name" => __( "Pricing Table", "stctheme" ),
      "base" => "pricing_table",
      'is_container' => true,
      "as_parent" => array('only' => 'pricing_table_heading, pricing_table_sub_heading, pricing_table_image, pricing_table_description, pricing_table_price, button'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
      "category" => __( "STC", "stctheme"),
      "params" => array(
      	  array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'size', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Tiny', 'stctheme' ) => 'max-width: 16em',
				__( 'Small', 'stctheme' ) => 'max-width: 23em',
				__( 'Normal', 'stctheme' ) => 'max-width: 30em',
				__( 'Large', 'stctheme' ) => 'max-width: 37em',
				__( 'Huge', 'stctheme' ) => 'max-width: 44em',
				__( 'Custom', 'stctheme' ) => '',
			),
			'description' => __( 'Select the size of the testimonial. This will set the maximum width.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Choose Style', 'stctheme' ),
			"class" => "",
			'param_name' => 'style',
			'std' => 'listed',
			'value' => array(
				__( 'Custom', 'stctheme' ) => '',
				__( 'Listed', 'stctheme' ) => 'listed',
				__( 'Listed 2', 'stctheme' ) => 'listed2',
				__( 'Simple', 'stctheme' ) => 'simple',
				__( 'Simple 2', 'stctheme' ) => 'simple2',
				__( 'Style 4', 'stctheme' ) => 'style4',
			),
			'description' => __( 'Choose a preset style, or make your own custom one by editing the elements you place within the table.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Hover Effect?', 'stctheme' ),
			"class" => "",
			'param_name' => 'hover',
			'std' => 'rounded',
			'value' => array(
				__( 'Yes', 'stctheme' ) => 'hover',
				__( 'No', 'stctheme' ) => '',
			),
			'description' => __( 'Enable/Disable the hover effects on the pricing table.', 'stctheme' ),
		),
          array(
            "type" => "textfield",
            "heading" => __( "Max Width", "stctheme" ),
            "param_name" => "max_width",
            "group" => "Advanced",
            "value" => __( "30", "stctheme" ),
            "description" => __( "Enter the maximum width you would like the pricing table to be in EM. Just enter your number", "stctheme" )
         ),
         array(
            "type" => "textfield",
            "heading" => __( "Class", "stctheme" ),
            "param_name" => "css",
            "value" => __( "", "stctheme" ),
            "description" => __( "Enter custom CSS class name for reference in your CSS file. If you don't know what this means, leave it blank.", "stctheme" )
         ),
      ),
      "js_view" => 'VcColumnView'
   ) );
}

// PRICING TABLE HEADING SHORTCODE
add_action( 'vc_before_init', 'pricing_table_heading_integrateWithVC' );
function pricing_table_heading_integrateWithVC() {
vc_map( array(
    "name" => __("Heading", "stctheme"),
    "base" => "pricing_table_heading",
    "content_element" => true,
    "as_child" => array('only' => 'pricing_table'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Pricing Table Heading", "stctheme"),
            "param_name" => "content",
            "description" => __("Enter your heading here.", "stctheme")
        ),
        	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
    )
) );
}

// PRICING TABLE HEADING SHORTCODE
add_action( 'vc_before_init', 'pricing_table_sub_heading_integrateWithVC' );
function pricing_table_sub_heading_integrateWithVC() {
vc_map( array(
    "name" => __("Sub-Heading", "stctheme"),
    "base" => "pricing_table_sub_heading",
    "content_element" => true,
    "as_child" => array('only' => 'pricing_table'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __("Pricing Table Sub-Heading", "stctheme"),
            "param_name" => "content",
            "description" => __("Enter your sub-heading here.", "stctheme")
        ),
        	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
    )
) );
}

// PRICING TABLE IMAGE SHORTCODE
add_action( 'vc_before_init', 'pricing_table_image_integrateWithVC' );
function pricing_table_image_integrateWithVC() {
vc_map( array(
    "name" => __("Image", "stctheme"),
    "base" => "pricing_table_image",
    "content_element" => true,
    "as_child" => array('only' => 'pricing_table'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "attach_image",
            "holder" => "img",
            "heading" => __("Pricing Table Image", "stctheme"),
            "param_name" => "image_url",
            "description" => __("Choose your image.", "stctheme")
        ),
        array(
			'type' => 'textfield',
			'heading' => __( 'Width', 'stctheme' ),
			'param_name' => 'width',
			"value" => __( "100", "stctheme" ),
			"group" => "Advanced",
			'description' => __( 'Change the width of the image (in percentage). Only enter number.', 'stctheme' )
		),
        array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
    )
) );
}

// PRICING TABLE DESCRIPTION SHORTCODE
add_action( 'vc_before_init', 'pricing_table_description_integrateWithVC' );
function pricing_table_description_integrateWithVC() {
vc_map( array(
    "name" => __("Description", "stctheme"),
    "base" => "pricing_table_description",
    "content_element" => true,
    "as_child" => array('only' => 'pricing_table'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textarea_html",
            "heading" => __("Pricing Table Description", "stctheme"),
            "param_name" => "content",
            "holder" => "div",
            "description" => __("Enter your description here.", "stctheme")
        ),
        	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
    )
) );
}

// PRICING TABLE PRICE SHORTCODE
add_action( 'vc_before_init', 'pricing_table_price_integrateWithVC' );
function pricing_table_price_integrateWithVC() {
vc_map( array(
    "name" => __("Price", "stctheme"),
    "base" => "pricing_table_price",
    "content_element" => true,
    "as_child" => array('only' => 'pricing_table'), // Use only|except attributes to limit parent (separate multiple values with comma)
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textarea_html",
            "heading" => __("Pricing Table Price", "stctheme"),
            "param_name" => "content",
            "holder" => "div",
            "description" => __("Enter your price here. Don't put a currency symbol here unless you don't want to use a preset one from below.", "stctheme")
        ),
        array(
			'type' => 'dropdown',
			'heading' => __( 'Choose Currency', 'stctheme' ),
			"class" => "",
			'param_name' => 'currency', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Custom (I entered it above)', 'stctheme' ) => '',
				__( 'United States Dollar (USD) --- $', 'stctheme' ) => '$',
			),
			'description' => __( "Choose a currency. Choosing one here allows for the symbol to be specified directly for sizing, animation, etc. If you can't find your currency please request it, or enter it along with the price above." , 'stctheme' ),
		),
        	array(
			'type' => 'textfield',
			'heading' => __( 'Currency Font Size', 'stctheme' ),
			'param_name' => 'currency_size',
			'value' => '1.5rem',
			'group' => 'Advanced',
			'description' => __( 'Change this setting to change the font size of the cuurency symbol.', 'stctheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Currency Font Weight', 'stctheme' ),
			'param_name' => 'currency_weight',
			'group' => 'Advanced',
			'value' => '600',
			'description' => __( 'Change this setting to change the font weight of the currency symbol.', 'stctheme' )
		),
        	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ), // Probably add all the class names to the advanced tab
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
    )
) );
}
// DROPCAP SHORTCODE
vc_map( array(
	'name' => __( 'Dropcap', 'stctheme' ),
	'base' => 'dropcap',
	'wrapper_class' => 'clearfix',
	'category' => __( 'STC', 'stctheme' ),
	'description' => __( 'A dropcap embedded in the first letter of content.', 'stctheme' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Dropcap Position', 'stctheme' ),
			'param_name' => 'drop_position', // due to backward compatibility message_box_shape
			'std' => 'drop-down',
			'value' => array(
				__( 'Top', 'stctheme' ) => 'drop-up',
				__( 'Bottom', 'stctheme' ) => 'drop-down',
			),
			'description' => __( 'Change the position of the dropcap.', 'stctheme' ),
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Text', 'stctheme' ),
			'param_name' => 'content',
			'description' => __( 'Enter your text here, and the first letter will become your dropcap.', 'stctheme' ),
			'value' => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'stctheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Dropcap Size', 'stctheme' ),
			'param_name' => 'drop_size',
			'description' => __( 'Choose how big your dropcap is in pixels. Only enter the number.', 'stctheme' ),
			'value' => __( '40', 'stctheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Dropcap Weight', 'stctheme' ),
			'param_name' => 'drop_weight',
			'description' => __( 'Choose the font weight.', 'stctheme' ),
			'value' => __( '800', 'stctheme' )
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Dropcap Color", "stctheme" ),
            "param_name" => "drop_color",
            "value" => '#c3c3c3', //Default Black color
            "description" => __( "Choose dropcap color.", "stctheme" )
         ),
		$vc_add_css_animation,
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' )
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'stctheme' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' ),
			'group' => __( 'Design options', 'stctheme' )
		)
	)
) );

// MODAL SHORTCODE
vc_map( array(
	'name' => __( 'Modal', 'stctheme' ),
	'base' => 'modal',
	'wrapper_class' => 'clearfix',
	'category' => __( 'STC', 'stctheme' ),
	'description' => __( 'A modal/popup.', 'stctheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Modal Link', 'stctheme' ),
			'param_name' => 'modal_text',
			'value' => __( 'Click here to open modal.', 'stctheme' ),
			'description' => __( 'Enter your text for the modal/pop-up link.', 'stctheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'stctheme' ),
			'param_name' => 'title',
			'description' => __( 'Enter your modal title.', 'stctheme' )
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Description', 'stctheme' ),
			'param_name' => 'content',
			'value' => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', 'stctheme' )
		),
array(
			'type' => 'dropdown',
			'heading' => __( 'Title Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'title_size', // due to backward compatibility message_box_shape
			'std' => 'h3',
			'value' => array(
				__( 'Heading 1', 'stctheme' ) => 'h1',
				__( 'Heading 2', 'stctheme' ) => 'h2',
				__( 'Heading 3', 'stctheme' ) => 'h3',
				__( 'Heading 4', 'stctheme' ) => 'h4',
				__( 'Heading 5', 'stctheme' ) => 'h5',
			),
			'description' => __( 'Select the size of the title.', 'stctheme' ),
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Title Color", "stctheme" ),
            "param_name" => "title_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose text color", "stctheme" )
         ),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Align', 'stctheme' ),
			"class" => "",
			'param_name' => 'title_align', // due to backward compatibility message_box_shape
			'std' => 'center',
			'value' => array(
				__( 'Left', 'stctheme' ) => 'left',
				__( 'Center', 'stctheme' ) => 'center',
				__( 'Right', 'stctheme' ) => 'right',
			),
			'description' => __( 'Select the alignment of the title.', 'stctheme' ),
		),
		$vc_add_css_animation,
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' )
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'stctheme' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' ),
			'group' => __( 'Design options', 'stctheme' )
		)
	)
) );

// CODEBLOCK SHORTCODE
vc_map( array(
	'name' => __( 'Codeblock', 'stctheme' ),
	'base' => 'code_block',
	'wrapper_class' => 'clearfix',
	'category' => __( 'STC', 'stctheme' ),
	'description' => __( 'A block of code/syntax highlighter.', 'stctheme' ),
	'params' => array(
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Text', 'stctheme' ),
			'param_name' => 'content',
			'value' => __('<p>Enter your code here.</p>' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Enter Language', 'stctheme' ),
			'param_name' => 'code_lang',
			'group' => 'Advanced',
			'description' => __( 'The code block should automatically detect what language the code is. If for some reason it does not - enter the language here.', 'stctheme' ),
			'value' => __( '', 'stctheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style', 'stctheme' ),
			"class" => "",
			'param_name' => 'code_style', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Android Studio', 'stctheme' ) => 'androidstudio',
				__( 'Arta', 'stctheme' ) => 'arta',
				__( 'Ascetic', 'stctheme' ) => 'ascetic',
				__( 'Atelier Dune - Dark', 'stctheme' ) => 'atelier-dune.dark',
				__( 'Atelier Dune - Light', 'stctheme' ) => 'atelier-dune.light',
				__( 'Atelier-Forest - Dark', 'stctheme' ) => 'atelier-forest.dark',
				__( 'Atelier-Forest - Light', 'stctheme' ) => 'atelier-forest.light',
				__( 'Atelier-Heath - dark', 'stctheme' ) => 'atelier-heath.dark',
				__( 'Atelier-Heath - Light', 'stctheme' ) => 'atelier-heath.light',
				__( 'Atelier-Lakeside - Dark', 'stctheme' ) => 'atelier-lakeside.dark',
				__( 'Atelier-Lakeside - Light', 'stctheme' ) => 'atelier-lakeside.light',
				__( 'Atelier-Seaside - dark', 'stctheme' ) => 'atelier-seaside.dark',
				__( 'Atelier-Seaside - light', 'stctheme' ) => 'atelier-seaside.light',
				__( 'Brown Paper', 'stctheme' ) => 'brown_paper',
				__( 'Codepen Embed', 'stctheme' ) => 'codepen-embed',
				__( 'Color Brewer', 'stctheme' ) => 'color-brewer',
				__( 'Dark', 'stctheme' ) => 'dark',
				__( 'Darkula', 'stctheme' ) => 'darkula',
				__( 'Default', 'stctheme' ) => 'default',
				__( 'Docco', 'stctheme' ) => 'docco',
				__( 'Far', 'stctheme' ) => 'far',
				__( 'Foundation', 'stctheme' ) => 'foundation',
				__( 'Github', 'stctheme' ) => 'github',
				__( 'Googlecode', 'stctheme' ) => 'googlecode',
				__( 'Hybrid', 'stctheme' ) => 'hybrid',
				__( 'Idea', 'stctheme' ) => 'idea',
				__( 'Ir_Black', 'stctheme' ) => 'ir_black',
				__( 'Kimbie - Dark', 'stctheme' ) => 'kimbie.dark',
				__( 'Kimbie - Light', 'stctheme' ) => 'kimbie.light',
				__( 'Magula', 'stctheme' ) => 'magula',
				__( 'Mono-Blue', 'stctheme' ) => 'mono-blue',
				__( 'Monokai', 'stctheme' ) => 'monokai',
				__( 'Monokai - Sublime', 'stctheme' ) => 'monokai_sublime',
				__( 'Obsidian', 'stctheme' ) => 'obsidian',
				__( 'Paraiso - Dark', 'stctheme' ) => 'paraiso.dark',
				__( 'Paraiso - Light', 'stctheme' ) => 'paraiso.light',
				__( 'Pojoaque', 'stctheme' ) => 'pojoaque',
				__( 'Railscasts', 'stctheme' ) => 'railscasts',
				__( 'Rainbow', 'stctheme' ) => 'rainbow',
				__( 'School Book', 'stctheme' ) => 'school_book',
				__( 'Solarized - Dark', 'stctheme' ) => 'solarized_dark',
				__( 'Solarized - Light', 'stctheme' ) => 'solarized_light',
				__( 'Sunburst', 'stctheme' ) => 'sunburst',
				__( 'Tomorrow Night - Blue', 'stctheme' ) => 'tomorrow-night-blue',
				__( 'Tomorrow Night - Bright', 'stctheme' ) => 'tomorrow-night-bright',
				__( 'Tomorrow Night - Eighties', 'stctheme' ) => 'tomorrow-night-eighties',
				__( 'Tomorrow Night', 'stctheme' ) => 'tomorrow-night',
				__( 'Tomorrow', 'stctheme' ) => 'tomorrow',
				__( 'VS', 'stctheme' ) => 'vs',
				__( 'Xcode', 'stctheme' ) => 'xcode',
				__( 'Zenburn', 'stctheme' ) => 'zenburn',
				
			),
			'description' => __( 'Select the style you want to use.', 'stctheme' ),
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Background Color", "stctheme" ),
            "param_name" => "background_color",
            'group' => 'Advanced',
            "value" => '#000000', //Default Black color
            "description" => __( "Choose the background color of the codeblock.", "stctheme" )
         ),
         array(
			'type' => 'textfield',
			'heading' => __( 'Enter a Max Height', 'stctheme' ),
			'param_name' => 'max_height',
			'group' => 'Advanced',
			'description' => __( 'If you want a maximum height, then you can enter it here in pixels. Once it reaches max-height you can scroll to see the rest of the content.', 'stctheme' )
		),
		$vc_add_css_animation,
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' )
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'stctheme' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' ),
			'group' => __( 'Design options', 'stctheme' )
		)
	)
) );

// NUMBER COUNTER SHORTCODE
vc_map( array(
	'name' => __( 'Number Counter', 'stctheme' ),
	'base' => 'odometer',
	'wrapper_class' => 'clearfix',
	'category' => __( 'STC', 'stctheme' ),
	'description' => __( 'Counts to a number.', 'stctheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			"holder" => "div",
			"class" => "test_number_counter",
			'heading' => __( 'Enter Number', 'stctheme' ),
			'param_name' => 'number',
			'description' => __( 'Enter your number here.', 'stctheme' ),
			'value' => __( '', 'stctheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Font Size', 'stctheme' ),
			'param_name' => 'size',
			'value' => 25,
			'description' => __( 'Enter the size of the number.', 'stctheme' )
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Color", "stctheme" ),
            "param_name" => "color",
            "value" => '#1e73be', // Default Black color
            "description" => __( "Choose number color.", "stctheme" )
         ),
         array(
			'type' => 'textfield',
			'heading' => __( 'Font Weight', 'stctheme' ),
			'param_name' => 'weight',
			'value' => 400,
			'group' => 'Advanced',
			'description' => __( 'Enter the weight of the font.', 'stctheme' )
		),
		$vc_add_css_animation,
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' )
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'stctheme' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' ),
			'group' => __( 'Design options', 'stctheme' )
		)
	)
) );

// TOOLTIP SHORTCODE
vc_map( array(
	'name' => __( 'Tooltip', 'stctheme' ),
	'base' => 'tooltip',
	'wrapper_class' => 'clearfix',
	'category' => __( 'STC', 'stctheme' ),
	"content_element" => true,
    "as_parent" => array('except' => ''), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	'description' => __( 'Shows your text when the object is hovered on.', 'stctheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Enter tip here.', 'stctheme' ),
			'param_name' => 'tip',
			'description' => __( 'Enter your tip here. It will show up on hover.', 'stctheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Align', 'stctheme' ),
			"class" => "",
			'param_name' => 'tip_position', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Bottom', 'stctheme' ) => 'hint--bottom',
				__( 'Top', 'stctheme' ) => 'hint--top',
				__( 'Left', 'stctheme' ) => 'hint--left',
				__( 'Right', 'stctheme' ) => 'hint--right',
			),
			'description' => __( 'Select the position of the tip.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style', 'stctheme' ),
			"class" => "",
			'param_name' => 'tip_style', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Default', 'stctheme' ) => '',
				__( 'Rounded', 'stctheme' ) => 'hint--rounded',
				__( 'No Animation', 'stctheme' ) => 'hint--no-animate',
				__( 'Bounce', 'stctheme' ) => 'hint--bounce',
			),
			'description' => __( 'Select the style of the tip.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Type', 'stctheme' ),
			"class" => "",
			'param_name' => 'tip_type', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Default', 'stctheme' ) => '',
				__( 'Error', 'stctheme' ) => 'hint--error',
				__( 'Info', 'stctheme' ) => 'hint--info',
				__( 'Warning', 'stctheme' ) => 'hint--warning',
				__( 'Success', 'stctheme' ) => 'hint--success',
			),
			'description' => __( 'Select the type of tip.', 'stctheme' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' )
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'stctheme' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' ),
			'group' => __( 'Design options', 'stctheme' )
		),
	),
	"js_view" => 'VcColumnView'
) );

// TICKER SHORTCODE
vc_map( array(
	'name' => __( 'Ticker', 'stctheme' ),
	'base' => 'ticker',
	'wrapper_class' => 'clearfix',
	'category' => __( 'STC', 'stctheme' ),
	"content_element" => true,
    "as_parent" => array('except' => ''), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	'description' => __( 'automatically scrolls through the content you place inside.', 'stctheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Enter tip here.', 'stctheme' ),
			'param_name' => 'tip',
			'description' => __( 'Enter your tip here. It will show up on hover.', 'stctheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Align', 'stctheme' ),
			"class" => "",
			'param_name' => 'tip_position', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Bottom', 'stctheme' ) => 'tip-bottom',
				__( 'Top', 'stctheme' ) => 'tip-top',
				__( 'Left', 'stctheme' ) => 'tip-left',
				__( 'Right', 'stctheme' ) => 'tip-right',
			),
			'description' => __( 'Select the position of the tip.', 'stctheme' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' )
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'stctheme' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' ),
			'group' => __( 'Design options', 'stctheme' )
		),
	),
	"js_view" => 'VcColumnView'
) );

// DISQUS SHORTCODE
vc_map( array(
	'name' => __( 'Disqus', 'stctheme' ),
	'base' => 'disqus',
	'wrapper_class' => 'clearfix',
	'category' => __( 'STC', 'stctheme' ),
	"content_element" => true,
	'description' => __( 'Embed a comment system into your page.', 'stctheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Enter Your Shortname', 'stctheme' ),
			'param_name' => 'shortname',
			'description' => __( 'Enter the shortname of your comment system. If you do not know what that is, please sign up for disqus <a href="//disqus.com">here</a>, and get your shortname.', 'stctheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' )
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'stctheme' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' ),
			'group' => __( 'Design options', 'stctheme' )
		)
	)
) );

// BUTTON GROUP
vc_map( array(
	'name' => __( 'Button Group', 'stctheme' ),
	'base' => 'button_group',
	'wrapper_class' => 'clearfix',
	'category' => __( 'STC', 'stctheme' ),
	"content_element" => true,
	"show_settings_on_create" => false,
    "as_parent" => array('only' => 'button_in_group, '), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	'description' => __( 'Place a button group.', 'stctheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' )
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'stctheme' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' ),
			'group' => __( 'Design options', 'stctheme' )
		),
	),
	"js_view" => 'VcColumnView'
) );

// BUTTON IN GROUP SHORTCODE
vc_map( array(
      "name" => __( "Button", "stctheme" ),
      "base" => "button_in_group",
      "class" => "",
      "category" => __( "STC", "stctheme"),
      "as_child" => array('only' => 'button_group'), // Use only|except attributes to limit parent (separate multiple values with comma)
      "params" => array(
				array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Button Text", "stctheme" ),
            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
            "value" => __( "", "stctheme" ),
            "description" => __( "Enter your button text.", "stctheme" )
         ),
          array(
			'type' => 'dropdown',
			'heading' => __( 'Shape', 'stctheme' ),
			"class" => "",
			'param_name' => 'button_shape', // due to backward compatibility message_box_shape
			'std' => 'button-rounded',
			'value' => array(
				__( 'Custom', 'stctheme' ) => '',
				__( 'Circle', 'stctheme' ) => 'button-circle',
				__( 'Box', 'stctheme' ) => 'button-box',
				__( 'Square', 'stctheme' ) => 'button-square',
				__( 'Rounded', 'stctheme' ) => 'button-rounded',
				__( 'Pill', 'stctheme' ) => 'button-pill',
			),
			'description' => __( 'Select the shape of the button, or specify your own in the advanced tab.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'button_size', // due to backward compatibility message_box_shape
			'std' => 'button-normal',
			'value' => array(
				__( 'Custom', 'stctheme' ) => '',
				__( 'Giant', 'stctheme' ) => 'button-giant',
				__( 'Jumbo', 'stctheme' ) => 'button-jumbo',
				__( 'Large', 'stctheme' ) => 'button-large',
				__( 'Normal', 'stctheme' ) => 'button-normal',
				__( 'Small', 'stctheme' ) => 'button-small',
				__( 'Tiny', 'stctheme' ) => 'button-tiny',
			),
			'description' => __( 'Choose the size of the button, or choose custom to specify your own in the advanced tab.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Border', 'stctheme' ),
			"class" => "",
			'param_name' => 'button_border', // due to backward compatibility message_box_shape
			'std' => 'button-border-thin',
			'value' => array(
				__( 'Custom/None', 'stctheme' ) => '',
				__( 'Thin', 'stctheme' ) => 'button-border-thin',
				__( 'Thick', 'stctheme' ) => 'button-border-thick',
			),
			'description' => __( 'Choose a border thickness, or create your own in the design options tab.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Other Styles', 'stctheme' ),
			"class" => "",
			'param_name' => 'button_etc', // due to backward compatibility message_box_shape
			'std' => 'button-flat',
			'value' => array(
				__( 'None', 'stctheme' ) => '',
				__( 'Raised', 'stctheme' ) => 'button-raised',
				__( 'Inverse', 'stctheme' ) => 'button-inverse',
				__( 'Action', 'stctheme' ) => 'button-action',
				__( 'Highlight', 'stctheme' ) => 'button-highlight',
				__( 'Caution', 'stctheme' ) => 'button-caution',
				__( 'Royal', 'stctheme' ) => 'button-royal',
				__( '3D', 'stctheme' ) => 'button-3d',
				__( 'Glow', 'stctheme' ) => 'glow',
				__( 'Flat', 'stctheme' ) => 'button-flat',
			),
			'description' => __( 'Choose any of these extra styles if you want.', 'stctheme' ),
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Background Color", "stctheme" ),
            "param_name" => "background_color",
            "value" => '#1e73be', //Default Blue color
            "description" => __( "Choose background color", "stctheme" )
         ),
         array(
			'type' => 'checkbox',
			'heading' => __( 'Show icon?', 'stc_plugin' ),
			'param_name' => 'display_icon',
			'value' => array( __( 'Yes', 'stc_plugin' ) => 'yes' )
		),
	array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'stctheme' ),
			'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'fontawesome',
				'element' => 'display_icon',
				'value' => 'yes',
			),
			'description' => __( 'Select icon from library.', 'stctheme' ),
		),
         array(
            "type" => "textfield",
            "heading" => __( "Max Width", "stctheme" ),
            "param_name" => "max_width",
            "value" => __( "30", "stctheme" ),
            "group" => "Advanced",
            "description" => __( "Enter the maximum width you want.", "stctheme" )
         ),
         array(
            "type" => "textfield",
            "heading" => __( "Border Radius", "stctheme" ),
            "param_name" => "border_radius",
            "value" => __( "", "stctheme" ),
            "group" => "Advanced",
            "dependency" => Array("element" => "button_shape", "value" => array ( '')),
            "description" => __( "Enter a border radius.", "stctheme" )
         ),
         	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'stctheme' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'stctheme' ),
        )
      )
   ) );

// DROPDOWN BUTTON SHORTCODE
vc_map( array(
    "name" => __("Dropdown Button", "stctheme"),
    "base" => "button_dropdown",
    "content_element" => true,
    "category" => __( "STC", "stctheme"),
    "params" => array(
        // add params same as with any other content element
        array(
            "type" => "textfield",
            "heading" => __( "Button Title", "stctheme" ),
            "param_name" => "button_text",
            "value" => __( "", "stctheme" ),
            "description" => __( "Enter the title of the dropdown button.", "stctheme" )
         ),
         array(
            "type" => "colorpicker",
            "heading" => __( "Title Color", "stctheme" ),
            "param_name" => "title_color",
            "value" => "#ffffff", //Default White color
            "description" => __( "Choose icon color", "stctheme" )
         ),
        array(
            "type" => "textarea_html",
            "holder" => "div", // Holder enables the content to show in the backend
            "value" => "<p><ul><li><a href='#'>This is an item in the dropdown</a></li><li><a href='#'>This is also one</a></li><li><a href='#'>This is another one</a></li></ul></p>",
            "heading" => __( "Button Text", "stctheme" ),
            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
            "description" => __( "Enter your dropdown items. Seperate items by using a list, and link each individual item.", "stctheme" )
         ),
		array(
            "type" => "colorpicker",
            "heading" => __( "Background Color", "stctheme" ),
            "param_name" => "background_color",
            "group" => "Button Settings",
            "value" => '#ededed', //Default Black color
            "description" => __( "Choose background color for the dropdown.", "stctheme" )
         ),
         array(
            "type" => "colorpicker",
            "heading" => __( "Dropdown Icon Color", "stctheme" ),
            "param_name" => "icon_color",
            "value" => "#000000", //Default Black color
            "description" => __( "Choose icon color", "stctheme" )
         ),
         array(
            "type" => "textfield",
            "heading" => __( "Max Width", "stctheme" ),
            "param_name" => "max_width",
            "value" => __( "30", "stctheme" ),
            "group" => "Advanced",
            "description" => __( "Enter the maximum width you want.", "stctheme" )
         ),
         array(
			'type' => 'dropdown',
			'heading' => __( 'Shape', 'stctheme' ),
			'param_name' => 'button_shape', // due to backward compatibility message_box_shape
			'std' => 'button-rounded',
			"group" => "Button Settings",
			'value' => array(
				__( 'Custom', 'stctheme' ) => '',
				__( 'Circle', 'stctheme' ) => 'button-circle',
				__( 'Box', 'stctheme' ) => 'button-box',
				__( 'Square', 'stctheme' ) => 'button-square',
				__( 'Rounded', 'stctheme' ) => 'button-rounded',
				__( 'Pill', 'stctheme' ) => 'button-pill',
			),
			'description' => __( 'Select the shape of the button, or specify your own in the advanced tab.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'button_size', // due to backward compatibility message_box_shape
			'std' => 'button-normal',
			"group" => "Button Settings",
			'value' => array(
				__( 'Custom', 'stctheme' ) => '',
				__( 'Giant', 'stctheme' ) => 'button-giant',
				__( 'Jumbo', 'stctheme' ) => 'button-jumbo',
				__( 'Large', 'stctheme' ) => 'button-large',
				__( 'Normal', 'stctheme' ) => 'button-normal',
				__( 'Small', 'stctheme' ) => 'button-small',
				__( 'Tiny', 'stctheme' ) => 'button-tiny',
			),
			'description' => __( 'Choose the size of the button, or specify your own in the advanced tab.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Border', 'stctheme' ),
			"class" => "",
			'param_name' => 'button_border', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			"group" => "Button Settings",
			'value' => array(
				__( 'Custom/None', 'stctheme' ) => '',
				__( 'Thin', 'stctheme' ) => 'button-border-thin',
				__( 'Thick', 'stctheme' ) => 'button-border-thick',
			),
			'description' => __( 'Choose a a border thickness, or create your own in the advanced tab.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Other Styles', 'stctheme' ),
			"class" => "",
			'param_name' => 'button_etc', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			"group" => "Button Settings",
			'value' => array(
				__( 'None', 'stctheme' ) => '',
				__( 'Raised', 'stctheme' ) => 'button-raised',
				__( 'Inverse', 'stctheme' ) => 'button-inverse',
				__( 'Action', 'stctheme' ) => 'button-action',
				__( 'Highlight', 'stctheme' ) => 'button-highlight',
				__( 'Caution', 'stctheme' ) => 'button-caution',
				__( 'Royal', 'stctheme' ) => 'button-royal',
				__( '3D', 'stctheme' ) => 'button-3d',
				__( 'Glow', 'stctheme' ) => 'glow',
				__( 'Flat', 'stctheme' ) => 'button-flat',
			),
			'description' => __( 'Choose any of these extra styles if if you want.', 'stctheme' ),
		),
         	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'stctheme' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'stctheme' ),
        )
    )
) );
// DEFAULT WP COMMENTS SHORTCODE
vc_map( array(
    "name" => __("Default Worpdress Comments", "stctheme"),
    "base" => "wp_comments",
    "content_element" => true,
    "category" => __( "STC", "stctheme"),
    "params" => array(
        // add params same as with any other content element
        array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'stctheme' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'stctheme' ),
        )
    )
) );

// LIVEFYRE COMMENTS SHORTCODE
vc_map( array(
    "name" => __("Livefyre Comments", "stctheme"),
    "base" => "livefyre",
    "content_element" => true,
    "category" => __( "STC", "stctheme"),
    "params" => array(
        // add params same as with any other content element
        array(
			'type' => 'textfield',
			'heading' => __( 'Site ID', 'stctheme' ),
			'param_name' => 'site_id',
			'description' => __( 'Please <a href="//livefyre.com/install">sign up for Livefyre</a>, add your website, and enter your Site ID here.', 'stctheme' )
		),
        array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'stctheme' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'stctheme' ),
        )
    )
) );

// ALERT SHORTCODE
vc_map( array(
    "name" => __("Alert Box", "stctheme"),
    "base" => "alert",
    "content_element" => true,
    "category" => __( "STC", "stctheme"),
    "params" => array(
        // add params same as with any other content element
        array(
			'type' => 'dropdown',
			'heading' => __( 'Size', 'stctheme' ),
			'param_name' => 'size', // due to backward compatibility message_box_shape
			'std' => 'max-width: 45em',
			'value' => array(
				__( 'Tiny', 'stctheme' ) => 'max-width: 25em',
				__( 'Small', 'stctheme' ) => 'max-width: 35em',
				__( 'Normal', 'stctheme' ) => 'max-width: 45em',
				__( 'Large', 'stctheme' ) => 'max-width: 55em',
				__( 'Huge', 'stctheme' ) => 'max-width: 65em',
				__( 'Custom', 'stctheme' ) => '',
			),
			'description' => __( 'Change the size of the alert. This sets the maximum width.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Style', 'stctheme' ),
			'param_name' => 'style', // due to backward compatibility message_box_shape
			'std' => 'info',
			'value' => array(
				__( 'Custom', 'stctheme' ) => '',
				__( 'Success', 'stctheme' ) => 'success',
				__( 'Failure', 'stctheme' ) => 'failure',
				__( 'Info', 'stctheme' ) => 'info',
			),
			'description' => __( 'You can pick a preset style.', 'stctheme' ),
		),
        array(
			'type' => 'textfield',
			'heading' => __( 'Title', 'stctheme' ),
			'param_name' => 'title',
			'description' => __( 'Enter your title here.', 'stctheme' )
		),
		array(
            "type" => "colorpicker",
            "heading" => __( "Title Color", "stctheme" ),
            "param_name" => "title_color",
            "value" => '#000000', //Default Black color
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Choose color of the title.", "stctheme" )
         ),
         array(
			'type' => 'dropdown',
			'heading' => __( 'Title Size', 'stctheme' ),
			'param_name' => 'title_size', // due to backward compatibility message_box_shape
			'std' => 'h3',
			'value' => array(
				__( 'Heading 1', 'stctheme' ) => 'h1',
				__( 'Heading 2', 'stctheme' ) => 'h2',
				__( 'Heading 3', 'stctheme' ) => 'h3',
				__( 'Heading 4', 'stctheme' ) => 'h4',
				__( 'Heading 5', 'stctheme' ) => 'h5',
			),
			'description' => __( 'Select the size of the title.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Title Align', 'stctheme' ),
			'param_name' => 'title_align', // due to backward compatibility message_box_shape
			'std' => 'center',
			'value' => array(
				__( 'Left', 'stctheme' ) => 'left',
				__( 'Center', 'stctheme' ) => 'center',
				__( 'Right', 'stctheme' ) => 'right',
			),
			"dependency" => Array("element" => "style", "value" => array ( '')),
			'description' => __( 'Select the alignment of the title.', 'stctheme' ),
		),
		array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => __( "Alert Description", "stctheme" ),
            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
            "value" => __( "", "stctheme" ),
            "description" => __( "Enter the desrciption for the alert here.", "stctheme" )
         ),
		array(
            "type" => "colorpicker",
            "heading" => __( "Background Color", "stctheme" ),
            "param_name" => "background_color",
            "value" => '#5ea2d6', //Default Black color
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Choose color of the alert box.", "stctheme" )
         ),
         array(
			'type' => 'checkbox',
			'heading' => __( 'Show icon?', 'stc_plugin' ),
			'param_name' => 'display_icon',
			'std' => 'yes',
			'value' => array( __( 'Yes', 'stc_plugin' ) => 'yes' )
		),
	array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'stctheme' ),
			'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'fontawesome',
				'element' => 'display_icon',
				'value' => 'yes',
			),
			'description' => __( 'Select icon from library.', 'stctheme' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Size', 'stctheme' ),
			'param_name' => 'icon_size',
			'value' => '30',
			'group' => 'Advanced',
			"dependency" => Array("element" => "style", "value" => array ( '')),
			'description' => __( 'Choose your icon size in pixels. Only enter number.', 'stctheme' )
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Icon Color", "stctheme" ),
            "param_name" => "icon_color",
            "value" => '#000000', //Default Black color
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Choose color of the icon.", "stctheme" )
         ),
         array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Icon Background Color", "stctheme" ),
            "param_name" => "icon_background_color",
            "value" => 'transparent', //Default Black color
            "group" => "Advanced",
            "dependency" => Array("element" => "style", "value" => array ( '')),
            "description" => __( "Choose the color of the icon background. This is transparent by default.", "stctheme" )
         ),
         array(
			'type' => 'textfield',
			'heading' => __( 'Border Radius', 'stctheme' ),
			'param_name' => 'border_radius',
			'group' => 'Advanced',
			"dependency" => Array("element" => "style", "value" => array ( '')),
			'description' => __( 'Enter a border-radius in pixels, if desired.', 'stctheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Max Width', 'stctheme' ),
			'param_name' => 'max_width',
			'group' => 'Advanced',
			"dependency" => Array("element" => "size", "value" => array ( '')),
			'description' => __( 'Enter a maximum width.', 'stctheme' )
		),
        array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'stctheme' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'stctheme' ),
        )
    )
) );

// POSTS SHORTCODE. CURRENTLY NOT DOING READY FOR PRIMETIME. WORK MORE ON IT.
vc_map( array(
      "name" => __( "Posts", "stctheme" ),
      "base" => "post",
      "class" => "",
      "category" => __( "STC", "stctheme"),
      "params" => array(
		array(
			'type' => 'dropdown',
			'heading' => __( 'Title Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'title_size', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Heading 1', 'stctheme' ) => 'h1',
				__( 'Heading 2', 'stctheme' ) => 'h2',
				__( 'Heading 3', 'stctheme' ) => 'h3',
				__( 'Heading 4', 'stctheme' ) => 'h4',
				__( 'Heading 5', 'stctheme' ) => 'h5',
				__( 'Heading 6', 'stctheme' ) => 'h6',
			),
			'description' => __( 'Select the size of the title.', 'stctheme' ),
		),
				array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Title Text Color", "stctheme" ),
            "param_name" => "title_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose title color", "stctheme" )
         ),
         	array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Title Background Color", "stctheme" ),
            "param_name" => "title_background_color",
            "value" => '#cccccc', //Default Black color
            "description" => __( "Choose title background color", "stctheme" )
         ),
         array(
			'type' => 'dropdown',
			'heading' => __( 'Title Align', 'stctheme' ),
			"class" => "",
			'param_name' => 'title_align', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Left', 'stctheme' ) => 'left',
				__( 'Center', 'stctheme' ) => 'center',
				__( 'Right', 'stctheme' ) => 'right',
			),
			'description' => __( 'Show the post footer?', 'stctheme' ),
		),
          array(
			'type' => 'dropdown',
			'heading' => __( 'Excerpt Size', 'stctheme' ),
			"class" => "",
			'param_name' => 'excerpt_size', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Heading 1', 'stctheme' ) => 'h1',
				__( 'Heading 2', 'stctheme' ) => 'h2',
				__( 'Heading 3', 'stctheme' ) => 'h3',
				__( 'Heading 4', 'stctheme' ) => 'h4',
				__( 'Heading 5', 'stctheme' ) => 'h5',
				__( 'Heading 5', 'stctheme' ) => 'h6',
				__( 'Paragraph', 'stctheme' ) => 'p',
			),
			'description' => __( 'Select the size of the excerpt.', 'stctheme' ),
		),
         array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Excerpt Text Color", "stctheme" ),
            "param_name" => "excerpt_color",
            "value" => '#4c4c4c', //Default Black color
            "description" => __( "Choose excerpt color", "stctheme" )
         ),
         	array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Excerpt Background Color", "stctheme" ),
            "param_name" => "excerpt_background_color",
            "value" => '#f2f2f2', //Default Black color
            "description" => __( "Choose excerpt background color", "stctheme" )
         ),
         array(
			'type' => 'textfield',
			'heading' => __( 'Excerpt Length', 'stctheme' ),
			'param_name' => 'excerpt_length',
			'value' => '55',
			"group" => "Advanced",
			'description' => __( 'Enter the length of the excerpt in number of words. Default is 55.', 'stctheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Display Meta', 'stctheme' ),
			"class" => "",
			'param_name' => 'display_meta', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			"group" => "Advanced",
			'value' => array(
				__( 'Yes', 'stctheme' ) => 'yes',
				__( 'No', 'stctheme' ) => 'no',
			),
			'description' => __( 'Show the post metadata (category, comments, date)?', 'stctheme' ),
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Footer Color", "stctheme" ),
            "param_name" => "footer_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose footer color", "stctheme" )
         ),
			array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Footer Background Color", "stctheme" ),
            "param_name" => "footer_background_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose footer background color", "stctheme" )
         ),
         array(
			'type' => 'dropdown',
			'heading' => __( 'Pagination', 'stctheme' ),
			"class" => "",
			'param_name' => 'pagination', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Yes', 'stctheme' ) => 'yes',
				__( 'No', 'stctheme' ) => 'no',
			),
			'description' => __( 'Choose if you want pagination.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Order By', 'stctheme' ),
			"class" => "",
			'param_name' => 'order_by', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			"group" => "Advanced",
			'value' => array(
				__( 'ASC', 'stctheme' ) => 'asc',
				__( 'No', 'stctheme' ) => 'no',
			),
			'description' => __( 'Choose if you want pagination.', 'stctheme' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Category', 'stctheme' ),
			'param_name' => 'category',
			'value' => '',
			'description' => __( 'Enter the the category the posts you want to show are in.', 'stctheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Posts Per Page', 'stctheme' ),
			'param_name' => 'posts_per',
			'value' => '5',
			'description' => __( 'Enter the number of posts per page. Enter -1 for unlimited.', 'stctheme' )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Display Thumbnail', 'stctheme' ),
			"class" => "",
			'param_name' => 'display_thumbnail', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Yes', 'stctheme' ) => 'yes',
				__( 'No', 'stctheme' ) => 'no',
			),
			'description' => __( 'Show the thumbnail, if availiable?', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Display Comments', 'stctheme' ),
			"class" => "",
			'param_name' => 'display_comments', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			"group" => "Advanced",
			'value' => array(
				__( 'Yes', 'stctheme' ) => 'yes',
				__( 'No', 'stctheme' ) => 'no',
			),
			'description' => __( 'Show the thumbnail, if availiable?', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Display Category', 'stctheme' ),
			"class" => "",
			'param_name' => 'display_category', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			"group" => "Advanced",
			'value' => array(
				__( 'Yes', 'stctheme' ) => 'yes',
				__( 'No', 'stctheme' ) => 'no',
			),
			'description' => __( 'Show the thumbnail, if availiable?', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Display Date', 'stctheme' ),
			"class" => "",
			'param_name' => 'display_date', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			"group" => "Advanced",
			'value' => array(
				__( 'Yes', 'stctheme' ) => 'yes',
				__( 'No', 'stctheme' ) => 'no',
			),
			'description' => __( 'Show the thumbnail, if availiable?', 'stctheme' ),
		),
		array(
			'type' => 'google_fonts',
			'param_name' => 'google_fonts',
			'value' => 'font_family:Abril%20Fatface%3A400|font_style:400%20regular%3A400%3Anormal', // default
			//'font_family:'.rawurlencode('Abril Fatface:400').'|font_style:'.rawurlencode('400 regular:400:normal')
			// this will override 'settings'. 'font_family:'.rawurlencode('Exo:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic').'|font_style:'.rawurlencode('900 bold italic:900:italic'),
			'settings' => array(
				//'no_font_style' // Method 1: To disable font style
				//'no_font_style'=>true // Method 2: To disable font style
				'fields' => array(
					//'font_family' => 'Abril Fatface:regular',
					//'Exo:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',// Default font family and all available styles to fetch
					//'font_style' => '400 regular:400:normal',
					// Default font style. Name:weight:style, example: "800 bold regular:800:normal"
					'font_family_description' => __( 'Select font family.', 'js_composer' ),
					'font_style_description' => __( 'Select font styling.', 'js_composer' )
				)
			),
			// 'description' => __( '', 'js_composer' ),
		),
         	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'stctheme' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'stctheme' ),
        )
      )
   ) );
   
// LIST CONTAINER SHORTCODE
vc_map( array(
	'name' => __( 'List', 'stctheme' ),
	'base' => 'list',
	'wrapper_class' => 'clearfix',
	'category' => __( 'STC', 'stctheme' ),
	"content_element" => true,
	"show_settings_on_create" => true,
    "as_parent" => array('only' => 'list_item, '), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
	'description' => __( 'Place a list on your site. Has styles, icons, etc.', 'stctheme' ),
	'params' => array(
		            array(
			'type' => 'dropdown',
			'heading' => __( 'List Style Position', 'stctheme' ),
			"class" => "",
			'param_name' => 'list_position', // due to backward compatibility message_box_shape
			'std' => 'inside',
			'value' => array(
				__( 'Inside', 'stctheme' ) => 'inside',
				__( 'Outside', 'stctheme' ) => 'outside',
			),
			'description' => __( 'Select a preset style for the service.', 'stctheme' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_class',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' )
		),
		array(
			'type' => 'css_editor',
			'heading' => __( 'Css', 'stctheme' ),
			'param_name' => 'css',
			// 'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'stctheme' ),
			'group' => __( 'Design options', 'stctheme' )
		),
	),
	"js_view" => 'VcColumnView'
) );


// LIST ITEM
vc_map( array(
      "name" => __( "List Item", "stctheme" ),
      "base" => "list_item",
      "category" => __( "STC", "stctheme"),
      "as_child" => array('only' => 'list'), // Use only|except attributes to limit parent (separate multiple values with comma)
      "params" => array(
				array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => __( "List Item", "stctheme" ),
            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
            "value" => __( "", "stctheme" ),
            "description" => __( "Enter your item.", "stctheme" )
         ),
         array(
			'type' => 'checkbox',
			'heading' => __( 'Show icon?', 'stc_plugin' ),
			'param_name' => 'display_icon',
			'value' => array( __( 'Yes', 'stc_plugin' ) => 'yes' )
		),
	array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'stctheme' ),
			'param_name' => 'icon_fontawesome',
            'value' => 'fa fa-info-circle',
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 200, // default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value' => 'fontawesome',
				'element' => 'display_icon',
				'value' => 'yes',
			),
			'description' => __( 'Select icon from library.', 'stctheme' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Bullet Style', 'stctheme' ),
			"class" => "",
			'param_name' => 'bullet_style', // due to backward compatibility message_box_shape
			'std' => 'circle',
			'value' => array(
				__( 'None', 'stctheme' ) => '',
				__( 'Disc', 'stctheme' ) => 'disc',
				__( 'Circle', 'stctheme' ) => 'circle',
				__( 'Square', 'stctheme' ) => 'square',
				__( 'Decimal', 'stctheme' ) => 'decimal',
				__( 'Decimal Leading Zero', 'stctheme' ) => 'decimal-leading-zero',
				__( 'Lower Roman', 'stctheme' ) => 'lower-roman',
				__( 'Upper Roman', 'stctheme' ) => 'upper-roman',
				__( 'Lower Greek', 'stctheme' ) => 'lower-greek',
				__( 'Lower Latin', 'stctheme' ) => 'lower-latin',
				__( 'Upper Latin', 'stctheme' ) => 'upper-latin',
				__( 'Armenian', 'stctheme' ) => 'armenian',
				__( 'Georgian', 'stctheme' ) => 'georgian',
				__( 'Lower Alpha', 'stctheme' ) => 'lower-alpha',
				__( 'Upper Alpha', 'stctheme' ) => 'upper-alpha',
			),
			'description' => __( 'Select a preset style for the service.', 'stctheme' ),
		),
		array(
                "type" => "attach_image",
                "heading" => __("Bullet Image", "stctheme"),
                "param_name" => "image_url",
                'dependency' => array(
					'element' => 'bullet_style',
					'value' => 'image',
			),
                "description" => __("Choose your image.", "stctheme")
            ),
            array(
            "type" => "textfield",
            "heading" => __( "Icon Margin", "stctheme" ),
            "param_name" => "icon_margin",
            "value" => __( "0", "stctheme" ),
            "group" => "Advanced",
            "description" => __( "Enter the right-margin for the icon. This will provide room between the icon and list item.", "stctheme" )
         ),
         	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
         array(
            'type' => 'css_editor',
            'heading' => __( 'Css', 'stctheme' ),
            'param_name' => 'css',
            'group' => __( 'Design options', 'stctheme' ),
        )
      )
   ) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_pricing_table extends WPBakeryShortCodesContainer {
    }
    class WPBakeryShortCode_tooltip extends WPBakeryShortCodesContainer {
    }
    class WPBakeryShortCode_ticker extends WPBakeryShortCodesContainer {
    }
    class WPBakeryShortCode_button_group extends WPBakeryShortCodesContainer {
    }
    class WPBakeryShortCode_list extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_pricing_table_heading extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_pricing_table_sub_heading extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_measurement extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_list_item extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_worker extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_pricing_table_image extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_pricing_table_description extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_pricing_table_price extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_services extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_testimonial extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_button extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_dropcap extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_modal extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_code_block extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_odometer extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_disqus extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_button_in_group extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_button_dropdown extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_progress extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_wp_comments extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_livefyre extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_alert extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_post extends WPBakeryShortCode {
    }
}

@ini_set( 'upload_max_size' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'max_execution_time', '300' );