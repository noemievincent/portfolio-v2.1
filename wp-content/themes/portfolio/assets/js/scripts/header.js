$(document).ready(function () {
    redirectToAnchor();
    toggleMenu();

    detectScroll();
    $(window).on('scroll', () => {
        detectScroll();
    });

    $(window).on('resize', () => {
        setMarginTop();
    });
});

function detectScroll() {
    const scrollTrigger = 40;
    const scrollTop = $(window).scrollTop();

    $('header').toggleClass('scrolled', scrollTop > scrollTrigger);

    // detectCurrentSection();
    setMarginTop();
}

function setMarginTop() {
    setTimeout(() => {
        if ($('body').hasClass('home')) {
            const height = $('header')[0].clientHeight;

            $('main').css('margin-top', height + 'px');
            $('html').css('scroll-padding-top', height + 'px');
        }
    }, 270);
}

function redirectToAnchor() {
    if ($('body').hasClass('home')) {
        $('.header-menu .menu-item').on('click', (e) => {
            if ($(e.currentTarget).hasClass('current_page_item')) {
                e.preventDefault();
                window.scrollTo(0, 0);

                location.hash = '';
            }
        });
    }
}

function toggleMenu() {
    // $('body').addClass('overflow-hidden');
    //
    // $('header').addClass('menu-opened');
    // $('.burger-menu').addClass('close');

    $('#toggle-menu').on('change', (e) => {
        e.preventDefault();
        e.stopPropagation();

        $('body').toggleClass('overflow-hidden');

        $('header').toggleClass('menu-opened');
        $('.burger-menu').toggleClass('close');
    });

    // Close burger menu on named anchor click
    $('.header-menu .menu-item > a').on('click', (e) => {
        $('body').removeClass('overflow-hidden');

        $('header').removeClass('menu-opened');
        $('.burger-menu').removeClass('close');
    });
}

function detectCurrentSection() {
    if ($('body').hasClass('home')) {
        const currentScrollTop = $(window).scrollTop();
        const windowHeight = $(window).height();
        const triggerPoint = currentScrollTop + 0.6 * windowHeight; // 40% from the bottom

        $('.page-section').each((index, section) => {
            const sectionTop = $(section).offset().top;
            const sectionBottom = sectionTop + $(section).outerHeight();

            const id = $(section).attr('id');
            const currentItem = $(`.header-menu .menu-item.menu-item-object-custom:has(a[href*="#${id}"])`);

            if (sectionTop <= triggerPoint && sectionBottom >= currentScrollTop) {
                $(currentItem).siblings().removeClass('current-section-item');
                $(currentItem).addClass('current-section-item');
            }

            if (currentScrollTop === 0) {
                $('.header-menu .menu-item.menu-item-object-custom').removeClass('current-section-item');
            }
        });
    }
}
