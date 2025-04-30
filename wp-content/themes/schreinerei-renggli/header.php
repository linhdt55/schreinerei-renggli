<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <div class="container header-container">
    <div class="logo">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.png" alt="Basler Schreiner" />
      </a>
    </div>
    <nav class="main-nav">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'menu_class' => 'menu',
          'container' => false
        ]);
      ?>
      <a href="<?php echo site_url('/kontakt'); ?>" class="btn-kontakt">Kontakt</a>
    </nav>
  </div>
</header>
