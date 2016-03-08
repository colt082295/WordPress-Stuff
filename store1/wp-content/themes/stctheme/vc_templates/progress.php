<?php
$css = '';
extract( shortcode_atts( array(
      'bar_percent' => '',
      'bar_color' => '',
      'max_width' => '',
      'icon_fontawesome' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  $content = preg_replace('/<ul>/','<ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">', $content);
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  ?>
  <script>
      $('div').bind('inview', function(event, isInView, visiblePartX, visiblePartY) {
  if (isInView) {
    // element is now visible in the viewport
    if (visiblePartY == 'top') {
      // top part of element is visible
    } else if (visiblePartY == 'bottom') {
      // bottom part of element is visible
    } else {
      // whole part of element is visible
    $(".custom").animate({width:"80%"});
    }
  } else {
    // element has gone out of viewport
  }
});
  </script>
  <div class="progress">
  <span style="width: <?php echo esc_attr( $bar_percent ); ?>%; background: <?php echo esc_attr( $bar_color ); ?>" class="meter custom"></span>
</div>
  

    <?php echo $this->endBlockComment('progress'); ?>