/**
 * Progressive enhancements for the Home page.
 *
 * Content is never hidden before this script runs, which preserves the Home
 * page for users with JavaScript disabled and avoids delayed-content flashes.
 */
( function() {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function() {
		var navbar = document.querySelector( '.navbar' );

		if ( navbar ) {
			var setNavbarState = function() {
				navbar.classList.toggle( 'scrolled', window.scrollY > 100 );
			};

			setNavbarState();
			window.addEventListener( 'scroll', setNavbarState, { passive: true } );
		}

		document.querySelectorAll( 'a[href*="#"]' ).forEach( function( link ) {
			link.addEventListener( 'click', function( event ) {
				var href = link.getAttribute( 'href' );
				if ( ! href ) {
					return;
				}

				var hashIndex = href.indexOf( '#' );
				if ( hashIndex === -1 ) {
					return;
				}

				var hash = href.slice( hashIndex );
				if ( '#' === hash || '#site-content' === hash ) {
					return;
				}

				var linkUrl;
				try {
					linkUrl = new URL( href, window.location.href );
				} catch ( error ) {
					return;
				}

				var samePage = linkUrl.pathname.replace( /\/$/, '' ) === window.location.pathname.replace( /\/$/, '' );
				if ( ! samePage ) {
					return;
				}

				var target = document.querySelector( hash );
				if ( ! target ) {
					return;
				}

				event.preventDefault();
				history.pushState( null, '', hash );
				target.scrollIntoView( {
					behavior: window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ? 'auto' : 'smooth',
					block: 'start'
				} );
				target.setAttribute( 'tabindex', '-1' );
				target.focus( { preventScroll: true } );
			} );
		} );

		if ( window.location.hash ) {
			var initial = document.querySelector( window.location.hash );
			if ( initial ) {
				window.setTimeout( function() {
					initial.scrollIntoView( {
						behavior: window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches ? 'auto' : 'smooth',
						block: 'start'
					} );
				}, 50 );
			}
		}

		var contactForm = document.querySelector( '#ctlContactForm' );

		if ( ! contactForm || ! window.ctlHome ) {
			return;
		}

		contactForm.addEventListener( 'submit', function( event ) {
			event.preventDefault();

			if ( ! contactForm.reportValidity() ) {
				return;
			}

			var button = contactForm.querySelector( 'button[type="submit"]' );
			var label = contactForm.querySelector( '.ctl-contact-form__submit-label' );
			var status = contactForm.querySelector( '#ctlContactStatus' );
			var formData = new FormData( contactForm );

			button.disabled = true;
			label.textContent = window.ctlHome.sending;
			status.textContent = '';
			status.className = 'ctl-contact-form__status mt-3 mb-0';

			fetch( window.ctlHome.ajaxUrl, {
				method: 'POST',
				body: formData,
				credentials: 'same-origin'
			} )
				.then( function( response ) {
					return response.json();
				} )
				.then( function( result ) {
					var message = result && result.data && result.data.message ? result.data.message : window.ctlHome.error;

					status.textContent = message;
					status.classList.add( result && result.success ? 'is-success' : 'is-error' );

					if ( result && result.success ) {
						contactForm.reset();
					}
				} )
				.catch( function() {
					status.textContent = window.ctlHome.error;
					status.classList.add( 'is-error' );
				} )
				.finally( function() {
					button.disabled = false;
					label.textContent = window.ctlHome.submit;
				} );
		} );
	} );
}() );
