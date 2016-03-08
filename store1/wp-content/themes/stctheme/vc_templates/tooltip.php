<?php
$css = '';
extract( shortcode_atts( array(
      'tip' => '',
      'tip_position' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  ?>
     <div style="display: inline-block" data-tooltip aria-haspopup="true" class="tooltip_wrapper has-tip <?php echo esc_attr( $tip_position ); ?><?php echo esc_attr( $css_class ); ?><?php echo esc_attr( $extra_css ); ?>" title="<?php echo ( $tip ); ?>"><?php echo ( $content ); ?>
     </div>
     <?php echo $this->endBlockComment('tooltip'); ?>