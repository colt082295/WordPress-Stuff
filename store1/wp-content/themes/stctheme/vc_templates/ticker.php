<?php
$css = '';
extract( shortcode_atts( array(
      'tip' => '',
      'tip_position' => '',
      'speed' => '',
      'direction' => '',
      'duration' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
   wp_enqueue_script( 'ticker_script' );

  $content = wpb_js_remove_wpautop($content, false); // fix unclosed/unwanted paragraph tags in $content
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  ?>
     <div class="ticker_wrapper <?php echo esc_attr( $css_class ); ?><?php echo esc_attr( $extra_css ); ?>" title="<?php echo ( $tip ); ?>">
     <div class="ticker_content"><?php echo ( $content ); ?></div>
     </div>
     
          <script>
          jQuery(function($) {
        $('.ticker_content>ul').newsTicker({
    max_rows: 2,
    speed: ".$speed.",
    direction: '.$direction.',
    duration: '.$duration.',
    autostart: 1,
    pauseOnHover: 0
});
});
    </script>
     <?php echo $this->endBlockComment('ticker'); ?>