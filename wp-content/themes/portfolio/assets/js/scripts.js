import "./jquery-global";

import './scripts/header';
import './scripts/ThemeSwitcher';
import './scripts/ProjectsLoader';

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