<?php
get_header();
?>
<?php
$slides = get_field('section_slideshow');
$has_images = false;
$about_section = get_field('section_about_us');
$section = get_field('section_services');
?>
<?php if (have_rows('page_settings')): ?>
    <?php while (have_rows('page_settings')): the_row(); ?>

        <?php if (get_row_layout() === 'section_slideshow' && have_rows('section_slideshow')): ?>
            <section class="page_slideshows_container">
                <div class="slideContainer">
                    <div class="swiper slideshow-swiper">
                        <div class="slideshow-wrapper">
                            <div class="swiper swiper-image">
                                <div class="swiper-wrapper">
                                    <?php while (have_rows('section_slideshow')): the_row(); 
                                        $image = get_sub_field('slide_image');
                                    ?>
                                        <?php if (!empty($image)): ?>
                                            <div class="swiper-slide">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                            </div>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                        <!-- Content Slider -->
                        <div class="swiper swiper-content">
                            <div class="swiper-wrapper">
                                <?php while (have_rows('section_slideshow')): the_row(); ?>
                                    <div class="swiper-slide">
                                        <div class="slide-content">
                                            <?php if ($caption = get_sub_field('slide_caption')): ?>
                                                <span class="slide-caption"><?php echo esc_html($caption); ?></span>
                                            <?php endif; ?>

                                            <?php if ($title = get_sub_field('slide_title')): ?>
                                                <h2 class="slide-title"><?php echo $title ?></h2>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <?php if (get_row_layout() === 'section_about_us'):
            $title = get_sub_field('section_title');
            $content = get_sub_field('content_text');
            $button = get_sub_field('button_link');
            $has_title = !empty($title);
        ?>
        <section class="page_about_container <?php echo $has_title ? 'has-title' : 'no-title'; ?>">
            <div class="container">
                <div class="about-section">
                    <?php if ($has_title): ?>
                        <h2 class="section-title"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                    
                    <div class="aboutS-content">
                        <?php if (!empty($content)): ?>
                            <div class="section-content">
                                <?php echo wp_kses_post($content); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($button)): ?>
                            <a class="section-button" href="<?php echo esc_url($button['url']); ?>"
                               target="<?php echo esc_attr($button['target'] ?: '_self'); ?>">
                                <?php echo esc_html($button['title']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>
        <?php if (get_row_layout() === 'section_services'):
            $title = get_sub_field('section_title');
            $desc = get_sub_field('section_description');
            $button = get_sub_field('button_link');
            $services = get_sub_field('service_items');
        ?>
        <section class="section-services">
            <div class="container">

                <?php if (!empty($title)): ?>
                    <h2 class="section-title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>

                <?php if (!empty($desc)): ?>
                    <div class="section-description">
                        <?php echo wp_kses_post($desc); ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($button)): ?>
                    <div class="section-button">
                        <a href="<?php echo esc_url($button['url']); ?>"
                           target="<?php echo esc_attr($button['target'] ?? '_self'); ?>"
                           class="btn">
                            <?php echo esc_html($button['title']); ?>
                        </a>
                    </div>
                <?php endif; ?>

                <?php if (!empty($services)): ?>
                    <div class="services-grid">
                        <?php foreach ($services as $service): 
                            $image = $service['service_image'];
                            $link = $service['service_title'];
                            $tabID = $service['tab_id'];
                            $full_url = esc_url($link['url']) . '#' . esc_attr($tabID);
                        ?>
                        <div class="service-box">
                            <?php if (!empty($link) && !empty($image)): ?>
                                <a href="<?php echo $full_url; ?>" target="<?php echo esc_attr($link['target'] ?? '_self'); ?>">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                    <div class="service-title"><?php echo esc_html($link['title']); ?></div>
                                </a>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>                                     
    <?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();
?>