$(function(){
	var shrinkHeader = 80;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('.logo-header').addClass('shrink');
           $('.nome-logo').addClass('shrink');
        }
        else {
            $('.logo-header').removeClass('shrink');
            $('.nome-logo').removeClass('shrink');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset;
    }
});