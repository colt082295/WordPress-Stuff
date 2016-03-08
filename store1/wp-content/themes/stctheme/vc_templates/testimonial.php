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
      'href' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  $a = shortcode_atts(array(
            'image_url' => 'image_url',
        ), $atts);

        $img = wp_get_attachment_image_src($a["image_url"], "thumbnail");

        $imgSrc = $img[0];
        
    $href = vc_build_link( $href );
    $testimonial_triangle = "width: 0;height: 0;border-left: 20px solid transparent;border-right: 20px solid transparent;border-top: 20px solid {$triangle_color};content: '';position: absolute;top: 0;margin: auto;left: 50%;transform: translate(-50%)";
  
  
  ?>
  
  
  <?php if ( $style == 'style_1' ) { ?>
  
  
  <div class="testimonial_wrapper style_one <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?>" style="<?php echo ( $max_width ); ?>; <?php echo ( $size ); ?>; background-color: <?php echo ( $background_color ); ?>;" >
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
    
    if ( $href = "" ) {
?>
    <<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>> 
<?php
} else { 
?>
<a href=""><<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>></a>
<?php } ?>
                </div>
            </div>
        </div>
    
    </div>
  
  <?php }
 if ( $style == 'style_2' ) { ?>

    <div class="testimonial_wrapper style_2 <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?>" style="<?php echo ( $max_width ); ?> <?php echo ( $size ); ?>; background-color: <?php echo ( $background_color ); ?>;" >
        <div class="testimonial_container">
            <div class="testimonial_description" style="border-radius:<?php echo esc_attr( $border_radius ); ?>px; background-color:<?php echo esc_attr( $description_background_color ); ?>; padding <?php echo esc_attr( $description_padding ); ?>">
                <div class="testimonial_content"><?php echo ( $content ); ?></div>
                <div class="testimonial_image_wrapper">
                <div class="testimonial_image_container">
                    <img src="<?php echo esc_attr( $imgSrc ); ?>"></img>
                </div>
                </div>
            </div>
            <div class="testimonial_name_wrapper" style="float:<?php echo esc_attr( $extra_css ); ?>;">
                <div class="testimonial_name_container" style="<?php echo esc_attr( $name_align ); ?>">
                    <div class="triangle" style="<?php echo esc_attr( $testimonial_triangle ); ?>"></div>
                    <?php
    
    if ( $href = "" ) {
?>
    <<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>> 
<?php
} else { 
?>
<a href=""><<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>></a>
<?php } ?>
                </div>
            </div>
        </div>
    
    </div>
  
 <?php } 
  if ( $style == 'style_3' ) { ?>

    <div class="testimonial_wrapper style_3 <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?>" style="<?php echo ( $max_width ); ?> <?php echo ( $size ); ?>; background-color: <?php echo ( $background_color ); ?>;" >
        <div class="testimonial_container">
            <div class="testimonial_description" style="border-radius:<?php echo esc_attr( $border_radius ); ?>px; background-color:<?php echo esc_attr( $description_background_color ); ?>; padding <?php echo esc_attr( $description_padding ); ?>">
                <div class="testimonial_top">
                <div class="testimonial_image_wrapper">
                    <div class="testimonial_image_container">
                        <img src="<?php echo esc_attr( $imgSrc ); ?>"></img>
                    </div>
                </div>
                <div class="testimonial_name_wrapper" style="float:<?php echo esc_attr( $extra_css ); ?>;">
                <div class="testimonial_name_container" style="<?php echo esc_attr( $name_align ); ?>">
                    <div class="triangle" style="<?php echo esc_attr( $testimonial_triangle ); ?>"></div>
                    <?php
    
    if ( $href = "" ) {
?>
    <<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>> 
<?php
} else { 
?>
<a href=""><<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>></a>
<?php } ?>
                </div>
                </div>
            </div>
                <div class="testimonial_content"><?php echo ( $content ); ?></div>
            </div>
        </div>
    
    </div>
  
 <?php } 
  if ( $style == 'style_4' ) { ?>

    <div class="testimonial_wrapper style_4 <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?>" style="<?php echo ( $max_width ); ?> <?php echo ( $size ); ?>; background-color: <?php echo ( $background_color ); ?>;" >
        <div class="testimonial_container">
            <div class="testimonial_description" style="border-radius:<?php echo esc_attr( $border_radius ); ?>px; background-color:<?php echo esc_attr( $description_background_color ); ?>; padding <?php echo esc_attr( $description_padding ); ?>">
                <div class="testimonial_content"><?php echo ( $content ); ?></div>
                <div class="bottom_wrapper">
                    <div class="bottom_container">
                <div class="testimonial_image_wrapper">
                <div class="testimonial_image_container">
                    <img src="<?php echo esc_attr( $imgSrc ); ?>"></img>
                </div>
                </div>
            <div class="testimonial_name_wrapper" style="float:<?php echo esc_attr( $extra_css ); ?>;">
                <div class="testimonial_name_container" style="<?php echo esc_attr( $name_align ); ?>">
                    <div class="triangle" style="<?php echo esc_attr( $testimonial_triangle ); ?>"></div>
                    <?php
    
    if ( $href = "" ) {
?>
    <<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>> 
<?php
} else { 
?>
<a href=""><<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>></a>
<?php } ?>
                </div>
            </div>
             </div>
             </div>
            </div>
        </div>
    
    </div>
  
 <?php } 
  if ( $style == 'style_5' ) { ?>

    <div class="testimonial_wrapper style_5 <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?>" style="<?php echo ( $max_width ); ?> <?php echo ( $size ); ?>; background-color: <?php echo ( $background_color ); ?>;" >
        <div class="testimonial_container">
                            <div class="testimonial_image_wrapper">
                <div class="testimonial_image_container">
                    <img src="<?php echo esc_attr( $imgSrc ); ?>"></img>
                </div>
                </div>
            <div class="testimonial_description" style="border-radius:<?php echo esc_attr( $border_radius ); ?>px; background-color:<?php echo esc_attr( $description_background_color ); ?>; padding <?php echo esc_attr( $description_padding ); ?>">
                <div class="testimonial_content"><?php echo ( $content ); ?></div>
                            <div class="testimonial_name_wrapper" style="float:<?php echo esc_attr( $extra_css ); ?>;">
                <div class="testimonial_name_container" style="<?php echo esc_attr( $name_align ); ?>">
                    <div class="triangle" style="<?php echo esc_attr( $testimonial_triangle ); ?>"></div>
                    <?php
    
    if ( $href = "" ) {
?>
    <<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>> 
<?php
} else { 
?>
<a href=""><<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>></a>
<?php } ?>
                </div>
            </div>
            </div>
        </div>
    
    </div>
  
 <?php } 
  if ( $style == 'style_6' ) { ?>

    <div class="testimonial_wrapper style_6 <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?>" style="<?php echo ( $max_width ); ?> <?php echo ( $size ); ?>; background-color: <?php echo ( $background_color ); ?>;" >
        <div class="testimonial_container">
                            <div class="testimonial_image_wrapper">
                <div class="testimonial_image_container">
                    <div class="testimonial_background_img" style="background-image: url('<?php echo esc_attr( $imgSrc ); ?>')"></div>
                </div>
                </div>
            <div class="testimonial_description" style="border-radius:<?php echo esc_attr( $border_radius ); ?>px; background-color:<?php echo esc_attr( $description_background_color ); ?>; padding <?php echo esc_attr( $description_padding ); ?>">
                <div class="testimonial_content"><?php echo ( $content ); ?></div>
            </div>
            <div class="testimonial_name_wrapper" style="float:<?php echo esc_attr( $extra_css ); ?>;">
                <div class="testimonial_name_container" style="<?php echo esc_attr( $name_align ); ?>">
                    <div class="triangle" style="<?php echo esc_attr( $testimonial_triangle ); ?>"></div>
                    <?php
    
    if ( $href = "" ) {
?>
    <<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>> 
<?php
} else { 
?>
<a href=""><<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>></a>
<?php } ?>
                </div>
            </div>
        </div>
    
    </div>
  
 <?php } 
  if ( $style == 'style_7' ) { ?>

    <div class="testimonial_wrapper style_7 <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?>" style="<?php echo ( $max_width ); ?> <?php echo ( $size ); ?>; background-color: <?php echo ( $background_color ); ?>;" >
        <div class="testimonial_container">
                <div class="testimonial_image_wrapper">
                <div class="testimonial_image_container">
                    <img src="<?php echo esc_attr( $imgSrc ); ?>"></img>
                </div>
                </div>
                            <div class="testimonial_name_wrapper" style="float:<?php echo esc_attr( $extra_css ); ?>;">
                <div class="testimonial_name_container" style="<?php echo esc_attr( $name_align ); ?>">
                    <div class="triangle" style="<?php echo esc_attr( $testimonial_triangle ); ?>"></div>
                    <?php
    
    if ( $href = "" ) {
?>
    <<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>> 
<?php
} else { 
?>
<a href=""><<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>></a>
<?php } ?>
                </div>
            </div>
            <div class="testimonial_description" style="border-radius:<?php echo esc_attr( $border_radius ); ?>px; background-color:<?php echo esc_attr( $description_background_color ); ?>; padding <?php echo esc_attr( $description_padding ); ?>">
                <div class="testimonial_content"><?php echo ( $content ); ?></div>
            </div>
        </div>
    
    </div>
  
 <?php } 
  if ( $style == 'style_8' ) { ?>

    <div class="testimonial_wrapper style_8 <?php echo esc_attr( $css_class ); ?> <?php echo esc_attr( $extra_css ); ?>" style="<?php echo ( $max_width ); ?> <?php echo ( $size ); ?>; background-color: <?php echo ( $background_color ); ?>;" >
        <div class="testimonial_container">
            <div class="testimonial_description" style="border-radius:<?php echo esc_attr( $border_radius ); ?>px; background-color:<?php echo esc_attr( $description_background_color ); ?>; padding <?php echo esc_attr( $description_padding ); ?>">
                <div class="testimonial_content"><?php echo ( $content ); ?></div>
                <div class="testimonial_image_wrapper">
                <div class="testimonial_image_container">
                    <img src="<?php echo esc_attr( $imgSrc ); ?>"></img>
                </div>
                </div>
            </div>
            <div class="testimonial_name_wrapper" style="float:<?php echo esc_attr( $extra_css ); ?>;">
                <div class="testimonial_name_container" style="<?php echo esc_attr( $name_align ); ?>">
                    <div class="triangle" style="<?php echo esc_attr( $testimonial_triangle ); ?>"></div>
                    <?php
    
    if ( $href = "" ) {
?>
    <<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>> 
<?php
} else { 
?>
<a href=""><<?php echo esc_attr( $name_size ); ?> style="color:<?php echo esc_attr( $name_color ); ?>" ><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>></a>
<?php } ?>
                </div>
            </div>
        </div>
    
    </div>
  
 <?php } ?>
    <?php echo $this->endBlockComment('testimonial'); ?>