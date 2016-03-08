<?php
// Define all variables
$css = '';
extract( shortcode_atts( array(
      'button_text' => '',
      'title_color' => '',
      'background_color' => '',
      'max_width' => '',
      'icon_fontawesome' => '',
      'icon_color' => '',
      'button_shape' => '',
      'button_size' => '',
      'button_border' => '',
      'button_etc' => '',
      'button_background_color' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  // May use this later to add links | $content = preg_replace('/<ul>/','<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">', $content);
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  wp_enqueue_script( 'dropdown-js' ); // Enqueue the needed javascript for the dropdown buttons
  ?>
  
  
  <span class="button-dropdown <?php echo esc_attr( $css_class ); ?>" data-buttons="dropdown">
    <a href="#" class="button button-rounded <?php echo esc_attr( $button_shape ); ?> <?php echo esc_attr( $button_size ); ?> <?php echo esc_attr( $button_border ); ?> <?php echo esc_attr( $button_etc ); ?> <?php echo esc_attr( $button_background_color ); ?>" style="max-width:<?php echo esc_attr( $max_width ); ?>em; background-color:<?php echo esc_attr( $background_color ); ?>; color: <?php echo esc_attr( $title_color ); ?> "><?php echo ( $button_text ); ?><i class="fa fa-caret-down" style="color: <?php echo esc_attr( $icon_color ); ?>"></i></a>
    <?php echo ( $content ); ?>
  </span>

    <?php echo $this->endBlockComment('button_dropdown'); ?>