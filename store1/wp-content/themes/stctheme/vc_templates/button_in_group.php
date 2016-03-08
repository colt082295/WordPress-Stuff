<?php
$css = '';
extract( shortcode_atts( array(
      'background_color' => '',
      'max_width' => '',
      'button_shape' => '',
      'button_size' => '',
      'button_border' => '',
      'button_etc' => '',
      'icon_fontawesome' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  wp_enqueue_style( 'buttons_style', get_template_directory_uri() . ( '/bower_components/Buttons/css/buttons.min.css' ) );
  $content = wpb_js_remove_wpautop($content, false); // fix unclosed/unwanted paragraph tags in $content
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  ?>
  
<li><button class="button <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?> <?php echo esc_attr( $button_shape ); ?> <?php echo esc_attr( $button_size ); ?> <?php echo esc_attr( $button_border ); ?> <?php echo esc_attr( $button_etc ); ?>" style="max-width:<?php echo esc_attr( $max_width ); ?>em; background:<?php echo esc_attr( $background_color ); ?>">
    <div class="button_icon"><i class="<?php echo esc_attr( $icon_fontawesome ); ?>"></i></div>
    <div class="button_text"><?php echo ( $content ); ?></div>
</button></li>
    <?php echo $this->endBlockComment('button_in_group'); ?>
