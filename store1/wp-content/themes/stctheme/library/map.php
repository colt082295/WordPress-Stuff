<?php

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

// SERVICES
add_action( 'vc_before_init', 'services_shortcode_integrateWithVC' );
function services_shortcode_integrateWithVC() {
   vc_map( array(
      "name" => __( "Services", "stctheme" ),
      "base" => "services",
      "class" => "",
      "category" => __( "STC", "stctheme"),
      "params" => array(
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
            "holder" => "div",
            "class" => "",
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
			'description' => __( 'Select the alignment of the service.', 'stctheme' ),
		),
		array(
                "type" => "attach_image",
                "heading" => __("Image", "stctheme"),
                "holder" => "div",
                "class" => "",
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
			'description' => __( 'Select the style of the image.', 'stctheme' ),
		),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Image Border Width", "stctheme" ),
            "param_name" => "image_border_width",
            "value" => __( "1", "stctheme" ),
            "description" => __( "Enter the image border width.", "stctheme" )
         ),
         array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Image Border Color", "stctheme" ),
            "param_name" => "image_border_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose the image border color.", "stctheme" )
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
            "holder" => "div",
            "class" => "",
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

// BUTTON
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
			'std' => 'rounded',
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
			'std' => 'rounded',
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
			'value' => array(
				__( 'None', 'stctheme' ) => '',
				__( 'Raised', 'stctheme' ) => 'button-raised',
				__( 'Inverse', 'stctheme' ) => 'button-inverse',
				__( 'Action', 'stctheme' ) => 'button-action',
				__( 'Highlight', 'stctheme' ) => 'button-highlight',
				__( 'Caution', 'stctheme' ) => 'button-caution',
				__( 'Royal', 'stctheme' ) => 'button-royal',
				__( '3D', 'stctheme' ) => 'button-3d',
				__( 'Glow', 'stctheme' ) => 'button-glow',
			),
			'description' => __( 'Choose any of these extra styles if if you want.', 'stctheme' ),
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "background Color", "stctheme" ),
            "param_name" => "background_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose background color", "stctheme" )
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
			),
			'description' => __( 'Select icon from library.', 'stctheme' ),
		),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
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

// WORKER
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
			'std' => 'rounded',
			'value' => array(
				__( 'Style 1', 'stctheme' ) => 'style_one',
				__( 'Style 2', 'stctheme' ) => 'style_two',
			),
			'description' => __( 'Pick a style preset.', 'stctheme' ),
		),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Text", "stctheme" ),
            "param_name" => "name",
            "value" => __( "Name Here.", "stctheme" ),
            "description" => __( "Enter name of worker.", "stctheme" )
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
			'description' => __( 'Select the alignment of the name.', 'stctheme' ),
		),
		array(
                "type" => "attach_image",
                "heading" => __("Image", "stctheme"),
                "holder" => "div",
                "class" => "",
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
				__( 'Circle', 'stctheme' ) => 'width:150px!important;height:150px!important;border-radius:50%',
				__( 'Round Square', 'stctheme' ) => 'border-radius:5%',
			),
			'description' => __( 'Select the style of the image.', 'stctheme' ),
		),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Image Border Width", "stctheme" ),
            "param_name" => "image_border_width",
            "value" => __( "1", "stctheme" ),
            "description" => __( "Enter the image border width.", "stctheme" )
         ),
         array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Image Border Color", "stctheme" ),
            "param_name" => "image_border_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose the image border color.", "stctheme" )
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
            "holder" => "div",
            "class" => "",
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

