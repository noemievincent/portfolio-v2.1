export default class MenuHandler {
    constructor() {
        this.$header = $('header');
        this.$mobileMenu = $('.header-mobile');
        this.$burger = $('#burger-menu');
        this.$menuToggle = $('#toggle-menu');
        this.$skipLinksMenu = $('#skiplinks a[href="#menu"]');

        // Bind event listeners
        this.bindEvents();

        // Disable focusable items initially if on mobile
        this.disableMenuFocus();
    }

    // Function to check if we're in mobile mode (adjust breakpoint if needed)
    isMobile() {
        return window.innerWidth < 1024; // Matches rg breakpoint
    }

    // Get all focusable elements inside the menu
    getFocusableElements() {
        return this.$mobileMenu.find('a, button, input, textarea, select, [tabindex]:not([tabindex="-1"])');
    }

    // Disable menu items focus (only on mobile)
    disableMenuFocus() {
        if (this.isMobile()) {
            this.getFocusableElements().attr('tabindex', '-1');
        }
    }

    // Enable menu items focus
    enableMenuFocus() {
        this.getFocusableElements().attr('tabindex', '0');
    }

    // Toggle the menu (open/close)
    toggle(e) {
        this.$header.hasClass('menu-opened') ? this.close(e) : this.open(e);
    }

    // Open the menu
    open(e) {
        e.preventDefault();
        e.stopPropagation();

        $('body').addClass('overflow-hidden');
        this.$header.addClass('menu-opened');
        $('.burger-menu').addClass('close');

        this.enableMenuFocus();
        this.getFocusableElements().first().focus();
    }

    // Close the menu
    close(e) {
        $('body').removeClass('overflow-hidden');
        this.$header.removeClass('menu-opened');
        $('.burger-menu').removeClass('close');

        this.disableMenuFocus();
        this.$burger.focus();
    }

    // Bind event listeners
    bindEvents() {
        // Menu toggle button
        this.$menuToggle.on('change', (e) => this.toggle(e));

        // Burger button - handle Enter key to toggle menu
        this.$burger.on('keydown', (e) => {
            if (e.key === 'Enter') {
                this.toggle(e);
            }
        });

        // Menu items - close the menu when clicked
        this.$mobileMenu.on('click', 'a, button', (e) => this.close(e));

        // Focusout handling - close the menu when focus moves out of last focusable element
        this.$mobileMenu.on('focusout', (e) => {
            const $focusableElements = this.getFocusableElements();
            if ($focusableElements.length && e.target === $focusableElements.last()[0]) {
                setTimeout(() => {
                    if (!this.$mobileMenu.find(':focus').length) {
                        this.close(e);
                    }
                }, 10);
            }
        });

        // Skip links menu - handle focus to open the menu
        this.$skipLinksMenu.on('click', (e) => {
            this.open(e);
            setTimeout(() => {
                this.enableMenuFocus();
            }, 0);
        });

        // Re-enable focus when window is resized
        $(window).on('resize', () => {
            !this.isMobile() ? this.enableMenuFocus() : this.disableMenuFocus();
        });
    }
}