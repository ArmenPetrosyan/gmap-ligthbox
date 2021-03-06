(function($){
	$.fn.gmap = function(){

		var MARKERS = [
	      { title:"A", latitude:46.972709, longitude:32.00284199999999 },
	      { title:"B", latitude:46.971699, longitude:32.01507200000003 },
	      { title:"C", latitude:46.975461, longitude:32.008646999999996 },
	      { title:"D", latitude:46.978173, longitude:31.985840000000053 },
	      { title:"E", latitude:46.975421, longitude:31.95968400000004 },
	      { title:"F", latitude:46.970447, longitude:31.99153720000004 },
	    ];

		this.each(function(){	
			var e = $(this);
			function initialize() {
					var myLatlng = new google.maps.LatLng(MARKERS[0].latitude, MARKERS[0].longitude);
				  	var mapOptions = {
				  	  	zoom: 14,
				  	  	center: myLatlng
				  	}
				  	console.log(e)
				  	var map = new google.maps.Map(e[0], mapOptions);
					
					for(i in MARKERS){
					    var marker = new google.maps.Marker({
					        position: new google.maps.LatLng(MARKERS[i].latitude, MARKERS[i].longitude),
					        map: map,
					        title: MARKERS[i].title
					    });
				  	}
			};

			setTimeout(initialize,300);
		});
		return this;
	}
})(jQuery);