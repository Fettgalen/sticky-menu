(function($) {

	//var distance = $('#menu').offset().top;
	var menu_height = $('#menu').height();
	var pres_height = $( '#pres' ).height();
	$( '#menu' ).css({ 'margin-top':pres_height});

	$(window).scroll(function() {
	   if ( $(window).scrollTop() >= pres_height ) {

			$( '#menu' ).addClass('fixed');
			$( '#content').removeAttr( 'style' );
			$( '#content' ).css({ 'margin-top':pres_height + menu_height});
			$( '#menu' ).removeAttr( 'style' );


	   } else if ( $(window).scrollTop() <= pres_height ) {

	   		$( '#menu' ).removeClass( 'fixed' );
	   		$( '#content' ).removeAttr( 'style' );
	   		$( '#menu' ).css({ 'margin-top':pres_height});

	   }
	});

	// När fönstret når botten på pres, ta bort classen fixed.
})(jQuery);