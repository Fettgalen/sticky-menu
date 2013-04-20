(function($) {

	var distance = $('#menu').offset().top;
	var menu_height = $('#menu').height();
	var pres_height = $( '#pres' ).height();
	$( '#menu' ).css({ 'margin-top':pres_height});

	$(window).scroll(function() {
	   if ( $(window).scrollTop() >= distance ) {

			$( '#menu' ).addClass('fixed');
			$( '#pres' ).css({ 'margin-bottom':menu_height });


	   } else if ( $(window).scrollTop() <= pres_height ) {

	   		$( '#menu' ).removeClass( 'fixed' );
	   		$( '#pres' ).removeAttr( 'style' );
	   		$( '#menu' ).css({ 'margin-top':pres_height});

	   }
	   console.log( $(window).scrollTop(), pres_height);
	});

	// När fönstret når botten på pres, ta bort classen fixed.
 // ät middag fortsätt sedan
})(jQuery);