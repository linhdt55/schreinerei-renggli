<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Schreinerei Renggli</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
// Get all header fields from ACF Options Page
$header_logo         = get_field('header_logo', 'option');
$navigation_settings = get_field('navigation_settings', 'option');
$action_button       = get_field('action_button', 'option');
?>

    <header class="site-header">
        <div class="container">
            <div class="header-inner">
                <!-- Logo Section -->
                <?php if ($header_logo): ?>
                <div class="header-logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo esc_url($header_logo['url']); ?>"
                            alt="<?php echo esc_attr($header_logo['alt']); ?>">
                    </a>
                </div>
                <?php endif; ?>
                <div class="header-right">
                    <div class="nav-button-mobile">
                        <div class="nav-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- Navigation Menu -->
                    <?php if ($navigation_settings): ?>
                    <nav class="main-navigation">
                        <ul>
                            <?php foreach ($navigation_settings as $item): ?>
                            <?php 
                    $link = $item['menu_title']; // This is a Link field
                    if ($link): 
                ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>" <?php if (!empty($link['target'])): ?>
                                    target="<?php echo esc_attr($link['target']); ?>" <?php endif; ?>>
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                    <?php endif; ?>

                    <!-- Action Button -->
                    <?php if ($action_button): ?>
                    <div class="header-action-button">
                        <a href="<?php echo esc_url($action_button['url']); ?>" class="btn"
                            <?php if (!empty($action_button['target'])): ?>
                            target="<?php echo esc_attr($action_button['target']); ?>" <?php endif; ?>>
                            <?php echo esc_html($action_button['title']); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>