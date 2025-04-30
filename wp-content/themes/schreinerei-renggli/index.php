<?php get_header(); ?>
<main class="homepage">

    <!-- Section: Hero Image + Slogan -->
    <section class="hero">
        <div class="container">
            <div class="hero-image">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/hero.jpg" alt="Werkstatt Renggli" />
            </div>
            <div class="hero-caption">
                <p class="hero-sub">MIT LIEBE ZUR NATUR, ZUM SCHÖNEN UND ZUM HOLZHANDWERK AN SICH</p>
                <h1 class="hero-title">Schreinerei Renggli AG</h1>
                <p class="hero-desc">Ihre Schreinerei in Basel seit 1943</p>
            </div>
        </div>
    </section>

    <!-- Các section nội dung tiếp theo bạn có thể thêm ở đây -->
    <!-- Section: About Us -->
    <section class="about-us">
        <div class="container about-us-container">
            <div class="about-us-title">
                <h2>Über uns</h2>
            </div>
            <div class="about-us-content">
                <p>Innen- und Aussenräume verändern, durch Schreinera...</p>
                <p>Oft entstehen im persönlichen Gespräch neue Perspektiven...</p>
                <p>Zögern Sie nicht, sprechen Sie uns an – wir freuen uns auf Sie.</p>
                <a href="<?php echo site_url('/ueber-uns'); ?>" class="about-us-button">mehr über uns</a>
            </div>
        </div>
    </section>

    <!-- Section: Unser Angebot -->
    <section class="our-services">
        <div class="container">
            <div class="services-intro">
                <h2>Unser Angebot – präzise, vielseitig, nachhaltig</h2>
                <p>
                Ob Altbausanierung, Innenausbau, Türen, Fenster oder Servicearbeiten – wir realisieren jedes Projekt mit Sorgfalt und handwerklicher Präzision. Auch bei denkmalgeschützten Gebäuden oder der Restauration alter Fenster bringen wir Erfahrung, moderne Technik und nachhaltige Materialien zum Einsatz. Für Reparaturen und Wartung sind wir Ihr zuverlässiger Partner – kompetent, individuell und kundenorientiert.
                </p>
                <a href="<?php echo site_url('/angebot'); ?>" class="services-btn">mehr über unser Angebot</a>
            </div>

            <div class="services-list">
                <div class="service-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/service1.jpg" alt="Altbausanierungen">
                    <p>Altbausanierungen</p>
                </div>
                <div class="service-item active">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/service2.jpg" alt="Fenster & Türen">
                    <p><strong>Fenster & Türen</strong></p>
                </div>
                <div class="service-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/service3.jpg" alt="Serviceschreiner">
                    <p>Serviceschreiner</p>
                </div>
                <div class="service-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/service4.jpg"
                        alt="Allgemeine Schreinerarbeiten">
                    <p>Allgemeine Schreinerarbeiten</p>
                </div>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>