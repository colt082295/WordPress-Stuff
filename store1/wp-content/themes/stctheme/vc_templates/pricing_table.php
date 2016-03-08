<?php
$css = '';
extract( shortcode_atts( array(
      'size' => '',
      'max_width' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  $max_width_val = 'max_width:' + $max_width + 'em';
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  ?>
  
     <div class="pricing_table_wrapper <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?>" style="<?php echo esc_attr( $size ); ?>">
     <?php echo ( $content ); ?>
     </div>
     <?php echo $this->endBlockComment('pricing_table'); ?>