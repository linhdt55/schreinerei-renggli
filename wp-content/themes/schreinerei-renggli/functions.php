<?php 
function mytheme_enqueue_assets() {
  wp_enqueue_style('mytheme-style', get_stylesheet_uri());
  $css_dir = get_stylesheet_directory() . '/css/';
  $css_files = glob($css_dir . '*.css');

  if (!empty($css_files)) {
      foreach ($css_files as $file) {
          $file_name = basename($file, '.css');

          wp_enqueue_style(
              $file_name, 
              get_stylesheet_directory_uri() . '/css/' . $file_name . '.css',
              array(), 
              '1.0', 
              'all'
          );
      }
  }

  wp_enqueue_script('jquery');
  wp_enqueue_script(
      'custom-script',
      get_stylesheet_directory_uri() . '/js/custom-script.js',
      array('jquery'),
      null,
      true 
  );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');

function enqueue_swiper_assets() {
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');
