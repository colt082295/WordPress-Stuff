					<footer class="footer" role="contentinfo">
						<div id="inner-footer" class="row">
							<div class="large-12 medium-12 columns">
								<nav role="navigation">
		    					<?php joints_footer_links(); ?>
		    				</nav>
		    			</div>
			        <div class="large-12 medium-12 columns">
								<p class="source-org copyright left">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
								<div class="foot-right right">
									<?php if ( is_active_sidebar( 'footer1' ) ) : ?>
	
										<?php dynamic_sidebar( 'footer1' ); ?>
	
									<?php else : ?>
	
										<!-- This content shows up if there are no widgets defined in the backend. -->
							
										<div class="alert help">
											<p><?php _e("Please activate some Widgets.", "jointstheme");  ?></p>
										</div>
									
									<?php endif; ?>
								</div>
							</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div> <!-- end #container -->
			</div> <!-- end .inner-wrap -->
		</div> <!-- end .off-canvas-wrap -->
		<!-- all js scripts are loaded in library/joints.php -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->