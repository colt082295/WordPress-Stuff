<?php
/**
 * Template Name: Sidebar Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <div class="wrap">
    <div class="content small-12 medium-8 columns">
      <?php the_content(); ?>
    </div>
    <aside class="sidebar small-12 medium-4 columns">
    <?php get_sidebar(); ?>
    </aside>
  </div>
<?php endwhile; ?>
