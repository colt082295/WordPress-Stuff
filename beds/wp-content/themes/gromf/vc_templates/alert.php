<?php
$css = '';
extract( shortcode_atts( array(
      'title' => '',
      'title_size' => '',
      'title_color' => '',
      'title_align' => '',
      'background_color' => '',
      'max_width' => '',
      'display_icon' => '',
      'icon_fontawesome' => '',
      'icon_size' => '',
      'icon_color' => '',
      'icon_background_color' => '',
      'style' => '',
      'border_radius' => '',
      'max_width' => '',
      'size' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $style . $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  ?>
  
  <?php if ( $style == ''  ) { // Check to see if the style is custom ?>
    
      <div class="alert_wrapper <?php echo esc_attr( $css_class ) ; ?>" style="background-color: <?php echo esc_attr( $background_color ); ?>; border-radius: <?php echo esc_attr( $border_radius ); ?>px; max-width: <?php echo esc_attr( $max_width ); ?>px; <?php echo esc_attr( $size ); ?>">
        <div class="alert_container">
            <div class="text_container">
              <div class="alert_head"><<?php echo esc_attr( $title_size ); ?> style="color: <?php echo esc_attr( $title_color ); ?>; text-align: <?php echo esc_attr( $title_align ); ?>"><?php echo ( $title ); ?></<?php echo esc_attr( $title_size ); ?>></div>
              <div class="alert_content"><?php echo ( $content ); ?></div>
            </div>
            <?php if (  $display_icon == 'yes' ) { ?> <!-- If icon enabled, show it -->
              <div class="alert_icon" style="background-color: <?php echo esc_attr( $icon_background_color ); ?>"><i class="<?php echo esc_attr( $icon_fontawesome ); ?>" style="font-size: <?php echo ( $icon_size ); ?>px; color: <?php echo ( $icon_color ); ?>"></i></div>
           <?php } ?>
        </div>
      </div>
    
  <?php }
  
  else { // If not custom, don't display everything ?> 
  
      <div class="alert_wrapper <?php echo esc_attr( $style ), ' ', esc_attr( $css_class ) ; ?>" style="border-radius: <?php echo esc_attr( $border_radius ); ?>px; max-width: <?php echo esc_attr( $max_width ); ?>px; <?php echo esc_attr( $size ); ?>">
        <div class="alert_container">
            <div class="text_container">
              <div class="alert_head"><<?php echo esc_attr( $title_size ); ?> style=""><?php echo ( $title ); ?></<?php echo esc_attr( $title_size ); ?>></div>
              <div class="alert_content"><?php echo ( $content ); ?></div>
            </div>
            <?php if (  $display_icon == 'yes' ) { ?> <!-- If icon enabled, show it -->
              <div class="alert_icon" style=""><i class="<?php echo esc_attr( $icon_fontawesome ); ?>" style="font-size: <?php echo ( $icon_size ); ?>px; color: <?php echo ( $icon_color ); ?>"></i></div>
            <?php } ?>
        </div>
      </div>
    
  <?php } ?>
  
    <?php echo $this->endBlockComment('alert'); ?>