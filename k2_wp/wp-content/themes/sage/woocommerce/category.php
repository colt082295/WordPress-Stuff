<?php
 global $woo_options;
 get_header();
?>
    <!-- #content Starts -->
    <?php woo_content_before(); ?>
    <div id="content" class="col-full">
 
        <div id="main-sidebar-container">    
 
            <!-- #main Starts -->
            <?php woo_main_before(); ?>
            <div id="main" class="col-left">
 
            <?php get_template_part( 'loop', 'archive' ); ?>
 
            </div><!-- /#main -->
            <?php woo_main_after(); ?>
 
 
        </div><!-- /#main-sidebar-container -->         
 
 
    </div><!-- /#content -->
    <?php woo_content_after(); ?>
 
<?php get_footer(); ?>