(function($) {
  var $header = $('#header');
  var $wrapper = $('#wrapper');
  var $menuToggleOpen = $header.find('.menu-toggle-open');
  var $menuToggleClosed = $wrapper.find('.menu-toggle-closed');

  $menuToggleOpen.on('click', function(e) {
    var $target = $(e.currentTarget);
    var $wrapper = $target.closest('.page-wrapper');

    if (!$wrapper.hasClass('menu-open')) {
      $wrapper.addClass('menu-open');
    }
  });

  $menuToggleClosed.on('click', function(e) {
    var $target = $(e.currentTarget);
    var $wrapper = $target.closest('.page-wrapper');

    if ($wrapper.hasClass('menu-open')) {
      $wrapper.removeClass('menu-open');
    }
  });
})(jQuery);
