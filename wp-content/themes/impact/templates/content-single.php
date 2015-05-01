<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
      <time class="updated" datetime="<?= get_the_time('c'); ?>">
        <div class="date"><?= get_the_date("m") ?>．<?= get_the_date("d") ?></div>
        <div class="year"><?= get_the_date("Y") ?></div>
        <div class="week"><?= get_the_date("l") ?></div>
      </time>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
