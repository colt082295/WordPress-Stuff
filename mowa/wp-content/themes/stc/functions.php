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
// require_once(get_template_directory().'/library/admin.php'); 

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
    	'menu_class' => '',         // adding custom nav class
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
    	'menu_class' => '',         // adding custom nav class
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

// SIDEBARS AND WIDGETIZED AREAS
function joints_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'jointstheme'),
		'description' => __('The first (primary) sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'offcanvas',
		'name' => __('Offcanvas', 'jointstheme'),
		'description' => __('The offcanvas sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
	register_sidebar(array(
		'id' => 'footer1',
		'name' => __('Footer', 'jointstheme'),
		'description' => __('The footer.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'jointstheme'),
		'description' => __('The second (secondary) sidebar.', 'jointstheme'),
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


   vc_map( array(
      "name" => __( "Posts", "stctheme" ),
      "base" => "posts",
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
            "heading" => __( "Title Color", "stctheme" ),
            "param_name" => "title_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose title color", "stctheme" )
         ),
         	array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Title Background Color", "stctheme" ),
            "param_name" => "title_background_color",
            "value" => '#000000', //Default Black color
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
            "heading" => __( "Excerpt Color", "stctheme" ),
            "param_name" => "excerpt_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose excerpt color", "stctheme" )
         ),
         	array(
            "type" => "colorpicker",
            "class" => "",
            "heading" => __( "Excerpt Background Color", "stctheme" ),
            "param_name" => "excerpt_background_color",
            "value" => '#000000', //Default Black color
            "description" => __( "Choose excerpt background color", "stctheme" )
         ),
         array(
			'type' => 'textfield',
			'heading' => __( 'Excerpt Length', 'stctheme' ),
			'param_name' => 'excerpt_length',
			'value' => '55',
			"group" => "Advanced",
			'description' => __( 'Enter the length of the ecerpt in number of words. Default is 55.', 'stctheme' )
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
   
   
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_posts extends WPBakeryShortCode {
    }
}

// Set custom excerpt length
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }


?>