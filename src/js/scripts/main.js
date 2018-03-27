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
	window[the_function](the_args);
}
