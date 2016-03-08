<div class="sticky">
<nav class="top-bar" data-topbar>
	<ul class="title-area">
		<li class="name">
			<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/beds_logo.gif"/></a>
		</li>
		<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	</ul>

	<section class="top-bar-section">
		<div class="top-bar-inner">
	<?php
	wp_nav_menu(array(
    	'container' => false,
    	'menu_class' => 'left',
    	'theme_location' => 'primary_navigation',
        'walker' => new Top_Bar_Walker(),
	));
	?>
	<div class="top-bar-info-container">
	<span class="top-bar-info">251-621-2006</span>
	<span class="top-bar-info"><a href="https://www.facebook.com/BedsandBlindsGulfCoast"><i class="fa fa-facebook"></i></a></span>
	</div>
	</div>
	</section>
</nav>
</div>
<?php
if ( is_front_page() ) {	
	echo '<div class="slider-home">';
putRevSlider( 'slider1' );
echo '</div>';
    }
?>