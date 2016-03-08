<?php
$css = '';
extract( shortcode_atts( array(
      'extra_css' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  ?>
  
     <div class="button_group_wrapper <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?>">
     <ul class="button-group"><?php echo ( $content ); ?></ul>
     </div>
     <?php echo $this->endBlockComment('button_group'); ?>