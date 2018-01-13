
/*=== Pressing the foot to the bottom (Bootstrap 3) ===*/
// ; (function($){
// 	if ( $(document).height() = $(window).height() ) {

// 	  $("footer.footer").addClass("navbar-fixed-bottom");

// 	};
// })(jQuery);
/*=======================================*/
; (function(){
	if (  document.body.scrollHeight <= window.screen.height ) {

	  var x = document.getElementsByClassName("footer")[0].setAttribute("class", "navbar-fixed-bottom");

	};
})();
/*=======================================*/
