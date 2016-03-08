<?php
$css = '';
$traingle_color = '';
extract( shortcode_atts( array(
      'name' => '',
      'name_size' => '',
      'name_color' => '',
      'name_align' => '',
      'background_color' => '',
      'max_width' => '',
      'extra_css' => '',
      'size' => '',
      'border_radius' => '',
      'description_background_color' => '',
      'description_padding' => '',
      'triangle_color' => '',
      'style' => '',
      'link' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $style . $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  $a = shortcode_atts(array(
            'image_url' => 'image_url',
        ), $atts);

        $img = wp_get_attachment_image_src($a["image_url"], "thumbnail");

        $imgSrc = $img[0];
        
    $link_test = vc_build_link( $link ); // Build the link from variable
    $testimonial_triangle = "width: 0;height: 0;border-left: 20px solid transparent;border-right: 20px solid transparent;border-top: 20px solid {$triangle_color};content: '';position: absolute;top: 0;margin: auto;left: 50%;transform: translate(-50%)";
  
  ?>
  
  <!-- Beign Output -->
  
  <div class="testimonial_wrapper <?php echo esc_attr( $css_class ); ?>" style="<?php echo ( $max_width ); ?>; <?php echo ( $size ); ?>; background-color: <?php echo ( $background_color ); ?>;" >
        <div class="testimonial_container">
            <div class="testimonial_description" style="border-radius:<?php echo esc_attr( $border_radius ); ?>px; background-color:<?php echo esc_attr( $description_background_color ); ?>; padding <?php echo esc_attr( $description_padding ); ?>">
                <div class="testimonial_image_wrapper">
                <div class="testimonial_image_container">
                    <img src="<?php echo esc_attr( $imgSrc ); ?>"></img> 
                </div>
                </div>
                <div class="testimonial_content"><?php echo ( $content ); ?></div>
            </div>
            <div class="testimonial_name_wrapper" style="float:<?php echo esc_attr( $extra_css ); ?>;">
                <div class="testimonial_name_container" style="<?php echo esc_attr( $name_align ); ?>">
                    <div class="triangle" style="<?php echo esc_attr( $testimonial_triangle ); ?>"></div>
                    <?php
    
    if ( $link_test['url'] !== "" ) { // Checking to make sure the link actually contains something, if not the a tag doesn't show
?>
   <a href="<?php echo esc_attr( $link_test['url'] ); ?>"><<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>></a>
<?php
} else { 
?>
<<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>> 
<?php } ?>
                </div>
            </div>
        </div>
    
    </div>
    <?php echo $this->endBlockComment('testimonial'); ?>