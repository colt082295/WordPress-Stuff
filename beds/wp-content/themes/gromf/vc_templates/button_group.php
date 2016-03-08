<?php
$css = '';
extract( shortcode_atts( array(
      'extra_css' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, false); // fix unclosed/unwanted paragraph tags in $content
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  ?>

<!-- OUTPUT --> 
  
     <div class="button_group_wrapper <?php echo esc_attr( $css_class ); ?>">
     <div class="button-group"><?php echo ( $content ); ?></div>
     </div>
     <?php echo $this->endBlockComment('button_group'); ?>