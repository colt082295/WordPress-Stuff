<?php
$output = $el_class = $css_animation = '';

extract(shortcode_atts(array(
    'el_class' => '',
    'drop' => '',
    'drop_size' => '',
    'drop_color' => '',
    'drop_weight' => '',
    'css_animation' => '',
    'drop_position' => '',
    'css' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);

$content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column wpb_content_element ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($css_animation);
  ?>
<!-- OUTPUT -->

   <div class="dropcap_wrapper <?php echo esc_attr( $extra_css ); ?> <?php echo esc_attr( $css_class ); ?>">
       <div class="dropcap_container">
           <div class="dropcap_description">
               
               <?php if ( $drop_position == 'top' ) { ?>
               
               
               
               <span class="dropcap_drop <?php echo ( $drop_position ); ?>" style="font-weight:<?php echo esc_attr( $drop_weight ); ?>; font-size:<?php echo esc_attr( $drop_size ); ?>px; color:<?php echo esc_attr( $drop_color ); ?>"><?php echo ( $drop ); ?></span>
               
               <?php
                }
                else { ?>
                   
                   <span class="dropcap_drop <?php echo ( $drop_position ); ?>" style="font-weight:<?php echo esc_attr( $drop_weight ); ?>; font-size:<?php echo esc_attr( $drop_size ); ?>px; color:<?php echo esc_attr( $drop_color ); ?>"><?php echo ( $drop ); ?></span>
                   
                   
               <?php } ?>
               
               
               
               <span class="dropcap_text"><?php echo ( $content ); ?></span>
           </div>
       </div>
   </div>
   <?php echo $this->endBlockComment('dropcap'); ?>