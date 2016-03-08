<?php
// Define all variables
$css = '';
extract( shortcode_atts( array(
      'list_position' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  // May use this later to add links | $content = preg_replace('/<ul>/','<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">', $content);
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  ?>
  
  
  <ul class="stc_list <?php echo esc_attr( $css_class ); ?>" style="list-style-position: <?php echo esc_attr( $list_position ) ; ?>">
      <?php echo ( $content ); ?>
  </ul>

    <?php echo $this->endBlockComment('list'); ?>