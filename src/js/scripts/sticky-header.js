// are you going to have a fixed position header?

// * no: delete this file...

// * yes: match its ID to this first selector and we'll offset the element following it (probably MAIN) by the actual height
//        so you don't have to guess in CSS or resort to giving it a fixed height (yuck)

var header = document.getElementById('sticky-header');

var recalc_sticky_header = debounce(function(evt){
	header_offset();
}, 100);

if (header){
	header_offset();
	window.addEventListener('resize', recalc_sticky_header, false);
}

function header_offset() {
	header.nextElementSibling.style.marginTop = header.offsetHeight + 'px';
}
