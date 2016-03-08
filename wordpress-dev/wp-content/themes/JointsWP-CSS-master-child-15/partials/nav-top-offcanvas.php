<div id="nav-bar-wrapper-side" class=" show-for-medium-up">
	<nav class="top-bar-side" data-topbar>
		<ul class="title-area-side">
			<!-- Title Area -->
			<li class="name-side">
				<h1> <a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1>
			</li>
		</ul>		
		<section class="top-bar-section-side">
			<?php joints_top_nav(); ?>
		</section>
	</nav>
</div>

<div class="show-for-small-only">
	<nav class="tab-bar">
		<section class="middle tab-bar-section">
			<h1 class="title"><?php bloginfo('name'); ?></h1>
		</section>
		<section class="left-small">
			<a class="left-off-canvas-toggle menu-icon" ><span></span></a>
		</section>
	</nav>
</div>
		<!-- Mobile offcanavs -->				
<aside class="left-off-canvas-menu show-for-small-only">
	<ul class="off-canvas-list">
		<li><label>Navigation</label></li>
			<?php joints_top_nav(); ?>    
	</ul>
</aside>
			
<a class="exit-off-canvas"></a>