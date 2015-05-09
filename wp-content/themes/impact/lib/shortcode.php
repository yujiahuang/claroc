<?php
function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('this_year', 'year_shortcode');
?>