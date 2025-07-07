jQuery(document).ready(function ($) {
  const _offset = 100;

  // WOW.js Initialization
  const wow = new WOW({
    boxClass: 'wow',
    animateClass: 'animated',
    offset: _offset,
    mobile: true,
    live: true
  });
  wow.init();

  // Initialize all
  _swiperSlider();
  _navScroll();
  _activePage();
  _megaMenu();
  _serviceToggles();
  _changeCardClass();
  _loadInHTML();

  if ($(window).scrollTop() > 50) {
    _navScrollOnScroll();
  }

  // Nav Scroll Handler
  function _navScroll() {
    $(window).on('scroll', _navScrollOnScroll);
  }

  function _navScrollOnScroll() {
    const isScrolled = $(window).scrollTop() > 50;
    $('.main-navigation, .site-branding').toggleClass('scroll-bg', isScrolled);
    $('.site-branding img').toggleClass('resize', isScrolled);
    $('.site-header-container').toggleClass('sticky', isScrolled);
  }

  // Load in Fade
  function _loadInHTML() {
    $('.loadin-html.hidden').fadeIn(1000).removeClass('hidden');
  }

  // Swiper Slider Init
  function _swiperSlider() {
    new Swiper(".sliderWithOnlyImage", {
      centeredSlides: true,
      speed: 1500,
      loop: true, 
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    new Swiper(".sliderWithContent", {
      speed: 1500,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    new Swiper(".testimonialSlider", {
      speed: 1500,
      slidesPerView: 1,
      spaceBetween: 35,
      breakpoints: {
        992: {
          slidesPerView: 2,
        }
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".next_slide",
        prevEl: ".prev_slide",
      },
    });
  }

  // Active Page Highlight
  function _activePage() {
    const currentPath = location.pathname.replace(/\/$/, '');
    const currentSegment = currentPath.substring(currentPath.lastIndexOf('/') + 1);

    $('#inner-page-navigation li a').each(function () {
      const $this = $(this);
      const href = $this.attr('href').replace(/\/$/, '');
      const hrefSegment = href.substring(href.lastIndexOf('/') + 1);

      if (hrefSegment.indexOf(currentSegment) !== -1) {
        $this.addClass('active');
      }
    });
  }

  // Mega Menu
  function _megaMenu() {
    const menuItems = document.querySelectorAll('.mega-menu > li.menu-item-has-children');

    menuItems.forEach(item => {
      const trigger = item.firstElementChild;
      if (!trigger) return;

      trigger.addEventListener('click', function (e) {
        e.preventDefault();
        const submenu = item.querySelector(':scope > ul');
        const arrow = document.querySelector('.menu-navigation .arrow-container');

        closeAllSubmenus();

        if (submenu && !submenu.classList.contains('show')) {
          submenu.classList.add('show');
          arrow?.classList.add('show');
        } else {
          submenu?.classList.remove('show');
          arrow?.classList.remove('show');
        }

        e.stopPropagation();
      });
    });

    function closeAllSubmenus() {
      menuItems.forEach(item => {
        item.querySelector(':scope > ul')?.classList.remove('show');
      });
      document.querySelector('.menu-navigation .arrow-container')?.classList.remove('show');
    }

    document.addEventListener('click', e => {
      menuItems.forEach(item => {
        if (!item.contains(e.target)) {
          item.querySelector(':scope > ul')?.classList.remove('show');
          document.querySelector('.menu-navigation .arrow-container')?.classList.remove('show');
        }
      });
    });
  }

  // Services Toggles
  function _serviceToggles() {
    const $mobileButtons = $('.car-diagram .mobile .selection_container .selection_button');
    const $desktopButtons = $('.car-diagram .desktop .selection_container .selection_button');
    const $infoPanels = $('.service-button-container .selection_info');

    let mobileInterval, desktopInterval, clickTimeout;
    let currentIndexMobile = 0;
    let currentIndexDesktop = 0;

    $mobileButtons.on('click', function (e) {
      e.preventDefault();
      const target = $(this).attr('data-button');

      $mobileButtons.removeClass('active');
      $(this).addClass('active');

      $infoPanels.removeClass('active').filter(`[data-button="${target}"]`).addClass('active');

      clearInterval(mobileInterval);
      clearTimeout(clickTimeout);
      clickTimeout = setTimeout(startMobileRotation, 10000);
    });

    $desktopButtons.on('mouseover', function () {
      $desktopButtons.removeClass('active');
      $(this).addClass('active');
      clearInterval(desktopInterval);
    });

    $desktopButtons.on('mouseleave', startDesktopRotation);

    function rotateService($buttons, currentIndex, isMobile = false) {
      $buttons.removeClass('active');
      $infoPanels.removeClass('active');

      currentIndex = (currentIndex + 1) % $buttons.length;
      const $nextButton = $buttons.eq(currentIndex);
      const target = $nextButton.attr('data-button');

      $nextButton.addClass('active');
      $infoPanels.filter(`[data-button="${target}"]`).addClass('active');

      return currentIndex;
    }

    function startMobileRotation() {
      if (!mobileInterval) {
        mobileInterval = setInterval(() => {
          currentIndexMobile = rotateService($mobileButtons, currentIndexMobile, true);
        }, 2500);
      }
    }

    function startDesktopRotation() {
      if (!desktopInterval) {
        desktopInterval = setInterval(() => {
          currentIndexDesktop = rotateService($desktopButtons, currentIndexDesktop);
        }, 2500);
      }
    }

    startMobileRotation();
    startDesktopRotation();
  }

  // Change Card Animation on Small Screens
  function _changeCardClass() {
    if ($(window).width() < 767 && $('.card-component').length) {
      $('.card-component .card')
        .removeClass('animate__fadeInUp')
        .addClass('animate__fadeInRight');
    }
  }
});
