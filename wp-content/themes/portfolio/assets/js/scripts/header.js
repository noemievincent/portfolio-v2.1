import MenuHandler from './MenuHandler.js';

$(document).ready(function () {
    new MenuHandler();
    redirectToAnchor();
    hanldeScrollToTop();

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
    $('#scroll-to-top').toggleClass('active', scrollTop > scrollTrigger * 4); //160

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
        $('.header-menu .menu-item').each((i, link) => {
            if ($(link).hasClass('menu-item-object-custom')) {
                const href = $(link).find('a').attr('href');
                $(link).find('a').attr('href', href.replace('/', ''));
            }
        });

        $('.header-menu .menu-item.current_page_item').on('click', (e) => {
            e.preventDefault();
            window.scrollTo(0, 0);

            location.hash = '';
        });
    }
}


function hanldeScrollToTop() {
    $('#scroll-to-top').on('click', (e) => {
        e.preventDefault();
        window.scrollTo(0, 0);
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

