<?php
// Add shortcode classes
extract(shortcode_atts(array(
    'modal_text' => '',
    'title' => '',
    'title_size' => '',
    'title_color' => '',
    'title_align' => '',
    'css_animation' => '',
    'extra_css' => '',
    'css' => ''
), $atts));

$content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($css_animation); // Add css animations
  ?>
<!-- OUTPUT -->
<?php $add_class = (uniqid()); ?>
<a href="#wp-modal-<?php echo $add_class ?>">
  <?php echo esc_attr( $modal_text ); ?></a>

<section class="modal--show <?php echo esc_attr( $css_class ); ?>" id="wp-modal-<?php echo $add_class; ?>" tabindex="-1"
        role="dialog" aria-labelledby="modal-label" aria-hidden="true">

    <div class="modal-inner">
        <header id="modal-label"><<?php echo esc_attr( $title_size ); ?> id="modalTitle" class="modal_title" style="color:<?php echo esc_attr( $title_color ); ?>; text-align:<?php echo esc_attr( $title_align ); ?>"><?php echo ( $title ); ?></<?php echo esc_attr( $title_size ); ?>></header>
        <div class="modal-content"><span class="modal_description"><?php echo ( $content ); ?></span></div>
    </div>

    <a href="#!" class="modal-close" title="Close this modal" data-close="Close"
        data-dismiss="modal">?</a>
</section>
   <?php echo $this->endBlockComment('modal'); ?>
