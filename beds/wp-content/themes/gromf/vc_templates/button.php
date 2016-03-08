<?php
$css = '';
extract( shortcode_atts( array(
      'background_color' => '',
      'max_width' => '',
      'button_shape' => '',
      'button_size' => '',
      'button_border' => '',
      'border_radius' => '',
      'button_etc' => '',
      'display_icon' => '',
      'icon_fontawesome' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  $content = wpb_js_remove_wpautop($content, false); // fix unclosed/unwanted paragraph tags in $content
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . ' ' . $button_shape . ' ' . $button_size . ' ' . $button_border . ' ' . $button_etc . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  ?>
  
<a href="" class="button <?php echo esc_attr( $css_class ); ?>" style="max-width:<?php echo esc_attr( $max_width ); ?>em; background:<?php echo esc_attr( $background_color ); ?>; border-radius: <?php echo esc_attr( $border_radius ); ?>px">
    <?php if (  $display_icon == 'yes' ) { ?> <!-- Check to see if icon is enabled before revealing it -->
        <i class="button_icon <?php echo esc_attr( $icon_fontawesome ); ?>"></i>
    <?php } ?>
    <div class="button_content"><?php echo ( $content ); ?></div>
</a>
    <?php echo $this->endBlockComment('button'); ?>