// TESTIMONIAL
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
			'heading' => __( 'Pick a Style', 'stctheme' ),
			"class" => "",
			'param_name' => 'style', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Custom', 'stctheme' ) => 'custom',
				__( 'Style 1', 'stctheme' ) => 'style_1',
				__( 'Style 2', 'stctheme' ) => 'style_2',
				__( 'Style 3', 'stctheme' ) => 'style_3',
				__( 'Style 4', 'stctheme' ) => 'style_4',
				__( 'Style 5', 'stctheme' ) => 'style_5',
				__( 'Style 6', 'stctheme' ) => 'style_6',
				__( 'Style 7', 'stctheme' ) => 'style_7',
				__( 'Style 8', 'stctheme' ) => 'style_8',
			),
			'description' => __( 'Pick a preset style.', 'stctheme' ),
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Name Color", "stctheme" ),
            "param_name" => "name_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose text color", "stctheme" )
         ),
         array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Triangle Color", "stctheme" ),
            "param_name" => "triangle_color",
            "value" => '#000000', //Default Black color
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
            "holder" => "div",
            "class" => "",
            "group" => "Advanced",
            "heading" => __( "Border Radius", "stctheme" ),
            "param_name" => "border_radius",
            "value" => __( "0", "stctheme" ),
            "description" => __( "Enter your border radius in px. Only enter number.", "stctheme" )
         ),
         array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Background Color", "stctheme" ),
            "param_name" => "background_color",
            "value" => '', //Default Black color
            "description" => __( "Choose background color for the entire element.", "stctheme" )
         ),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Quote Background Color", "stctheme" ),
            "param_name" => "quote_background_color",
            "value" => '', //Default Black color
            "description" => __( "Choose background color for the quote section.", "stctheme" )
         ),
         array(
            "type" => "vc_link",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Link", "stctheme" ),
            "param_name" => "vc_link",
            "value" => __( "", "stctheme" ),
            "description" => __( "Choose your link.", "stctheme" )
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "group" => "Advanced",
            "heading" => __( "Padding", "stctheme" ),
            "param_name" => "description_padding",
            "value" => __( "1", "stctheme" ),
            "description" => __( "Enter the amount of padding wanted. This padding is for the quote/description. Use the design editor to use padding on entire element.", "stctheme" )
         ),
		array(
                "type" => "attach_image",
                "heading" => __("Image", "stctheme"),
                "holder" => "div",
                "class" => "",
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
            "holder" => "div",
            "class" => "",
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

// PRICING TABLE
add_action( 'vc_before_init', 'pricing_table_integrateWithVC' );
function pricing_table_integrateWithVC() {
   vc_map( array(
      "name" => __( "Pricing Table", "stctheme" ),
      "base" => "pricing_table",
      "class" => "",
      "content_element" => true,
      "show_settings_on_create" => false,
      "as_parent" => array('only' => 'pricing_table_heading, pricing_table_image, pricing_table_description, pricing_table_price'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
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
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Max Width", "stctheme" ),
            "param_name" => "max_width",
            "value" => __( "30", "stctheme" ),
            "description" => __( "Enter the maximum width you would like the pricing table to be in EM. Just enter your number", "stctheme" )
         ),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Class", "stctheme" ),
            "param_name" => "css",
            "value" => __( "Default param value", "stctheme" ),
            "description" => __( "Enter custom CSS class name for reference in your CSS file. If you don't know what this means, leave it blank.", "stctheme" )
         ),
      ),
      "js_view" => 'VcColumnView'
   ) );
}

// PRICING TABLE HEADING
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

