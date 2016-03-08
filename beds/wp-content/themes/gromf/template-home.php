<?php
/**
 * Template Name: Home Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'head'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
