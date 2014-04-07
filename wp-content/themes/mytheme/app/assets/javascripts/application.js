jQuery( document ).ready( function( $ ) {
				
	$.Flipshow.prototype.navigate = function( element, direction ) {
		this._navigate( element,direction );
	};

	$( "#fc-slideshow" ).flipshow();

	setInterval( function() {
    	$('#fc-slideshow').flipshow('navigate',$("#fc-slideshow div.fc-right span:first"),'right');
	}, 3000);

} );


/***********************************************************************
	* JSSOR SLIDER SCRIPT
 **********************************************************************/

jQuery( document ).ready( function( $ ) {

    var options = { $AutoPlay : true };
    var jssor_slider1 = new $JssorSlider$( 'jssor-slider-market', options );

});



function loadPageAnimated( URL ) {
	var loadContainer = jQuery( 'div.sub-container' );
	var lastContainer = jQuery( 'div.container' );

	loadContainer.css( { 'top' : '0', 'display' : 'block', 'z-index' : '5000', 'background' : 'white' } ).load( URL );

	loadContainer.animate( {
		width: '100%',
		height: '100%',
		left: '0',
		border: '0'
		// opacity: '1'
	}, 900 );
	
	lastContainer.animate( { opacity : '0' }, 900 );

	window.history.pushState( {}, "Asocimano", URL );
	return( false );
}