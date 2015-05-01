<?php use Roots\Sage\Nav\NavWalker; ?>

<div id="header" class="container-fluid navbar-fixed-top">
  <div id="title" class="container">
    <a href="<?= esc_url(home_url('/')); ?>">
      <img class="hidden-xs" src="<?= get_bloginfo('template_directory'); ?>/dist/images/claroc_logo_purple_120.png" alt="">
      <div class="name">
        <h1><?php bloginfo('name'); ?><br></h1>
        <span class="hidden-xs"><?php bloginfo('description'); ?></span>
      </div>
    </a>
  </div>
  <header class="banner navbar navbar-default" role="banner">
    <div class="container items">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <nav class="collapse navbar-collapse" role="navigation">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 
            'walker' => new NavWalker(), 'menu_class' => 'nav navbar-nav']);
        endif;
        ?>
      </nav>
    </div>
  </header>
</div>