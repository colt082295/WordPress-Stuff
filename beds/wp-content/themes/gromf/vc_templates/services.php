<?php
$css = '';
extract( shortcode_atts( array(
      'title' => '',
      'title_size' => '',
      'title_color' => '',
      'title_align' => '',
      'image_style' => '',
      'image_border_width' => '',
      'image_border_color' => '',
      'direction' => '',
      'size' => '',
      'max_width' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  
  $a = shortcode_atts(array(
            'image_url' => 'image_url',
        ), $atts);

        $img = wp_get_attachment_image_src($a["image_url"], "thumbnail");

        $imgSrc = $img[0];
  ?>
  
<div class="services_wrapper <?php echo esc_attr( $css_class ); ?>" style="<?php echo esc_attr( $size ); ?>">
    
    <?php if ( $direction == 'vertical' ) { ?>
    
    <div class="services_image" style="text-align:center"><img src="<?php echo ( $imgSrc ); ?>" style="<?php echo esc_attr( $image_style ); ?>; border:<?php echo esc_attr( $image_border_width ); ?>px solid <?php echo esc_attr( $image_border_color ); ?>; "></img></div>
   <div class="services_info_container">
   <?php
    }
    else { ?>
        <div class="services_image table" style="text-align:center"><img src="<?php echo ( $imgSrc ); ?>" style="<?php echo esc_attr( $image_style ); ?>; border:<?php echo esc_attr( $image_border_width ); ?>px solid <?php echo esc_attr( $image_border_color ); ?>; "></img></div>
        <div class="services_info_container table">
    <?php } ?>
   
    <div class="services_name_container"><<?php echo esc_attr( $title_size ); ?> style="color:<?php echo esc_attr( $title_color ); ?>;text-align:<?php echo esc_attr( $title_align ); ?>" ><?php echo esc_attr( $title ); ?></<?php echo esc_attr( $title_size ); ?>></div>
    <div class="services_description"><?php echo ( $content ); ?></div>
    </div>
</div>
    <?php echo $this->endBlockComment('services'); ?>