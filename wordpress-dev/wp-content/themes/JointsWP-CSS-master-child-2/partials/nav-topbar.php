<div class="large-12 columns nav-column">
	<div class="contain-to-grid nav-grid">
	
	<!-- If you want to use the more traditional "fixed" navigation.
		 simply replace "sticky" with "fixed" -->

		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<!-- Title Area -->
				<?php if ( get_theme_mod( 'stc_logo_image' ) ) : ?>
    <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
 
        <img class="logo" src="<?php echo get_theme_mod( 'stc_logo_image' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
 
    </a>
 
    <?php else : ?>
               
    <div class="name">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    </div>
               
<?php endif; ?>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span>Menu</span></a>
				</li>
			</ul>		
			<section class="top-bar-section">
				<?php joints_main_nav(); ?>
				<form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
     			<fieldset class="search-field">
				    <div class="search-box-wrapper">
				      <input type="search" class="search-box" placeholder="Find Stuff"/>
				      <button type="submit" alt="Search" id="search-button">
				      	<i class="fa fa-search" ></i>
				      </button>
				    </div>
				</fieldset>
				</form>
			</section>
		</nav>
	</div>
</div>