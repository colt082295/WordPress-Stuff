<?php
$css = '';
extract( shortcode_atts( array(
      'button_text' => '',
      'background_color' => '',
      'max_width' => '',
      'icon_fontawesome' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  $content = preg_replace('/<ul>/','<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">', $content);
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  ?>
  
  <button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" class="button dropdown <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?>"style="max-width:<?php echo esc_attr( $max_width ); ?>em; background-color:<?php echo esc_attr( $background_color ); ?> "><?php echo ( $button_text ); ?></button>

    <?php echo ( $content ); ?>

    <?php echo $this->endBlockComment('button_dropdown'); ?>