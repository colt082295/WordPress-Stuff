<?php
$css = '';
extract( shortcode_atts( array(
      'name' => '',
      'name_size' => '',
      'name_align' => '',
      'image_style' => '',
      'image_border_width' => '',
      'image_border_color' => '',
      'max_width' => '',
      'size' => '',
      'style' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  $a = shortcode_atts(array(
            'image_url' => 'image_url',
        ), $atts);

        $img = wp_get_attachment_image_src($a["image_url"], "large");

        $imgSrc = $img[0];
  ?>
  
<!-- OUTPUT -->

<?php if ( $style == 'style_one' ) { ?>
    <div class="worker_wrapper style_one <?php echo esc_attr( $extra_css ); ?> <?php echo esc_attr( $css_class ); ?>" style="<?php echo esc_attr( $size ); ?>">
       <div class="worker_container">
           <div class="worker_image_wrapper">
               <div class="worker_image_container" style="<?php echo esc_attr( $image_style ); ?>; border:<?php echo esc_attr( $image_border_width ); ?>px solid <?php echo esc_attr( $image_border_color ); ?>">
                   <a href="<?php echo esc_attr( $imgSrc ); ?>"><div class="worker_background_image" style="background-image:url('<?php echo esc_attr( $imgSrc ); ?>')"></div></a>
               </div>
           </div>
           <div class="worker_name_container">
               <<?php echo esc_attr( $name_size ); ?> style="<?php echo esc_attr( $name_align ); ?>"><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>>
           </div>
           <div class="worker_description">
               <?php echo ( $content ); ?>
           </div>
       </div>
   </div>
<?php }
 if ( $style == 'style_two' ) { ?>
    <div class="worker_wrapper style_two <?php echo esc_attr( $extra_css ); ?> <?php echo esc_attr( $css_class ); ?>" style="<?php echo esc_attr( $size ); ?>">
       <div class="worker_container">
           <div class="worker_image_wrapper">
               <div class="worker_image_container" style="<?php echo esc_attr( $image_style ); ?>; border:<?php echo esc_attr( $image_border_width ); ?>px solid <?php echo esc_attr( $image_border_color ); ?>">
                   <a href="<?php echo esc_attr( $imgSrc ); ?>"><div class="worker_background_image" style="background-image:url('<?php echo esc_attr( $imgSrc ); ?>')"></div></a>
               </div>
           </div>
           <div class="worker_name_container">
               <<?php echo esc_attr( $name_size ); ?> style="<?php echo esc_attr( $name_align ); ?>"><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>>
           </div>
           <div class="worker_description">
               <?php echo ( $content ); ?>
           </div>
       </div>
   </div>
<?php } ?>

   <?php echo $this->endBlockComment('worker'); ?>