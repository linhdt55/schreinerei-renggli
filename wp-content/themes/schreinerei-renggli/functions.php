<?php 

function schreinerei_theme_setup() {
    register_nav_menu('primary', 'Primary Menu');
  }
  add_action('after_setup_theme', 'schreinerei_theme_setup');

  function schreinerei_enqueue_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'schreinerei_enqueue_styles');
