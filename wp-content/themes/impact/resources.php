<?php
/**
 * Template Name: Resources
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <div id="resources">
    <ul class="nav nav-pills">
      <?php 
        $widgets = wp_get_sidebars_widgets()['sidebar-resources'];
        $i = 0;
        foreach($widgets as $w) {
          $option_name = $wp_registered_widgets[$w]['callback'][0]->option_name;
          $widget_data = get_option($option_name);
          $id = str_replace("wp_editor_widget-", "", $w);
          $title = $widget_data[$id]['title'];
          if($i == 0)
            echo '<li class="pill active"><a href="#'.$w.'" data-toggle="tab">'.$title.'</a></li>';
          else
            echo '<li class="pill"><a href="#'.$w.'" data-toggle="tab">'.$title.'</a></li>';
          ++$i;
        }
      ?>
    </ul>
    <div class="tab-content">
      <?php dynamic_sidebar('sidebar-resources'); ?>
    </div>
  </div>
<?php endwhile; ?>



