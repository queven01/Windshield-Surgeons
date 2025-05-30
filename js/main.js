jQuery(document).ready(function(){
    _swiperSlider();
    _navScroll();
    _activePage();
    _megaMenu_1();
    _serviceToggles();
    wow.init();
    _changeCardClass();
    _loadinHTML();
});

var $ = jQuery;

let _offset = 100;

wow = new WOW(
  {
    boxClass:     'wow',      
    animateClass: 'animated', 
    offset:       _offset,          
    mobile:       true,       
    live:         true        
  }
);

//Load in Fade
function _loadinHTML() {
  $('.loadin-html.hidden').fadeIn(1000).removeClass('hidden');
}

function _swiperSlider(){
    
    var swiper = new Swiper(".sliderWithOnlyImage", {
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

    var swiper = new Swiper(".sliderWithContent", {
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

      var swiper = new Swiper(".testimonialSlider", {
        speed: 1500,
        slidesPerView: 1,
        spaceBetween: 35,
        breakpoints: {
          992: {
            slidesPerView: 2,
            spaceBetween: 35,
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

if($(window).scrollTop() > 50) {
    _navScroll();
}

function _navScroll(){
    $(window).scroll(function(event){
        if($(window).scrollTop() > 50) {
            $('.main-navigation').addClass('scroll-bg')
            $('.site-branding').addClass('scroll-bg')
            $('.site-branding img').addClass('resize')
            $('.site-header-container').addClass('sticky');
        } else {
            $('.main-navigation').removeClass('scroll-bg')
            $('.site-branding').removeClass('scroll-bg')
            $('.site-branding img').removeClass('resize') 
            $('.site-header-container').removeClass('sticky');
        }
    });
} 

//Active Page
function _activePage() {
    var current = location.pathname.replace(/\/$/, '');
    var curretSeg = current.substr(current.lastIndexOf('/') + 1);

    $('#inner-page-navigation li a').each(function(){
        var $this = $(this);
        var url= $this.attr('href').replace(/\/$/, '');
        var lastSeg = url.substr(url.lastIndexOf('/') + 1);

        // if the current path is like this link, make it active
        if(lastSeg.indexOf(curretSeg) !== -1){
            $this.addClass('active');
        }
    })
}

//Mega Menu 
function _megaMenu_1() {
  const menuItems = document.querySelectorAll('.mega-menu > li.menu-item-has-children');

  menuItems.forEach((item) => {
    // Use only the direct child trigger (e.g., anchor or button) inside the menu item to open the submenu
    const trigger = item.firstElementChild; // Adjust if your trigger element is nested differently

    if (trigger) {
      trigger.addEventListener('click', function (e) {
        e.preventDefault();
        const mobileMenuArrow = document.querySelector('.menu-navigation .arrow-container');
        
        // Select the first-level submenu
        const submenu = item.querySelector(':scope > ul');

        // Close all other submenus
        closeAllSubmenus();

        // Toggle the clicked submenu
        if (submenu && submenu.classList.contains('show')) {
          submenu.classList.remove('show');
          mobileMenuArrow.classList.remove('show');
        } else {
          submenu.classList.add('show');
          mobileMenuArrow.classList.add('show');
        }

        // Stop event from bubbling up to the document
        e.stopPropagation();
      });
    }
  });

  // Function to close all first-level submenus
  function closeAllSubmenus() {
    menuItems.forEach((item) => {
      const submenu = item.querySelector(':scope > ul');
      if (submenu) {
        submenu.classList.remove('show');
      }
    });
  }

  // Close submenu if clicking outside any menu item
  document.addEventListener('click', function (e) {
    menuItems.forEach((item) => {
      const submenu = item.querySelector(':scope > ul');
      const mobileMenuArrow = document.querySelector('.menu-navigation .arrow-container');

      // If click is outside the open submenu and menu item
      if (submenu && submenu.classList.contains('show') && !item.contains(e.target)) {
        submenu.classList.remove('show');
        mobileMenuArrow.classList.remove('show');
      }
    });
  });
}

//Services Toggles 
function _serviceToggles() {
  const $diagramButtonsMobile = $('.car-diagram .mobile .selection_container .selection_button');
  const $diagramButtonsDesktop = $('.car-diagram .desktop .selection_container .selection_button');
  const $listofbutton = $('.service-button-container .selection_info');

  let mobileIntervalId, desktopIntervalId;
  let isDesktopHovered = false;
  let currentIndexMobile = 0;
  let currentIndexDesktop = 0;
  let clickTimeout; // For managing the click pause duration

  // Mobile click events
  $diagramButtonsMobile.on('click', function(e) {
    e.preventDefault();
    $diagramButtonsMobile.removeClass('active');
    $(this).addClass('active');

    const $button_data = $(this).attr('data-button');
    $listofbutton.removeClass('active');
    
    $listofbutton.each(function() {
      const $button_data_2 = $(this).attr('data-button');
      if ($button_data === $button_data_2) {
        $(this).addClass('active');
      }
    });

    // On click, stop the current interval, and restart with 10 seconds delay
    stopMobileRotation();
    clearTimeout(clickTimeout);
    clickTimeout = setTimeout(startMobileRotation, 10000); // 10 second delay before restarting
  });

  // Desktop hover events
  $diagramButtonsDesktop.on('mouseover', function() {
    $diagramButtonsDesktop.removeClass('active');
    $(this).addClass('active');
    stopDesktopRotation(); // stop rotation on hover
  });

  $diagramButtonsDesktop.on('mouseleave', function() {
    startDesktopRotation(); // resume rotation after leaving hover
  });

  // Rotate Services for Mobile
  function rotateServiceMobile() {
    $diagramButtonsMobile.removeClass('active'); // remove active from all
    $listofbutton.removeClass('active');

    // Get the next button and content to activate
    currentIndexMobile = (currentIndexMobile + 1) % $diagramButtonsMobile.length;
    const $nextButton = $diagramButtonsMobile.eq(currentIndexMobile);
    const $button_data = $nextButton.attr('data-button');

    $nextButton.addClass('active');
    $listofbutton.each(function() {
      const $button_data_2 = $(this).attr('data-button');
      if ($button_data === $button_data_2) {
        $(this).addClass('active');
      }
    });
  }

  // Rotate Services for Desktop
  function rotateServiceDesktop() {
    if (isDesktopHovered) return; // don't rotate if hovering

    $diagramButtonsDesktop.removeClass('active'); // remove active from all

    // Get the next button and content to activate
    currentIndexDesktop = (currentIndexDesktop + 1) % $diagramButtonsDesktop.length;
    const $nextButton = $diagramButtonsDesktop.eq(currentIndexDesktop);
    const $button_data = $nextButton.attr('data-button');

    $nextButton.addClass('active');
    $listofbutton.each(function() {
      const $button_data_2 = $(this).attr('data-button');
      if ($button_data === $button_data_2) {
        $(this).addClass('active');
      }
    });
  }

  // Start and stop rotation helpers for Mobile
  function startMobileRotation() {
    if (!mobileIntervalId) {
      mobileIntervalId = setInterval(rotateServiceMobile, 2500); // 2 seconds per switch
    }
  }

  function stopMobileRotation() {
    if (mobileIntervalId) {
      clearInterval(mobileIntervalId);
      mobileIntervalId = null;
    }
  }

  // Start and stop rotation helpers for Desktop
  function startDesktopRotation() {
    if (!desktopIntervalId) {
      desktopIntervalId = setInterval(rotateServiceDesktop, 2500); // 2 seconds per switch
    }
  }

  function stopDesktopRotation() {
    if (desktopIntervalId) {
      clearInterval(desktopIntervalId);
      desktopIntervalId = null;
    }
  }

  // Initialize rotation
  startMobileRotation();
  startDesktopRotation();
}



function _changeCardClass() {
  if ($(window).width() < 767) {
    if ($(".card-component")[0]){
      $card = $('.card-component .card');

      $card.removeClass('animate__fadeInUp')
      $card.addClass('animate__fadeInRight')
    }
  }
}