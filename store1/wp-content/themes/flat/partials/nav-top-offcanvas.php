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
        <h1 class="site-title name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
    </hgroup>
    </ul>    
<?php endif; ?>
		<section class="top-bar-section right">
			<?php joints_top_nav(); ?>
			<div class="topbar_search_wrapper">
					<form role="search" method="get" id="searchform" class="topbar_search_form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input id="s" class="topbar_search" value="" name="search" type="search" placeholder="Search...">
						<!--<input class="sb-search-submit" type="submit" value="Search" id="searchsubmit">-->
					</form>
			</div>
					<div class="topbar_cart_wrapper">
						<div class="topbar_cart_container">
							<svg version="1.1" id="shopping_cart" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 19.25 19.25" style="enable-background:new 0 0 19.25 19.25;" xml:space="preserve">
<g>
	<g id="Layer_1_107_">
		<g>
			<path style="fill:#030104;" d="M19.006,2.97c-0.191-0.219-0.466-0.345-0.756-0.345H4.431L4.236,1.461
				C4.156,0.979,3.739,0.625,3.25,0.625H1c-0.553,0-1,0.447-1,1s0.447,1,1,1h1.403l1.86,11.164c0.008,0.045,0.031,0.082,0.045,0.124
				c0.016,0.053,0.029,0.103,0.054,0.151c0.032,0.066,0.075,0.122,0.12,0.179c0.031,0.039,0.059,0.078,0.095,0.112
				c0.058,0.054,0.125,0.092,0.193,0.13c0.038,0.021,0.071,0.049,0.112,0.065c0.116,0.047,0.238,0.075,0.367,0.075
				c0.001,0,11.001,0,11.001,0c0.553,0,1-0.447,1-1s-0.447-1-1-1H6.097l-0.166-1H17.25c0.498,0,0.92-0.366,0.99-0.858l1-7
				C19.281,3.479,19.195,3.188,19.006,2.97z M17.097,4.625l-0.285,2H13.25v-2H17.097z M12.25,4.625v2h-3v-2H12.25z M12.25,7.625v2
				h-3v-2H12.25z M8.25,4.625v2h-3c-0.053,0-0.101,0.015-0.148,0.03l-0.338-2.03H8.25z M5.264,7.625H8.25v2H5.597L5.264,7.625z
				 M13.25,9.625v-2h3.418l-0.285,2H13.25z"/>
			<circle style="fill:#030104;" cx="6.75" cy="17.125" r="1.5"/>
			<circle style="fill:#030104;" cx="15.75" cy="17.125" r="1.5"/>
		</g>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
<div class="topbar_cart_info_qty_wrapper">
	<div class="topbar_cart_info_qty_container">
		<p class="topbar_qty_bubble"><?php echo $qty; ?></p>
	</div>
</div>
<div class="topbar_cart_info_wrapper">
	<div class="topbar_cart_info_container">
			<div class="topbar_cart_item_wrapper">
				<div class="topbar_cart_item_container">
					<p class="topbar_cart_item"><?php echo $item; ?></p>
					<div class="topbar_item_qty">
					<a href="#"><div class="triangle-up"></div></a>
					<p class="qty"><?php echo $qty; ?></p>
					<a href="#"><div class="triangle-down"></div></a>
					</div>
				</div>
			</div>
					<div class="topbar_cart_total_wrapper">
			<div class="topbar_total_container">
				<p class="topbar_total_title">Price:</p>
				<p class="topbar_total_price"><?php echo $total; ?></p>
				
			</div>
			</div>
		</div>
		
		
	</div>
	
	
</div>
						</div>
						
						
					</div>
		</section>
	</nav>
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