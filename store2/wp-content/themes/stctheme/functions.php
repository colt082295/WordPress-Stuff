<?php
ob_start();
/*********************
INCLUDE NEEDED FILES
*********************/

// LOAD JOINTSWP CORE (if you remove this, the theme will break)
require_once(get_template_directory().'/library/joints.php'); 

// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
require_once(get_template_directory().'/library/custom-post-type.php'); // you can disable this if you like

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
 require_once(get_template_directory().'/library/admin.php'); 
 
// ADD THE WORDPRESS CUSTOMIZER FUNCTIONS
 require_once(get_template_directory().'/library/customizer.php'); 

// SUPPORT FOR OTHER LANGUAGES (off by default)
// require_once(get_template_directory().'/library/translation/translation.php'); 

/*********************
MENUS & NAVIGATION
*********************/
// REGISTER MENUS
register_nav_menus(
	array(
		'top-nav' => __( 'The Top Menu' ),   // main nav in header
		'main-nav' => __( 'The Main Menu' ),   // main nav in header
		'footer-links' => __( 'Footer Links' ) // secondary nav in footer
	)
);

// THE TOP MENU
function joints_top_nav() {
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => '',           // class of container (should you choose to use it)
    	'menu' => __( 'The Top Menu', 'jointstheme' ),  // nav name
    	'menu_class' => 'nav-list',         // adding custom nav class
    	'theme_location' => 'top-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
    	'fallback_cb' => 'joints_main_nav_fallback'      // fallback function
	));
} /* end joints main nav */

// THE MAIN MENU
function joints_main_nav() {
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => '',           // class of container (should you choose to use it)
    	'menu' => __( 'The Main Menu', 'jointstheme' ),  // nav name
    	'menu_class' => 'nav-list',         // adding custom nav class
    	'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
    	'fallback_cb' => 'joints_main_nav_fallback'      // fallback function
	));
} /* end joints main nav */

// THE FOOTER MENU
function joints_footer_links() {
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links', 'jointstheme' ),   // nav name
    	'menu_class' => 'sub-nav',      // adding custom nav class
    	'theme_location' => 'footer-links',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'joints_footer_links_fallback'  // fallback function
	));
} /* end joints footer link */

// HEADER FALLBACK MENU
function joints_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => '',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // before each link
        'link_after' => ''                             // after each link
	) );
}

// FOOTER FALLBACK MENU
function joints_footer_links_fallback() {
	/* you can put a default here if you like */
}

/*********************
SIDEBARS
*********************/

