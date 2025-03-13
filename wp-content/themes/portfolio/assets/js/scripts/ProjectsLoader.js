import themeSwitcher from './ThemeSwitcher.js';

class ProjectsLoader {
    constructor() {
        this.state = {
            count: null,
            offset: null,
            initial_count: null,
        };

        this.resultsContainer = $('#projects-container');
        this.btn = $('#load-more-btn');

        if (this.btn.length) {
            this.initializeState();
            this.btn.on('click', (e) => this.handleLoadMoreClick(e));
        }
    }

    initializeState() {
        this.state.count = this.btn.data('count');
        this.state.offset = this.btn.data('offset');
        this.state.initial_count = this.btn.data('initialCount');
    }

    handleLoadMoreClick(e) {
        e.preventDefault();
        this.makeRequest();
    }

    makeRequest() {
        this.loading(true);

        $.ajax('/wp-admin/admin-ajax.php', {
            method: 'POST',
            data: {
                action: 'load_more_projects',
                count: this.state.count,
                offset: this.state.offset,
            },
            success: (response) => {
                response = JSON.parse(response);
                setTimeout(() => {
                    this.displayResults(response);
                }, 600);
            },
            error: (xhr, status, error) => {
                console.log('Error:', error);
            },
        });
    }

    displayResults(data) {
        if (!data.items.length) return;

        const results = data.items.join('');
        this.state.offset === 0
            ? this.resultsContainer.html(results)
            : this.resultsContainer.append(results);

        themeSwitcher.updateLinks($(results).find('a')); // Update links using themeSwitcher
        this.updateStateAndButton(data.max_total);

        this.loading(false);
    }

    updateStateAndButton(maxTotal) {
        const total = this.resultsContainer.children().length;

        if (total >= maxTotal) {
            this.resetState();
            this.btn.find('.top').text(this.btn.data('seeLessLabel'));
        } else {
            this.state.count = this.btn.data('count');
            this.state.offset += this.state.count;

            this.btn.find('.top').text(this.btn.data('seeMoreLabel'));
        }
    }

    resetState() {
        this.state.count = this.state.initial_count;
        this.state.offset = 0;
    }

    loading(show) {
        $('#loader').toggleClass('hidden', !show);
        this.resultsContainer.toggleClass('pointer-events-none opacity-20', show);
    }
}

$(document).ready(() => {
    new ProjectsLoader();
});
