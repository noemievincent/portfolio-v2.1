class ThemeSwitcher {
    constructor() {
        this.color = new URLSearchParams(window.location.search).get('theme');
    }

    init() {
        this.applyTheme();
        this.setupEventListeners();
    }

    applyTheme() {
        if (this.color) {
            $('body').attr('data-theme', this.color);
            this.updateLinks();
            this.updateURL();
        }
    }

    updateLinks(items = null) {
        const links = $('a:not([target="_blank"])');

        if (this.color) {
            $(links).each((i, link) => {
                const url = new URL(link.href);
                url.searchParams.set('theme', this.color);
                link.href = url.toString();
            });
        }
    }

    updateURL() {
        const urlOrigin = window.location.origin + window.location.pathname;
        const url = new URL(urlOrigin);

        if (this.color) {
            url.searchParams.set('theme', this.color);
            history.pushState({}, '', decodeURI(url.toString()));
        }
    }

    setupEventListeners() {
        $('.color-button').on('click', (e) => {
            e.preventDefault();
            $(['.color-button.active', $(e.currentTarget)]).toggleClass('active');

            this.color = $(e.currentTarget).data('color');
            this.applyTheme();
        });
    }
}

// Create and export a single instance
const themeSwitcher = new ThemeSwitcher();
$(document).ready(() => themeSwitcher.init());
export default themeSwitcher;

