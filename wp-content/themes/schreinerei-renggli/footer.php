<?php
// Get ACF fields from Options Page
$footer_logo     = get_field('footer_company_logo', 'option');
$footer_hours    = get_field('footer_opening_hours', 'option');
$footer_partners = get_field('footer_partner_logos', 'option');
$footer_credits  = get_field('footer_credits_links', 'option');
?>

<footer class="site-footer">
  <div class="footer-top container">

    <!-- Company Logo -->
    <?php if ($footer_logo): ?>
      <div class="footer-logo">
        <img src="<?php echo esc_url($footer_logo['url']); ?>" alt="<?php echo esc_attr($footer_logo['alt']); ?>">
      </div>
    <?php endif; ?>

    <!-- Info & Opening Hours -->
    <div class="footer-info">
      <?php if (!empty($footer_hours)): ?>
        <?php foreach ($footer_hours as $hour): ?>
          <div class="opening-hours">
            <?php if (!empty($hour['opening_hours_title'])): ?>
              <h4><?php echo esc_html($hour['opening_hours_title']); ?></h4>
            <?php endif; ?>
            <?php if (!empty($hour['opening_days'])): ?>
              <div class="hours"><?php echo wp_kses_post($hour['opening_days']); ?></div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <!-- Partner Logos -->
    <?php if (!empty($footer_partners)): ?>
      <div class="footer-partners">
        <ul class="partners">
          <?php foreach ($footer_partners as $partner): ?>
            <?php
            $logo = $partner['partner_logo'] ?? null;
            $link = $partner['partner_link'] ?? null;
            $url = is_array($link) ? ($link['url'] ?? '') : $link;
            $target = is_array($link) ? ($link['target'] ?? '_self') : '_self';
            ?>
            <?php if (!empty($logo['url'])): ?>
              <li>
                <?php if (!empty($url)): ?>
                  <a href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>">
                    <img src="<?php echo esc_url($logo['url']); ?>"
                      alt="<?php echo esc_attr($logo['alt'] ?? 'Partner Logo'); ?>">
                  </a>
                <?php else: ?>
                  <img src="<?php echo esc_url($logo['url']); ?>"
                    alt="<?php echo esc_attr($logo['alt'] ?? 'Partner Logo'); ?>">
                <?php endif; ?>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>
  </div>

  <!-- Footer Bottom -->
  <div class="footer-bottom">
    <div class="container">
      <?php if (!empty($footer_credits)): ?>
        <div class="credits-text">
          <!-- Copyright -->
          <?php if (!empty($footer_credits['copyright_text'])): ?>
            <span><?php echo esc_html($footer_credits['copyright_text']); ?></span>
          <?php endif; ?>

          <!-- Links -->
          <span class="links">
            <?php if (!empty($footer_credits['impressum'])): ?>
              <a href="<?php echo esc_url($footer_credits['impressum']['url']); ?>"
                target="<?php echo esc_attr($footer_credits['impressum']['target'] ?? '_self'); ?>">
                <?php echo esc_html($footer_credits['impressum']['title']); ?>
              </a>
            <?php endif; ?>
            <?php if (!empty($footer_credits['privacy_policy'])): ?>
              | <a href="<?php echo esc_url($footer_credits['privacy_policy']['url']); ?>"
                target="<?php echo esc_attr($footer_credits['privacy_policy']['target'] ?? '_self'); ?>">
                <?php echo esc_html($footer_credits['privacy_policy']['title']); ?>
              </a>
            <?php endif; ?>
          </span>

          <!-- Webdesign -->
          <?php if (!empty($footer_credits['webdesign_text'])): ?>
            <span class="webdesign"><?php echo wp_kses_post($footer_credits['webdesign_text']); ?></span>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>