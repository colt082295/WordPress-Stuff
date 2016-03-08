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
								// Add Top-Bar Menu Color Control
											$wp_customize->add_control(
											new WP_Customize_Color_Control(
												$wp_customize,
												'stc_top_bar_menu_color',
												array(
												    'label'      => __( 'Navigation Menu Background Color', 'stc' ),
												    'section'    => 'stc_top_nav',
												    'settings'   => 'stc_top_bar_menu_color',
												    'priority'  => 1000
												)
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
	     #inner-header>.large-12>.contain-to-grid,.top-bar,.top-bar-section li:not(.has-form) a:not(.button) { background: <?php echo get_theme_mod( 'stc_top_bar_color' ); ?>; }
	     .foot-copyright>p, .sub-nav li a, .footer-column>.alert>* { color: <?php echo get_theme_mod( 'stc_footer_font_color' ); ?>; }
	     .top-bar-section li:not(.has-form) a:not(.button):hover { background-color: <?php echo get_theme_mod( 'stc_top_bar_hover_color' ), '!important'; ?>; }
	     p { color: <?php echo get_theme_mod( 'stc_paragraphs' ); ?>; }
	     .inner-wrap { width: <?php echo get_theme_mod( 'stc_topbar_width' ), '%';?>; }
	     #main { width: <?php echo get_theme_mod( 'stc_article_width' ), '%';?>; }
	     #main { text-align: <?php echo get_theme_mod( 'stc_article_text_align' ); ?>; }
	     #sidebar1 { text-align: <?php echo get_theme_mod( 'stc_sidebar_text_align' ); ?>; }
	     #sidebar1 { width: <?php echo get_theme_mod( 'stc_sidebar_width' ), '%';?>; }
	     #sidebar1 { float: <?php echo get_theme_mod( 'stc_sidebar_float' ); ?>; }
	     footer { width: <?php echo get_theme_mod( 'stc_footer_width' ), '%';?>; }
	     #main { float: <?php echo get_theme_mod( 'stc_article_positioning' ); ?>; }
	     .foot-out-wrap { background-color: <?php echo get_theme_mod( 'stc_footer_color' ); ?>; }
	     @media only screen and (max-width: 59.374em) {.top-bar .title-area { background-color: <?php echo get_theme_mod( 'stc_mobile_top_color' ); ?>; }}
	     .sidebar { background-color: <?php echo get_theme_mod( 'stc_sidebar_color' ); ?> }
	     .sidebar { padding: <?php echo get_theme_mod( 'stc_sidebar_padding_size' ), '%'; ?> }
	     #content { padding: <?php echo get_theme_mod( 'stc_body_padding' ), '%'; ?> }
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
		 <?php if( false === get_theme_mod( 'hide_logo' ) ) { ?>
		    .name { display: none; }
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
function stc_customizer_live_preview() {
	wp_enqueue_script(
		'stc-theme-customizer',
		get_template_directory_uri() . '/library/js/theme-customizer.js',
		array( 'jquery', 'customize-preview' ),
		'0.3.0',
		true
	);
} // end stc_customizer_live_preview