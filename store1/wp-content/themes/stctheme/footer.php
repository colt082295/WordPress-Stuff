<!-- Begin Footer -->
<div id="footer">
<footer>
<div class="foot-out-wrap">
<div class="foot-in-wrap">
<ul class="foot-ul">


	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<div id="footer-1" class="footer-column" role="complementary">
		<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>

	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->
						

	<?php endif; ?>




	<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
		<div id="footer-2" class="footer-column" role="complementary">
		<?php dynamic_sidebar( 'footer-2' ); ?>
		</div>
	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->

	<?php endif; ?>


	<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
		<div id="footer-3" class="footer-column" role="complementary">
		<?php dynamic_sidebar( 'footer-3' ); ?>
		</div>

	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->
						

	<?php endif; ?>


	<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
		<div id="footer-4" class="footer-column" role="complementary">
		<?php dynamic_sidebar( 'footer-4' ); ?>
		</div>
	<?php else : ?>

	<!-- This content shows up if there are no widgets defined in the backend. -->
						

	<?php endif; ?>

</div>
</ul>
</div>
</div>
</footer>
</div>
<!-- Don't add scripts here. Enqueue them in the scripts file. -->
<!-- End Footer -->
<?php wp_footer(); ?>
</body>
</html>