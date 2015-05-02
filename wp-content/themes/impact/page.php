<?php while (have_posts()) : the_post(); ?>
  <div id="belt"></div>
  <?php get_template_part('templates/page', 'header'); ?>
  <div class="container" id="page-content">
    <?php get_template_part('templates/content', 'page'); ?>
  </div>
<?php endwhile; ?>
