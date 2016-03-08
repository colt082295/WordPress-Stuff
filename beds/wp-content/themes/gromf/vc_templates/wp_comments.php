<?php
$css = '';
extract( shortcode_atts( array(
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  ?>
  
<div class="wp_comments <?php echo esc_attr( $css_class ); ?>">  
<?php comments_template(); ?>
</div>

    <?php echo $this->endBlockComment('wp_comments'); ?>