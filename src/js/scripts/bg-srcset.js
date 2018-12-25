var bgs_id = 0,
	bgs_instances = {};

document.addEventListener('DOMContentLoaded', function() {
	bg_srcset_init();
});

function bg_srcset_init(){
	var bgs = document.querySelectorAll('[data-bg-srcset]');

	if (!bgs){return;}

	var bgs_count = bgs.length;

	for (var i = 0; i < bgs_count; i++) {
		var id = bgs[i].bg_srcset;
		if(id && bgs_instances.hasOwnProperty(id)){
			bgs_instances[id].get_match();
		} else {
			bgs_instances[++bgs_id] = new bg_srcset(bgs[i]);
			bgs[i].bg_srcset = bgs_id;
		}
	}

	if (bgs_count){
		window.addEventListener('resize', bg_srcset_reinit);
	}
}

var bg_srcset_reinit = debounce(bg_srcset_init, 250);

function bg_srcset(el){
	this.map = {};
	this.srcset = '';
	this.el = el;

	if (el.hasAttribute('data-bg-srcset')){
		this.setup();
	}
}

bg_srcset.prototype = {
	setup: function(){
		this.srcset = this.el.getAttribute('data-bg-srcset');
		this.make_map();
		this.get_current();
		this.get_match();
	},
	make_map: function(){
		var self = this,
			couplets = this.srcset.split(', ');

		couplets.forEach(function(c){
			var d = c.split(' ');
			if (d.hasOwnProperty(1)){
				var n = d[1].length - 1,
				type = d[1].substring(n);

				if (type === 'w'){
					var width = d[1].substring(0, n);

					self.map[width] = d[0];
				}
			}
		});
	},
	get_current: function(){
		var url = this.el.style.backgroundImage;
		if (!url){ return; }
		for (var width in this.map) {
			if (this.map.hasOwnProperty(width) && url.indexOf(this.map[width]) > -1){
				this.el.setAttribute('data-bg-srcset-current', width);
				return;
			}
		}
	},
	get_match: function(){
		var el = this.el;
		if (el.hasAttribute('data-bg-srcset-nomeasure')){
			el = el.parentNode;
			while (!el.hasAttribute('data-bg-srcset-measure') && el.parentNode) {
				el = el.parentNode;
			}
		}

		var match = 0,
			max = 0,
			target = el.clientWidth;

		for (var width in this.map) {
			if (!match && this.map.hasOwnProperty(width)){
				if (target < width){
					match = Math.max(match, width);
				} else {
					max = Math.max(max, width);
				}
			}
		}

		if (!match){
			// uploaded image sizes are all smaller than the element, so just do the best you can
			match = max;
		}

		if (el.hasAttribute('data-bg-srcset-current') && el.getAttribute('data-bg-srcset-current') > match){
			return;
		}
		this.swapimg(match);
	},
	swapimg: function(w){
		if (!this.map.hasOwnProperty(w)){return;}

		var url = this.map[w],
			loader = new Image();

		loader.src = url;

		this.doswap(loader, w);
	},
	doswap: function(i, w){
		var self = this;

		setTimeout(function(){
			if (i.complete){
				self.el.style.backgroundImage = 'url(\''+i.src+'\')';
				self.el.setAttribute('data-bg-srcset-current', w);
			} else {
				self.doswap(i, w);
			}
		}, 100);
	}
};
