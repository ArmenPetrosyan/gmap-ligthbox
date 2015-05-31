(function($){

	$('.map-preview')
		.gmap()
		.on('click',function(){
			var overlay = $('<div>',{'class':'gmap-overlay'})
				.appendTo('body');

			var closeBtn = $('<div>',{'class':'gmap-window_closeBtn'});
			var gmap_canvas = $('<div>',{'class':'gmap-canvas'});

			var gmap_window = $('<div>',{'class':'gmap-window'})
				.appendTo(overlay)
				.hide()
				.append(gmap_canvas)
				.append(closeBtn)
				.slideDown();
			gmap_canvas.gmap();
		});

	$('body').on('click','.gmap-window_closeBtn',function(){
		$(this).closest('.gmap-overlay').remove();
	});

	$('body').on('click','.gmap-window',function(){
		return false;
	});
		
})(jQuery);