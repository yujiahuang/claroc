<?php

/**
 * Add "first" and "last" CSS classes to dynamic sidebar widgets. 
 * Also adds numeric index class for each widget (widget-1, widget-2, etc.)
 */
function widget_first_last_classes($params) {

  global $my_widget_num;
  $this_id = $params[0]['id'];
  $arr_registered_widgets = wp_get_sidebars_widgets();

  if(!$my_widget_num) {
    $my_widget_num = array();
  }

  if(!isset($arr_registered_widgets[$this_id]) 
  || !is_array($arr_registered_widgets[$this_id])) { 
    return $params; // No widgets in this sidebar... bail early.
  }

  if(isset($my_widget_num[$this_id])) { 
  // See if the counter array has an entry for this sidebar
    $my_widget_num[$this_id] ++;
  } else { // If not, create it starting with 1
    $my_widget_num[$this_id] = 1;
  }

  // Add a widget number class for additional styling options
  $class = 'class="widget-' . $my_widget_num[$this_id] . ' '; 
  // $class = 'class="'; 

  if($my_widget_num[$this_id] == 1) { // If this is the first widget
    $class .= 'active ';
  } 
  // elseif($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { 
  // // If this is the last widget
  //   $class .= 'widget-last ';
  // }
  
  // Insert our new classes into "before widget"
  $params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']);

  return $params;

}
add_filter('dynamic_sidebar_params','widget_first_last_classes');

?>