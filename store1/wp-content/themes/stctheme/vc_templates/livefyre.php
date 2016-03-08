<?php
$css = '';
extract( shortcode_atts( array(
      'site_id' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  ?>
  
<div class="livefyre_comments <?php echo esc_attr( $extra_css ); ?> <?php echo esc_attr( $css_class ); ?>">  
<!-- START: Livefyre Embed -->
<div id="livefyre-comments"></div>
<script type="text/javascript" src="http://zor.livefyre.com/wjs/v3.0/javascripts/livefyre.js"></script>
<script type="text/javascript">
(function () {
    var articleId = fyre.conv.load.makeArticleId(null);
    fyre.conv.load({}, [{
        el: 'livefyre-comments',
        network: "livefyre.com",
        siteId: "<?php echo ( $site_id ); ?>",
        articleId: articleId,
        signed: false,
        collectionMeta: {
            articleId: articleId,
            url: fyre.conv.load.makeCollectionUrl(),
        }
    }], function() {});
}());
</script>
<!-- END: Livefyre Embed -->
</div>

    <?php echo $this->endBlockComment('livefyre_comments'); ?>