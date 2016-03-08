<?php
$css = '';
extract( shortcode_atts( array(
      'width' => '',
      'border_radius' => '',
      'image_style' => '',
      'image_border_width' => '',
      'image_border_color' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  $a = shortcode_atts(array(
            'image_url' => 'image_url',
        ), $atts);

        $img = wp_get_attachment_image_src($a["image_url"], "large");

        $imgSrc = $img[0];
        
  $img_output = '<img src="'.$imgSrc.'"</img>';      
   ?>
   
   <div class="pricing_table_image <?php echo esc_attr( $css_class ); ?>"style="width:<?php echo esc_attr( $width ); ?>%;<?php echo esc_attr( $image_style ); ?>; overflow:hidden;" >
     <?php echo do_shortcode( $img_output ); ?>
     </div>
     <?php echo $this->endBlockComment('pricing_table_image'); ?>