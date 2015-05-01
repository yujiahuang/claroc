<div class="page-header">
  <h1>
    <?php single_cat_title(); ?>
  </h1>
</div>

<div class="categories">
  <?php 
  $args = array(
    'type'                     => 'post',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'id',
    'order'                    => 'ASC',
    'hide_empty'               => 0,
    'hierarchical'             => 1,
    'exclude'                  => '1',
    'include'                  => '',
    'number'                   => '',
    'taxonomy'                 => 'category',
    'pad_counts'               => false 
    ); 
  $categories = get_categories( $args );
  ?>
  <ul>
    <?php foreach($categories as $c): ?>
      <li class="<?php if(is_category($c->name)) echo 'active'; ?>">
        <a href="<?= get_category_link( $c->term_id ) ?>"><?= $c->name ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>
