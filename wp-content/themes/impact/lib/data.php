<?php

define( "NUM_ABBR_WORDS", 50 );

add_action( 'wp_ajax_get_data', 'get_data' );
add_action( 'wp_ajax_nopriv_get_data', 'get_data' );

function get_excerpt_by_id( $post_id ){
  global $post;  
  $save_post = $post;
  $post = get_post($post_id);
  setup_postdata( $post );
  $output = get_the_excerpt();
  $post = $save_post;
  return $output;
}

function get_data() {

  $all_posts = array();

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

  foreach ($categories as $c) {
    $args = array(
      'posts_per_page'   => 5,
      'offset'           => 0,
      'category'         => $c->term_id,
      'category_name'    => '',
      'orderby'          => 'post_date',
      'order'            => 'DESC',
      'include'          => '',
      'exclude'          => '',
      'meta_key'         => '',
      'meta_value'       => '',
      'post_type'        => '',
      'post_mime_type'   => '',
      'post_parent'      => '',
      'post_status'      => 'publish',
      'suppress_filters' => true 
    );
    $posts = get_posts( $args );
    foreach ($posts as &$p) {
      $p->post_content = get_excerpt_by_id($p->ID);
    }
    $all_posts[$c->name] = array('posts' => $posts, 'url' => get_category_link( $c->term_id ));
  }
  wp_send_json($all_posts);
}
?>