<?php
$css = '';
extract( shortcode_atts( array(
      'display_icon' => '',
      'bullet_style' => '',
      'icon_fontawesome' => '',
      'icon_margin' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  $content = wpb_js_remove_wpautop($content, false); // fix unclosed/unwanted paragraph tags in $content
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  ?>
  
<!-- OUTPUT -->
  
<li class="stc_list_item <?php echo esc_attr( $css_class ); ?>" style="<?php if ( $bullet_style != '' ) { ?> list-style-type: <?php echo esc_attr( $bullet_style ); ?>  <?php } else { ?> list-style-type: none <?php  } ?>">
    <?php if (  $display_icon == 'yes' ) { ?> <!-- Check to see if icon is enabled before revealing it -->
        <i class="list_icon <?php echo esc_attr( $icon_fontawesome ); ?>" style="margin-right: <?php echo esc_attr( $icon_margin ); ?>px "></i>
    <?php } ?>
    <div class="list_content"><?php echo ( $content ); ?></div>
</li>

    <?php echo $this->endBlockComment('list_item'); ?>
