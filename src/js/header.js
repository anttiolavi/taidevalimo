(function(window, $) {
  $(window).scroll(function() {
    var $body = $('body');

    if (window.scrollY > 96) {
      $body.addClass('scrolled');
    } else {
      $body.removeClass('scrolled');
    }
  });
})(window, jQuery);
