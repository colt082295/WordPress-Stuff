<?php
$output = $el_class = $css_animation = '';

extract(shortcode_atts(array(
    'el_class' => '',
    'modal_text' => '',
    'title' => '',
    'title_size' => '',
    'title_color' => '',
    'title_align' => '',
    'css_animation' => '',
    'extra_css' => '',
    'css' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);

$content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_text_column wpb_content_element ' . $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($css_animation);
  ?>
<!-- OUTPUT -->

<a href="#" data-reveal-id="myModal"><?php echo ( $modal_text ); ?></a>

<div id="myModal" class="reveal-modal <?php echo esc_attr( $css_class ); ?>" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <<?php echo esc_attr( $title_size ); ?> id="modalTitle" class="modal_title" style="color:<?php echo esc_attr( $title_color ); ?>; text-align:<?php echo esc_attr( $title_align ); ?>"><?php echo ( $title ); ?></<?php echo esc_attr( $title_size ); ?>>
  <span class="modal_description"><?php echo ( $content ); ?></span>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
   <?php echo $this->endBlockComment('modal'); ?>
