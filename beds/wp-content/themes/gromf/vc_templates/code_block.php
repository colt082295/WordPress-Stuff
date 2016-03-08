<?php

extract(shortcode_atts(array(
    'code_lang' => '',
    'extra_css' => '',
    'code_style' => '',
    'background_color' => '',
    'max_height' => '',
    'css_animation' => '',
    'css' => ''
), $atts));

wp_enqueue_script( 'highlightscript' );
//wp_enqueue_script( 'highlightjs_onload_script' ); 
wp_enqueue_style( 'highlightjs_style', plugins_url() . ( '/trunk/public/change/highlightjs/'.$code_style.'.css' ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($css_animation);

?>

<!-- OUTPUT -->
<script>
jQuery(document).ready(function( $ ) {
    $('pre code').each(function(i, block) {
    hljs.highlightBlock(block); // It's deifned in the 'highlightscript' script enqueued.
  });
});  
    </script>
   <div class="codeblock_wrapper <?php echo esc_attr( $css_class ); ?>">
       <div class="codeblock_container">
           <pre class="codeblock_text" style="max-height:<?php echo esc_attr( $max_height ); ?>px"><code class="<?php echo ( $code_lang ); ?>" style="background-color: <?php echo esc_attr( $background_color ); ?>"><?php echo ( $content ); ?></code></pre>
       </div>
   </div>
   <?php echo $this->endBlockComment('code_block'); ?>