// PRICING TABLE IMAGE
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
            "heading" => __("Pricing Table Image", "stctheme"),
            "param_name" => "image_url",
            "description" => __("Choose your image.", "stctheme")
        ),
        array(
			'type' => 'textfield',
			'heading' => __( 'Width', 'stctheme' ),
			'param_name' => 'width',
			"value" => __( "100", "stctheme" ),
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

// PRICING TABLE DESCRIPTION
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

// PRICING TABLE PRICE
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
            "description" => __("Enter your price here.", "stctheme")
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
// DROPCAP
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
			"class" => "",
			'param_name' => 'drop_position', // due to backward compatibility message_box_shape
			'std' => 'rounded',
			'value' => array(
				__( 'Top', 'stctheme' ) => 'drop-up',
				__( 'Bottom', 'stctheme' ) => 'drop-down',
			),
			'description' => __( 'Change the position of the dropcap.', 'stctheme' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Dropcap Character', 'stctheme' ),
			'param_name' => 'drop',
			'description' => __( 'Enter the character you want dropped.', 'stctheme' )
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __( 'Text', 'stctheme' ),
			'param_name' => 'content',
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
			'param_name' => 'el_class',
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

// MODAL
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
			'description' => __( 'Select the alignment of the service.', 'stctheme' ),
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

// CODEBLOCK
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
			'value' => __( '<p>Enter your code here.</p>', 'stctheme' )
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Enter Language', 'stctheme' ),
			'param_name' => 'code_lang',
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
				__( 'atelier-forest.dark', 'stctheme' ) => 'atelier-forest.dark',
				__( 'atelier-forest.light', 'stctheme' ) => 'atelier-forest.light',
				__( 'atelier-heath.dark', 'stctheme' ) => 'atelier-heath.dark',
				__( 'atelier-heath.light', 'stctheme' ) => 'atelier-heath.light',
				__( 'atelier-lakeside.dark', 'stctheme' ) => 'atelier-lakeside.dark',
				__( 'atelier-lakeside.light', 'stctheme' ) => 'atelier-lakeside.light',
				__( 'atelier-seaside.dark', 'stctheme' ) => 'atelier-seaside.dark',
				__( 'atelier-seaside.light', 'stctheme' ) => 'atelier-seaside.light',
				__( 'brown_paper', 'stctheme' ) => 'brown_paper',
				__( 'codepen-embed', 'stctheme' ) => 'codepen-embed',
				__( 'color-brewer', 'stctheme' ) => 'color-brewer',
				__( 'dark', 'stctheme' ) => 'dark',
				__( 'darkula', 'stctheme' ) => 'darkula',
				__( 'default', 'stctheme' ) => 'default',
				__( 'docco', 'stctheme' ) => 'docco',
				__( 'far', 'stctheme' ) => 'far',
				__( 'foundation', 'stctheme' ) => 'foundation',
				__( 'github', 'stctheme' ) => 'github',
				__( 'googlecode', 'stctheme' ) => 'googlecode',
				__( 'hybrid', 'stctheme' ) => 'hybrid',
				__( 'idea', 'stctheme' ) => 'idea',
				__( 'ir_black', 'stctheme' ) => 'ir_black',
				__( 'kimbie.dark', 'stctheme' ) => 'kimbie.dark',
				__( 'kimbie.light', 'stctheme' ) => 'kimbie.light',
				__( 'magula', 'stctheme' ) => 'magula',
				__( 'mono-blue', 'stctheme' ) => 'mono-blue',
				__( 'monokai', 'stctheme' ) => 'monokai',
				__( 'monokai_sublime', 'stctheme' ) => 'monokai_sublime',
				__( 'obsidian', 'stctheme' ) => 'obsidian',
				__( 'paraiso.dark', 'stctheme' ) => 'paraiso.dark',
				__( 'paraiso.light', 'stctheme' ) => 'paraiso.light',
				__( 'pojoaque', 'stctheme' ) => 'pojoaque',
				__( 'railscasts', 'stctheme' ) => 'railscasts',
				__( 'rainbow', 'stctheme' ) => 'rainbow',
				__( 'school_book', 'stctheme' ) => 'school_book',
				__( 'solarized_dark', 'stctheme' ) => 'solarized_dark',
				__( 'solarized_light', 'stctheme' ) => 'solarized_light',
				__( 'sunburst', 'stctheme' ) => 'sunburst',
				__( 'tomorrow-night-blue', 'stctheme' ) => 'tomorrow-night-blue',
				__( 'tomorrow-night-bright', 'stctheme' ) => 'tomorrow-night-bright',
				__( 'tomorrow-night-eighties', 'stctheme' ) => 'tomorrow-night-eighties',
				__( 'tomorrow-night', 'stctheme' ) => 'tomorrow-night',
				__( 'tomorrow', 'stctheme' ) => 'tomorrow',
				__( 'vs', 'stctheme' ) => 'vs',
				__( 'xcode', 'stctheme' ) => 'xcode',
				__( 'zenburn', 'stctheme' ) => 'zenburn',
				
			),
			'description' => __( 'Select the style you want to use.', 'stctheme' ),
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Background Color", "stctheme" ),
            "param_name" => "background_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose the background color", "stctheme" )
         ),
         array(
			'type' => 'textfield',
			'heading' => __( 'Enter a Max Height', 'stctheme' ),
			'param_name' => 'max_height',
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

// NUMBER COUNTER
vc_map( array(
	'name' => __( 'Number Counter', 'stctheme' ),
	'base' => 'odometer',
	'wrapper_class' => 'clearfix',
	'category' => __( 'STC', 'stctheme' ),
	'description' => __( 'Counts to a number.', 'stctheme' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => __( 'Enter Number', 'stctheme' ),
			'param_name' => 'number',
			'description' => __( 'Enter your number here.', 'stctheme' ),
			'value' => __( '', 'stctheme' )
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

// TOOLTIP
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

// TICKER
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

// DISQUS
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
			'heading' => __( 'Enter tip here.', 'stctheme' ),
			'param_name' => 'shortname',
			'description' => __( 'Enter the shortname of your comment system. If you do not know what that is, please sign up for disqus <a href="//disqus.com">here</a>, and get you shortname.', 'stctheme' )
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

// BUTTON IN GROUP
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
			'std' => 'rounded',
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
			'std' => 'rounded',
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
			'value' => array(
				__( 'None', 'stctheme' ) => '',
				__( 'Raised', 'stctheme' ) => 'button-raised',
				__( 'Inverse', 'stctheme' ) => 'button-inverse',
				__( 'Action', 'stctheme' ) => 'button-action',
				__( 'Highlight', 'stctheme' ) => 'button-highlight',
				__( 'Caution', 'stctheme' ) => 'button-caution',
				__( 'Royal', 'stctheme' ) => 'button-royal',
				__( '3D', 'stctheme' ) => 'button-3d',
				__( 'Glow', 'stctheme' ) => 'button-glow',
			),
			"std"         => $defaults['button_etc'],
			'description' => __( 'Choose any of these extra styles if if you want.', 'stctheme' ),
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "background Color", "stctheme" ),
            "param_name" => "background_color",
            "value" => '#1e73be', //Default Black color
            "description" => __( "Choose background color", "stctheme" )
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
			),
			'description' => __( 'Select icon from library.', 'stctheme' ),
		),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
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

// DROPDOWN BUTTON
vc_map( array(
    "name" => __("Dropdown Button", "stctheme"),
    "base" => "button_dropdown",
    "content_element" => true,
    "category" => __( "STC", "stctheme"),
    "params" => array(
        // add params same as with any other content element
        array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'button_text',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'stctheme' )
		),
        array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Button Text", "stctheme" ),
            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
            "value" => __( "", "stctheme" ),
            "description" => __( "Enter your dropdown text. Seperate items by using a list.", "stctheme" )
         ),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "background Color", "stctheme" ),
            "param_name" => "background_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose background color", "stctheme" )
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
			),
			'description' => __( 'Select icon from library.', 'stctheme' ),
		),
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
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
// DEFAULT WP COMMENTS
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

