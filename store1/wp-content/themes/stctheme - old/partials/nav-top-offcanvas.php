<div class="nav-bar-out-wrapper">
<div id="nav-bar-wrapper" class=" show-for-medium-up">
	<nav class="top-bar" data-topbar>
		<ul class="title-area">
			<!-- Title Area -->
			
			<?php if ( get_theme_mod( 'stc_logo_image' ) ) : ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
 
        <img id="logo" src="<?php echo get_theme_mod( 'stc_logo_image' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
 
    </a>
 
    <?php else : ?>
               
    <hgroup id="tagline-group">
        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
    </hgroup>
               
<?php endif; ?>
		<section class="top-bar-section right">
			<?php joints_top_nav(); ?>
					<li class="has-form">
  <div class="row collapse">
    <div class="large-8 small-9 columns">
      <input type="text" placeholder="Find Stuff">
    </div>
    <div class="large-4 small-3 columns">
      <a href="#" class="alert button expand">Search</a>
    </div>
  </div>
</li>
		</section>
	</nav>
</div>
</div>

<div class="mobile-top-bar">
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
</div>	
						
<aside class="left-off-canvas-menu show-for-small-only">
	<ul class="off-canvas-list">
		<li><label>Navigation</label></li>
			<?php joints_top_nav(); ?>    
	</ul>
</aside>
			
<a class="exit-off-canvas"></a>