import "./jquery-global";

import './scripts/switch-theme';
import './scripts/header';

$(document).ready(function () {
    if ($('#dev-container').length) {
        updateScreenSize();
        $(window).on('resize', updateScreenSize);

        function updateScreenSize() {
            const width = $(window).width();
            const height = $(window).height();

            $('#dev-container').find('#dev-screen-size .width').text(width);
            $('#dev-container').find('#dev-screen-size .height').text(height);
        }
    }
});