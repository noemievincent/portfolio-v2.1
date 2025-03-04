const state = {
    count: null,
    offset: null,
    initial_count: null,
};

const resultsContainer = $('#projects-container');
const btn = $('#load-more-btn');

$(document).ready(function () {
    if (btn.length) {
        initializeState();

        btn.on('click', handleLoadMoreClick);
    }
});

function initializeState() {
    state.count = btn.data('count');
    state.offset = btn.data('offset');
    state.initial_count = btn.data('initialCount');
}

function handleLoadMoreClick(e) {
    e.preventDefault();
    makeRequest();
}

function makeRequest() {
    loading(true);

    $.ajax('/wp-admin/admin-ajax.php', {
        method: 'POST',
        data: {
            action: 'load_more_projects',
            count: state.count,
            offset: state.offset,
        },
        success(response) {
            response = JSON.parse(response);
            setTimeout(() => {
                displayResults(response);
            }, 600);
        },
        error(xhr, status, error) {
            console.log('Error:', error);
        },
    });
}

function displayResults(data) {
    if (!data.items.length) return;

    const results = data.items.join('');
    state.offset === 0 ? resultsContainer.html(results) : resultsContainer.append(results);

    updateStateAndButton(data.max_total);

    loading(false);
}

function updateStateAndButton(maxTotal) {
    const total = resultsContainer.children().length;

    if (total >= maxTotal) {
        resetState();
        btn.find('.top').text(btn.data('seeLessLabel'));
    } else {
        state.count = btn.data('count');
        state.offset += state.count;

        btn.find('.top').text(btn.data('seeMoreLabel'));
    }
}

function resetState() {
    state.count = state.initial_count;
    state.offset = 0;
}

function loading(show) {
    $('#loader').toggleClass('hidden', !show);
    $(resultsContainer).toggleClass('pointer-events-none opacity-20', show);
}