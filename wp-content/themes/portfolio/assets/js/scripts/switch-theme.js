$(document).ready(function () {
    let theme = new URLSearchParams(window.location.search).get('theme');

    if (theme) {
        updateLinks(theme);
    }

    const btns = $('.color-button');

    $(btns).each((i, btn) => {
        $(btn).on('click', (e) => {
            $(['.color-button.active', btn]).toggleClass('active');

            const color = $(btn).data('color');
            $('body').attr('data-theme', color);

            updateLinks(color);

            const urlOrigin = window.location.origin + window.location.pathname;
            const url = new URL(urlOrigin);

            url.searchParams.append('theme', color);
            history.pushState({}, '', decodeURI(url.toString()));
        });
    });
});

function updateLinks(color) {
    const links = $('a:not([target="_blank"])');

    $(links).each((i, link) => {
        const url = new URL(link.href);
        url.searchParams.set('theme', color);
        link.href = url.toString();
    })
}