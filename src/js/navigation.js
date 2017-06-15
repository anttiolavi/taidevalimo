(function($) {
  var $header = $('#header');
  var $menuToggle = $header.find('.header-menu-toggle');

  $menuToggle.on('click', function(e) {
    var $target = $(e.currentTarget);
    $target.closest('.page-wrapper').toggleClass('menu-open');
  });
})(jQuery)
