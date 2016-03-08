<?php
$css = '';
extract( shortcode_atts( array(
      'extra_css' => '',
      'css' => '',
   ), $atts ) );
   
  
  $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  
  ?>
  
    <?php
    $params = array('posts_per_page' => 5, 'post_type' => 'product');
    $wc_query = new WP_Query($params);
    ?>
    <div class="woocommerce_display <?php echo esc_attr( $extra_css ); ?>">  
    <ul>
         <?php if ($wc_query->have_posts()) : ?>
         <?php while ($wc_query->have_posts()) :
                    $wc_query->the_post(); ?>
         <li>
             <a href="<?php the_permalink(); ?>">
                  <div class="woocommerce_img_container"><?php the_post_thumbnail(); ?></div>
                  <h5 class="woocommerce_title">
                      <?php the_title(); ?>
                  </h5>
             </a>
         </li>
         <?php endwhile; ?>
         <?php wp_reset_postdata(); ?>
         <?php else:  ?>
         <li>
              <?php _e( 'No Products' ); ?>
         </li>
         <?php endif; ?>
    </ul>
</div>

    <?php echo $this->endBlockComment('woocommerce'); ?>