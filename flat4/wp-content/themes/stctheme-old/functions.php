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
/********************************************************
--------------------THEME CUSTOMIZER---------------------
********************************************************/
//End Theme Customizer
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
//Add Kirki for Customizer Controls
function enqueue_kirki() {
    wp_enqueue_style( 'kirki-files', get_template_directory_uri().'/library/css/style.css' );
}
include_once( dirname( __FILE__ ) . '/kirki/kirki.php' );
function stc_register_theme_customizer( $wp_customize ) {

	//Remove Unnecessary Sections First
	$wp_customize->remove_section('nav');
	$wp_customize->remove_section('static_front_page');
	$wp_customize->remove_panel('widgets');
	/********************************************
	-------------------PANELS--------------------
	********************************************/
			$wp_customize->add_panel( 'header_panel', array(
				'priority' => 50,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => 'Header',
				'description' => 'All the options for editing the header section.',
			) );

			$wp_customize->add_panel( 'article_panel', array(
				'priority' => 100,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => 'Article',
				'description' => 'All the options for editing the article section.',
			) );

			$wp_customize->add_panel( 'footer_panel', array(
				'priority' => 150,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => 'Footer',
				'description' => 'All the options for editing the footer section.',
			) );

			$wp_customize->add_panel( 'advanced_panel', array(
				'priority' => 800,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => 'Advanced Options',
				'description' => 'All the options for editing the more advanced options - padding,margin,etc.',
			) );

			$wp_customize->add_panel( 'mobile_panel', array(
				'priority' => 200,
				'capability' => 'edit_theme_options',
				'theme_supports' => '',
				'title' => 'Mobile Options',
				'description' => 'All the options for editing the mobile portion of the theme.',
			) );

	/*********************************************
	--------------------SECTIONS------------------
	*********************************************/

				//Add Top Navigation Section
			$wp_customize->add_section(
					    'stc_general',
					    array(
					        'title'     => 'General',
					        'priority'  => 100
					    )
					);
			    ///////////////////////////////////////////////////////

				//Add Advanced Header Section
			$wp_customize->add_section(
					    'stc_advanced_header',
					    array(
					        'title'     => 'Header',
					        'panel' => 'advanced_panel',
					        'priority'  => 100
					    )
					);
			    ///////////////////////////////////////////////////////

			//Add Advanced Article Section
			$wp_customize->add_section(
					    'stc_advanced_article',
					    array(
					        'title'     => 'Article',
					        'panel' => 'advanced_panel',
					        'priority'  => 200
					    )
					);
			    ///////////////////////////////////////////////////////

			//Add Advanced Body Section
			$wp_customize->add_section(
					    'stc_advanced_body',
					    array(
					        'title'     => 'Body',
					        'panel' => 'advanced_panel',
					        'priority'  => 150
					    )
					);
			    ///////////////////////////////////////////////////////

			//Add Advanced Footer Section
			$wp_customize->add_section(
					    'stc_advanced_footer',
					    array(
					        'title'     => 'Footer',
					        'panel' => 'advanced_panel',
					        'priority'  => 300
					    )
					);
			    ///////////////////////////////////////////////////////

			//Add Advanced Sidebar Section
			$wp_customize->add_section(
					    'stc_advanced_sidebar',
					    array(
					        'title'     => 'Sidebar',
					        'panel' => 'advanced_panel',
					        'priority'  => 400
					    )
					);
			    ///////////////////////////////////////////////////////

				// Add Advanced Header Section
			$wp_customize->add_section(
					    'stc_top_nav',
					    array(
					        'title'     => 'Top Navigation',
					        'priority'  => 200
					    )
					);
			    //////////////////////////////////////////////////////

				// Add Advanced Appearance Section
			$wp_customize->add_section(
					    'stc_adv_app',
					    array(
					        'title'     => 'Advanced Appearance',
					        'priority'  => 950
					    )
					);
			    ///////////////////////////////////////////////////////

			// Add Custom Section
			$wp_customize->add_section(
					    'stc_custom_section',
					    array(
					        'title'     => 'Custom Section',
					        'priority'  => 1000
					    )
					);
			    ///////////////////////////////////////////////////////

			// Add Fonts Section
			$wp_customize->add_section(
					    'stc_fonts_section',
					    array(
					        'title'     => 'Fonts',
					        'priority'  => 300
					    )
					);
			    ///////////////////////////////////////////////////////

			// Add Footer Section
			$wp_customize->add_section(
					    'stc_footer_section',
					    array(
					        'title'     => 'Footer',
					        'priority'  => 310
					    )
					);
			    //////////////////////////////////////////////////////

			// Add Sidebar Section
			$wp_customize->add_section(
					    'stc_sidebar_section',
					    array(
					        'title'     => 'Sidebar',
					        'priority'  => 320
					    )
					);
			    ///////////////////////////////////////////////////////////

			// Add Mobile Section
			$wp_customize->add_section(
					    'stc_mobile_section',
					    array(
					        'title'     => 'Mobile',
					        'panel' => 'mobile_panel',
					        'priority'  => 100
					    )
					);
			    ///////////////////////////////////////////////////////////

			// Add Article Section
			$wp_customize->add_section(
					    'stc_article_section',
					    array(
					        'title'     => 'Article',
					        'priority'  => 500
					    )
					);
			    ///////////////////////////////////////////////////////////

    /********************************************************
    -----------------------SETTINGS/CONTROLS-----------------
	********************************************************/
					    
			/***************TYPOGRAPHY START*************/

					    // Add Link Setting
						$wp_customize->add_setting(
							'stc_link_color',
							array(
								'default'     => '#000000',
								'transport'   => 'postMessage'
							)
						);
								// Add Link Color Control
								$wp_customize->add_control(
									new WP_Customize_Color_Control(
										$wp_customize,
										'link_color',
										array(
										    'label'      => __( 'Link Color', 'stc' ),
										    'section'    => 'stc_fonts_section',
										    'settings'   => 'stc_link_color',
										    'priority'  => 400
										)
									)
								);



								// Add Mobile Nav Text Setting
						$wp_customize->add_setting(
							'stc_mobile_nav_text_color',
							array(
								'default'     => '#000000',
								'transport'   => 'postMessage'
							)
						);
								// Add Mobile Nav Text Control
								$wp_customize->add_control(
									new WP_Customize_Color_Control(
										$wp_customize,
										'stc_mobile_nav_text_color',
										array(
										    'label'      => __( 'Navigation Text Color', 'stc' ),
										    'section'    => 'stc_mobile_section',
										    'settings'   => 'stc_mobile_nav_text_color',
										    'priority'  => 400
										)
									)
								);






								// Add Mobile navbar color Setting
						$wp_customize->add_setting(
							'stc_mobile_top_color',
							array(
								'default'     => '#000000',
								'transport'   => 'postMessage'
							)
						);
								// Add Link Color Control
								$wp_customize->add_control(
									new WP_Customize_Color_Control(
										$wp_customize,
										'stc_mobile_top_color',
										array(
										    'label'      => __( 'Mobile Top Color', 'stc' ),
										    'section'    => 'stc_mobile_section',
										    'settings'   => 'stc_mobile_top_color',
										    'priority'  => 100
										)
									)
								);





					    //////////////////////////////////////////////////////


						// Add Paragraph Setting
								$wp_customize->add_setting(
											'stc_paragraphs',
											array(
												'default'     => '#000000',
												'transport'   => 'postMessage'
											)
										);
								// Add Paragraph Color Control
											$wp_customize->add_control(
											new WP_Customize_Color_Control(
												$wp_customize,
												'stc_paragraph_color',
												array(
												    'label'      => __( 'Paragraph Color', 'stc' ),
												    'section'    => 'stc_fonts_section',
												    'settings'   => 'stc_paragraphs',
												    'priority'  => 200
												)
											)
										);
					    ////////////////////////////////////////////////////////

						// Add Heading Setting
														$wp_customize->add_setting(
											'stc_headings',
											array(
												'default'     => '#000000',
												'transport'   => 'postMessage'
											)
										);
								// Add Heading Color Control
												$wp_customize->add_control(
											new WP_Customize_Color_Control( 
												$wp_customize,
												'stc_heading_color',
												array(
												    'label'      => __( 'Heading Color', 'stc' ),
												    'section'    => 'stc_fonts_section',
												    'settings'   => 'stc_headings',
												    'priority'  => 100
												)
											)
										);
					    ////////////////////////////////////////////////////////////

			/***********HEADER****************/

						// Add Top-Bar-top Setting
								$wp_customize->add_setting(
											'hide_top_bar_top',
											array(
												'transport'   => 'postMessage'
											)
										);

								// Add Top-Bar Control			
									$wp_customize->add_control(
									    'hide_top_bar_top',
									    array(
									        'type' => 'checkbox',
									        'label' => 'Show Top-Bar-Top (above navigation,)',// Social, etc can go in this section. Be sure to check back to it at a later point.
									        'section' => 'stc_general',
									        'priority'  => 4900
									    )
									);


						// Add Sidebar Display Setting


						function stc_hide_sidebar( $controls ) {	
								$controls[] = array(
									'type'     => 'checkbox',
									'setting'  => 'stc_hide_sidebar',
									'transport'   => 'postMessage',
									'label'    => __( 'Enable Sidebar', 'stc' ),
									'section'  => 'stc_sidebar_section',
									'default'  => 1,
									'priority' => 1,
								);
						return $controls;
						}
						add_filter( 'kirki/controls', 'stc_hide_sidebar' );


					    ////////////////////////////////////////////////////////////

					    // Add Top-Bar-bottom Setting
								$wp_customize->add_setting(
											'hide_top_bar_bottom',
											array(
												'transport'   => 'postMessage'
											)
										);

								// Add Top-Bar Control			
									$wp_customize->add_control(
									    'hide_top_bar_bottom',
									    array(
									        'type' => 'checkbox',
									        'label' => 'Show Top-Bar-Bottom (below navigation)',
									        'section' => 'stc_general',
									        'priority'  => 5000
									    )
									);
					    ////////////////////////////////////////////////////////////

						// Add Top-Bar-bottom Setting
								$wp_customize->add_setting(
											'hide_logo',
											array(
												'transport'   => 'postMessage'
											)
										);

								// Add Top-Bar Control			
									$wp_customize->add_control(
									    'hide_logo',
									    array(
									        'type' => 'checkbox',
									        'label' => __('Display Logo or Tagline', 'stc'),
									        'section' => 'stc_advanced_header',
									    )
									);
					    ///////////////////////////////////////////////////////////
					    // Toggle Fixed/Sticky Top-Bar
								$wp_customize->add_setting(
											'top-bar-position',
											array(
												'transport'   => 'postMessage',
												'priority'  => 100,
											)
										);

								// Add Top-Bar Position Control			
									$wp_customize->add_control('top-bar-position', array(
					  'label'      => __('Top-Bar Position', 'stc'),
					  'section'    => 'stc_top_nav',
					  'settings'   => 'top-bar-position',
					  'type'       => 'radio',
					  'choices'    => array(
					    'relative'   => 'Normal',
					    'fixed'  => 'Sticky',
					  ),
					));
					    //////////////////////////////////////////////////////////////

						// Toggle Logo Position Top-Bar
								$wp_customize->add_setting(
											'logo-top-bar-position',
											array(
												'transport'   => 'postMessage',
												'priority'  => 200,
											)
										);

								// Add Top-Bar Position Control			
									$wp_customize->add_control('logo-top-bar-position', array(
					  'label'      => __('Logo Position', 'stc'),
					  'section'    => 'stc_top_nav',
					  'settings'   => 'logo-top-bar-position',
					  'type'       => 'radio',
					  'choices'    => array(
					    'left'   => 'Left',
					    'right'  => 'Right',
					  ),
					));
					    ////////////////////////////////////////////////////////

						// Toggle Navigation Position Top-Bar
								$wp_customize->add_setting(
											'navigation-top-bar-position',
											array(
												'transport'   => 'postMessage',
												'priority'  => 300,
											)
										);

								// Add Top-Bar Position Control			
									$wp_customize->add_control('navigation-top-bar-position', array(
					  'label'      => __('Navigation Position', 'stc'),
					  'section'    => 'stc_top_nav',
					  'settings'   => 'navigation-top-bar-position',
					  'type'       => 'radio',
					  'choices'    => array(
					    'left'   => 'Left',
					    'right'  => 'Right',
					  ),
					));
					    ///////////////////////////////////////////////////////

						// Top-Bar Color Setting
											$wp_customize->add_setting(
											'stc_top_bar_color',
											array(
												'default'     => '#000000',
												'transport'   => 'postMessage'
											)
										);
								// Add Top-Bar Color Control
											$wp_customize->add_control(
											new WP_Customize_Color_Control(
												$wp_customize,
												'stc_top_bar_color',
												array(
												    'label'      => __( 'Background Color', 'stc' ),
												    'section'    => 'stc_top_nav',
												    'settings'   => 'stc_top_bar_color',
												    'priority'  => 400
												)
											)
										);
						/////////////////////////////////////////////////////////

						// Top-Bar Hover Color Setting
											$wp_customize->add_setting(
											'stc_top_bar_hover_color',
											array(
												'default'     => '#000000',
												'transport'   => 'postMessage'
											)
										);
								// Add Top-Bar Hover Color Control
											$wp_customize->add_control(
											new WP_Customize_Color_Control(
												$wp_customize,
												'stc_top_bar_hover_color',
												array(
												    'label'      => __( 'Navigation Hover Background Color', 'stc' ),
												    'section'    => 'stc_top_nav',
												    'settings'   => 'stc_top_bar_hover_color',
												    'priority'  => 5000
												)
											)
										);

						///////////////////////////////////////////////////////////


// Top-Bar Menu Color Setting
											$wp_customize->add_setting(
											'stc_top_bar_menu_color',
											array(
												'default'     => '#000000',
												'transport'   => 'postMessage'
											)
										);




						// Upper TopBar Height Setting


						function stc_upper_top_height( $controls ) {
						 
									$controls[] = array(
									'type'     => 'slider',
									'setting'  => 'stc_upper_top_height',
									'transport' => 'postMessage',
									'label'    => __( 'Upper TopBar Height', 'stc' ),
									'section'  => 'stc_advanced_header',
									'default'  => 36,
									'priority' => 1,
									'choices'  => array(
										'min'  => 1,
										'max'  => 100,
										'step' => 1,
									),
								);
						 
							return $controls;
						}
						add_filter( 'kirki/controls', 'stc_upper_top_height' );



						// TopBar Width Setting


						function stc_topbar_width( $controls ) {
						 
									$controls[] = array(
									'type'     => 'slider',
									'setting'  => 'stc_topbar_width',
									'transport' => 'postMessage',
									'label'    => __( 'Topbar Width', 'stc' ),
									'section'  => 'stc_advanced_header',
									'default'  => 100,
									'priority' => 1,
									'choices'  => array(
										'min'  => 1,
										'max'  => 100,
										'step' => 1,
									),
								);
						 
							return $controls;
						}
						add_filter( 'kirki/controls', 'stc_topbar_width' );






						///////////////////////////////////////////////////////////


						// Body Padding Setting (real) Setting

																function stc_body_padding( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_body_padding',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired body padding.',
																			'label'    => __( 'Body Padding', 'stc' ),
																			'section'  => 'stc_general',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 50,
																				'step' => .1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_body_padding' );

						///////////////////////////////////////////////////////////


						function stc_footer_padding_size( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_footer_padding_size',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired footer padding.',
																			'label'    => __( 'Footer Padding', 'stc' ),
																			'section'  => 'stc_advanced_footer',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 50,
																				'step' => .1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_footer_padding_size' );











						// Upper TopBar Color Setting
											$wp_customize->add_setting(
											'stc_upper_top_color',
											array(
												'transport'   => 'postMessage',
												'default'   => '#ededed'

											)
										);
								// Add Upper TopBar Color Control
											$wp_customize->add_control(
					    new WP_Customize_Color_Control(
					        $wp_customize,
					        'stc_upper_top_color',
					        array(
					            'label'          => __( 'Enter your desired color for the upper top bar', 'stc' ),
					            'section'        => 'stc_top_nav',
					            'settings'       => 'stc_upper_top_color',
					            'priority'  => 4900
					        )
					    )
					);
						/////////////////////////////////////////////////
						
						// Add Upper Top Padding Setting																// Add Sidebar Padding Setting



												function stc_upper_top_padding( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_upper_top_padding',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired padding for Upper TopBar.',
																			'label'    => __( 'Upper TopBar Padding', 'stc' ),
																			'section'  => 'stc_advanced_header',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 100,
																				'step' => 1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_upper_top_padding' );


						// Add TopBar Height Setting																// Add Sidebar Padding Setting

								function stc_topbar_height( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_topbar_height',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired height for topbar.',
																			'label'    => __( 'Topbar Height', 'stc' ),
																			'section'  => 'stc_advanced_header',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 500,
																				'step' => 1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_topbar_height' );



					// Add Search-Bar Setting
								$wp_customize->add_setting(
											'hide_search_bar',
											array(
												'transport'   => 'postMessage'
											)
										);

								// Add Search-Bar Control			
									$wp_customize->add_control(
									    'hide_search_bar',
									    array(
									        'type' => 'checkbox',
									        'label' => __('Display Search Bar', 'stc'),
									        'section' => 'stc_advanced_header',
									      	'setting' => 'hide_search_bar',
									    )
									);

					// Add Custom Search Placeholder Setting
						$wp_customize->add_setting(
							'stc_custom_placeholder',
							array(
								'transport'   => 'postMessage'
							)
						);
						$wp_customize->add_control(
					    new WP_Customize_Control(
					        $wp_customize,
					        'stc_custom_placeholder',
					        array(
					            'label'          => __( 'Enter your custom search placeholder here', 'stc' ),
					            'section'        => 'stc_advanced_header',
					            'settings'       => 'stc_custom_placeholder',
					            'type'           => 'textarea',
					        )
					    )
					);
						/////////////////////////////////////////////////////////////////

						// Add Navbar Text Color Setting
						$wp_customize->add_setting(
							'stc_navbar_text_color',
							array(
								'default'     => '#000000',
								'transport'   => 'postMessage'
							)
						);
								// Add Navbar Text Color Control
								$wp_customize->add_control(
									new WP_Customize_Color_Control(
										$wp_customize,
										'stc_navbar_text_color',
										array(
										    'label'      => __( 'Navbar Text Color', 'stc' ),
										    'section'    => 'stc_top_nav',
										    'settings'   => 'stc_navbar_text_color',
										    'priority'	 => 4950
										)
									)
								);
						/////////////////////////////////////////////////////////////////////

						// Add Navbar Text Size Setting
						$wp_customize->add_setting(
							'stc_navbar_text_size',
							array(
								'transport'   => 'postMessage'
							)
						);
								$wp_customize->add_control(
					    new WP_Customize_Control(
					        $wp_customize,
					        'stc_navbar_text_size',
					        array(
					            'label'          => __( 'Navbar Text Size', 'stc' ),
					            'section'        => 'stc_fonts_section',
					            'settings'       => 'stc_navbar_text_size',
					            'type'           => 'number','%'
					        )
					    )
					);
						/////////////////////////////////////////////////////

			/*************************************************************
			------------------------BACKGROUND----------------------------
			*************************************************************/

					    ///////////////////////////////////////////////////////////

						// Background Image Setting

							function stc_background( $controls ) {
												$controls[] = array(
								'type'         => 'background',
								'transport'    => 'postMessage',
								'setting'      => 'stc_background',
								'label'        => __( 'Background Color', 'stc' ),
								'description'  =>   __( 'Background Color', 'stc' ),
								'section'      => 'stc_general',
								'default'      => array(
									'color'    => '#ffffff',
									'image'    => null,
									'repeat'   => 'repeat',
									'size'     => 'inherit',
									'attach'   => 'inherit',
									'position' => 'left-top',
									'transport'    => 'postMessage',
								),
								'priority' => 3,
								'transport'    => 'postMessage',
							);
								return $controls;
							}
							add_filter( 'kirki/controls', 'stc_background' );



					    //////////////////////////////////////////////////////////

			/*********************************************************************
			-----------------------------SIDEBAR----------------------------------
			*********************************************************************/

						// Add Sidebar Padding Setting																// Add Sidebar Padding Setting
						$wp_customize->add_setting(
							'stc_sidebar_padding',
							array(
								'transport'   => 'postMessage'
							)
						);

								// Add Sidebar Float Setting																// Add Sidebar Padding Setting
						$wp_customize->add_setting(
							'stc_sidebar_float',
							array(
								'transport'   => 'postMessage'
							)
						);
								$wp_customize->add_control('stc_sidebar_float', array(
					  'label'      => __('Sidebar Position', 'stc'),
					  'section'    => 'stc_sidebar_section',
					  'settings'   => 'stc_sidebar_float',
					  'type'       => 'radio',
					  'choices'    => array(
					    'left'   => 'Left',
					    'right'  => 'Right',
					  ),
					));

					// Add Sidebar Color Setting
						$wp_customize->add_setting(
							'stc_sidebar_color',
							array(
								'default'     => '#ffffff',
								'transport'   => 'postMessage'
							)
						);
								// Add Sidebar Color Control
								$wp_customize->add_control(
									new WP_Customize_Color_Control(
										$wp_customize,
										'stc_sidebar_color',
										array(
										    'label'      => __( 'Background Color', 'stc' ),
										    'section'    => 'stc_sidebar_section',
										    'settings'   => 'stc_sidebar_color'
										)
									)
								);


				function footer_background_color( $controls ) {

						$controls[] = array(
							'type'     => 'color',
							'setting'  => 'footer_background_color',
							'label'    => __( 'Background Color', 'stc' ),
							'section'  => 'stc_advanced_footer',
							'default'  => '#1abc9c',
							'priority' => 1,
						);

					return $controls;
				}
				add_filter( 'kirki/controls', 'footer_background_color' );

					// Add Article Background Color Setting
						$wp_customize->add_setting(
							'stc_article_background_color',
							array(
								'default'     => '#ffffff',
								'transport'   => 'postMessage'
							)
						);
								// Add Article Background Color Control
								$wp_customize->add_control(
									new WP_Customize_Color_Control(
										$wp_customize,
										'stc_article_background_color',
										array(
										    'label'      => __( 'Background Color', 'stc' ),
										    'section'    => 'stc_article_section',
										    'settings'   => 'stc_article_background_color'
										)
									)
								);








						// Add Border Color Setting
						$wp_customize->add_setting(
							'stc_sidebar_border_color',
							array(
								'transport'   => 'postMessage'
							)
						);
								// Add Sidebar Border Color Control
								$wp_customize->add_control(
									new WP_Customize_Color_Control(
										$wp_customize,
										'stc_sidebar_border_color',
										array(
										    'label'      => __( 'Border Color', 'stc' ),
										    'section'    => 'stc_sidebar_section',
										    'settings'   => 'stc_sidebar_border_color'
										)
									)
								);

					// Add Sidebar Border Size Setting

							function stc_sidebar_border_size( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_sidebar_border_size',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired border size for the sidebar.',
																			'label'    => __( 'Sidebar Border Size', 'stc' ),
																			'section'  => 'stc_sidebar_section',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 15,
																				'step' => .1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_sidebar_border_size' );





					function stc_footer_border_size( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_footer_border_size',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired border size for the footer.',
																			'label'    => __( 'Footer Border Size', 'stc' ),
																			'section'  => 'stc_advanced_footer',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 15,
																				'step' => .1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_footer_border_size' );










						/////////////////////////////////////////////////

						// Add Sidebar Padding Setting

							function stc_sidebar_padding_size( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_sidebar_padding_size',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired padding for the sidebar.',
																			'label'    => __( 'Sidebar Padding', 'stc' ),
																			'section'  => 'stc_advanced_sidebar',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 30,
																				'step' => .1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_sidebar_padding_size' );






					// Add Sidebar Widget Margin Setting

							function stc_sidebar_widget_margin( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_sidebar_widget_margin',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired margin for the sidebar widgets.',
																			'label'    => __( 'Sidebar Widget Margin', 'stc' ),
																			'section'  => 'stc_advanced_sidebar',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 100,
																				'step' => 1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_sidebar_widget_margin' );





					// Add Sidebar Width Setting
								function stc_sidebar_width( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_sidebar_width',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired width for the sidebar.',
																			'label'    => __( 'Sidebar Width', 'stc' ),
																			'section'  => 'stc_general',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 100,
																				'step' => 1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_sidebar_width' );




						/////////////////////////////////////////////////////////////


					// Add Footer Width Setting
								function stc_footer_width( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_footer_width',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired width for the footer.',
																			'label'    => __( 'Footer Width', 'stc' ),
																			'section'  => 'stc_footer_section',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 100,
																				'step' => 1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_footer_width' );








						// Add Sidebar Text-Align Setting
						$wp_customize->add_setting(
							'stc_sidebar_text_align',
							array(
								'transport'   => 'postMessage'
							)
						);
								$wp_customize->add_control(
					    new WP_Customize_Control(
					        $wp_customize,
					        'stc_sidebar_text_align',
					        array(
					            'label'          => __( 'Enter your desired text alignment for the sidebar', 'stc' ),
					            'section'        => 'stc_advanced_sidebar',
					            'settings'       => 'stc_sidebar_text_align',
					            'type'       => 'radio',
								  'choices'    => array(
								    'left'   => 'left',
								    'center'  => 'center',
								    'right'  => 'right',
								  ),
					        )
					    )
					);
////////////////////////////////////////////////////////////////

			/*************************************************************************
			---------------------------------FOOTER-----------------------------------
			*************************************************************************/

						// Add Footer Color Setting
						$wp_customize->add_setting(
							'stc_footer_color',
							array(
								'default'     => '#000000',
								'transport'   => 'postMessage'
							)
						);
								// Add Footer Color Control
								$wp_customize->add_control(
									new WP_Customize_Color_Control(
										$wp_customize,
										'stc_footer_color',
										array(
										    'label'      => __( 'Background Color', 'stc' ),
										    'section'    => 'stc_footer_section',
										    'settings'   => 'stc_footer_color'
										)
									)
								);





						////////////////////////////////////////////////////////////////////

						// Add Footer Border Color Setting
						$wp_customize->add_setting(
							'stc_footer_border_color',
							array(
								'transport'   => 'postMessage'
							)
						);
								// Add Footer Border Color Control
								$wp_customize->add_control(
									new WP_Customize_Color_Control(
										$wp_customize,
										'stc_footer_border_color',
										array(
										    'label'      => __( 'Footer Border Color', 'stc' ),
										    'section'    => 'stc_footer_section',
										    'settings'   => 'stc_footer_border_color'
										)
									)
								);
						////////////////////////////////////////////////////////////////

						// Add Footer Font Color Setting
								$wp_customize->add_setting(
											'stc_footer_font_color',
											array(
												'default'     => '#000000',
												'transport'   => 'postMessage'
											)
										);
								// Add Footer Font Color Control
											$wp_customize->add_control(
											new WP_Customize_Color_Control(
												$wp_customize,
												'stc_footer_font_color',
												array(
												    'label'      => __( 'Text Color', 'stc' ),
												    'section'    => 'stc_footer_section',
												    'settings'   => 'stc_footer_font_color'
												)
											)
										);
						///////////////////////////////////////////////////////////////////

							// Add Body Margin Settings
						$wp_customize->add_setting(
							'stc_body_margin_top',
							array(
								'transport'   => 'postMessage',
								'input_attrs' => array(
        							'class' => 'testing',
    							),
							)
						);
								$wp_customize->add_control(
					    new WP_Customize_Control(
					        $wp_customize,
					        'stc_body_margin_top',
					        array(
					            'label'          => __( '', 'stc' ),
					            'section'        => 'stc_advanced_body',
					            'settings'       => 'stc_body_margin_top',
					            'type'           => 'number',
					        )
					    )
					);



				// Add Body Margin Settings
						$wp_customize->add_setting(
							'stc_body_margin_bottom',
							array(
								'transport'   => 'postMessage'
							)
						);
								$wp_customize->add_control(
					    new WP_Customize_Control(
					        $wp_customize,
					        'stc_body_margin_bottom',
					        array(
					            'label'          => __( '', 'stc' ),
					            'section'        => 'stc_advanced_body',
					            'settings'       => 'stc_body_margin_bottom',
					            'type'           => 'number',
					            'input_attrs' => array(
        							'class' => 'testing',
    							),
					        )
					    )
					);
						//////////////////////////////////////////////////////////////

			/******************************************************************************
			------------------------------------CUSTOM CSS---------------------------------
			******************************************************************************/

					    ///////////////////////////////////////////////////////

			/**************************************************************************
			---------------------------------CUSTOM JS---------------------------------
			**************************************************************************/

						// Add Custom JS Setting
						$wp_customize->add_setting(
							'stc_custom_js',
							array(
								'transport'   => 'postMessage'
							)
						);
						$wp_customize->add_control(
					    new WP_Customize_Control(
					        $wp_customize,
					        'stc_custom_js',
					        array(
					            'label'          => __( 'Enter your custom JavaScript here', 'stc' ),
					            'section'        => 'stc_custom_section',
					            'settings'       => 'stc_custom_js',
					            'type'           => 'textarea',
					        )
					    )
					);
					    ///////////////////////////////////////////////////////////


			/**********************************************************************************
			---------------------------------------Article----------------------------------------
			**********************************************************************************/


// Add Article Padding Setting

							function stc_article_padding_size( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_article_padding_size',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired padding for the article section.',
																			'label'    => __( 'Article Padding', 'stc' ),
																			'section'  => 'stc_advanced_article',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 30,
																				'step' => .1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_article_padding_size' );





////////////////////////////////////////////////////////////////
	// Add Article Text-Align Setting
						$wp_customize->add_setting(
							'stc_article_text_align',
							array(
								'transport'   => 'postMessage'
							)
						);
								$wp_customize->add_control(
					    new WP_Customize_Control(
					        $wp_customize,
					        'stc_article_text_align',
					        array(
					            'label'          => __( 'Enter your desired text alignment for the Article', 'stc' ),
					            'section'        => 'stc_advanced_article',
					            'settings'       => 'stc_article_text_align',
					            'type'       => 'radio',
								  'choices'    => array(
								    'left'   => 'left',
								    'center'  => 'center',
								    'right'  => 'right',
								  ),
					        )
					    )
					);
////////////////////////////////////////////////////////////////
						// Add Article Border Size Setting

							function stc_article_border_size( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_article_border_size',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired border size.',
																			'label'    => __( 'Border Size', 'stc' ),
																			'section'  => 'stc_article_section',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 15,
																				'step' => .1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_article_border_size' );




						//////////////////////////////////////////////////

						// Add Main Border Color Setting
						$wp_customize->add_setting(
							'stc_article_border_color',
							array(
								'transport'   => 'postMessage'
							)
						);
								// Add Main Border Color Control
								$wp_customize->add_control(
									new WP_Customize_Color_Control(
										$wp_customize,
										'stc_article_border_color',
										array(
										    'label'      => __( 'Article (main) Border Color', 'stc' ),
										    'section'    => 'stc_article_section',
										    'settings'   => 'stc_article_border_color'
										)
									)
								);







						// Add Mobile Site Name Color Setting
						$wp_customize->add_setting(
							'stc_mobile_site_name_color',
							array(
								'transport'   => 'postMessage'
							)
						);
								// Add Mobile Site Name Color Control
								$wp_customize->add_control(
									new WP_Customize_Color_Control(
										$wp_customize,
										'stc_mobile_site_name_color',
										array(
										    'label'      => __( 'Mobile Site Name Color', 'stc' ),
										    'section'    => 'stc_mobile_section',
										    'settings'   => 'stc_mobile_site_name_color'
										)
									)
								);
                        //////////////////////////////////////////////////////////

						// Add Main Width Setting

								function stc_article_width( $controls ) {
																 
																			$controls[] = array(
																			'type'     => 'slider',
																			'setting'  => 'stc_article_width',
																			'transport' => 'postMessage',
																			'description' => 'Choose your desired width for the article section.',
																			'label'    => __( 'Article Width', 'stc' ),
																			'section'  => 'stc_general',
																			'default'  => 0,
																			'priority' => 1,
																			'choices'  => array(
																				'min'  => 0,
																				'max'  => 100,
																				'step' => 1,
																			),
																		);
																 
																	return $controls;
																}
																add_filter( 'kirki/controls', 'stc_article_width' );




								// Add Main Width Setting
						$wp_customize->add_setting(
							'stc_article_positioning',
							array(
								'transport'   => 'postMessage'
							)
						);



  // Add Custom CSS Textfield
  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','stc'), 
    'priority'   => 2000    
  ) );  
  $wp_customize->add_setting(
      'wpt_custom_css',
      array(          
          'sanitize_callback' => 'sanitize_textarea',     
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_css',
            array(
                'label'          => __( 'Add custom CSS here', 'stc' ),
                'section'        => 'custom_css_field',
                'settings'       => 'wpt_custom_css',
                'type'           => 'textarea'
            )
        )
   );


//Logo Setting
  function stc_logo_image( $controls ) {
$controls[] = array(
	'type'     => 'image',
	'setting'  => 'stc_logo_image',
	'label'    => __( 'Upload Logo test', 'stc' ),
	'section'  => 'stc_general',
	'default'  => '',
	'priority' => 1,
);

		return $controls;
	}
add_filter( 'kirki/controls', 'stc_logo_image' );



  function stc_social_links( $controls ) {
$controls[] = array(
	'type'     => 'multicheck',
	'setting'  => 'stc_social_links',
	'label'    => __( 'Choose Social Links', 'stc' ),
	'section'  => 'stc_advanced_header',
	'default'  => '',
	'priority' => 1,
	'choices'  => array(
		'option_1' => __( 'Facebook', 'stc' ),
		'option_2' => __( 'Twitter', 'stc' ),
		'option_3' => __( 'LinkedIn', 'stc' ),
		'option_4' => __( 'Email', 'stc' ),
		'option_4' => __( 'Pinterest', 'stc' ),
		'option_4' => __( 'Reddit', 'stc' ),
		'option_4' => __( 'Tumblr', 'stc' ),
		'option_4' => __( 'Google+', 'stc' ),
	),
);

		return $controls;
	}
add_filter( 'kirki/controls', 'stc_social_links' );






						///////////////////////////////////////////////////////////////
} 

/************************************************************
----------------end stc_register_theme_customizer------------
************************************************************/

add_action( 'customize_register', 'stc_register_theme_customizer' );
function stc_customizer_css() {
?>

<!--  STYLING TO SAVE TO SITE FROM WORDPRESS CUSTOMIZER (PREVIOUSLY THEME CUSTOMIZER)  -->
	 <style type="text/css">
	  /* custom css call */
	  <?php if( get_theme_mod('wpt_custom_css') != '' ) {
    		echo get_theme_mod('wpt_custom_css');  			
    		} ?>
	     a { color: <?php echo get_theme_mod( 'stc_link_color' ) ?>; }
	     #logo {
	     	
	     }
	     .top_bar_top { padding: <?php echo get_theme_mod( 'stc_upper_top_padding' ), '%'; ?>; }
	     .top-bar { height: <?php echo get_theme_mod( 'stc_topbar_height' ), 'px'; ?>; }
	     .top_bar_top { background-color: <?php echo get_theme_mod( 'stc_upper_top_color' ) ?>; }
	     #main { background-color: <?php echo get_theme_mod( 'stc_article_background_color' ) ?>; }
	     body { background-color: <?php echo get_theme_mod( 'stc_background_color' ) ?>; }
	     .top-bar>ul>li>a { background-color: <?php echo get_theme_mod( 'stc_top_bar_menu_color' ), '!important'; ?>; }
	     .top_bar_top { height: <?php echo get_theme_mod( 'stc_upper_top_height' ), 'px'; ?>; }
	     .top-bar-section ul li>a { color: <?php echo get_theme_mod( 'stc_navbar_text_color' ) ?>; font-size: <?php echo get_theme_mod( 'stc_navbar_text_size' ), 'rem'; ?>; }
	     .foot-out-wrap { padding: <?php echo get_theme_mod( 'stc_footer_padding_size' ), '%'; ?>; }
	     .sidebar { padding: <?php echo get_theme_mod( 'stc_sidebar_padding' ), '%'; ?>; }
	     .nav-bar-out-wrapper { background-color: <?php echo get_theme_mod( 'stc_top_bar_color' ), '!important'; ?>; }
	     .foot-copyright>p, .sub-nav li a, .footer-column>.alert>* { color: <?php echo get_theme_mod( 'stc_footer_font_color' ); ?>; }
	     .top-bar-section li:not(.has-form) a:not(.button):hover { background-color: <?php echo get_theme_mod( 'stc_top_bar_hover_color' ), '!important'; ?>; }
	     p { color: <?php echo get_theme_mod( 'stc_paragraphs' ); ?>; }
	     .inner-wrap { width: <?php echo get_theme_mod( 'stc_topbar_width' ), '%';?>; }
	     #main { width: <?php echo get_theme_mod( 'stc_article_width' ), '%';?>; }
	     #main { text-align: <?php echo get_theme_mod( 'stc_article_text_align' ); ?>; }
	     #sidebar1 { text-align: <?php echo get_theme_mod( 'stc_sidebar_text_align' ); ?>; }
	     #sidebar1 { width: <?php echo get_theme_mod( 'stc_sidebar_width' ), '%';?>; }
	     #sidebar1 { float: <?php echo get_theme_mod( 'stc_sidebar_float' ); ?>; }
	     #footer { width: <?php echo get_theme_mod( 'stc_footer_width' ), '%';?>; }
	     #main { float: <?php echo get_theme_mod( 'stc_article_positioning' ); ?>; }
	     .foot-out-wrap { background-color: <?php echo get_theme_mod( 'stc_footer_color' ); ?>; }
	     @media only screen and (max-width: 59.374em) {.top-bar .title-area { background-color: <?php echo get_theme_mod( 'stc_mobile_top_color' ); ?>; }}
	     .sidebar { background-color: <?php echo get_theme_mod( 'stc_sidebar_color' ); ?> }
	     .sidebar { padding: <?php echo get_theme_mod( 'stc_sidebar_padding_size' ), '%'; ?> }
	     #inner-content { padding: <?php echo get_theme_mod( 'stc_body_padding' ), '%'; ?> }
	     .widget { margin-bottom: <?php echo get_theme_mod( 'stc_sidebar_widget_margin' ), 'px', '!important'; ?> }
	     .sidebar { border: <?php echo get_theme_mod( 'stc_sidebar_border_size' ), 'px', ' solid', get_theme_mod( 'stc_sidebar_border_color' ); ?>; }
	     #main { border: <?php echo get_theme_mod( 'stc_article_border_size' ), 'px', ' solid', get_theme_mod( 'stc_article_border_color' ); ?>; }
	     #main { padding: <?php echo get_theme_mod( 'stc_article_padding_size' ), '%'; ?> ; }
	     .foot-out-wrap { border: <?php echo get_theme_mod( 'stc_footer_border_size' ), 'px', ' solid', get_theme_mod( 'stc_footer_border_color' ); ?>; }
	     h1,h2,h3,h4,h5,h6 { color: <?php echo get_theme_mod( 'stc_headings' ); ?>; }
	     @media only screen and (max-width: 59.374em) {.top-bar.top-bar>ul>li>a { color: <?php echo get_theme_mod( 'stc_mobile_nav_text_color' ); ?>; }}
	     @media only screen and (max-width: 59.374em) {.top-bar .name h1 a { color: <?php echo get_theme_mod( 'stc_mobile_site_name_color' ); ?>; }}
	     #content { background-repeat: <?php echo get_theme_mod( 'stc_background_repeat' ), '!important'; ?> }
	     #content { background-attachment: <?php echo get_theme_mod( 'stc_background_attach' ), '!important'; ?> }
	     #content { opacity: <?php echo get_theme_mod( 'stc_background_opacity' ), '!important'; ?> }
	     #content { background-position: <?php echo get_theme_mod( 'stc_background_position' ), '!important'; ?> }
	     #content { background-size: <?php echo get_theme_mod( 'stc_background_size' ), '!important'; ?> }
	     #content { background: url("<?php echo get_theme_mod( 'stc_background_image' ), '")'; ?> }'
		 <?php if( false === get_theme_mod( 'hide_top_bar_top' ) ) { ?>
		 .top_bar_top { display: none; }
		 <?php } // end if ?>
		 <?php if( false === get_theme_mod( 'hide_search_bar' ) ) { ?>
		 .top-search { display: none; }
		 .search-button { display: none; }
		 <?php } // end if ?>
		 <?php if( false === get_theme_mod( 'hide_top_bar_bottom' ) ) { ?>
		    .top_bar_bottom { display: none; }
		 <?php } // end if ?>
		 <?php if( false === get_theme_mod( 'stc_hide_sidebar' ) ) { ?>
		    #sidebar1 { display: none; }
		 <?php } // end if ?>
		 .header {position: <?php echo get_theme_mod( 'top-bar-position' ); ?>;}
		 .title-area {float: <?php echo get_theme_mod( 'logo-top-bar-position' ); ?>;}
		 .top-bar-section {float: <?php echo get_theme_mod( 'navigation-top-bar-position' ); ?>;}
	 </style>
<!--  END STYLING  -->
<?php
}
add_action( 'wp_head', 'stc_customizer_css' );
/**
 * Registers the Customizer Preview with WordPress.
 *
 * @package    stc
 * @since      0.3.0
 * @version    0.3.0
 */
//adding scripts file in the footer
//Add svg support
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
//Social Media Widget
class Designmodo_Social_Profile extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'Designmodo_Social_Profile',
                __('Social Networks Profiles', 'translation_domain'), // Name
                array('description' => __('Links to Author social media profile', 'translation_domain'),)
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {

        $title = apply_filters('widget_title', $instance['title']);
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $google = $instance['google'];
        $linkedin = $instance['linkedin'];

        // social profile link
        $facebook_profile = '<a class="social-icons-widget" href="' . $facebook . '"><svg version="1.1" class="social-widget" id="facebook-rounded" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<path d="M50,1.125C23.007,1.125,1.125,23.007,1.125,50S23.007,98.875,50,98.875S98.875,76.993,98.875,50S76.993,1.125,50,1.125z
	 M68.646,26.015l-6.76,0.003c-5.3,0-6.326,2.519-6.326,6.215v8.15h12.641l-0.005,12.766H55.561v32.757H42.376V53.148H31.354V40.383
	h11.022v-9.414c0-10.925,6.675-16.875,16.42-16.875l9.851,0.015V26.015z"/>
</svg>
</a>';
        $twitter_profile = '<a class="social-icons-widget" href="' . $twitter . '"><svg version="1.1" class="social-widget" id="twitter-rounded" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<path d="M50,1.125C23.007,1.125,1.125,23.007,1.125,50S23.007,98.875,50,98.875S98.875,76.993,98.875,50S76.993,1.125,50,1.125z
	 M79.555,36.966c0.023,0.577,0.035,1.155,0.035,1.736c0,20.878-15.887,42.473-42.473,42.473c-8.127,0-16.04-2.319-22.883-6.708
	c-0.143-0.091-0.202-0.268-0.145-0.427c0.057-0.158,0.218-0.256,0.383-0.237c1.148,0.136,2.322,0.205,3.487,0.205
	c6.323,0,12.309-1.955,17.372-5.664c-6.069-0.512-11.285-4.62-13.161-10.478c-0.039-0.122-0.011-0.254,0.073-0.35
	c0.085-0.096,0.215-0.138,0.339-0.116c1.682,0.32,3.392,0.34,5.04,0.073c-6.259-1.946-10.658-7.808-10.658-14.484l0.002-0.194
	c0.003-0.127,0.072-0.243,0.182-0.306c0.109-0.064,0.245-0.065,0.355-0.003c1.632,0.906,3.438,1.488,5.291,1.711
	c-3.597-2.867-5.709-7.213-5.709-11.862c0-2.682,0.71-5.318,2.054-7.623c0.06-0.103,0.166-0.169,0.284-0.178
	c0.119-0.012,0.234,0.04,0.309,0.132c7.362,9.03,18.191,14.59,29.771,15.305c-0.193-0.972-0.291-1.974-0.291-2.985
	c0-8.361,6.802-15.162,15.162-15.162c4.111,0,8.082,1.689,10.929,4.641c3.209-0.654,6.266-1.834,9.089-3.508
	c0.129-0.077,0.292-0.065,0.41,0.028c0.117,0.094,0.165,0.25,0.119,0.394c-0.957,2.993-2.824,5.604-5.33,7.489
	c2.361-0.411,4.652-1.105,6.831-2.072c0.147-0.067,0.319-0.025,0.424,0.098c0.104,0.124,0.113,0.301,0.023,0.435
	C84.884,32.3,82.424,34.869,79.555,36.966z"/>
</svg></a>';
        $google_profile = '<a class="social-icons-widget" href="' . $google . '"><svg version="1.1" class="social-widget" id="google-plus-rounded" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<g>
	<path d="M51.854,34.795c0-6.775-4.039-17.311-11.826-17.311c-2.448,0-5.071,1.222-6.577,3.105
		c-1.598,1.979-2.062,4.511-2.062,6.965c0,6.3,3.658,16.741,11.736,16.741c2.345,0,4.872-1.123,6.382-2.63
		C51.666,39.494,51.854,36.49,51.854,34.795z"/>
	<path d="M46.782,59.539c-0.748-0.094-1.218-0.094-2.156-0.094c-0.847,0-5.918,0.185-9.859,1.511
		c-2.064,0.748-8.071,3.008-8.071,9.687c0,6.681,6.478,11.485,16.522,11.485c9.014,0,13.803-4.338,13.803-10.163
		C57.021,67.153,53.923,64.621,46.782,59.539z"/>
	<path d="M50,1.125C23.007,1.125,1.125,23.007,1.125,50S23.007,98.875,50,98.875S98.875,76.993,98.875,50S76.993,1.125,50,1.125z
		 M38.614,86.07c-13.616,0-20.184-6.488-20.184-13.455c0-3.385,1.687-8.18,7.227-11.475c5.818-3.575,13.709-4.043,17.936-4.334
		c-1.319-1.692-2.816-3.479-2.816-6.394c0-1.597,0.47-2.539,0.934-3.669c-1.034,0.096-2.062,0.188-3.002,0.188
		c-9.948,0-15.581-7.438-15.581-14.775c0-4.322,1.969-9.124,6.005-12.605c5.354-4.422,12.67-5.622,17.744-5.622h18.498l-6.105,3.836
		h-5.817c2.158,1.786,6.659,5.549,6.659,12.703c0,6.957-3.938,10.259-7.879,13.36c-1.223,1.221-2.633,2.538-2.633,4.611
		c0,2.065,1.41,3.193,2.44,4.047l3.383,2.628c4.132,3.48,7.887,6.679,7.886,13.177C63.308,77.137,54.76,86.07,38.614,86.07z
		 M79.13,48.85v9.465h-4.645V48.85h-9.393v-4.697h9.393v-9.406h4.645v9.406h9.439v4.697H79.13z"/>
</g>
</svg>
</a>';
        $linkedin_profile = '<a class="linkedin" href="' . $linkedin . '"><svg version="1.1" class="social-widget" id="linkedin-rounded" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="100px" height="100px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
<path d="M50,1.125C23.007,1.125,1.125,23.007,1.125,50S23.007,98.875,50,98.875S98.875,76.993,98.875,50S76.993,1.125,50,1.125z
	 M31.687,83.091h-13.74V38.883h13.74V83.091z M24.82,32.84c-4.404,0-7.969-3.57-7.969-7.968c0.001-4.394,3.565-7.964,7.969-7.964
	c4.392,0,7.962,3.57,7.962,7.964C32.782,29.271,29.211,32.84,24.82,32.84z M83.149,83.091h-13.73V61.592
	c0-5.127-0.095-11.721-7.141-11.721c-7.147,0-8.246,5.584-8.246,11.35v21.869H40.304V38.883h13.179v6.041h0.184
	c1.835-3.476,6.316-7.14,13-7.14c13.913,0,16.482,9.156,16.482,21.059V83.091z"/>
</svg></a>';

        echo $args['before_widget'];

        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<div class="social-icons">';
        echo (!empty($facebook) ) ? $facebook_profile : null;
        echo (!empty($twitter) ) ? $twitter_profile : null;
        echo (!empty($google) ) ? $google_profile : null;
        echo (!empty($linkedin) ) ? $linkedin_profile : null;
        echo '</div>';

        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        isset($instance['title']) ? $title = $instance['title'] : null;
        empty($instance['title']) ? $title = 'My Social Profiles' : null;

        isset($instance['facebook']) ? $facebook = $instance['facebook'] : null;
        isset($instance['twitter']) ? $twitter = $instance['twitter'] : null;
        isset($instance['google']) ? $google = $instance['google'] : null;
        isset($instance['linkedin']) ? $linkedin = $instance['linkedin'] : null;
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google+:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>">
        </p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['facebook'] = (!empty($new_instance['facebook']) ) ? strip_tags($new_instance['facebook']) : '';
        $instance['twitter'] = (!empty($new_instance['twitter']) ) ? strip_tags($new_instance['twitter']) : '';
        $instance['google'] = (!empty($new_instance['google']) ) ? strip_tags($new_instance['google']) : '';
        $instance['linkedin'] = (!empty($new_instance['linkedin']) ) ? strip_tags($new_instance['linkedin']) : '';

        return $instance;
    }

}

// register social widget
function register_designmodo_social_profile() {
    register_widget('Designmodo_Social_Profile');
}

add_action('widgets_init', 'register_designmodo_social_profile');

// enqueue css stylesheet
function designmodo_social_profile_widget_css() {
    wp_enqueue_style( 'kirki-files', get_template_directory_uri().'/library/css/social-media-widget1.css' );
}

add_action('wp_enqueue_scripts', 'designmodo_social_profile_widget_css');



?>