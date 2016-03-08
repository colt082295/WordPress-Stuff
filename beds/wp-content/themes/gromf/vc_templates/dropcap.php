<?php

extract(shortcode_atts(array(
    'extra_class' => '',
    'drop_size' => '',
    'drop_color' => '',
    'drop_weight' => '',
    'css_animation' => '',
    'drop_position' => '',
    'css' => ''
), $atts));

$content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($css_animation);
  
?>

<!-- OUTPUT -->

   <div class="<?php echo esc_attr( $css_class ); ?>">
       <div class="dropcap_container">
           <div class="dropcap_description">
               
               <?php if ( $drop_position == 'drop-up' ) { ?>
               
               <div class="dropcap_drop <?php echo ( $drop_position ); ?>"><?php echo ( $content ); ?> </div>
               <style>
                   .dropcap_drop.drop-up *:first-child:first-letter {
                       font-weight: <?php echo esc_attr( $drop_weight ); ?>;
                       font-size: <?php echo esc_attr( $drop_size ); ?>px;
                       color: <?php echo esc_attr( $drop_color ); ?>
                   }
               </style>
               <?php
                }
                if ( $drop_position == 'drop-down' ) { ?>
                   
                   <div class="dropcap_drop <?php echo ( $drop_position ); ?>"><?php echo ( $content ); ?></div>
                   
                   <style>
                   .dropcap_drop.drop-down *:first-child:first-letter {
                       font-weight: <?php echo esc_attr( $drop_weight ); ?>;
                       font-size: <?php echo esc_attr( $drop_size ); ?>px;
                       color: <?php echo esc_attr( $drop_color ); ?>
                   }
               </style>
                   
               <?php } ?>
               
           </div>
       </div>
   </div>
   <?php echo $this->endBlockComment('dropcap'); ?>