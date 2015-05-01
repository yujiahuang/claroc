<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <time class="updated" datetime="<?= get_the_time('c'); ?>">
      <div class="date"><?= get_the_date("m") ?>．<?= get_the_date("d") ?></div>
      <div class="year"><?= get_the_date("Y") ?></div>
      <div class="week"><?= get_the_date("l") ?></div>
    </time>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
