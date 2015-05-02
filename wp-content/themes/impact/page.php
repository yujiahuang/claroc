<?php while (have_posts()) : the_post(); ?>
  <div id="belt"></div>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
