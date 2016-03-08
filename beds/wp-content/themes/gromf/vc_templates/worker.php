<?php
$css = '';
extract( shortcode_atts( array(
      'name' => '',
      'name_size' => '',
      'name_align' => '',
      'name_color' => '',
      'image_style' => '',
      'image_border_width' => '',
      'image_border_color' => '',
      'image_max_width' => '',
      'image_max_height' => '',
      'hover' => '',
      'max_width' => '',
      'size' => '',
      'equalizer' => '',
      'style' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );

  $content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $style . $hover . $image_style . $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  $a = shortcode_atts(array(
            'image_url' => 'image_url',
        ), $atts);

        $img = wp_get_attachment_image_src($a["image_url"], "large");

        $imgSrc = $img[0];
        
        list($originalWidth, $originalHeight, $type, $attr) = getimagesize($imgSrc); // Get image specifications from link
        $ratio = $originalWidth / $originalHeight; // Get image ratio
        $aspectPadding = $ratio * 100; // Get the padding for an absolute element's parent
  ?>
  
<!-- OUTPUT -->
    <div class="worker_wrapper <?php echo esc_attr( $css_class ); ?>" style="<?php echo esc_attr( $size ); ?>">
       <div class="worker_container">
               <div class="worker_image_container" style="border:<?php echo esc_attr( $image_border_width ); ?>px solid <?php echo esc_attr( $image_border_color ); ?>">
                    <a href="<?php echo esc_attr( $imgSrc ); ?>"><div class="worker_background_image" style="background-image:url('<?php echo esc_attr( $imgSrc ); ?>')"></div></a>
               </div>
           <div class="worker_name_container">
               <<?php echo esc_attr( $name_size ); ?> style="text-align: <?php echo esc_attr( $name_align ); ?>; color: <?php echo esc_attr( $name_color ); ?>"><?php echo esc_attr( $name ); ?></<?php echo esc_attr( $name_size ); ?>>
           </div>
           <div class="worker_description">
               <?php echo ( $content ); ?>
           </div>
       </div>
       <?php if ($equalizer == "yes") { ?>
       <script>
       jQuery(document).ready(function( $ ) {
           var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;

 $('.worker_wrapper').each(function() {

   $el = $(this);
   topPosition = $el.position().top;
   
   if (currentRowStart != topPosition) {

     // we just came to a new row.  Set all the heights on the completed row
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }

     // set the variables for the new row
     rowDivs.length = 0; // empty the array
     currentRowStart = topPosition;
     currentTallest = $el.height();
     rowDivs.push($el);

   } else {

     // another div on the current row.  Add it to the list and check if it's taller
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);

  }
   
  // do the last row
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
   
 });
});  
       </script>
    <?php    } ?>
   </div>

   <?php echo $this->endBlockComment('worker'); ?>