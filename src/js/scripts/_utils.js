/*
IntersectionObserver is great. Use it.

BUT, it doesn't exist in older browsers, so this little check will let you know--programmatically--whether it's safe to use or not.
https://caniuse.com/#feat=intersectionobserver

# JS:

	if (io){
		// do IntersectionObserver things safely
	}

# CSS:

	.intersectable .foo {
		// some styles that only apply with some expectation of your IntersectionObserver logic in play
	}

You can also polyfill IntersectionObserver pretty easily, but it's a fantastic candidate for progressive-enhancement-only....
https://alistapart.com/article/the-slow-death-of-internet-explorer-and-future-of-progressive-enhancement
*/

var io = 0;
if ('IntersectionObserver' in window &&
	'IntersectionObserverEntry' in window &&
	'intersectionRatio' in window.IntersectionObserverEntry.prototype) {

	// Minimal polyfill for Edge 15's lack of `isIntersecting`
	// See: https://github.com/w3c/IntersectionObserver/issues/211
	if (!('isIntersecting' in window.IntersectionObserverEntry.prototype)) {
		Object.defineProperty(window.IntersectionObserverEntry.prototype,
			'isIntersecting', {
			get: function () {
				return this.intersectionRatio > 0;
			}
		});
	}

	// we passed, so set our JS and CSS hooks
	document.documentElement.classList.add('intersectable');
	io = 1;
}

/*
Debounce and Throttle are extremely important things to have on hand, particularly when observing rapid-firing events (like resize or mousemove)

They do similar--but distinct--things, which can make them confusing: https://css-tricks.com/the-difference-between-throttling-and-debouncing/

var yourfunction = debounce(function(foo){
	// this will only execute 150ms after the last time it's called (so it waits for your event to settle)
}, 150);

var yourfunction = throttle(function(bar){
	// this will only execute once every 150ms regardless of how many calls it gets (so it fires continuously, but LESS continuously)
}, 150);
*/
function debounce(func, wait, immediate){
	var timeout;
	return function(){
		var context = this,
			args = arguments,
			later = function(){
				timeout = null;
				if (!immediate) func.apply(context, args);
			}
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	}
}

function throttle(callback, limit) {
	var wait = false;
	return function() {
		if (wait) {
			return;
		}
		callback.call();
		wait = true;
		setTimeout(function() {
			wait = false;
		}, limit);
	}
}

function hoist(the_function, the_args){
	if (typeof window[the_function] === 'function'){
		window[the_function](the_args);
	}
}