// LIVEFYRE COMMENTS
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

// ALERT
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
			"class" => "",
			'param_name' => 'size', // due to backward compatibility message_box_shape
			'std' => 'rounded',
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
			'type' => 'textfield',
			'heading' => __( 'Title', 'stctheme' ),
			'param_name' => 'title',
			'description' => __( 'Enter your title here.', 'stctheme' )
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Title Color", "stctheme" ),
            "param_name" => "title_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose color of the title.", "stctheme" )
         ),
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
			),
			'description' => __( 'Select the size of the title.', 'stctheme' ),
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
			'description' => __( 'Select the alignment of the title.', 'stctheme' ),
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Background Color", "stctheme" ),
            "param_name" => "background_color",
            "value" => '#5ea2d6', //Default Black color
            "description" => __( "Choose color of the alert box.", "stctheme" )
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
			),
			'description' => __( 'Select icon from library.', 'stctheme' ),
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Icon Size', 'stctheme' ),
			'param_name' => 'icon_size',
			'value' => '30',
			'description' => __( 'Choose your icon size in pixels. Only enter number.', 'stctheme' )
		),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Icon Color", "stctheme" ),
            "param_name" => "icon_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose color of the icon.", "stctheme" )
         ),
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
			'type' => 'textfield',
			'heading' => __( 'Border Radius', 'stctheme' ),
			'param_name' => 'border_radius',
			'description' => __( 'Enter a border-radius in pixels, if desired.', 'stctheme' )
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

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_pricing_table extends WPBakeryShortCodesContainer {
    }
    class WPBakeryShortCode_tooltip extends WPBakeryShortCodesContainer {
    }
    class WPBakeryShortCode_ticker extends WPBakeryShortCodesContainer {
    }
    class WPBakeryShortCode_button_group extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_pricing_table_heading extends WPBakeryShortCode {
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

// Enqueueing all needed stuff

function theme_name_scripts() {
	wp_register_script( 'odometer_script', get_template_directory_uri() . '/change/odometer.min.js' );
	wp_register_script( 'odometer_script_inview', get_template_directory_uri() . '/change/inview.min.js' );
	wp_register_script( 'ticker_script', get_template_directory_uri() . '/change/jquery.newsTicker.min.js' );
	wp_register_script( 'ticker_script_second', get_template_directory_uri() . '/change/ticker_two.js' );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

add_action( 'wp_enqueue_scripts', 'register_my_script' );
	
	function register_my_script() {
	wp_register_script( 'highlightjs', get_template_directory_uri() . '/change/highlightjs/highlight.js' );
	wp_register_script( 'highlightjs_onload_script', get_template_directory_uri() . '/change/highlightjs_onload.js' );
	}
	
