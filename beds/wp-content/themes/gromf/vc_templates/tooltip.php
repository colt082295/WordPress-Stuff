<?php
$css = '';
extract( shortcode_atts( array(
      'tip' => '',
      'tip_position' => '',
      'tip_style' => '',
      'tip_type' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  // wp_enqueue_script( 'foundation-js' );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $tip_style . $tip_position . $tip_type . $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  ?>
     <div class="tooltip_wrapper <?php echo esc_attr( $css_class ); ?>" data-hint="<?php echo ( $tip ); ?>"><?php echo ( $content ); ?>
     </div>
     <?php echo $this->endBlockComment('tooltip'); ?>