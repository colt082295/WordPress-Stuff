<?php
$css = '';
extract( shortcode_atts( array(
      'extra_css' => '',
      'currency' => '',
      'currency_size' => '',
      'currency_weight' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
   ?>
   
   <div class="pricing_table_price <?php echo esc_attr( $css_class ); ?>" >
     <?php echo do_shortcode( $content ); ?>
         <style>
         .pricing_table_price *::before {
  content: '<?php echo esc_attr( $currency ); ?>';
  font-size: <?php echo esc_attr( $currency_size ); ?>;
  margin-right: 0.2em;
  font-weight: <?php echo esc_attr( $currency_weight ); ?>;
}
     </style>
     </div>
     <?php echo $this->endBlockComment('pricing_table_price'); ?>