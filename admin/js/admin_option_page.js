(function($){

	$('.map-preview')
		.gmap()
		.on('click',function(){
			var overlay = $('<div>',{'class':'gmap-overlay'})
				.appendTo('body');

			var closeBtn = $('<div>',{'class':'gmap-window_closeBtn'});

			var gmap_window = $('<div>',{'class':'gmap-window'})
				.gmap()
				.appendTo(overlay)
				.hide()
				.slideDown()
				.prepend(closeBtn);
			
		});

	$('body').on('click','.gmap-window_closeBtn',function(){
		$(this).closest('.gmap-overlay').remove();
	});

	$('body').on('click','.gmap-window',function(){
		return false;
	});
		
})(jQuery);