<?php
/**
 * Template Name: Supervisors
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <div id="supervisors">

    <div class="dropdown" id="select-year">
      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-label">
        <?php 
          $widgets = wp_get_sidebars_widgets()['sidebar-supervisors'];
          $i = 0;
          $default_title;
          foreach($widgets as $w) {
            $option_name = $wp_registered_widgets[$w]['callback'][0]->option_name;
            $widget_data = get_option($option_name);
            $id = str_replace("wp_editor_widget-", "", $w);
            $title = $widget_data[$id]['title'];
            if($i == 0) {
              echo '<li class="active"><a href="#'.$w.'" data-toggle="tab">第 '.$title.' 屆理監事</a></li>';
              $default_title = "第 ".$title." 屆理監事";
            }
            else
              echo '<li><a href="#'.$w.'" data-toggle="tab">第 '.$title.' 屆理監事</a></li>';
            ++$i;
          }
        ?>
      </ul>
      <a href="#" id="dropdown-label" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="select-year-title"><?= $default_title ?></span>
        <span class="caret"></span>
      </a>
    </div>
    <div class="tab-content">
      <?php dynamic_sidebar('sidebar-supervisors'); ?>
    </div>
  </div>
<?php endwhile; ?>



