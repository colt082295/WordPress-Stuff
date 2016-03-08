<?php

extract( shortcode_atts( array(
      'title_size' => '',
      'title_color' => '',
      'title_background_color' => '',
      'title_align' => '',
      'excerpt_length' => '',
      'excerpt_size' => '',
      'excerpt_color' => '',
      'excerpt_background_color' => '',
      'excerpt_length' => '',
      'footer_color' => '',
      'footer_background_color' => '',
      'display_meta' => '',
      'display_comments' => '',
      'display_category' => '',
      'display_date' => '',
      'posts_per' => '',
      'order' => '',
      'category' => '',
      'order_by' => '',
      'pagination' => '',
      'display_thumbnail' => '',
      'google_fonts' => '',
      'extra_css' => '',
      'css' => '',
   ), $atts )
   );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $extra_css . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
  ?>
<?php query_posts( array ( 'category_name' => $category, 'posts_per_page' => $posts_per ) ); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
$category = get_the_category(); ?>
    <div class="stc-posts <?php echo ( $css_class ); ?>">
        <div class="post_title_wrapper" style="background-color: <?php echo esc_attr( $title_background_color ); ?>"><a href="<?php echo get_permalink() ?>"><<?php echo esc_attr( $title_size ); ?> class="post_title" style="color: <?php echo esc_attr( $title_color ); ?>; text-align: <?php echo esc_attr( $title_align ); ?>;"><?php echo get_the_title() ?></<?php echo esc_attr( $title_size ); ?>></a></div>
        <?php if ( $display_meta == "yes" ) { ?>
        
        <div class="meta_wrapper">     
        <?php if ( $display_category == "yes" ) { ?>
               <a href="<?php echo get_category_link($category[0]->cat_ID) ?>"><p class="post_category slash_divider" style="color: <?php echo esc_attr( $footer_color ); ?>"><?php echo $category[0]->cat_name ?></p></a>
           <?php }
           else { ?>
               
            <?php } ?>
            <?php if ( $display_date == "yes" ) { ?>
               <p class="post_date" style="color: <?php echo esc_attr( $footer_color ); ?>"><?php echo get_the_date(); ?></p>
           <?php }
           else { ?>
               
            <?php } ?>
             <?php if ( $display_comments == "yes" ) { ?>
                 <div class="post_comments_wrapper">
                     <a href="<?php echo get_comments_link(); ?>"><p class="post_comments" style="color: <?php echo esc_attr( $footer_color ); ?>"><?php echo comments_number(); ?></p></a>
                 </div>
             <?php }
             else { ?>
                 
             <?php } ?>
        </div>
          <?php } 
else { ?>
      
  <?php } ?>
        <div class="post_excerpt_wrapper" style="background-color: <?php echo esc_attr( $excerpt_background_color ); ?>">
            <?php if ( $display_thumbnail == "yes" ) {
               ?> <div class="post_thumbnail_wrapper left">
                    <?php echo the_post_thumbnail('thumbnail'); ?>
                   </div>
                   <<?php echo esc_attr( $excerpt_size ); ?> class="post_excerpt" style="color: <?php echo esc_attr( $excerpt_color ); ?>;"><?php echo excerpt($excerpt_length) ?><a href="<?php echo get_permalink() ?>">Read More</a></<?php echo esc_attr( $excerpt_size ); ?>></div>
                
            <?php }
            
            else { ?>
                <<?php echo esc_attr( $excerpt_size ); ?> class="post_excerpt" style="color: <?php echo esc_attr( $excerpt_color ); ?>;"><?php echo excerpt($excerpt_length) ?><a href="<?php echo get_permalink() ?>">Read More</a></<?php echo esc_attr( $excerpt_size ); ?>></div>
           <?php } ?>
    </div>
<?php endwhile; ?>
    <?php if($pagination == 'yes'){ ?>
	<div class="navigation">
	    <div class="left"><?php echo previous_posts_link('<button class="button button-raised button-rounded button-nav">Previous Posts</button>') ?></div>
	    <div class="right"><?php echo next_posts_link('<button class="button button-raised button-rounded button-nav">Next Posts</button>') ?></div>
	</div>
	<?php } 
	else { ?>
	
	<?php } ?>
	<?php endif; ?>
<?php wp_reset_query(); ?>