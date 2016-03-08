<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row">
				
				    <div id="main" class="large-8 medium-8 columns first" role="main">
				
					    <?php if (is_category()) { ?>
						    <h2>
							    <span>Category:</span> <?php single_cat_title(); ?>
					    	</h2>
					    
					    <?php } elseif (is_tag()) { ?> 
						    <h1>
							    <span>Tagged:</span> <?php single_tag_title(); ?>
						    </h1>
					    <?php } elseif (is_day()) { ?>
						    <h1>
	    						<span class="post_date">Daily Archives:</span> <?php the_time('l, F j, Y'); ?>
						    </h1>
		
		    			<?php } elseif (is_month()) { ?>
			    		    <h1>
				    	    	<span>Monthly Archives:</span> <?php the_time('F Y'); ?>
					        </h1>
					
					    <?php } elseif (is_year()) { ?>
					        <h1>
					    	    <span>Yearly Archives:</span> <?php the_time('Y'); ?>
					        </h1>
					    <?php } ?>
					    	<!-- To see additional archive styles, visit the /partials directory -->
					    	<?php get_template_part( 'partials/loop', 'archive' ); ?>					
			
    				</div> <!-- end #main -->
    
	    			<?php get_sidebar(); ?>
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

<?php get_footer(); ?>