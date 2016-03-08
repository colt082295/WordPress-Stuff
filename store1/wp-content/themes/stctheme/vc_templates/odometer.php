<?php

extract(shortcode_atts(array(
    'number' => '',
    'extra_class' => '',
    'css_animation' => '',
    'css' => ''
), $atts));

wp_enqueue_script( 'odometer-main-script' );
// register visual composer shortcodes
wp_enqueue_style( 'odometer-css', get_template_directory_uri() . '/change/odometer.css' );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column wpb_content_element ' . $extra_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($css_animation);


?>
<!-- OUTPUT -->

   <div class="number_count_wrapper <?php echo esc_attr( $css_class ); ?>">
<script>
jQuery(document).ready(function( $ ) {
    $('.number_count_container').waypoint(function () {
        $(this).addClass('done');
        setTimeout(function() { $('.odometer').html('<?php echo ( $number ); ?>'); }, 1000);
      } , { offset:'85%' });
});
</script>
       <div id="number_count_container" class="number_count_container">
           <span class="odometer">0</span>
       </div>
   </div>
   <?php echo $this->endBlockComment('odometer'); ?>