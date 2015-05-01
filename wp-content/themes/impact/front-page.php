<?php
/**
 * Template Name: Front Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <div class="parallax">
    <div class="cover-img" 
      style="background-image: 
      url('<?= get_stylesheet_directory_uri() ?>/dist/images/cover.jpg');">
    </div>
    <div id="cover">
      <?php get_template_part('templates/content', 'page'); ?>
    </div>
    <div id="belt"></div>
    <div id="news-board-wrapper">
      <script src="<?= get_bloginfo('template_directory'); ?>/dist/scripts/news.js"></script>
      <div class="clear"></div>
    </div>
    <div id="intro">
      <div class="container">
        <?php dynamic_sidebar('sidebar-front-page-intro'); ?>
      </div>
    </div>
    <div id="icon-list">
      <div class="container">
        <?php dynamic_sidebar('sidebar-front-page-list'); ?>
      </div>
    </div>
    <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </div>
<?php endwhile; ?>



