(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note that this assume you're going to use jQuery, so it prepares
	 * the $ function reference to be used within the scope of this
	 * function.
	 *
	 * From here, you're able to define handlers for when the DOM is
	 * ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * Or when the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and so on.
	 *
	 * Remember that ideally, we should not attach any more than a single DOM-ready or window-load handler
	 * for any particular page. Though other scripts in WordPress core, other plugins, and other themes may
	 * be doing this, we should try to minimize doing that in our own work.
	 */
	
	Date.prototype.addHours = function(h){
		this.setHours(this.getHours()+h);
		return this
	}

	$(function() {

		/**
		 * SET SHOW INTERVAL
		 */
		if (jinda_obj.show_interval == ""){
			var d = new Date().addHours(24);
		}else{
			var d = new Date().addHours(parseInt(jinda_obj.show_interval));
		}

		/**
		 * POPUP DELAY
		 */
		if (jinda_obj.popup_delay == ""){
			var delay = 4000;
		}else{
			var delay = parseInt(jinda_obj.popup_delay);
		}

		/**
		 * SHOW POPUP
		 */
		if ( Cookies.get('jinda_popup_interval') == 'hide' ) {
			$('.jinda-wrapper').css('display', 'none');
		}else{
			setTimeout(function(){
				$('.jinda-wrapper').fadeIn();
			}, delay);
		}
		


		/**
		 * ACTIONS
		 */
		$('#jinda-close-button').on('click', function(e){
			e.preventDefault();
			$('.jinda-wrapper').fadeOut();
			Cookies.set('jinda_popup_interval', 'hide', {expires: d, path: '/' });
		});

		if (jinda_obj.close_click_overlay == 1 ) {
			$('.jinda-overlay-background').css('cursor', 'pointer');
			$('.jinda-overlay-background').on('click', function(e){
				e.preventDefault();
				$('#jinda-close-button').click();
			})
		};

	});

	// alert('hello '+ parseInt(jinda_obj.close_click_overlay) +'');

})( jQuery );
