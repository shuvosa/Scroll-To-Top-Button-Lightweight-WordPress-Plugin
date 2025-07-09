jQuery(document).ready(function($) {
  // Scroll to top button behavior
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  $('.scroll-to-top').click(function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop : 0},800);
    return false;
  });
});
