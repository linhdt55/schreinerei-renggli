<?php

/**
 * Template Name: Angebot
 */
get_header();
?>

<main class="angebot-page">
    <?php
    $page_settings = get_field('page_settings');
    $tab_headers = [];
    $tab_contents = [];
    $tab_index = 0;
    ?>

    <?php if ($page_settings): ?>
        <?php foreach ($page_settings as $row): ?>
            <?php if ($row['acf_fc_layout'] === 'image_with_highlight_text'): ?>
                <!-- Image with highlight text section -->
                <section class="highlight-section">
                    <div class="container">
                        <div class="highlight-wrapper">
                            <?php if (!empty($row['section_image'])): ?>
                                <div class="highlight-image">
                                    <img src="<?php echo esc_url($row['section_image']['url']); ?>" alt="">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($row['highlight_title'])): ?>
                                <div class="highlight-text">
                                    <h2><?php echo esc_html($row['highlight_title']); ?></h2>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if ($row['acf_fc_layout'] === 'section_heading'): ?>
                <!-- Heading Section -->
                <section class="section-heading">
                    <div class="container">
                        <div class="section-heading__content">
                            <?php echo $row['heading']; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if ($row['acf_fc_layout'] === 'company_tabs_section'):
                $tab_id = 'tab-' . $tab_index;

                // HEADER
                $tab_headers[] = sprintf(
                    '<li class="%s" data-tab="%s">%s</li>',
                    $tab_index === 0 ? 'active' : '',
                    esc_attr($tab_id),
                    esc_html($row['tab_title'])
                );

                // CONTENT
                ob_start();
            ?>
                <div class="company-tabs__content <?php echo $tab_index === 0 ? 'active' : ''; ?>" id="<?php echo esc_attr($tab_id); ?>">
                    <div class="company-tabs__inner">
                        <div class="company-tabs__right">
                            <?php if (!empty($row['tab_content_title'])): ?>
                                <h3><?php echo esc_html($row['tab_content_title']); ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($row['tab_content_description'])): ?>
                                <div class="tab-description">
                                    <?php echo $row['tab_content_description']; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($row['tab_image'])): ?>
                            <div class="company-tabs__left">
                                <?php foreach ($row['tab_image'] as $img): ?>

                                    <?php
                                    $single_image = $img['image'] ?? null;
                                    if (!empty($single_image)): ?>
                                        <div class="company-tabs__left_img">
                                            <img src="<?php echo esc_url($single_image['url']); ?>" alt="<?php echo esc_attr($single_image['alt']); ?>">
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($row['tab_members'])): ?>
                        <div class="tab-members">
                            <?php foreach ($row['tab_members'] as $member): ?>
                                <div class="member-card">
                                    <?php if (!empty($member['image'])): ?>
                                        <img src="<?php echo esc_url($member['image']['url']); ?>" alt="<?php echo esc_attr($member['image']['alt']); ?>">
                                    <?php endif; ?>
                                    <div class="member-info">
                                        <strong><?php echo esc_html($member['name']); ?></strong>
                                        <div class="member_role"><?php echo ($member['role']); ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php
                $tab_contents[] = ob_get_clean();
                $tab_index++;
            endif; ?>
            <?php if ($row['acf_fc_layout'] === 'section_maps'): ?>
                <?php
                $company_name    = $row['company_name'];
                $address_line_1  = $row['address_line_1'];
                $address_line_2  = $row['address_line_2'];
                $phone_number    = $row['phone_number'];
                $email_address   = $row['email_address'];
                $opening_hours   = $row['opening_hours'];
                $map_image       = $row['map_image'];
                ?>

                <section class="section-maps">
                    <div class="container">
                        <div class="map-content-wrapper">
                            <div class="map-text">
                                <?php if (!empty($company_name)): ?>
                                    <h3 class="company-name"><?php echo esc_html($company_name); ?></h3>
                                <?php endif; ?>
                                <div class="address">
                                    <?php if (!empty($address_line_1)): ?>
                                        <p><?php echo esc_html($address_line_1); ?></p>
                                    <?php endif; ?>

                                    <?php if (!empty($address_line_2)): ?>
                                        <p><?php echo esc_html($address_line_2); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="phone">
                                    <?php if (!empty($phone_number)): ?>
                                        <p>Telefon: <?php echo esc_html($phone_number); ?></p>
                                    <?php endif; ?>

                                    <?php if (!empty($email_address)): ?>
                                        <p><?php echo esc_html($email_address); ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($opening_hours)): ?>
                                    <div class="opening-hours-map">
                                        <?php echo wp_kses_post($opening_hours); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if (!empty($map_image)): ?>
                                <div class="map-image">
                                    <img src="<?php echo esc_url($map_image['url']); ?>" alt="<?php echo esc_attr($map_image['alt']); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <?php if ($row['acf_fc_layout'] === 'contact_form'): ?>
                <?php
                $form_shortcode = $row['short_code_contact_form_7'];
                $heading = $row['heading'];
                ?>
                <section class="section-contact-form">
                    <div class="container">
                        <h3><?php echo esc_html($heading); ?></h3>
                        <?php if (!empty($form_shortcode)): ?>
                            <?php echo do_shortcode($form_shortcode); ?>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($tab_headers)): ?>
        <div class="section-company-tabs">
            <div class="container">
                <div class="company-tabs vertical-tabs">
                    <div class="vertical-tabs__left">
                        <ul class="vertical-tabs__nav">
                            <?php echo implode('', $tab_headers); ?>
                        </ul>
                    </div>
                    <div class="vertical-tabs__right">
                        <?php echo implode('', $tab_contents); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>