// Registers Sidebars & Widgetized Areas
function joints_register_sidebars() {
/************************************************************
----------------------REGISTER SIDEBARS----------------------
************************************************************/

			register_sidebar(array(
				'id' => 'sidebar1',
				'name' => __('Sidebar 1', 'stc'),
				'description' => __('The first (primary) sidebar.', 'stc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widgettitle">',
				'after_title' => '</h4>',
			));

			register_sidebar(array(
				'id' => 'offcanvas',
				'name' => __('Offcanvas', 'stc'),
				'description' => __('The offcanvas sidebar.', 'stc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widgettitle">',
				'after_title' => '</h4>',
			));
/////////////////////////////////////////////////////////////////
	
/****************************************************************
----------------------------REGISTER FOOTERS--------------------- 
****************************************************************/

			register_sidebar(array(
				'id' => 'footer-1',
				'name' => __('Footer 1', 'stc'),
				'description' => __('The first footer section.', 'stc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widgettitle">',
				'after_title' => '</h4>',
			));

			register_sidebar(array(
				'id' => 'footer-2',
				'name' => __('Footer 2', 'stc'),
				'description' => __('The second footer section.', 'stc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widgettitle">',
				'after_title' => '</h4>',
			));

			register_sidebar(array(
				'id' => 'footer-3',
				'name' => __('Footer 3', 'stc'),
				'description' => __('The third footer section.', 'stc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widgettitle">',
				'after_title' => '</h4>',
			));

			register_sidebar(array(
				'id' => 'footer-4',
				'name' => __('Footer 4', 'stc'),
				'description' => __('The fourth footer section.', 'stc'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widgettitle">',
				'after_title' => '</h4>',
			));
///////////////////////////////////////////////////////////////////////////

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'stc'),
		'description' => __('The second (secondary) sidebar.', 'stc'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

/********************
     Breadcrumbs
********************/
function the_breadcrumb() {
	if (!is_home()) {
		if (is_category() || is_single()) {
			the_category('title_li=');
			if (is_single()) {
				echo "  ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
}

/*********************
COMMENT LAYOUT
*********************/

// Comment Layout
function joints_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('panel'); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix large-12 columns">
			<header class="comment-author">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<?php printf(__('<cite class="fn">%s</cite>', 'jointstheme'), get_comment_author_link()) ?> on
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' F jS, Y - g:ia', 'jointstheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'jointstheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'jointstheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
//adding scripts file in the footer
//Add svg support
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

$css = '';

add_action( 'vc_before_init', 'worker_shortcode_integrateWithVC' );
function worker_shortcode_integrateWithVC() {
   vc_map( array(
      "name" => __( "Worker", "stctheme" ),
      "base" => "worker",
      "class" => "",
      "category" => __( "STC", "stctheme"),
      "params" => array(
         array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Text", "stctheme" ),
            "param_name" => "name",
            "value" => __( "Default param value", "stctheme" ),
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
				__( 'Left', 'stctheme' ) => 'left',
				__( 'Center', 'stctheme' ) => 'center',
				__( 'Right', 'stctheme' ) => 'right',
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
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Description", "stctheme" ),
            "param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
            "value" => __( "", "stctheme" ),
            "description" => __( "Enter your description.", "stctheme" )
         ),
         	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'js_composer' )
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

add_shortcode( 'worker', 'worker_func' );
function worker_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
      'name' => '',
      'name_size' => '',
      'name_align' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  
  $a = shortcode_atts(array(
            'image_url' => 'image_url',
        ), $atts);

        $img = wp_get_attachment_image_src($a["image_url"], "large");

        $imgSrc = $img[0];
  
     $end_content = '<div class="' . $extra_css . '">';
     $end_content .= '<div class="worker_container">';
     $end_content .= '<div class="worker_image_wrapper">';
   	 $end_content .= '<div class="worker_image_container">';
     $end_content .= '<a href="'.$imgSrc.'"><img src="'.$imgSrc.'"</img></a></div></div>';
     $end_content .= '<div class="worker_name_container"><'.$name_size.' class="align_'.$name_align.'">'.$name.'</'.$name_size.'></div>';
     $end_content .= '<div class="worker_description">'.$content.'</div>';
     $end_content .= '</div></div>';
   return $end_content;
   
}

add_shortcode( 'services', 'services_func' );
function services_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
      'title' => '',
      'title_size' => '',
      'title_color' => '',
      'title_align' => '',
      'max_width' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  
  
  $a = shortcode_atts(array(
            'image_url' => 'image_url',
        ), $atts);

        $img = wp_get_attachment_image_src($a["image_url"], "large");

        $imgSrc = $img[0];
  
  
     $end_content = '<div class="services_wrapper ' . $extra_css . '" style=max-width:'.$max_width.'em>';
     $end_content .= '<div class="services_container">';
     $end_content .= '<div class="services_image_wrapper">';
   	 $end_content .= '<div class="services_image_container">';
     $end_content .= '<img src="'.$imgSrc.'"</img></div></div>';
     $end_content .= '<div class="services_name_container"><'.$title_size.' class="align_'.$title_align.'" style="color:'.$title_color.'">'.$title.'</'.$title_size.'></div>';
     $end_content .= '<div class="services_description">'.$content.'</div>';
     $end_content .= '</div></div>';
   return $end_content;
   
}

add_shortcode( 'testimonial', 'testimonial_func' );
function testimonial_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
      'name' => '',
      'name_size' => '',
      'name_color' => '',
      'name_align' => '',
      'max_width' => '',
      'extra_css' => '',
      'border_radius' => '',
      'description_background_color' => '',
      'description_padding' => '',
      'triangle_color' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  
  
  $a = shortcode_atts(array(
            'image_url' => 'image_url',
        ), $atts);

        $img = wp_get_attachment_image_src($a["image_url"], "thumbnail");

        $imgSrc = $img[0];
        
    $href = vc_build_link( $href );
    $testimonial_triangle = "width: 0;height: 0;border-left: 20px solid transparent;border-right: 20px solid transparent;border-top: 20px solid ".$traingle_color.";content: '';position: absolute;top: 0;margin: auto;left: 50%;transform: translate(-50%)";
    
     $end_content = '<div class="testimonial_wrapper ' . $extra_css . '" style=max-width:'.$max_width.'em>';
     $end_content .= '<div class="testimonial_container">';
     $end_content .= '<div class="testimonial_description" style="border-radius:'.$border_radius.'px; background-color:'.$description_background_color.';padding:'.$description_padding.'em">'.$content.'<div class="testimonial_image_container"><img src="'.$imgSrc.'"</img></div></div>';
     $end_content .= '<div class="testimonial_name_wrapper" style="float:'.$name_align.'"><div class="testimonial_name_container"><div class="triangle" style="'.$testimonial_triangle.'"></div><a href="'.$href.'"><'.$name_size.' style=color:'.$name_color.'>'.$name.'</'.$name_size.'></a></div></div>';
     $end_content .= '</div></div>';
   return $end_content;
   
}

add_shortcode( 'pricing_table', 'pricing_table_func' );
function pricing_table_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
      'max_width' => '',
      'extra_css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  $max_width_val = 'max_width:' + $max_width + 'em';
  
     $end_content = '<div class="pricing_table ' . $extra_css . '" style=max-width:'.$max_width_val.'em>'.$content.'';
     $end_content .= '</div>';
   return $end_content;
   
}

add_shortcode( 'pricing_table_heading', 'pricing_table_heading_func' );
function pricing_table_heading_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
      'extra_css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  
  
     $end_content = '<div class="pricing_table_heading ' . $extra_css . '">'.do_shortcode($content).'';
     $end_content .= '</div>';
   return $end_content;
   
}

add_shortcode( 'pricing_table_image', 'pricing_table_image_func' );
function pricing_table_image_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
      'width' => '',
      'border_radius' => '',
      'extra_css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  
  $a = shortcode_atts(array(
            'image_url' => 'image_url',
        ), $atts);

        $img = wp_get_attachment_image_src($a["image_url"], "large");

        $imgSrc = $img[0];
        
  $img_output = '<img src="'.$imgSrc.'"</img>';      
  
     $end_content = '<div class="pricing_table_image ' . $extra_css . '" style=width:'.$width.'%;border-radius:'.$border_radius.'px>'.do_shortcode($img_output).'';
     $end_content .= '</div>';
   return $end_content;
   
}

add_shortcode( 'pricing_table_description', 'pricing_table_description_func' );
function pricing_table_description_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
      'extra_css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  
  
     $end_content = '<div class="pricing_table_description ' . $extra_css . '">'.do_shortcode($content).'';
     $end_content .= '</div>';
   return $end_content;
   
}

add_shortcode( 'pricing_table_price', 'pricing_table_price_func' );
function pricing_table_price_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
      'extra_css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  
  
     $end_content = '<div class="pricing_table_price ' . $extra_css . '">'.do_shortcode($content).'';
     $end_content .= '</div>';
   return $end_content;
   
}


add_action( 'vc_before_init', 'services_shortcode_integrateWithVC' );
function services_shortcode_integrateWithVC() {
   vc_map( array(
      "name" => __( "Services", "stctheme" ),
      "base" => "services",
      "class" => "",
      "category" => __( "STC", "stctheme"),
      "params" => array(
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
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'js_composer' )
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
            "value" => __( "Default param value", "stctheme" ),
            "description" => __( "Enter the name of the person.", "stctheme" )
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
            "param_name" => "traingle_color",
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
				__( 'Left', 'stctheme' ) => 'left',
				__( 'Right', 'stctheme' ) => 'right',
			),
			'description' => __( 'Select the alignment of the name.', 'stctheme' ),
		),
		array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __( "Border Radius", "stctheme" ),
            "param_name" => "border_radius",
            "value" => __( "0", "stctheme" ),
            "description" => __( "Enter your border radius in px. Only enter number.", "stctheme" )
         ),
		array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Background Color", "stctheme" ),
            "param_name" => "description_background_color",
            "value" => '#c3c3c3', //Default Black color
            "description" => __( "Choose background color", "stctheme" )
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
            "heading" => __( "Max Width", "stctheme" ),
            "param_name" => "max_width",
            "value" => __( "30", "stctheme" ),
            "description" => __( "Enter the maximum width you want.", "stctheme" )
         ),
         	array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'stctheme' ),
			'param_name' => 'extra_css',
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'js_composer' )
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

add_action( 'vc_before_init', 'pricing_table_integrateWithVC' );
function pricing_table_integrateWithVC() {
   vc_map( array(
      "name" => __( "Pricing Table", "stctheme" ),
      "base" => "pricing_table",
      "class" => "",
      "content_element" => true,
      "as_parent" => array('only' => 'pricing_table_heading, pricing_table_image, pricing_table_description, pricing_table_price'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
      "category" => __( "STC", "stctheme"),
      "params" => array(
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
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'js_composer' )
		),
    )
) );
}

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
			'heading' => __( 'Border Radius', 'stctheme' ),
			'param_name' => 'Border_radius',
			"value" => __( "5", "stctheme" ),
			'description' => __( 'Change the border radius (in pixels). Only enter number', 'stctheme' )
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
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'js_composer' )
		),
    )
) );
}

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
			'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file. If you do not know what this means, leave it blank.', 'js_composer' )
		),
    )
) );
}


if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_pricing_table extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_worker extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_pricing_table_heading extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_pricing_table_image extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_pricing_table_description extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_pricing_table_price extends WPBakeryShortCode {
    }
    class WPBakeryShortCode_pricing_services extends WPBakeryShortCode {
    }
}

?>