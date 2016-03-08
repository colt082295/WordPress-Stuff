<?php

extract(shortcode_atts(array(
    'number' => '',
    'size' => '',
    'color' => '',
    'weight' => '',
    'extra_class' => '',
    'css_animation' => '',
    'css' => ''
), $atts));

wp_enqueue_script( 'waypoints' );
wp_enqueue_script( 'odometer-main-script' );
// register visual composer shortcodes

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($css_animation);


?>
<!-- OUTPUT -->
<?php $add_id_class = (uniqid()); ?>
   <div class="number_count_wrapper <?php echo esc_attr( $css_class ); ?>">
       <div id="number_count_container-<?php echo ( $add_id_class ); ?>" class="number_count_container">
           <span class="odometer odometer<?php echo ( $add_id_class ); ?>" style="font-size: <?php echo esc_attr( $size ); ?>px; color: <?php echo esc_attr( $color ); ?>; font-weight: <?php echo esc_attr( $weight ); ?>" >0</span>
       </div>
   </div>
<script>
jQuery(document).ready(function( $ ) {
        setTimeout(function() { $('.odometer.odometer<?php echo ( $add_id_class ); ?>').html('<?php echo ( $number ); ?>'); }, 1000);
        $('#number_count_container-<?php echo ( $add_id_class ); ?>').addClass('done');
});
</script>
   <?php echo $this->endBlockComment('odometer'); ?>