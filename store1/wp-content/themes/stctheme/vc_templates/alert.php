<?php
$css = '';
extract( shortcode_atts( array(
      'title' => '',
      'title_size' => '',
      'title_color' => '',
      'title_align' => '',
      'background_color' => '',
      'max_width' => '',
      'icon_fontawesome' => '',
      'icon_size' => '',
      'icon_color' => '',
      'border_radius' => '',
      'size' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  ?>
  
  <div class="alert_wrapper <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?>" style="background-color: <?php echo esc_attr( $background_color ); ?>; border-radius: <?php echo esc_attr( $border_radius ); ?>px; <?php echo esc_attr( $size ); ?>">
      
      <div class="alert_container">
          <div class="text_container">
          <div class="alert_head"><<?php echo esc_attr( $title_size ); ?> style="color: <?php echo esc_attr( $title_color ); ?>; text-align: <?php echo esc_attr( $title_align ); ?>"><?php echo ( $title ); ?></<?php echo esc_attr( $title_size ); ?>></div>
          <div class="alert_content"><?php echo ( $content ); ?></div>
          </div>
          <div class="alert_icon"><i class="<?php echo esc_attr( $icon_fontawesome ); ?>" style="font-size: <?php echo ( $icon_size ); ?>px; color: <?php echo ( $icon_color ); ?>"></i></div>
          
      </div>
      
  </div>
  
  
  
    <?php echo $this->endBlockComment('alert'); ?>