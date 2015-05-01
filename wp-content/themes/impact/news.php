<?php
/**
 * Template Name: News
 */
?>

<?php while (have_posts()) : the_post(); ?>
    <div id="news-board-wrapper">
      <script src="<?= get_stylesheet_directory_uri(); ?>/dist/scripts/news.js"></script>
      <div class="clear"></div>
    </div>
    <div id="icon-list">
      <div class="container">
        <?php dynamic_sidebar('sidebar-front-page-list'); ?>
      </div>
    </div>
<?php endwhile; ?>



