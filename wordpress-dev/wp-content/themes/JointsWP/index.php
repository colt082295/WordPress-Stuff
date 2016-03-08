<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row">
			
				    <div id="main" class="large-8 medium-8 columns" role="main">
					 
					  <!-- To see additional archive styles, visit the /partials directory -->
					    <?php get_template_part( 'partials/loop', 'archive' ); ?>
								
				    </div> <!-- end #main -->
    
				    <?php get_sidebar(); ?>
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->
<script type='text/javascript' id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3001/browser-sync/browser-sync-client.2.2.1.js'><\/script>".replace("HOST", location.hostname));
//]]></script>
<?php get_footer(); ?>