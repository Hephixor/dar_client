/**
 * ytmenu.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
var YTMenu = (function() {

	function init() {
		
		[].slice.call( document.querySelectorAll( '.dr-menu2' ) ).forEach( function( el, i ) {

			var trigger = el.querySelector( 'div.dr-trigger2' ),
				icon = trigger.querySelector( 'span.dr-icon2-menu' ),
				open = false;

			trigger.addEventListener( 'click', function( event ) {
				if( !open ) {
					el.className += ' dr-menu2-open';
					open = true;
				}
			}, false );

			icon.addEventListener( 'click', function( event ) {
				if( open ) {
					event.stopPropagation();
					open = false;
					el.className = el.className.replace(/\bdr-menu-open\b/,'');
					return false;
				}
			}, false );
			
			body.addEventListener("load", function( click ) {
				if( !open ) {
					el.className += ' dr-menu2-open';
					open = true;
				}
			}, false );

		} );

	}

	init();

})();
