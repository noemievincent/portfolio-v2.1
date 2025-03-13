import "./jquery-global";

import './scripts/header';
import './scripts/switch-theme';
import './scripts/load-more-projects';

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