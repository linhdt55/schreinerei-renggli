jQuery(document).ready(function ($) {
    const $swiperImage = $('.swiper-image');
    const $swiperContent = $('.swiper-content');

    if ($swiperImage.length && $swiperContent.length) {
        const swiperImage = new Swiper('.swiper-image', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }
        });

        const swiperContent = new Swiper('.swiper-content', {
            loop: true,
        });

        swiperImage.controller.control = swiperContent;
        swiperContent.controller.control = swiperImage;
    } else {
        console.warn('Swiper containers not found');
    }

    const tabHeaders = document.querySelectorAll('.vertical-tabs__nav li');
    const tabContents = document.querySelectorAll('.company-tabs__content');

    tabHeaders.forEach(header => {
        header.addEventListener('click', function () {
            const targetId = this.getAttribute('data-tab');

            // Remove active from all headers
            tabHeaders.forEach(h => h.classList.remove('active'));
            // Add active to clicked header
            this.classList.add('active');

            // Hide all contents
            tabContents.forEach(content => {
                content.classList.remove('active');
            });

            // Show target content
            const targetContent = document.getElementById(targetId);
            if (targetContent) {
                targetContent.classList.add('active');
                // Optional: add animation
                targetContent.classList.add('fade-in');
                setTimeout(() => {
                    targetContent.classList.remove('fade-in');
                }, 300);
            }
        });
    });


    const navToggle = document.querySelector(".nav-button-mobile");
    const mainNav = document.querySelector(".main-navigation");

    if (navToggle && mainNav) {
        navToggle.addEventListener("click", function () {
            mainNav.classList.toggle("open");
            navToggle.classList.toggle("active");
        });
    }

    const hash = window.location.hash;
    if (hash && hash.startsWith("#tab_")) {
      const tabId = hash.substring(1);
      const tabButton = document.querySelector(`.vertical-tabs__nav li[data-tab="${tabId}"]`);
      const tabContent = document.getElementById(tabId);
  
      if (tabButton && tabContent) {
        document.querySelectorAll('.vertical-tabs__nav li').forEach(el => el.classList.remove('active'));
        document.querySelectorAll('.company-tabs__content').forEach(el => el.classList.remove('active'));
  
        tabButton.classList.add('active');
        tabContent.classList.add('active');
        tabContent.scrollIntoView({ behavior: 'smooth', block: 'start' });
  
        if (history.replaceState) {
          history.replaceState(null, null, window.location.pathname);
        }
      }
    }
});
