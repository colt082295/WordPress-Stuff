// Change topbar height
(function( $ ) {
	"use strict";
	wp.customize( 'stc_topbar_height', function( value ) {
		value.bind( function( to ) {
			$( '#inner-content' ).css( 'height', to + 'px' +'!important' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Footer Font Colors
	wp.customize( 'stc_footer_font_color', function( value ) {
		value.bind( function( to ) {
			$( '.foot-copyright>p, .sub-nav li a, .footer-column>.alert>*' ).css( 'color', to );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Footer Width
	wp.customize( 'stc_footer_width', function( value ) {
		value.bind( function( to ) {
			$( '#footer' ).css( 'width', to + '%' + '!important' );
		} );
	});
})( jQuery );
// End Footer Font Colors
(function( $ ) {
	"use strict";
// Change Link Colors
	wp.customize( 'stc_link_color', function( value ) {
		value.bind( function( to ) {
			$( 'a' ).css( 'color', to );
		} );
	});
// End Change Colors
})( jQuery );
(function( $ ) {
	"use strict";
// Change Navbar Text Color
	wp.customize( 'stc_navbar_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.top-bar-section ul li>a' ).css( 'color', to );
		} );
	});
// End Change Colors
})( jQuery );
(function( $ ) {
	"use strict";
// Change Mobile Site Name Text Color
	wp.customize( 'stc_mobile_site_name_color', function( value ) {
		value.bind( function( to ) {
			$( '.top-bar .name h1 a' ).css( 'color', to );
		} );
	});
// End Change Colors
})( jQuery );
(function( $ ) {
	"use strict";
// Change Mobile Nav Text Color
	wp.customize( 'stc_mobile_nav_text_color', function( value ) {
		value.bind( function( to ) {
			$( '.top-bar.top-bar>ul>li>a' ).css( 'color', to );
		} );
	});
// End Change Colors
})( jQuery );
(function( $ ) {
	"use strict";
// Change Paragraph Colors
	wp.customize( 'stc_paragraphs', function( value ) {
		value.bind( function( to ) {
			$( 'p' ).css( 'color', to );
		} );
	});
// End Change Colors
})( jQuery );
(function( $ ) {
	"use strict";
// Change article Text-Align Colors
	wp.customize( 'stc_article_text_align', function( value ) {
		value.bind( function( to ) {
			$( '#main' ).css( 'text-align', to );
		} );
	});
// End text align
})( jQuery );
(function( $ ) {
	"use strict";
// Social icons
	wp.customize( 'stc_social_links', function( value ) {
		value.bind( function( to ) {
			if( to == '' ) {
                $('#logo').hide();
            } else {
                $('#logo').show();
                $('#logo').attr( 'src', to );
         		$('.title-area>.name').hide();
            }
		} );
	});
// Social icons
})( jQuery );
(function( $ ) {
	"use strict";
// Change Sidebar Text-Align Colors
	wp.customize( 'stc_sidebar_text_align', function( value ) {
		value.bind( function( to ) {
			$( '#sidebar1' ).css( 'text-align', to );
		} );
	});
// End Change Colors
})( jQuery );
(function( $ ) {
	"use strict";
// Change Heading Colors
	wp.customize( 'stc_headings', function( value ) {
		value.bind( function( to ) {
			$( 'h1, h2, h3, h4, h5, h6' ).css( 'color', to );
		} );
	});
// End Change Colors
})( jQuery );
(function( $ ) {
	"use strict";
// Change Background Color
	wp.customize( 'stc_background_color', function( value ) {
		value.bind( function( to ) {
			$( 'article' ).css( 'background', to );
		} );
	});
// End Background Color
})( jQuery );
// Begin Hide Top_Bar_Top
(function( $ ) {
	"use strict";
wp.customize( 'hide_top_bar_top', function( value ) {
    value.bind( function( to ) {
        false === to ? $( '.top_bar_top' ).hide() : $( '.top_bar_top' ).show();
    } );
} );
})( jQuery );
// Custom Logo
(function( $ ) {
    wp.customize( 'stc_logo_image', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $('#logo').hide();
            } else {
                $('#logo').show();
                $('#logo').attr( 'src', to );
         		$('.title-area>.name').hide();
            }
        } );
    });  
})( jQuery );
// Begin Custom Css
(function( $ ) {
	"use strict";
	wp.customize( 'wpt_custom_css', function( value ) {
		value.bind( function( to ) {
			$( 'head' ).append( to );
		} );
	});
})( jQuery );
// Begin Hide Top_Bar_Bottom
(function( $ ) {
	"use strict";
wp.customize( 'hide_top_bar_bottom', function( value ) {
    value.bind( function( to ) {
        false === to ? $( '.top_bar_bottom' ).hide() : $( '.top_bar_bottom' ).show();
    } );
} );
})( jQuery );
// Begin Hide Logo
(function( $ ) {
	"use strict";
wp.customize( 'hide_logo', function( value ) {
    value.bind( function( to ) {
        false === to ? $( '.title-area' ).hide() : $( '.title-area' ).show();
    } );
} );
})( jQuery );
// Begin Top-Bar Color
(function( $ ) {
	"use strict";
// Change Top-Bar Color
	wp.customize( 'stc_top_bar_color', function( value ) {
		value.bind( function( to ) {
			$( '.nav-bar-out-wrapper' ).css( 'background-color', to + '!important' );
		} );
	});
})( jQuery );
// Begin Top-Bar Hover Navigation Color
(function( $ ) {
	"use strict";
	wp.customize( 'stc_top_bar_hover_color', function( value ) {
		value.bind( function( to ) {
			$( '.top-bar-section li:not(.has-form) a:not(.button):hover' ).css( 'background-color', to + '!important' );
		} );
	});
})( jQuery );
// Begin Top-Bar Hover Navigation Color
(function( $ ) {
	"use strict";
	wp.customize( 'stc_mobile_top_color', function( value ) {
		value.bind( function( to ) {
			$( '.top-bar .title-area' ).css( 'background-color', to + '!important' );
		} );
	});
})( jQuery );
// Change Article Background color
(function( $ ) {
	"use strict";
	wp.customize( 'stc_article_background_color', function( value ) {
		value.bind( function( to ) {
			$( '#main' ).css( 'background-color', to + '!important' );
		} );
	});
})( jQuery );
// Begin Bakground Image Test
(function( $ ) {
	"use strict";
	wp.customize( 'stc_background_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'background-color', to + '!important' );
		} );
	});
})( jQuery );
// Begin Bakground Image Test
(function( $ ) {
	"use strict";
	wp.customize( 'stc_background_image', function( value ) {
		value.bind( function( to ) {
			$( '#content' ).css( 'background', to + '!important' );
		} );
	});
})( jQuery );
// Begin Bakground Image Test
(function( $ ) {
	"use strict";
	wp.customize( 'stc_background_repeat', function( value ) {
		value.bind( function( to ) {
			$( '#content' ).css( 'background-repeat', to + '!important' );
		} );
	});
})( jQuery );
// Begin Bakground Image Test
(function( $ ) {
	"use strict";
	wp.customize( 'stc_background_size', function( value ) {
		value.bind( function( to ) {
			$( '#content' ).css( 'background-size', to + '!important' );
		} );
	});
})( jQuery );
// Begin Bakground Image Test
(function( $ ) {
	"use strict";
	wp.customize( 'stc_background_attach', function( value ) {
		value.bind( function( to ) {
			$( '#content' ).css( 'background-attachment', to + '!important' );
		} );
	});
})( jQuery );
// Begin Bakground Image Test
(function( $ ) {
	"use strict";
	wp.customize( 'stc_background_position', function( value ) {
		value.bind( function( to ) {
			$( '#content' ).css( 'background-position', to + '!important' );
		} );
	});
})( jQuery );
// Begin Bakground Image Test
(function( $ ) {
	"use strict";
	wp.customize( 'stc_background_opacity', function( value ) {
		value.bind( function( to ) {
			$( '#content' ).css( 'opacity', to + '!important' );
		} );
	});
})( jQuery );
// Top-Bar Navigation Position
(function( $ ) {
	"use strict";
	wp.customize( 'navigation-top-bar-position', function( value ) {
		value.bind( function( to ) {
			$( '.top-bar-section' ).css( 'float', to );
		} );
	});
})( jQuery );
// Sidebar Position
(function( $ ) {
	"use strict";
	wp.customize( 'stc_sidebar_float', function( value ) {
		value.bind( function( to ) {
			$( '#sidebar1' ).css( 'float', to );
		} );
	});
})( jQuery );
// Top-Bar Logo Position
(function( $ ) {
	"use strict";
	wp.customize( 'logo-top-bar-position', function( value ) {
		value.bind( function( to ) {
			$( '.title-area' ).css( 'float', to );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Footer Colors
	wp.customize( 'stc_footer_color', function( value ) {
		value.bind( function( to ) {
			$( '.foot-out-wrap' ).css( 'background-color', to );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change TopBar Menu Colors
	wp.customize( 'stc_top_bar_menu_color', function( value ) {
		value.bind( function( to ) {
			$( '.top-bar-section li:not(.has-form) a:not(.button)' ).css( 'background-color', to + '!important' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Sidebar Colors
	wp.customize( 'stc_sidebar_color', function( value ) {
		value.bind( function( to ) {
			$( '.sidebar' ).css( 'background-color', to );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Sidebar Border Size
	wp.customize( 'stc_sidebar_border_size', function( value ) {
		value.bind( function( to ) {
			$( '#sidebar1' ).css( 'border', to + 'px' + ' solid' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Sidebar Widget Margin
	wp.customize( 'stc_sidebar_widget_margin', function( value ) {
		value.bind( function( to ) {
			$( '#sidebar1>.widget' ).css( 'margin-bottom', to + 'px' + '!important' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Sidebar Border Color
	wp.customize( 'stc_sidebar_border_color', function( value ) {
		value.bind( function( to ) {
			$( '#sidebar1' ).css( 'border-color', to );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Article Width
	wp.customize( 'stc_article_width', function( value ) {
		value.bind( function( to ) {
			$( '#main' ).css( 'width', to + '%' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Header Width
	wp.customize( 'stc_header_width', function( value ) {
		value.bind( function( to ) {
			$( '.inner_wrap' ).css( 'width', to + '%' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Sidebar Width
	wp.customize( 'stc_sidebar_width', function( value ) {
		value.bind( function( to ) {
			$( '#sidebar1' ).css( 'width', to + '%' );
		} );
	});
})( jQuery );
// Begin Hide Search Bar
(function( $ ) {
	"use strict";
wp.customize( 'hide_search_bar', function( value ) {
    value.bind( function( to ) {
        false === to ? $( '.upper-search' ).hide() : $( '.upper-search' ).show();
    } );
} );
})( jQuery );
// Begin Hide sidebar
(function( $ ) {
	"use strict";
wp.customize( 'stc_hide_sidebar', function( value ) {
    value.bind( function( to ) {
        true === to ? $( '#sidebar1' ).show() : $( '#sidebar1' ).hide();
    } );
} );
})( jQuery );
(function( $ ) {
	"use strict";
// Change Sidebar Padding
	wp.customize( 'stc_sidebar_padding_size', function( value ) {
		value.bind( function( to ) {
			$( '#sidebar1' ).css( 'padding', to + '%' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Footer Padding
	wp.customize( 'stc_footer_padding_size', function( value ) {
		value.bind( function( to ) {
			$( 'footer' ).css( 'padding', to + '%' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Body Padding
	wp.customize( 'stc_body_padding', function( value ) {
		value.bind( function( to ) {
			$( '#inner-content' ).css( 'padding', to + '%' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Article Border Size
	wp.customize( 'stc_article_border_size', function( value ) {
		value.bind( function( to ) {
			$( '#main' ).css( 'border', to + 'px' + ' solid ' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Footer Border Size
	wp.customize( 'stc_footer_border_size', function( value ) {
		value.bind( function( to ) {
			$( '#main' ).css( 'border', to + 'px' + ' solid ' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change article Border Color
	wp.customize( 'stc_article_border_color', function( value ) {
		value.bind( function( to ) {
			$( '#main' ).css( 'border-color', to );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Footer Border Color
	wp.customize( 'stc_footer_border_color', function( value ) {
		value.bind( function( to ) {
			$( '.foot-out-wrap' ).css( 'border-color', to );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change article Padding
	wp.customize( 'stc_article_padding_size', function( value ) {
		value.bind( function( to ) {
			$( '#main' ).css( 'padding', to + '%' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Sidebar Padding
	wp.customize( 'stc_sidebar_padding', function( value ) {
		value.bind( function( to ) {
			$( '.sidebar' ).css( 'padding', to );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Top-Bar Position
	wp.customize( 'top-bar-position', function( value ) {
		value.bind( function( to ) {
			$( "#nav-bar-wrapper" ).addClass( to );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Navbar Font Size
	wp.customize( 'stc_navbar_text_size', function( value ) {
		value.bind( function( to ) {
			$( '.top-bar-section>ul>li>a' ).css( 'font-size', to + 'rem' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Upper TopBar Height
	wp.customize( 'stc_upper_top_height', function( value ) {
		value.bind( function( to ) {
			$( '.top_bar_top_container' ).css( 'height', to + 'px' );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Upper TopBar Color
	wp.customize( 'stc_upper_top_color', function( value ) {
		value.bind( function( to ) {
			$( '.top_bar_top' ).css( 'background', to );
		} );
	});
})( jQuery );
(function( $ ) {
	"use strict";
// Change Upper TopBar Padding
	wp.customize( 'stc_upper_top_padding', function( value ) {
		value.bind( function( to ) {
			$( '.top_bar_top' ).css( 'padding', to );
		} );
	});
})( jQuery );